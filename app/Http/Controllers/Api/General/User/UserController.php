<?php

namespace App\Http\Controllers\Api\General\User;

use App\Http\Controllers\Api\ApiController;
use App\Services\General\User\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\JsonResponse;

class UserController extends ApiController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get User
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = $this->userService->getUserAuth();

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data user')
                ->setData([
                    'user' => $user
                ])
        );
    }

    /**
     * Find User
     * 
     * @param string|int $param
     * @return JsonResponse
     */
    public function show(string|int $param): JsonResponse
    {
        $user = $this->userService->findUser($param);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data user')
                ->setData([
                    'user' => $user
                ])
        );
    }
}
