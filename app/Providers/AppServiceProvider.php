<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. මේ line එක අනිවාර්යයෙන්ම උඩින්ම තියෙන්න ඕනේ
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. මේ line එක මෙතනට ඇතුළත් කරන්න
        Paginator::useTailwind();
    }
}