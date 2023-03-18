<?php

namespace App\Http\Controllers\Web\User\Student;

use App\Http\Controllers\Web\WebController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StudentController extends WebController
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function dashboardPage()
    {
        $user = auth()->user();

        return view('user.student.dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }

    public function historyPage()
    {
        $user = auth()->user();

        return view('user.student.history.index', [
            'title' => 'Riwayat',
            'user' => $user
        ]);
    }
}
