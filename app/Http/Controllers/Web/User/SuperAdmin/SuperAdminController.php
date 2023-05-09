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
     * @return View|Factory|Application
     */
    public function myProfilePage(): View|Factory|Application
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
     * @return View|Factory|Application
     */
    public function dashboardPage(): View|Factory|Application
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
     * @return View|Factory|Application
     */
    public function schoolPage(): View|Factory|Application
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
     * @return View|Factory|Application
     */
    public function adminPage(): View|Factory|Application
    {
        $user = auth()->user();

        return view('user.super_admin.admin.index', [
            'title' => 'Admin',
            'user' => $user
        ]);
    }
}
