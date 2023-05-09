<?php

namespace App\Services\General\User\Impl;

use App\Models\User\User;
use App\Services\General\User\UserService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserServiceImpl implements UserService
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Get User Auth Data
     *
     * @return Builder|Builder[]|Collection|Model
     * @throws Exception
     */
    public function getUserAuth(): Model|Collection|Builder|array
    {
        $user = $this->userModel->with('roles')->find(auth()->user()->id);

        if (!$user)
            return throw new Exception('User tidak ditemukan');

        switch ($user->roles()->first()->name) {
            case 'Super Admin':
                $user->superAdmin;
                break;
            case 'Admin':
                $user->admin;
                break;
            case 'Petugas':
                $user->officer;
                break;
            case 'Siswa':
                $user->student;
                break;
        }

        return $user;
    }

    /**
     * Find User
     *
     * @param string|int $param
     * @return User
     * @throws Exception
     */
    public function findUser(string|int $param): User
    {
        $user = $this->userModel->find($param);

        if (!$user)
            return throw new Exception('User tidak ditemukan');

        return $user;
    }

    /**
     * Update User
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function updateUser(Request $request, User $user): User
    {
        $user->update(
            array_filter([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ], customArrayFilter())
        );

        switch ($user->roles()->first()->name) {
            case 'Super Admin':
                $user->superAdmin->update(
                    array_filter([
                        'name' => $request->input('name'),
                        'phone_number' => $request->input('phone_number'),
                        'address' => $request->input('address')
                    ], customArrayFilter())
                );
                break;
            case 'Admin':
                $user->admin->update(
                    array_filter([
                        'name' => $request->input('name'),
                        'phone_number' => $request->input('phone_number'),
                        'address' => $request->input('address')
                    ], customArrayFilter())
                );
                break;
            case 'Petugas':
                $user->officer->update(
                    array_filter([
                        'name' => $request->input('name'),
                        'phone_number' => $request->input('phone_number'),
                        'address' => $request->input('address')
                    ], customArrayFilter())
                );
                break;
            case 'Siswa':
                $user->student->update(
                    array_filter([
                        'name' => $request->input('name'),
                        'phone_number' => $request->input('phone_number'),
                        'address' => $request->input('address')
                    ], customArrayFilter())
                );
                break;
        }

        return $user->refresh();
    }
}
