<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class WebController extends Controller
{
    /**
     * Homepage View
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function homePage(): RedirectResponse
    {
        return redirect()->route('web.public.auth.loginPage');
    }
}
