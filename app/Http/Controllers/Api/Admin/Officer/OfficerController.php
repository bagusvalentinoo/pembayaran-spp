<?php

namespace App\Http\Controllers\Api\Admin\Officer;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\Admin\Officer\OfficerService;
use App\Traits\Services\StringManipulation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OfficerController extends ApiController
{
    use StringManipulation;

    private $officerService;

    public function __construct(OfficerService $officerService)
    {
        $this->officerService = $officerService;
    }

    /**
     * Get Officers
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
    {

        try {
            $officers = $this->officerService->getOfficers($request);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Petugas')
                ->setData([
                    'officers' => $officers
                ])
        );
    }

    /**
     * Show Officer
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
    {
        try {
            $officer = $this->officerService->findOfficer($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Petugas')
                ->setData([
                    'officer' => $officer
                ])
        );
    }

    /**
     * Create Officers Include their Accounts
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $randomPassword = $this->setGeneratedRandomPassword(10);
            $this->officerService->createOfficers($request, $randomPassword);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil menambahkan data Petugas')
        );
    }

    /**
     * Update Officer
     *
     * @param Request $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(Request $request, string|int $param): JsonResponse
    {
        try {
            $officer = $this->officerService->findOfficer($param);
            $this->officerService->updateOfficer($request, $officer);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil memperbaharui data Petugas')
        );
    }

    /**
     * Delete Officers
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $this->officerService->deleteOfficers($request, $request->input('ids'));
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil menghapus data Petugas')
        );
    }
}
