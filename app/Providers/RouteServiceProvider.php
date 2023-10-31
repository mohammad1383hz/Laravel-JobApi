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
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            //company
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/auth.php'));

            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/profile.php'));

            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/package.php'));
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/advertisement.php'));
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/category.php'));
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/location.php'));
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/request.php'));
            Route::prefix('apicompany')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Company/user.php'));

            // admin
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/package.php'));
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/advertisement.php'));
             Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/request.php'));
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/auth.php'));
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/category.php'));

            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/company.php'));
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/location.php'));

            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/skill.php'));
          Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/property.php'));
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/Admin/user.php'));

            // Route::middleware('web')
            //     ->namespace($this->namespace)
            //     ->group(base_path('routes/web.php'));





            //users
            Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Home/auth.php'));
            Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Home/advertisement.php'));
            Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Home/request.php'));
            Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Home/resume.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
