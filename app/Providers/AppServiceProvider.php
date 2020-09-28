<?php

namespace App\Providers;

use App\Models\Instructor;
use App\Models\University;
use Illuminate\Support\Facades\View;
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
        $instructors = Instructor::latest()->withCount('course')
            ->with(['university', 'major'])
            ->take(3)
            ->get();
        $universities = University::latest()->take(3)->get();

        View::share('instructors', $instructors);
        View::share('universities', $universities);
    }
}
