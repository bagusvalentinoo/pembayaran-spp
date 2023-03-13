<?php

namespace App\Exceptions;

use App\Exceptions\Http\FormattedResponseException;
use App\Helpers\Http\FormattedResponse;
use App\Traits\Http\RequestResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use RequestResponse;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render
     *
     * @param $request
     * @param Throwable $e
     * @return Response|JsonResponse
     * @throws FormattedResponseException
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response|JsonResponse
    {
        if (
            $request->is('*') &&
            (
                $e instanceof ModelNotFoundException ||
                $e instanceof Throwable ||
                $e instanceof ValidationException ||
                $e instanceof FormattedResponseException ||
                $e instanceof NotFoundHttpException ||
                $e instanceof UnauthorizedException ||
                ($e instanceof AuthenticationException && $e->getMessage() == "Unauthenticated.") ||
                $e instanceof MethodNotAllowedHttpException ||
                $e instanceof RouteNotFoundException
            )
        ) {
            return $this->customApiResponse($e, $request);
        }

        return parent::render($request, $e);
    }

    /**
     * @throws Http\FormattedResponseException
     */
    private function customApiResponse(Throwable $e, $request): JsonResponse
    {
        $formattedResponse = new FormattedResponse();

        if ($e instanceof ModelNotFoundException) {
            $formattedResponse->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)
                ->setMessage(trans('formatted_response.message.model_not_found'));
        } else if ($e instanceof ValidationException && $request->expectsJson()) {
            $formattedResponse->setStatusCode(SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY)
                ->setMessage(Arr::first(Arr::flatten($e->errors())))
                ->setErrors($e->validator->getMessageBag()->toArray());
        } else if ($e instanceof NotFoundHttpException) {
            $formattedResponse->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)
                ->setMessage(trans('formatted_response.message.resource_not_found'));
        } else if ($e instanceof UnauthorizedException) {
            $formattedResponse->setStatusCode(isValidHttpStatusCode($e->getCode()) ? $e->getCode() : SymfonyResponse::HTTP_UNAUTHORIZED)
                ->setMessage($e->getMessage() ?? SymfonyResponse::$statusTexts[SymfonyResponse::HTTP_UNAUTHORIZED]);
        } else if ($e instanceof AuthenticationException) {
            $formattedResponse->setStatusCode(isValidHttpStatusCode($e->getCode()) ? $e->getCode() : SymfonyResponse::HTTP_UNAUTHORIZED)
                ->setMessage($e->getMessage() ?? 'Unauthenticated');
        } else if ($e instanceof MethodNotAllowedHttpException) {
            $headers = $e->getHeaders() ?? ['Allow' => ''];
            $supportedMethods = $headers['Allow'] ?? '';
            $method = request()->getMethod();

            $formattedResponse->setStatusCode(isValidHttpStatusCode($e->getCode()) ? $e->getCode() : SymfonyResponse::HTTP_METHOD_NOT_ALLOWED)
                ->setMessage(
                    $e->getMessage()
                        ? trans('formatted_response.message.method_not_allowed', [
                        'method' => $method,
                        'supported_methods' => $supportedMethods
                    ])
                        : Response::$statusTexts[SymfonyResponse::HTTP_METHOD_NOT_ALLOWED]
                );
        } else if ($e instanceof RouteNotFoundException) {
            $formattedResponse->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)
                ->setMessage(trans('formatted_response.message.resource_not_found'));
        } else {
            $formattedResponse->setStatusCode(SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR)
                ->setMessage(SymfonyResponse::$statusTexts[SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR]);
        }

        if ($formattedResponse->getStatusCode() === SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR) Log::error($e->getMessage());

        return $this->makeJsonResponse($formattedResponse);
    }
}
