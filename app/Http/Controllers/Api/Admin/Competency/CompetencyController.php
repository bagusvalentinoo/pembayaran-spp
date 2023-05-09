<?php

namespace App\Http\Controllers\Api\Admin\Competency;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Admin\Competency\CompetencyRequest;
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
    public function index(Request $request): JsonResponse
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

    /**
     * Find Competency Data
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
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
    public function store(CompetencyRequest $request): JsonResponse
    {
        $this->comptencyService->createCompetency($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil Menambahkan Data Kompetensi')
        );
    }

    /**
     * Update Competency
     *
     * @param CompetencyRequest $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(CompetencyRequest $request, string|int $param): JsonResponse
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
    public function destroy(CompetencyRequest $request): JsonResponse
    {
        try {
            $this->comptencyService->deleteCompetency($request->input('id'));
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
