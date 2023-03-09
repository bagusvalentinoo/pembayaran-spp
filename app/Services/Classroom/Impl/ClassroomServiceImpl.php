<?php

namespace App\Services\Classroom\Impl;

use App\Models\School\Classroom;
use App\Services\Classroom\ClassroomService;
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
     * Get Classrooms
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getClassrooms(Request $request)
    {
        $classrooms = $this->classroomModel->query()->get();

        return $classrooms;
    }

    /**
     * Create Classrooms
     *
     * @param Request $request
     * @return array
     */
    public function createClassrooms(Request $request)
    {
        foreach ($request->input('name') as $key => $name) {
            $classrooms[] = $this->classroomModel->create(
                array_filter([
                    'name' => $name,
                    'competency' => $request->input('competency')[$key]
                ], customArrayFilter())
            );
        }

        return $classrooms;
    }

    /**
     * Update Classrooms
     *
     *
     */
    public function updateClassrooms(Request $request, array $classroomIds)
    {
        //
    }

    /**
     * Delete Classrooms
     *
     * @param Request $request
     * @param array $classroomIds
     * @return int
     * @throws \Exception
     */
    public function deleteClassrooms(Request $request, array $classroomIds)
    {
        $classroomsIds = [];

        foreach ($classroomIds as $classroomId) {
            $isClassroomExits = $this->classroomModel->findOrFail($classroomId)->first()->id;

            if (!$isClassroomExits)
                throw new \Exception('Data Kelas tidak ditemukan', ResponseAlias::HTTP_NOT_FOUND);

            $classroomsIds = $isClassroomExits;
        }

        return $this->classroomModel->destroy($classroomsIds);
    }
}
