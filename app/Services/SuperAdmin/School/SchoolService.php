<?php

namespace App\Services\SuperAdmin\School;

use Illuminate\Http\Request;

interface SchoolService
{
    public function createSchool(Request $request);
}
