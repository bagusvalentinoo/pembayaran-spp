<?php

namespace App\Services\SuperAdmin\Admin\Impl;

use App\Models\User\Admin;
use App\Models\User\User;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Traits\Services\ServiceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminServiceImpl implements AdminService
{
    use ServiceResource;

    private $userModel, $adminModel;

    public function __construct(User $userModel, Admin $adminModel)
    {
        $this->userModel = $userModel;
        $this->adminModel = $adminModel;
    }

    /**
     * Get Admins
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAdmins(Request $request)
    {
        $admins = $this->adminModel->with(['school'])->get();

        return $admins;
    }

    /**
     * Create Admin Instead of User
     *
     * @param Request $request
     * @param $school
     * @return mixed
     */
    public function createAdmin(Request $request, $school)
    {
        $strLowerSchoolName = $this->setStrReplace(' ', '', $school->name);
        $formatSchoolName = $this->setStrToLower($strLowerSchoolName) . '_admin_' .
            $this->setGeneratedRandomLastDigitsAdminUsername(0, 9999, 4);
        $randomPassword = $this->setGeneratedRandomPassword(10);
        $userAdminName = $this->setStrReplace('_', ' ', $this->setStrToUpper($formatSchoolName));

        $userAdmin = $this->userModel->create(
            array_filter([
                'name' => $userAdminName,
                'username' => $formatSchoolName,
                'photo_profile' => 'public/images/user/admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make($randomPassword)
            ], customArrayFilter())
        );

        $userAdmin->admin()->create([
            'user_id' => $userAdmin->id,
            'school_id' => $school->id,
            'name' => $userAdminName,
            'phone_number' => $request->input('admin_phone_number'),
            'address' => $request->input('admin_address')
        ]);

        return $userAdmin;
    }
}
