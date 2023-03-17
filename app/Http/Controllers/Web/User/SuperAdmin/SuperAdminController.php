<?php

namespace App\Http\Controllers\Web\User\SuperAdmin;

use App\Http\Controllers\Web\WebController;

class SuperAdminController extends WebController
{
    public function dashboardPage()
    {
        $user = auth()->user();

        return view('user.super_admin.dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }

    public function schoolPage()
    {
        $user = auth()->user();

        return view('user.super_admin.school.index', [
            'title' => 'Sekolah',
            'user' => $user
        ]);
    }

    public function adminPage()
    {
        $user = auth()->user();

        return view('user.super_admin.admin.index', [
            'title' => 'Admin',
            'user' => $user
        ]);
    }
}
