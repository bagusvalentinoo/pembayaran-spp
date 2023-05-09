<?php

namespace App\Services\SuperAdmin\Profile\Impl;

use App\Models\User\SuperAdmin;
use App\Models\User\User;
use App\Services\SuperAdmin\Profile\ProfileService;
use Illuminate\Http\Request;

class ProfileServiceImpl implements ProfileService
{
    private $userModel, $superAdminModel;

    public function __construct(User $userModel, SuperAdmin $superAdminModel)
    {
        $this->userModel = $userModel;
        $this->superAdminModel = $superAdminModel;
    }

    public function findProfile(string|int $param)
    {
        $user = $this->userModel->find($param);

        if (!$user)
            return throw new \Exception('Data User tidak ditemukan');

        return $user;
    }

    public function updateProfile(Request $request, User $user)
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
