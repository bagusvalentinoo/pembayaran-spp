<?php

namespace App\Services\Admin\Competency;

use App\Models\School\Competency;
use Illuminate\Http\Request;

interface CompetencyService
{
    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated();

    /**
     * Get Competencies
     *
     * @param Request $request
     * @return mixed
     */
    public function getCompetencies(Request $request);

    /**
     * Find Competency
     *
     * @param string|int $param
     * @return mixed
     */
    public function findCompetency(string|int $param);

    /**
     * Create Competencies
     *
     * @param Request $request
     * @return array
     */
    public function createCompetencies(Request $request);


    /**
     * Update Competency
     *
     * @param Request $request
     * @param Competency $competency
     * @return mixed
     */
    public function updateCompetency(Request $request, Competency $competency);

    /**
     * Delete Competencies
     *
     * @param array $ids
     * @return int
     * @throws \Exception
     */
    public function deleteCompetencies(Request $request, array $competenciesIds);
}
