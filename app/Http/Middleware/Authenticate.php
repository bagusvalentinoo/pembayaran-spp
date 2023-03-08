<?php

namespace App\Http\Middleware;

use App\Traits\Http\RequestResponse;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Authenticate extends Middleware
{
    use RequestResponse;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!$request->user()) {
            if ($request->is('api/*')) {
                return $this->makeJsonResponse(
                    $this->makeResponsePayload()
                        ->setStatusCode(ResponseAlias::HTTP_FORBIDDEN)
                        ->setMessage('Pengguna sedang tidak login')
                );
            } else {
                return redirect()->route('web.public.auth.loginPage');
            }
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return JsonResponse|null
     * @throws FormattedResponseException
     */
    protected function redirectTo($request): ResponseAlias|null
    {
        if (!$request->expectsJson()) {
            return $this->makeJsonResponse(
                $this->makeResponsePayload()
                    ->setStatusCode(ResponseAlias::HTTP_UNAUTHORIZED)
                    ->setMessage(ResponseAlias::$statusTexts[ResponseAlias::HTTP_UNAUTHORIZED])
            );
        }

        return null;
    }
}
