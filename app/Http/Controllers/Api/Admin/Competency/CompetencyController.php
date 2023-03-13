<?php

namespace App\Http\Controllers\Api\Admin\Competency;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Admin\Competency\CompetencyRequest;
use App\Models\School\Competency;
use App\Services\Admin\Competency\CompetencyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CompetencyController extends ApiController
{
    private $comptencyService;

    public function __construct(CompetencyService $competencyService)
    {
        $this->comptencyService = $competencyService;
    }

    /**
     * Get Competencies Data
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request)
    {
        $competencies = $this->comptencyService->getCompetencies($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kompetensi Berhasil didapatkan')
                ->setData([
                    'competencies' => $competencies
                ])
        );
    }

    public function show(string|int $param)
    {
        try {
            $competency = $this->comptencyService->findCompetency($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Kompetensi')
                ->setData([
                    'competency' => $competency
                ])
        );
    }

    /**
     * Create Competencies
     *
     * @param CompetencyRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(CompetencyRequest $request)
    {
        $this->comptencyService->createCompetencies($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil menambahkan data Kompetensi')
        );
    }

    /**
     * Update Competency
     *
     * @param CompetencyRequest $request
     * @param Competency $competency
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(CompetencyRequest $request, string|int $param)
    {
        try {
            $competency = $this->comptencyService->findCompetency($param);
            $this->comptencyService->updateCompetency($request, $competency);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kompetensi berhasil diubah')
        );
    }


    /**
     * Delete Competencies
     *
     * @param CompetencyRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(CompetencyRequest $request)
    {
        try {
            $this->comptencyService->deleteCompetencies($request, $request->input('ids'));
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kompetensi berhasil dihapus')
        );
    }
}
