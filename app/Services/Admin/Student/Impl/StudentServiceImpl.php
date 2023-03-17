<?php

namespace App\Services\Admin\Student\Impl;

use App\Mail\User\Admin\Student\StudentMail;
use App\Models\User\Student;
use App\Models\User\User;
use App\Services\Admin\Student\StudentService;
use App\Traits\Services\ServiceResource;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StudentServiceImpl implements StudentService
{
    use ServiceResource;

    private $userModel, $studentModel;

    public function __construct(User $userModel, Student $studentModel)
    {
        $this->userModel = $userModel;
        $this->studentModel = $studentModel;
    }

    /**
     * Get Students
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getStudents(Request $request): Collection|array
    {
        $students = $this->studentModel->query()->with(['user', 'classroom'])->get();

        return $students;
    }

    /**
     * Find Student
     *
     * @param int|string $param
     * @return mixed
     * @throws Exception
     */
    public function findStudent(int|string $param): mixed
    {
        $student = $this->studentModel->find($param);

        if (!$student)
            throw new Exception('Data Siswa tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $student;
    }

    /**
     * Create Students Include Their Accounts
     *
     * @param Request $request
     * @param string $randomPassword
     * @return array
     * @throws Exception
     */
    public function createStudents(Request $request, string $randomPassword): array
    {
        $students = [];
        $carbonNow = Carbon::now();
        $inputClassrooms = $request->input('classrooms');

        foreach ($inputClassrooms as $classroom) {
            $classroomId = $classroom['id'];
            $studentsData = $classroom['students'];

            foreach ($studentsData as $student) {
                $studentUsername = $this->setStrToLower($this->setStrReplace(' ', '_', $student['name'])
                    . '_' . $this->setGeneratedRandomLastDigitsAdminUsername(0, 999, 3));
                $data = [
                    'subject' => 'Akun Siswa Pembayaran SPP',
                    'username' => $studentUsername,
                    'password' => $randomPassword
                ];

                $students = $this->userModel->create(
                    array_filter([
                        'name' => $student['name'],
                        'username' => $studentUsername,
                        'email' => $student['email'],
                        'nik' => $student['nik'],
                        'photo_profile' => 'public/images/student/admin/photo_profile/default_photo_profile.jpg',
                        'password' => Hash::make($randomPassword),
                        'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
                    ], customArrayFilter())
                );
                $students->assignRole(['Siswa']);

                $students->student()->create([
                    'user_id' => $students->id,
                    'classroom_id' => $classroomId,
                    'nisn' => $student['nisn'],
                    'nis' => $student['nis'],
                    'address' => $student['address'],
                    'phone_number' => $student['phone_number']
                ]);

                Mail::to($student['email'])->send(new StudentMail($data));
            }
        }

        return $students;
    }

    /**
     * Update Student
     *
     * @param Request $request
     * @param Student $student
     * @return Student|mixed
     */
    public function updateStudent(Request $request, Student $student): mixed
    {
        $student->update(
            array_filter([
                'classroom_id' => $request->input('classroom_id'),
                'nisn' => $request->input('nisn'),
                'nis' => $request->input('nis'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('phone_number')
            ], customArrayFilter())
        );

        return $student->refresh();
    }

    /**
     * Delete Students
     *
     * @param Request $request
     * @param array $studentIds
     * @return bool
     */
    public function deleteStudents(Request $request, array $studentIds): bool
    {
        $students = collect();

        foreach ($studentIds as $studentId) {
            $student = $this->studentModel->findOrFail($studentId);
            $students->push($student->user->id);
        }

        return $this->studentModel->destroy($studentIds) && $this->userModel->destroy($students);
    }
}
