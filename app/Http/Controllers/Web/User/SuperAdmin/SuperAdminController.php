<?php

namespace App\Http\Controllers\Web\User\SuperAdmin;

use App\Http\Controllers\Web\WebController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SuperAdminController extends WebController
{
    /**
     * My Profile View
     * 
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function myProfilePage(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user = auth()->user();

        return view('user.super_admin.profile.index', [
            'title' => 'My Profile',
            'user' => $user
        ]);
    }

    /**
     * Dashboard Page View
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function dashboardPage(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user = auth()->user();

        return view('user.super_admin.dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }

    /**
     * School Page View
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function schoolPage(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user = auth()->user();

        return view('user.super_admin.school.index', [
            'title' => 'Sekolah',
            'user' => $user
        ]);
    }

    /**
     * Admin Page View
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function adminPage(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user = auth()->user();

        return view('user.super_admin.admin.index', [
            'title' => 'Admin',
            'user' => $user
        ]);
    }
}
