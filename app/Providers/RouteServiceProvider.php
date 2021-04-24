<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/home';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/candidate.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/employee.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/project.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/recruitment_demand.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/product.php'));
        });
    }


    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
