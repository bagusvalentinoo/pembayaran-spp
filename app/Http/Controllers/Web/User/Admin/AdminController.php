<?php

namespace App\Http\Controllers\Web\User\Admin;

use App\Http\Controllers\Web\WebController;

class AdminController extends WebController
{
    public function dashboardPage()
    {
        $user = auth()->user();
    }
}
