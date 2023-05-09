<?php

namespace App\Services\Admin\Competency\Impl;

use App\Models\School\Competency;
use App\Services\Admin\Competency\CompetencyService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
    public function getSchoolIdFromAdminAuthenticated(): mixed
    {
        return auth()->user()->admin->school->id;
    }

    /**
     * Get Competencies
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getCompetencies(Request $request): Collection|array
    {
        if ($request->has('search') && $request->filled('search'))
            return $this->competencyModel->query()->where(
                function ($q) use ($request) {
                    $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated())
                        ->where('name', 'LIKE', "%{$request->input('search')}%");
                }
            )->withCount([
                'classrooms'
            ])->get();

        return $this->competencyModel->query()->where(
            function ($q) {
                $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated());
            }
        )->withCount([
            'classrooms'
        ])->get();
    }

    /**
     * Find Competency
     *
     * @param string|int $param
     * @return Builder|Builder[]|Collection|Model
     * @throws Exception
     */
    public function findCompetency(string|int $param): Model|Collection|Builder|array
    {
        $competency = $this->competencyModel->query()->find($param);

        if (!$competency)
            throw new Exception('Data Kompetensi tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $competency;
    }

    /**
     * Create Competency
     *
     * @param Request $request
     * @return Builder|Model
     */
    public function createCompetency(Request $request): Model|Builder
    {
        return $this->competencyModel->query()->create(
            array_filter([
                'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                'name' => $request->input('name')
            ], customArrayFilter())
        );
    }

    /**
     * Update Competency
     *
     * @param Request $request
     * @param Competency $competency
     * @return Competency
     */
    public function updateCompetency(Request $request, Competency $competency): Competency
    {
        $competency->update(
            array_filter([
                'name' => $request->input('name')
            ], customArrayFilter())
        );

        return $competency->refresh();
    }

    /**
     * Delete Competency
     *
     * @param string|int $param
     * @return bool|mixed|null
     * @throws Exception
     */
    public function deleteCompetency(string|int $param): mixed
    {
        $competency = $this->competencyModel->query()->find($param);

        if (!$competency)
            throw new Exception('Data Kompetensi tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $competency->delete();
    }
}
