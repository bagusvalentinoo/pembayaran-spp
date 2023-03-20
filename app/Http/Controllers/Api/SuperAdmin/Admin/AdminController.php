<?php

namespace App\Http\Controllers\Api\SuperAdmin\Admin;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\Admin\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminController extends ApiController
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Get Admins Data
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
    {
        $admins = $this->adminService->getAdmins($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Admin')
                ->setData([
                    'admins' => $admins
                ])
        );
    }

    /**
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
    {
        try {
            $admin = $this->adminService->findAdmin($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Admin')
                ->setData([
                    'admin' => $admin
                ])
        );
    }

    /**
     * Update Admin
     *
     * @param Request $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(Request $request, string|int $param): JsonResponse
    {
        try {
            $admin = $this->adminService->findAdmin($param);
            $this->adminService->updateAdmin($request, $admin);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil memperbaharui data Admin')
        );
    }
}
