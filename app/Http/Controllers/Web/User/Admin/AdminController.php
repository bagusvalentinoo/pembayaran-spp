<?php

namespace App\Http\Controllers\Web\User\Admin;

use App\Http\Controllers\Web\WebController;

class AdminController extends WebController
{
    public function dashboardPage()
    {
        $user = auth()->user();

        return view('user.admin.dashboard.index', [
            "title" => 'Dashboard'
        ]);
    }

    public function kompetensiPage()
    {
        return view('user.admin.kompetensi.index', [
            "title" => 'Kompetensi'
        ]);
    }

    public function kelasPage()
    {
        return view('user.admin.kelas.index', [
            "title" => 'Kelas'
        ]);
    }

    public function siswaPage()
    {
        return view('user.admin.siswa.index', [
            "title" => 'Siswa'
        ]);
    }
}
