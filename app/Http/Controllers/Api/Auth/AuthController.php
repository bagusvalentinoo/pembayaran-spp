<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends ApiController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login
     *
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $user = $this->authService->checkLoginCredentials($request);
            $user = $this->authService->login($request, $user);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('login')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Login berhasil')
                ->setData([
                    'user' => $user
                ])
        );
    }

    /**
     * Logout
     *
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('logout')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Logout berhasil')
        );
    }
}
