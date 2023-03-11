<?php

namespace App\Providers\Services;

use App\Services\Admin\Classroom\ClassroomService;
use App\Services\Admin\Classroom\Impl\ClassroomServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ClassroomService::class => ClassroomServiceImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            ClassroomService::class,
        ];
    }
}
