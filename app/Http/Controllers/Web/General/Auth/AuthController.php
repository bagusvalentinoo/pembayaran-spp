<?php

namespace App\Http\Controllers\Web\General\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use PharIo\Manifest\Application;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Auth Redirect
     *
     * @return Redirector|RedirectResponse|Application
     */
    public function authRedirect(): Redirector|RedirectResponse|Application
    {
        return redirect($this->authService->getAuthUrlRedirectByRole(request()->user()));
    }
}
