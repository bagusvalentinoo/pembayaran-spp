<?php

namespace App\Http\Controllers\Web\Public\Auth;

use App\Http\Controllers\Web\WebController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class LoginController extends WebController
{
    /**
     * Display Login Page
     *
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }
}
