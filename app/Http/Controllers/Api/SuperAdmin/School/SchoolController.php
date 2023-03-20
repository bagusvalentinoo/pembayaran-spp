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

    /**
     * Get Schools Data
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
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
     * Show Data School
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
    {
        try {
            $school = $this->schoolService->findSchool($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data sekolah')
                ->setData([
                    'school' => $school
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

    /**
     * Update School
     *
     * @param Request $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(Request $request, string|int $param): JsonResponse
    {
        try {
            $school = $this->schoolService->findSchool($param);
            $this->schoolService->updateSchool($request, $school);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil memperbaharui data Sekolah')
        );
    }

    /**
     * Delete School
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $school = $this->schoolService->findSchool($request->input('id'));
            $this->schoolService->deleteSchool($school);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil menghapus data Sekolah beserta Akun')
        );
    }
}
