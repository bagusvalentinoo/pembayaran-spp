<?php

namespace App\Http\Controllers\Api\SuperAdmin\School;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Services\SuperAdmin\School\SchoolService;
use Illuminate\Http\JsonResponse;
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

    public function index(Request $request)
    {
        $schools = $this->schoolService->getSchools($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data sekolah')
                ->setData([
                    'schools' => $schools
                ])
        );
    }

    /**
     * Create New School Instead of Admin User
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $randomPassword = $this->setGeneratedRandomPassword(10);
            $school = $this->schoolService->createSchool($request);
            $this->adminService->createAdmin($request, $school, $randomPassword);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Data Sekolah dan Admin berhasil ditambahkan')
        );
    }
}
