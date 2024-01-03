<?php

use App\Http\Controllers\API\RestaurantCategoriesController;
use App\Http\Controllers\API\ResturantController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('/user')->group(function () {
    Route::get('/' , [UserController::class , 'index']); 
    Route::get('/{id}' , [UserController::class , 'show']); 
    Route::post('' , [UserController::class , 'store']); 
    Route::post('/update/{id}' , [UserController::class , 'update']); 
    Route::delete('/{id}' , [UserController::class , 'destroy']); 
});
Route::prefix('/restaurant-category')->group(function () {
    Route::get('/' , [RestaurantCategoriesController::class , 'index']); 
    Route::get('/{id}' , [RestaurantCategoriesController::class , 'show']); 
    Route::post('' , [RestaurantCategoriesController::class , 'store']); 
    Route::post('/update/{id}' , [RestaurantCategoriesController::class , 'update']); 
    Route::delete('/{id}' , [RestaurantCategoriesController::class , 'destroy']); 
});
Route::prefix('/restaurant')->group(function () {
    Route::get('/' , [ResturantController::class , 'index']); 
    Route::get('/{id}' , [ResturantController::class , 'show']); 
    Route::post('' , [ResturantController::class , 'store']); 
    Route::post('/update/{id}' , [ResturantController::class , 'update']); 
    Route::delete('/{id}' , [ResturantController::class , 'destroy']); 
    //filter 
    Route::get('/filter-by-category/{id}' , [ResturantController::class , 'filterByCategory']); 
});