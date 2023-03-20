<?php

namespace App\Services\SuperAdmin\School;

use App\Models\School\School;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface SchoolService
{
    /**
     * Get Schools
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getSchools(Request $request): Collection|array;

    /**
     * Create School
     *
     * @param Request $request
     * @return mixed
     */
    public function createSchool(Request $request): mixed;

    /**
     * Find School
     *
     * @param int|string $param
     * @return mixed
     * @throws \Exception
     */
    public function findSchool(string|int $param): mixed;

    /**
     * Update School
     *
     * @param Request $request
     * @param School $school
     * @return School
     */
    public function updateSchool(Request $request, School $school): School;

    /**
     * Delete School Include Their Account
     *
     * @param School $school
     * @return School
     */
    public function deleteSchool(School $school): School;
}
