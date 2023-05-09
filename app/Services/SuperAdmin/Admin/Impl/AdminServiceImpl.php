<?php

namespace App\Services\SuperAdmin\Admin\Impl;

use App\Mail\User\SuperAdmin\School\SchoolMail;
use App\Models\User\Admin;
use App\Models\User\User;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Traits\Services\StringManipulation;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminServiceImpl implements AdminService
{
    use StringManipulation;

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
     * @return Builder[]|Collection
     */
    public function getAdmins(Request $request): Collection|array
    {

        if ($request->has('search') && $request->filled('search')) {
            return $this->adminModel->query()->where(
                function ($q) use ($request) {
                    $q->where('name', 'LIKE', "%{$request->input('search')}%");
                }
            )->with([
                'school',
                'school.schoolType'
            ])->get();
        } elseif ($request->has('filter') && $request->filled('filter')) {
            return $this->adminModel->query()->whereHas('school', function ($q) use ($request) {
                $q->where('school_type_id', $request->input('filter'));
            })->with([
                'school',
                'school.schoolType'
            ])->get();
        }

        return $this->adminModel->query()->with(['school', 'school.schoolType'])->get();
    }

    /**
     * Create Admin Instead of User
     *
     * @param Request $request
     * @param $school
     * @param $randomPassword
     * @return mixed
     */
    public function createAdmin(Request $request, $school, $randomPassword): mixed
    {
        $carbonNow = Carbon::now();
        $strLowerSchoolName = $this->setStrReplace(' ', '', $school->name);
        $formatSchoolName = $this->setStrToLower($strLowerSchoolName) . '_admin_' .
            $this->setGeneratedRandomLastDigitsAdminUsername(0, 9999, 4);
        $userAdminName = $this->setStrReplace('_', ' ', $this->setStrToUpper($formatSchoolName));

        $userAdmin = $this->userModel->create(
            array_filter([
                'name' => $userAdminName,
                'username' => $formatSchoolName,
                'email' => $school->email,
                'photo_profile' => 'public/images/user/admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make($randomPassword),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ], customArrayFilter())
        );
        $userAdmin->assignRole(['Admin']);

        $userAdmin->admin()->create([
            'user_id' => $userAdmin->id,
            'school_id' => $school->id,
            'name' => $userAdminName,
            'phone_number' => $school->telp_number,
            'address' => $school->address
        ]);

        $data = [
            'subject' => 'Akun Admin Pembayaran SPP',
            'username' => $userAdmin->username,
            'password' => $randomPassword
        ];
        Mail::to($userAdmin->email)->send(new SchoolMail($data));

        return $userAdmin;
    }

    /**
     * Find Admin
     *
     * @param string|int $param
     * @return mixed
     * @throws Exception
     */
    public function findAdmin(string|int $param): mixed
    {
        $admin = $this->adminModel->with(['user', 'school'])->find($param);

        if (!$admin)
            throw new Exception('Data Admin tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $admin;
    }

    /**
     * Update Admin
     *
     * @param Request $request
     * @param Admin $admin
     * @return Admin
     */
    public function updateAdmin(Request $request, Admin $admin): Admin
    {
        $admin->update(
            array_filter([
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address')
            ], customArrayFilter())
        );

        return $admin->refresh();
    }
}
