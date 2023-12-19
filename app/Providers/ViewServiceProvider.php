<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

use Illuminate\Support\Facades\View;
// use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        //
        $categories = Category::with('subcategories','products')->get();
        View::share('categories', $categories);

        $products = Product::with('category','subcategory')->get();
        View::share('products', $products);

    }
}
