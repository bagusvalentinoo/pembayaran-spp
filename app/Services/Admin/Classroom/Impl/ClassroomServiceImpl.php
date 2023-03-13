<?php

namespace App\Services\Admin\Classroom\Impl;

use App\Models\School\Classroom;
use App\Services\Admin\Classroom\ClassroomService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ClassroomServiceImpl implements ClassroomService
{
    private $classroomModel;

    public function __construct(Classroom $classroomModel)
    {
        $this->classroomModel = $classroomModel;
    }

    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated()
    {
        return auth()->user()->admin->school->id;
    }

    /**
     * Get Classrooms
     *
     * @param Request $request
     * @return mixed
     */
    public function getClassrooms(Request $request)
    {
        $classrooms = $this->classroomModel->where(
            function ($q) {
                $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated());
            }
        )->orderBy('competency_id', 'DESC')->get();

        return $classrooms;
    }

    /**
     * Find Classroom
     *
     * @param int|string $param
     * @return mixed
     * @throws \Exception
     */
    public function findClassroom(int|string $param)
    {
        $classroom = $this->classroomModel->find($param);

        if (!$classroom)
            throw new \Exception('Data Kelas tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $classroom;
    }

    /**
     * Create Classrooms
     *
     * @param Request $request
     * @return array
     */
    public function createClassrooms(Request $request)
    {
        $classrooms = [];
        $inputCompetencies = $request->input('competencies');

        foreach ($inputCompetencies as $competency) {
            $competencyId = $competency['id'];
            $competencies = $competency['classrooms'];

            foreach ($competencies as $classroomName) {
                $classrooms = $this->classroomModel->create(
                    array_filter([
                        'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                        'competency_id' => $competencyId,
                        'name' => $classroomName
                    ], customArrayFilter())
                );
            }
        }

        return $classrooms;
    }

    /**
     * Update Classroom
     *
     * @param Request $request
     * @param string|int $param
     * @return mixed
     * @throws \Exception
     */
    public function updateClassroom(Request $request, Classroom $classroom)
    {
        $classroom->update(
            array_filter([
                'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                'competency_id' => $request->input('competency_id'),
                'name' => $request->input('name')
            ], customArrayFilter())
        );

        return $classroom->refresh();
    }


    /**
     * Delete Classrooms
     *
     * @param Request $request
     * @param array $classroomsIds
     * @return int
     */
    public function deleteClassrooms(Request $request, array $classroomsIds)
    {
        return $this->classroomModel->destroy($classroomsIds);
    }
}
