<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|RedirectResponse) $next
     * @param string|null ...$guards
     * @return Application|RedirectResponse|Redirector|JsonResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'status_code' => Response::HTTP_FORBIDDEN,
                        'message' => 'Pengguna sudah login'
                    ], Response::HTTP_FORBIDDEN);
                } else {
                    return redirect()->route('web.general.auth.authRedirect');
                }
            }
        }

        return $next($request);
    }
}
