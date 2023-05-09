<?php

namespace App\Services\Admin\Competency;

use App\Models\School\Competency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface CompetencyService
{
    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated(): mixed;

    /**
     * Get Competencies
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getCompetencies(Request $request): Collection|array;

    /**
     * Find Competency
     *
     * @param string|int $param
     * @return Builder|Builder[]|Collection|Model
     * @throws Exception
     */
    public function findCompetency(string|int $param): Model|Collection|Builder|array;

    /**
     * Create Competency
     *
     * @param Request $request
     * @return Builder|Model
     */
    public function createCompetency(Request $request): Model|Builder;


    /**
     * Update Competency
     *
     * @param Request $request
     * @param Competency $competency
     * @return Competency
     */
    public function updateCompetency(Request $request, Competency $competency): Competency;

    /**
     * Delete Competency
     *
     * @param string|int $param
     * @return bool|mixed|null
     * @throws Exception
     */
    public function deleteCompetency(string|int $param): mixed;
}
