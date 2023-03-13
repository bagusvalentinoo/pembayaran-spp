<?php

namespace App\Services\Admin\Competency\Impl;

use App\Models\School\Competency;
use App\Services\Admin\Competency\CompetencyService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CompetencyServiceImpl implements CompetencyService
{
    private $competencyModel;

    public function __construct(Competency $competencyModel)
    {
        $this->competencyModel = $competencyModel;
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
     * Get Competencies
     *
     * @param Request $request
     * @return mixed
     */
    public function getCompetencies(Request $request)
    {
        $competencies = $this->competencyModel->where(
            function ($q) {
                $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated());
            }
        )->get();

        return $competencies;
    }

    /**
     * Find Competency
     *
     * @param int|string $param
     * @return mixed
     * @throws \Exception
     */
    public function findCompetency(int|string $param)
    {
        $competency = $this->competencyModel->find($param);

        if (!$competency)
            throw new \Exception('Kompetensi tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $competency;
    }

    /**
     * Create Competencies
     *
     * @param Request $request
     * @return array
     */
    public function createCompetencies(Request $request)
    {
        $competencies = [];

        foreach ($request->input('names') as $competencyName) {
            $competencies = $this->competencyModel->create(
                array_filter([
                    'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                    'name' => $competencyName
                ], customArrayFilter())
            );
        }

        return $competencies;
    }

    /**
     * Competency Update
     *
     * @param Request $request
     * @param Competency $competency
     * @return Competency|mixed
     */
    public function updateCompetency(Request $request, Competency $competency)
    {
        $competency->update(
            array_filter([
                'name' => $request->input('name')
            ], customArrayFilter())
        );

        return $competency->refresh();
    }

    /**
     * Delete Competencies
     *
     * @param Request $request
     * @param array $competenciesIds
     * @return int
     */
    public function deleteCompetencies(Request $request, array $competenciesIds): int
    {
        return $this->competencyModel->destroy($competenciesIds);
    }
}
