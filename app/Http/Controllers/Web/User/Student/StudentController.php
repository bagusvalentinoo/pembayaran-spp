<?php

namespace App\Http\Controllers\Web\User\Student;

use App\Http\Controllers\Web\WebController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StudentController extends WebController
{

    /**
     * Dashboard Page
     *
     * @return View|Factory|Application
     */
    public function dashboardPage(): View|Factory|Application
    {
        $user = auth()->user();

        return view('user.student.dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }

    /**
     * History Page
     *
     * @return View|Factory|Application
     */
    public function historyPage(): View|Factory|Application
    {
        $user = auth()->user();

        return view('user.student.history.index', [
            'title' => 'Riwayat',
            'user' => $user
        ]);
    }
}
