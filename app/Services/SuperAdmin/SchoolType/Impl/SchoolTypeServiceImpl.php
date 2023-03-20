<?php

namespace App\Services\SuperAdmin\SchoolType\Impl;

use App\Models\School\SchoolType;
use App\Services\SuperAdmin\SchoolType\SchoolTypeService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SchoolTypeServiceImpl implements SchoolTypeService
{
    private $schoolTypeModel;

    public function __construct(SchoolType $schoolTypeModel)
    {
        $this->schoolTypeModel = $schoolTypeModel;
    }

    /**
     * Get School Types
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getSchoolTypes(Request $request): Collection|array
    {
        return $this->schoolTypeModel->query()->with(['schools'])->get();
    }
}
