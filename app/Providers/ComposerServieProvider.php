<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServieProvider extends ServiceProvider
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
        view()->composer('client.sider',function($view){
            $categories=Category::with('posts')
                    ->orderBy('name','asc')->get();

            return $view->with('categories',$categories);
        });
    }
}
