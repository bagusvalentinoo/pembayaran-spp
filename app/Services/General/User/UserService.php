<?php

namespace App\Services\General\User;

use App\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

interface UserService
{
    public function getUserAuth();

    public function findUser(string|int $param);

    public function updateUser(Request $request, User $user);
}
