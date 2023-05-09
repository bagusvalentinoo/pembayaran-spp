<?php

namespace App\Services\Admin\Student\Impl;

use App\Models\User\Student;
use App\Services\Admin\Student\StudentService;
use App\Services\Service;
use Illuminate\Http\Request;

class StudentServiceImpl extends Service implements StudentService
{
    private $studentModel;

    public function __construct(Student $studentModel)
    {
        $this->studentModel = $studentModel;
    }

    public function getSchoolIdFromAdminAuthenticated()
    {
        return auth()->user()->admin->school->id;
    }

    public function getStudents(Request $request)
    {
        if ($request->has('search') && $request->filled('search')) {
            return $this->studentModel->query()->where(
                function ($q) use ($request) {
                    $q->where('user.name', 'LIKE', "%{$request->input('search')}%");
                }
            )->get();
        }

        return $this->studentModel->query()->whereHas('classroom',
            function ($q) {
                $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated());
            }
        )->get();
    }

    public function findStudent(int|string $param)
    {
        // TODO: Implement findStudent() method.
    }

    public function createStudent(Request $request)
    {
        // TODO: Implement createStudent() method.
    }

    public function updateStudent(Request $request, Student $student)
    {
        // TODO: Implement updateStudent() method.
    }

    public function deleteStudent(Student $student)
    {
        // TODO: Implement deleteStudent() method.
    }
}
