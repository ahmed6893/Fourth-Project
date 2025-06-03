<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View as ViewView;
use View;
use App\Http\Middleware\VerifyCsrfToken;

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
        View::composer(['*'], function ($view)
        {
            $categories = Category::with('subCategories')->get();
            $view->with('categories',$categories);
        });
    }
}
