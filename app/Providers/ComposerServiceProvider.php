<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;

use App\Models\Subject;
use App\Models\Center;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {

            $role = Auth::user()->role;
            
            if($role == 'Estudiante'){

                $subjects = Subject::where('center_id', Auth::user()->center_id)->where('grade_id', Auth::user()->grade_id)->where('course', Auth::user()->course)->get();

                $view->with('subjects', $subjects);

            }
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
