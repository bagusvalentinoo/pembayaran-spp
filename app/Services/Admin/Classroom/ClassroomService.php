<?php

namespace App\Services\Admin\Classroom;

use App\Models\School\Classroom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ClassroomService
{
    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated(): mixed;

    /**
     * Get Classrooms
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getClassrooms(Request $request): Collection|array;

    /**
     * Find Classroom
     *
     * @param string|int $param
     * @return Builder|Builder[]|Collection|Model
     */
    public function findClassroom(string|int $param): Model|Collection|Builder|array;

    /**
     * Create Classroom
     *
     * @param Request $request
     * @return Model|Builder
     */
    public function createClassroom(Request $request): Builder|Model;

    /**
     * Update Classroom
     *
     * @param Request $request
     * @param Classroom $classroom
     * @return Classroom
     */
    public function updateClassroom(Request $request, Classroom $classroom): Classroom;

    /**
     * Delete Classroom
     *
     * @param string|int $param
     * @return bool|mixed|null
     */
    public function deleteClassroom(string|int $param): mixed;
}
