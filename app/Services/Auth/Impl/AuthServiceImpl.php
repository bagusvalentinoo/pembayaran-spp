<?php

namespace App\Services\Auth\Impl;

use App\Models\User\Role;
use App\Models\User\User;
use App\Services\Auth\AuthService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthServiceImpl implements AuthService
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Check Login Credentials
     *
     * @param Request $request
     * @return User
     */
    public function checkLoginCredentials(Request $request): User
    {
        $user = $this->userModel->where(
            function ($q) use ($request) {
                $q->where('username', '=', $request->input('username'))
                    ->orWhere('email', '=', $request->input('username'))
                    ->orWhere('nik', '=', $request->input('username'));
            }
        )->first();

        if (!$user)
            throw new \Exception('Username, Email atau NIK dan Password tidak sesuai', ResponseAlias::HTTP_BAD_REQUEST);

        if (!Hash::check($request->input('password'), $user->password))
            throw new \Exception('Username, Email atau NIK dan Password tidak sesuai', ResponseAlias::HTTP_BAD_REQUEST);

        return $user;
    }

    /**
     * Login
     *
     * @param Request $request
     * @param User $user
     * @return Authenticatable|bool
     */
    public function login(Request $request, User $user)
    {
        return Auth::loginUsingId($user->id, boolval($request->input('remember_me')));
    }

    /**
     * Get Auth Url Redirect By Role
     *
     * @param User $user
     * @return string
     */
    public function getAuthUrlRedirectByRole(User $user): string
    {
        $redirectUrl = '';

        $firstRole = $user->roles->first();
        if (!$firstRole) return $redirectUrl;

        switch ($firstRole->name) {
            case Role::$roleNames['super-admin']:
                $redirectUrl = '/super-admin/dashboard';
                break;
            case Role::$roleNames['admin']:
                $redirectUrl = '/admin/dashboard';
                break;
            case Role::$roleNames['petugas']:
                $redirectUrl = '/petugas/dashboard';
                break;
            case Role::$roleNames['siswa']:
                $redirectUrl = '/siswa/dashboard';
                break;
        }

        return $redirectUrl;
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        return Auth::logout();
    }
}
