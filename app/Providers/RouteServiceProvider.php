<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->setApiRoutes();
            $this->setWebRoutes();
        });
    }

    /**
     * Set API Routes
     *
     * @return void
     */
    public function setApiRoutes(): void
    {
        Route::prefix('/api')
            ->middleware(['api'])
            ->group(base_path('routes/api.php'));

        // API Public Route
        Route::prefix('/api/public')
            ->middleware(['api'])
            ->group(base_path('routes/api/public.php'));

        // API General Route
        Route::prefix('/api/general')
            ->middleware(['api', 'auth'])
            ->group(base_path('routes/api/general.php'));

        // API Super Admin Route
        Route::prefix('/api/super-admin')
            ->middleware(['api', 'auth', 'role:Super Admin'])
            ->group(base_path('routes/api/super_admin.php'));

        // API Admin Route
        Route::prefix('/api/admin')
            ->middleware(['api', 'auth', 'role:Admin'])
            ->group(base_path('routes/api/admin.php'));

        // API Petugas Route
        Route::prefix('/api/officer')
            ->middleware(['api'])
            ->group(base_path('routes/api/officer.php'));

        // API Student Route
        Route::prefix('/api/student')
            ->middleware(['api'])
            ->group(base_path('routes/api/student.php'));
    }

    /**
     * Set Web Routes
     *
     * @return void
     */
    public function setWebRoutes()
    {
        // Web Public Route
        Route::middleware(['web'])
            ->group(base_path('routes/web/public.php'));

        // Web General Route
        Route::prefix('general')
            ->middleware(['web'])
            ->group(base_path('routes/web/general.php'));

        // Web Admin Route
        Route::prefix('admin')
            ->middleware(['web'])
            ->group(base_path('routes/web/admin.php'));

        // Web Petugas Route
        Route::prefix('petugas')
            ->middleware(['web', 'auth', 'role:Petugas'])
            ->group(base_path('routes/web/officer.php'));

        // Web Siswa Route
        Route::prefix('siswa')
            ->middleware(['web', 'auth', 'role:Siswa'])
            ->group(base_path('routes/web/student.php'));
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
