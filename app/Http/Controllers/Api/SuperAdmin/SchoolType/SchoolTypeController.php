<?php

namespace App\Http\Controllers\Api\SuperAdmin\SchoolType;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\SchoolType\SchoolTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SchoolTypeController extends ApiController
{
    private $schoolTypeService;

    public function __construct(SchoolTypeService $schoolTypeService)
    {
        $this->schoolTypeService = $schoolTypeService;
    }

    /**
     * Get School Types
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
    {
        $schoolTypes = $this->schoolTypeService->getSchoolTypes($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data Tipe Sekolah')
                ->setData([
                    'school_types' => $schoolTypes
                ])
        );
    }
}
