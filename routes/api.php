<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RestaurantCategoriesController;
use App\Http\Controllers\API\ResturantController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['json.response',])->group(function () {
    // USERS
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('', [UserController::class, 'store']);
        Route::post('/update/{id}', [UserController::class, 'update'])->middleware(['auth:sanctum' , 'abilities:admin']);
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware(['auth:sanctum' , 'abilities:admin']); //accress by admin only
    });

    //RESTAURANTS CATEGORIES
    Route::prefix('/restaurant-category')->group(function () {
        Route::get('/', [RestaurantCategoriesController::class, 'index']);
        Route::get('/{id}', [RestaurantCategoriesController::class, 'show']);
        Route::middleware(['auth:sanctum' , 'abilities:admin'])->group(function () {
            Route::post('', [RestaurantCategoriesController::class, 'store']);
            Route::post('/update/{id}', [RestaurantCategoriesController::class, 'update']);
            Route::delete('/{id}', [RestaurantCategoriesController::class, 'destroy']);
        });
    });

    //RESTAURANTS CATEGORIES
    Route::prefix('/restaurant')->group(function () {
        Route::get('/', [ResturantController::class, 'index']);
        Route::get('/{id}', [ResturantController::class, 'show']);
        Route::middleware(['auth:sanctum' , 'abilities:admin'])->group(function () {
            Route::post('', [ResturantController::class, 'store']);
            Route::post('/update/{id}', [ResturantController::class, 'update']);
            Route::delete('/{id}', [ResturantController::class, 'destroy']);
        });
        //filters
        Route::get('/filter-by-category/{id}', [ResturantController::class, 'filterByCategory']);
    });

    //PRODUCTS CATEGORIES
    Route::prefix('/product-category')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('/{id}', [ProductCategoryController::class, 'show']);
        Route::middleware(['auth:sanctum' , 'abilities:admin'])->group(function () {
            Route::post('', [ProductCategoryController::class, 'store']);
            Route::post('/update/{id}', [ProductCategoryController::class, 'update']);
            Route::delete('/{id}', [ProductCategoryController::class, 'destroy']);
        });
    });

    //PRODUCTS 
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::middleware(['auth:sanctum' , 'abilities:admin'])->group(function () {
            Route::post('', [ProductController::class, 'store']);
            Route::post('/update/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);
        });
        //filters
        Route::get('/filter-by-category/{id}', [ProductController::class, 'filterByCategory']);
        Route::get('/filter-by-restaurant/{id}', [ProductController::class, 'filterByRestaurant']);
        Route::get('/filter-by-category/{category_id}/and-restaurant/{restaurant_id}', [ProductController::class, 'filterByCategoryAndRestaurant']);
    });

    //ORDERS
    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::post('', [OrderController::class, 'store']);
        Route::post('/update/{id}', [OrderController::class, 'update']);
        Route::delete('/{id}', [OrderController::class, 'destroy']);
        //filters 
        Route::get('/filter-by-user/{id}', [OrderController::class, 'filterByUser']);
    });

    //AUTH
    Route::prefix('/auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
    });

});