<?php

namespace App\Services\Admin\Classroom;

use App\Models\School\Classroom;
use Illuminate\Http\Request;

interface ClassroomService
{
    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated();

    /**
     * Get Classrooms
     *
     * @param Request $request
     * @return mixed
     */
    public function getClassrooms(Request $request);

    /**
     * Find Classroom
     *
     * @param string|int $param
     * @return mixed
     */
    public function findClassroom(string|int $param);

    /**
     * Create Classrooms
     *
     * @param Request $request
     * @return array
     */
    public function createClassrooms(Request $request);

    /**
     * Update Classroom
     *
     * @param Request $request
     * @param Classroom $classroom
     * @return mixed
     */
    public function updateClassroom(Request $request, Classroom $classroom);

    /**
     * Delete Classrooms
     *
     * @param Request $request
     * @param array $classroomsIds
     * @return int
     */
    public function deleteClassrooms(Request $request, array $classroomsIds);
}
