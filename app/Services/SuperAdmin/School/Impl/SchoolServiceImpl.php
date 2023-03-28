<?php

namespace App\Services\SuperAdmin\School\Impl;

use App\Models\School\School;
use App\Services\SuperAdmin\School\SchoolService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SchoolServiceImpl implements SchoolService
{

    private $schoolModel;

    public function __construct(School $schoolModel)
    {
        $this->schoolModel = $schoolModel;
    }

    /**
     * Get Schools
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getSchools(Request $request): Collection|array
    {
        if ($request->has('search')) {
            return $this->schoolModel->where(
                function ($q) use ($request) {
                    $q->where('name', 'LIKE', "%{$request->input('search')}%")
                        ->orWhere('npsn', 'LIKE', "%{$request->input('search')}%");
                }
            )->with([
                'schoolType'
            ])->get();
        } else if ($request->has('filter')) {
            if ($request->filled('filter')) {
                return $this->schoolModel->where(
                    function ($q) use ($request) {
                        $q->where('school_type_id', $request->input('filter'));
                    }
                )->with([
                    'schoolType'
                ])->get();
            }
            return $this->schoolModel->query()->with(['schoolType'])->orderBy('school_type_id')->get();
        }

        return $this->schoolModel->query()->with(['schoolType'])->orderBy('school_type_id')->get();
    }

    /**
     * Create School
     *
     * @param Request $request
     * @return mixed
     */
    public function createSchool(Request $request): mixed
    {
        $school = $this->schoolModel->create(
            array_filter([
                'school_type_id' => $request->input('school_type'),
                'npsn' => $request->input('school_npsn'),
                'address' => $request->input('school_address'),
                'postal_code' => $request->input('school_postal_code'),
                'name' => $request->input('school_name'),
                'telp_number' => $request->input('school_telp_number'),
                'email' => $request->input('school_email'),
                'status' => $request->input('school_status') ?? null
            ], customArrayFilter())
        );

        return $school;
    }

    /**
     * Find School
     *
     * @param string|int $param
     * @return mixed
     * @throws Exception
     */
    public function findSchool(string|int $param): mixed
    {
        $school = $this->schoolModel->find($param);

        if (!$school)
            throw new Exception('Data Sekolah tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $school;
    }

    /**
     * @param Request $request
     * @param School $school
     * @return School
     */
    public function updateSchool(Request $request, School $school): School
    {
        $school->update(
            array_filter([
                'school_type_id' => $request->input('school_type'),
                'npsn' => $request->input('npsn'),
                'address' => $request->input('address'),
                'postal_code' => $request->input('postal_code'),
                'name' => $request->input('name'),
                'telp_number' => $request->input('telp_number'),
                'email' => $request->input('email'),
                'status' => $request->input('status') ?? null
            ], customArrayFilter())
        );

        return $school->refresh();
    }

    /**
     * Delete School Include Their Account
     *
     * @param School $school
     * @return School
     */
    public function deleteSchool(School $school): School
    {
        foreach ($school->admins as $admin) {
            $admin->user->delete();
        }
        $school->admins()->delete();
        $school->delete();

        return $school;
    }
}
