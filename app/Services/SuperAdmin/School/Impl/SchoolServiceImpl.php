<?php

namespace App\Services\SuperAdmin\School\Impl;

use App\Models\School\School;
use App\Services\SuperAdmin\School\SchoolService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SchoolServiceImpl implements SchoolService
{

    private $schoolModel;

    public function __construct(School $schoolModel)
    {
        $this->schoolModel = $schoolModel;
    }

    /**
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getSchools(Request $request): Collection|array
    {
        return $this->schoolModel->query()->with(['schoolType'])->get();
    }

    /**
     * Create School
     *
     * @param Request $request
     * @return mixed
     */
    public function createSchool(Request $request)
    {
        $school = $this->schoolModel->create(
            array_filter([
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
}
