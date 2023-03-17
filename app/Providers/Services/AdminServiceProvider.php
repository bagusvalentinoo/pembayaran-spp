<?php

namespace App\Providers\Services;

use App\Services\Admin\Classroom\ClassroomService;
use App\Services\Admin\Classroom\Impl\ClassroomServiceImpl;
use App\Services\Admin\Competency\CompetencyService;
use App\Services\Admin\Competency\Impl\CompetencyServiceImpl;
use App\Services\Admin\Officer\Impl\OfficerServiceImpl;
use App\Services\Admin\Officer\OfficerService;
use App\Services\Admin\Student\Impl\StudentServiceImpl;
use App\Services\Admin\Student\StudentService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        CompetencyService::class => CompetencyServiceImpl::class,
        ClassroomService::class => ClassroomServiceImpl::class,
        StudentService::class => StudentServiceImpl::class,
        OfficerService::class => OfficerServiceImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            CompetencyService::class,
            ClassroomService::class,
            StudentService::class,
            OfficerService::class,
        ];
    }
}
