<?php

namespace App\App\Providers;

use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Observers\DentistObserver;
use App\Followers\Domain\Models\Follower;
use App\Followers\Domain\Observers\FollowerObserver;
use App\Users\Domain\Models\User;
use App\Users\Domain\Observers\UserObserver;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Dentist::observe(DentistObserver::class);
        Follower::observe(FollowerObserver::class);
    }
}
