<?php

namespace App\Http\Controllers\Api\SuperAdmin\Dashboard;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\SuperAdmin\Dashboard\DashboardService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DashboardController extends ApiController
{
    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * Get Amount Data Schools
     *
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(): JsonResponse
    {
        $amountSMASchools = $this->dashboardService->getAmountSMASchools();
        $amountSMKSchools = $this->dashboardService->getAmountSMKSchools();
        $amountAdmins = $this->dashboardService->getAmountAdmins();

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data jumlah Sekolah')
                ->setData([
                    'amountSMASchools' => $amountSMASchools,
                    'amountSMKSchools' => $amountSMKSchools,
                    'amountAdmins' => $amountAdmins
                ])
        );
    }
}
