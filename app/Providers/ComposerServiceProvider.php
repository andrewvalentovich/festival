<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.client', function($view) {
            $view->with(['sidebar_articles' => Article::orderBy('created_at', 'desc')->take(5)->get()]);
        });
    }
}
