<?php

namespace App\Providers\Services;

use App\Services\SuperAdmin\Admin\AdminService;
use App\Services\SuperAdmin\Admin\Impl\AdminServiceImpl;
use App\Services\SuperAdmin\Dashboard\DashboardService;
use App\Services\SuperAdmin\Dashboard\Impl\DashboardServiceImpl;
use App\Services\SuperAdmin\School\Impl\SchoolServiceImpl;
use App\Services\SuperAdmin\School\SchoolService;
use App\Services\SuperAdmin\SchoolType\Impl\SchoolTypeServiceImpl;
use App\Services\SuperAdmin\SchoolType\SchoolTypeService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SuperAdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        SchoolTypeService::class => SchoolTypeServiceImpl::class,
        SchoolService::class => SchoolServiceImpl::class,
        AdminService::class => AdminServiceImpl::class,
        DashboardService::class => DashboardServiceImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            SchoolTypeService::class,
            SchoolService::class,
            AdminService::class,
            DashboardService::class,
        ];
    }
}
