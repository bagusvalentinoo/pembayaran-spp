<?php

namespace App\Services\Auth;

use App\Models\User\User;
use Illuminate\Http\Request;

interface AuthService
{
    /**
     * Check Login Credentials
     * 
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User\User
     */
    public function checkLoginCredentials(Request $request): User;

    /**
     * Login
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User\User $user
     * @return \Illuminate\Contracts\Auth\Authenticatable|bool
     */
    public function login(Request $request, User $user);

    /**
     * Get Auth Url Redirect By Role
     * 
     * @param \App\Models\User\User $user
     * @return string
     */
    public function getAuthUrlRedirectByRole(User $user): string;

    /**
     * Logout
     * 
     * @return void
     */
    public function logout();
}
