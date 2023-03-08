<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Controller;
use App\Traits\Controller\ControllerResource;
use App\Traits\Http\RequestResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ApiController extends Controller
{
    use RequestResponse, ControllerResource;

    /**
     * Home
     *
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function home(): JsonResponse
    {
        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Welcome to Pembayaran SPP API')
                ->setData([
                    "title" => "Pembayaran SPP API",
                    "description" => "API for Pembayaran SPP",
                ])
        );
    }
}
