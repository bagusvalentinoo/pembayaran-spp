<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
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
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
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
        );
    }

    /**
     * Logout
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
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
