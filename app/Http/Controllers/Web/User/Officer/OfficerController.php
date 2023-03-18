<?php

namespace App\Http\Controllers\Web\User\Officer;

use App\Http\Controllers\Web\WebController;

class OfficerController extends WebController
{
    public function dashboardPage()
    {
        $user = auth()->user();

        return view('user.officer.dashboard.index', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
    }

    public function paymentPage()
    {
        $user = auth()->user();

        return view('user.officer.payment.index', [
            'title' => 'Pembayaran',
            'user' => $user
        ]);
    }

    public function historyPage()
    {
        $user = auth()->user();

        return view('user.officer.history.index', [
            'title' => 'History',
            'user' => $user
        ]);
    }
}
