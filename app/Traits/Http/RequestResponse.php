<?php

namespace App\Traits\Http;

use App\Exceptions\Handler;
use App\Exceptions\Http\FormattedResponseException;
use App\Helpers\Http\FormattedResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Middleware\Authenticate;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

trait RequestResponse
{
    protected Request $request;
    protected Response|FormattedResponse|JsonResponse $response;
    protected User|null $userAuth;

    /**
     * Set Request
     *
     * @param Request|null $request
     * @return RequestResponse|Handler|ApiController|Authenticate
     */
    protected function setRequest(?Request $request = null): self
    {
        $this->request = $request ?? request();

        return $this;
    }

    /**
     * Set Request
     *
     * @return ApiController|Handler|RequestResponse
     */
    protected function setUserAuth(): self
    {
        $this->userAuth = request()->user();

        return $this;
    }

    /**
     * Set Response Payload
     *
     * @return FormattedResponse
     */
    protected function makeResponsePayload(): FormattedResponse
    {
        return new FormattedResponse();
    }

    /**
     * Set Response Payload
     *
     * @return RequestResponse|Handler|ApiController|Authenticate
     */
    protected function setResponsePayload(): self
    {
        $this->response = new FormattedResponse();
        return $this;
    }

    /**
     * Set Response
     *
     * @param FormattedResponse $response
     * @return JsonResponse
     */
    protected function makeJsonResponse(FormattedResponse $response): JsonResponse
    {
        return response()->json(array_filter(
            [
                "status_code" => $response->getStatusCode(),
                "message" => $response->getMessage(),
                'data' => $response->getData(),
                'errors' => $response->getErrors()
            ],
            customArrayFilter()
        ), $response->getStatusCode());
    }

    /**
     * Return Response
     *
     * @return JsonResponse
     */
    protected function returnJsonResponse(): JsonResponse
    {
        return response()->json(array_filter(
            [
                "status_code" => $this->response->getStatusCode(),
                "message" => $this->response->getMessage(),
                'data' => $this->response->getData(),
                'errors' => $this->response->getErrors()
            ],
            customArrayFilter()
        ), $this->response->getStatusCode());
    }

    /**
     * Return Cart Throwable To Json Response
     *
     * @param Throwable $th
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    protected function returnCatchThrowableToJsonResponse(Throwable $th): JsonResponse
    {
        $code = $th->getCode() ?? Response::HTTP_INTERNAL_SERVER_ERROR;
        $code = $code > 100 && $code < 600 ? $code : Response::HTTP_INTERNAL_SERVER_ERROR;

        if ($code === Response::HTTP_INTERNAL_SERVER_ERROR) report($th);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()->setMessage($code == Response::HTTP_INTERNAL_SERVER_ERROR ? "Kesalahan server dari dalam" : $th->getMessage())
                ->setStatusCode($code)
        );
    }
}
