<?php

namespace App\Services\SuperAdmin\Profile;

use App\Models\User\User;
use Illuminate\Http\Request;

interface ProfileService
{
    public function findProfile(string|int $param);

    public function updateProfile(Request $request, User $user);
}
