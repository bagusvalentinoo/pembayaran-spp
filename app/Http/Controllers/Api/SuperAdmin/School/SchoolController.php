<?php

namespace App\Http\Controllers\Api\SuperAdmin\School;

use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Services\SuperAdmin\School\SchoolService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SchoolController extends ApiController
{
    private $schoolService, $adminService;

    public function __construct(SchoolService $schoolService, AdminService $adminService)
    {
        $this->schoolService = $schoolService;
        $this->adminService = $adminService;
    }

    /**
     * Create New School Instead of Admin User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\Http\FormattedResponseException
     */
    public function store(Request $request)
    {
        $school = $this->schoolService->createSchool($request);
        $this->adminService->createAdmin($request, $school);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Data Sekolah dan Admin berhasil ditambahkan')
        );
    }
}
