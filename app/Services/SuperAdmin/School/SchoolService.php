<?php

namespace App\Services\SuperAdmin\School;

use Illuminate\Http\Request;

interface SchoolService
{
    public function getSchools(Request $request);

    public function createSchool(Request $request);
}
