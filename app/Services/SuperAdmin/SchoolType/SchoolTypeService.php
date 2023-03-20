<?php

namespace App\Services\SuperAdmin\SchoolType;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface SchoolTypeService
{
    /**
     * Get School Types
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getSchoolTypes(Request $request): Collection|array;
}
