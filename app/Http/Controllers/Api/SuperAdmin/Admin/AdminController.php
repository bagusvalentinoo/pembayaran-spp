<?php

namespace App\Http\Controllers\Api\SuperAdmin\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\Admin\AdminService;
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

    public function index(Request $request)
    {
        $admins = $this->adminService->getAdmins($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Admin berhasil didapatkan')
                ->setData([
                    'admins' => $admins
                ])
        );
    }
}
