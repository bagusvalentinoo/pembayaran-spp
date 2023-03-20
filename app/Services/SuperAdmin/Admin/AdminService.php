<?php

namespace App\Services\SuperAdmin\Admin;

use App\Models\School\School;
use App\Models\User\Admin;
use Exception;
use Illuminate\Http\Request;

interface AdminService
{
    /**
     * Get Admins
     *
     * @param Request $request
     * @return mixed
     */
    public function getAdmins(Request $request): mixed;

    /**
     * Create Admin
     *
     * @param Request $request
     * @param School $school
     * @param $randomPassword
     * @return mixed
     */
    public function createAdmin(Request $request, School $school, $randomPassword): mixed;

    /**
     * Find Admin
     *
     * @param int|string $param
     * @return mixed
     * @throws Exception
     */
    public function findAdmin(string|int $param): mixed;

    /**
     * Update Admin
     *
     * @param Request $request
     * @param Admin $admin
     * @return Admin
     */
    public function updateAdmin(Request $request, Admin $admin): Admin;
}
