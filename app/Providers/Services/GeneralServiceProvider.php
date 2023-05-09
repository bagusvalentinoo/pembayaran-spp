<?php

namespace App\Providers\Services;

use App\Services\General\User\Impl\UserServiceImpl;
use App\Services\General\User\UserService;
use Illuminate\Support\ServiceProvider;

class GeneralServiceProvider extends ServiceProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            UserService::class,
        ];
    }
}
