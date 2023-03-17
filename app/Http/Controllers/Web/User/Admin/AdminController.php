<?php

namespace App\Http\Controllers\Web\User\Admin;

use App\Http\Controllers\Web\WebController;

class AdminController extends WebController
{
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

        return view('user.admin.kompetensi.index', [
            "title" => 'Kompetensi',
            'user' => $user
        ]);
    }

    public function classroomPage()
    {
        $user = auth()->user();

        return view('user.admin.kelas.index', [
            "title" => 'Kelas',
            'user' => $user
        ]);
    }

    public function studentPage()
    {
        $user = auth()->user();

        return view('user.admin.siswa.index', [
            "title" => 'Siswa',
            'user' => $user
        ]);
    }
}
