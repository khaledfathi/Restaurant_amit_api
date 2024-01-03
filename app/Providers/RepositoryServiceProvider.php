<?php

namespace App\Providers;

use App\Repository\contracts\ProductCategoryRepositoryContract;
use App\Repository\contracts\ProductRepositoryContract;
use App\Repository\contracts\RestaurantCategoriesRepositoryContract;
use App\Repository\contracts\RestaurantRepositoryContract;
use App\Repository\contracts\UserRepositoryContract;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\RestaurantCategoriesRepository;
use App\Repository\RestaurantRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class , UserRepository::class); 
        $this->app->bind(RestaurantCategoriesRepositoryContract::class , RestaurantCategoriesRepository::class); 
        $this->app->bind(RestaurantRepositoryContract::class , RestaurantRepository::class); 
        $this->app->bind(ProductCategoryRepositoryContract::class , ProductCategoryRepository::class); 
        $this->app->bind(ProductRepositoryContract::class , ProductRepository::class); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
