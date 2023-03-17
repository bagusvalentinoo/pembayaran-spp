<?php

namespace App\Services\Admin\Officer;

use App\Models\User\Officer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface OfficerService
{
    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated();

    /**
     * Get Officers
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getOfficers(Request $request): Collection|array;

    /**
     * Find Officer
     *
     * @param int|string $param
     * @return mixed
     * @throws Exception
     */
    public function findOfficer(string|int $param): mixed;

    /**
     * Create Officers
     *
     * @param Request $request
     * @param $randomPassword
     * @return array
     */
    public function createOfficers(Request $request, $randomPassword);

    /**
     * Update Officer
     *
     * @param Request $request
     * @param Officer $officer
     * @return Officer
     */
    public function updateOfficer(Request $request, Officer $officer);

    /**
     * Delete Officers include their Accounts
     *
     * @param Request $request
     * @param array $officerIds
     * @return bool
     */
    public function deleteOfficers(Request $request, array $officerIds): bool;
}
