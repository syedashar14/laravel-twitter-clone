<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        //To enable debug bar logging
        //\Debugbar::enable();

        //Cahing the topUsers results
        // $topUsers = Cache::remember('topUsers', now()->addHours(1), function () {
        //     return User::withCount('ideas')
        //     ->orderBy('ideas_count', 'DESC')
        //     ->limit(5)->get();
        // });
        view()->share('topUsers', $topUsers ?? []);
    }
}
