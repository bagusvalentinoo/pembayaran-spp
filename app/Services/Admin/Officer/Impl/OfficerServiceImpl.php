<?php

namespace App\Services\Admin\Officer\Impl;

use App\Mail\User\Admin\Officer\OfficerMail;
use App\Models\User\Officer;
use App\Models\User\User;
use App\Services\Admin\Officer\OfficerService;
use App\Traits\Services\ServiceResource;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OfficerServiceImpl implements OfficerService
{
    use ServiceResource;

    private $userModel, $officerModel;

    public function __construct(User $userModel, Officer $officerModel)
    {
        $this->userModel = $userModel;
        $this->officerModel = $officerModel;
    }

    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixedl e
     */
    public function getSchoolIdFromAdminAuthenticated(): mixed
    {
        return auth()->user()->admin->school->id;
    }

    /**
     * Get Officers
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getOfficers(Request $request): Collection|array
    {
        $officers = $this->officerModel->query()->with(['user', 'school'])->get();

        return $officers;
    }

    /**
     * Find Officer
     *
     * @param string|int $param
     * @return mixed
     * @throws Exception
     */
    public function findOfficer(string|int $param): mixed
    {
        $officer = $this->officerModel->find($param);

        if (!$officer)
            throw new Exception('Data Petugas tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $officer;
    }

    /**
     * Create Officers
     *
     * @param Request $request
     * @param $randomPassword
     * @return array
     */
    public function createOfficers(Request $request, $randomPassword)
    {
        $officers = [];
        $inputOfficers = $request->input('officers');

        foreach ($inputOfficers as $inputOfficer) {
            $officerUsername = $this->setStrToLower($this->setStrReplace(' ', '_', $inputOfficer['name'])
                . '_' . $this->setGeneratedRandomLastDigitsAdminUsername(0, 99, 2));
            $data = [
                'subject' => 'Akun Petugas Pembayaran SPP',
                'username' => $officerUsername,
                'password' => $randomPassword
            ];

            $officers = $this->userModel->create(
                array_filter([
                    'name' => $inputOfficer['name'],
                    'username' => $officerUsername,
                    'email' => $inputOfficer['email'],
                    'photo_profile' => 'public/images/user/officer/photo_profile/default_photo_profile.jpg',
                    'password' => Hash::make($randomPassword)
                ], customArrayFilter())
            );
            $officers->assignRole(['Petugas']);

            $officers->officer()->create(
                array_filter([
                    'user_id' => $officers->id,
                    'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                    'name' => $inputOfficer['name'],
                    'phone_number' => $inputOfficer['phone_number'],
                    'address' => $inputOfficer['address']
                ], customArrayFilter())
            );

            Mail::to($inputOfficer['email'])->send(new OfficerMail($data));
        }

        return $officers;
    }

    /**
     * Update Officer
     *
     * @param Request $request
     * @param Officer $officer
     * @return Officer
     */
    public function updateOfficer(Request $request, Officer $officer)
    {
        $officer->update(
            array_filter([
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address')
            ], customArrayFilter())
        );

        return $officer->refresh();
    }

    /**
     * Delete Officers include their Accounts
     *
     * @param Request $request
     * @param array $officerIds
     * @return bool
     */
    public function deleteOfficers(Request $request, array $officerIds): bool
    {
        $userOfficerIds = collect();

        foreach ($officerIds as $officerId) {
            $officer = $this->officerModel->findOrFail($officerId);
            $userOfficerIds->push($officer->user->id);
        }

        return $this->officerModel->destroy($officerIds) && $this->userModel->destroy($userOfficerIds);
    }
}
