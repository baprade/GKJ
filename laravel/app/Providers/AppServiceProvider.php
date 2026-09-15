<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Christian;
use App\Models\Format;
use App\Models\FormulirFormat;
use App\Models\Married;
use App\Models\Post;
use App\Models\Role;
use App\Models\Sex;
use Illuminate\Support\ServiceProvider;

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
        // Menginisialisasi variabel $roles_array
        view()->composer('*', function ($view) {
            $view->with('roles_array', Role::orderBy('id')->get());
        });

        // Menginisialisasi variabel $formats_array
        view()->composer('*', function ($view) {
            $view->with('formats_array', Format::where('id', '!=', 5)->orderBy('id')->get());
        });

        // Menginisialisasi variabel $categories_array
        view()->composer('*', function ($view) {
            $view->with('categories_array', Category::orderBy('id')->get());
        });

        // Menginisialisasi variabel $abouts_array
        view()->composer('*', function ($view) {
            $view->with('abouts_array', Post::where('id_format', 1)->where('onoff', 1)->get());
        });

        // Menginisialisasi variabel $formulirformats_array
        view()->composer('*', function ($view) {
            $view->with('formulirformats_array', FormulirFormat::orderBy('id')->get());
        });

        // Menginisialisasi variabel $sexes_array
        view()->composer('*', function ($view) {
            $view->with('sexes_array', Sex::orderBy('id')->get());
        });

        // Menginisialisasi variabel $marrieds_array
        view()->composer('*', function ($view) {
            $view->with('marrieds_array', Married::orderBy('id')->get());
        });

        // Menginisialisasi variabel $christians_array
        view()->composer('*', function ($view) {
            $view->with('christians_array', Christian::orderBy('id')->get());
        });
    }
}
