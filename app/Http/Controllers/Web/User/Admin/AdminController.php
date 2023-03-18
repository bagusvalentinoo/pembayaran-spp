<?php

namespace App\Http\Controllers\Web\User\Admin;

use App\Http\Controllers\Web\WebController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends WebController
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function dashboardPage()
    {
        $user = auth()->user();

        return view('user.admin.dashboard.index', [
            "title" => 'Dashboard',
            'user' => $user
        ]);
    }

    public function competencyPage()
    {
        $user = auth()->user();

        return view('user.admin.competency.index', [
            "title" => 'Kompetensi',
            'user' => $user
        ]);
    }

    public function classroomPage()
    {
        $user = auth()->user();

        return view('user.admin.classroom.index', [
            "title" => 'Kelas',
            'user' => $user
        ]);
    }

    public function studentPage()
    {
        $user = auth()->user();

        return view('user.admin.student.index', [
            "title" => 'Siswa',
            'user' => $user
        ]);
    }
}
