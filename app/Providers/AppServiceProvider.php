<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $categoryItem=Category::CategoryFromDatabase();
        $category=[];
        foreach ($categoryItem as $value){
            $category[]= [$value->title, $value->id];
        }
        Schema::defaultStringLength(191);
        View::share('category', $category);
    }
}
