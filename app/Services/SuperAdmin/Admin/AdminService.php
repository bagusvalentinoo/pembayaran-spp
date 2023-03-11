<?php

namespace App\Services\SuperAdmin\Admin;

use App\Models\School\School;
use Illuminate\Http\Request;

interface AdminService
{
    /**
     * Get Admins
     *
     * @param Request $request
     * @return mixed
     */
    public function getAdmins(Request $request);

    /**
     * Create Admin
     *
     * @param Request $request
     * @param School $school
     * @return mixed
     */
    public function createAdmin(Request $request, School $school);
}
