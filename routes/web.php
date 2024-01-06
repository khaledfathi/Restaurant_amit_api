<?php

use App\Http\Controllers\Examples\ExampleController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('root');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::group(['prefix' => '/restaurant'], function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/category', [RestaurantController::class, 'categoryIndex'])->name('restaurant.categoryIndex');
});

Route::group(['prefix' => '/product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/category', [ProductController::class, 'categoryIndex'])->name('product.categoryIndex');

});
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/fullDetails/{id}', [OrderController::class, 'fullDetails'])->name('order.fullDetails');


Route::group(['prefix'=>'/example'], function (){
    //auth
    Route::get('auth-login' , [ExampleController::class , 'authLogin'])->name('example.authLogin'); 

    //users
    Route::get('user-list' , [ExampleController::class , 'userList'])->name('example.userList'); 
    Route::get('user-single' , [ExampleController::class , 'userSingle'])->name('example.userSingle'); 
    Route::get('user-create' , [ExampleController::class , 'userCreate'])->name('example.userCreate'); 
    Route::get('user-update' , [ExampleController::class , 'userUpdate'])->name('example.userUpdate'); 
    Route::get('user-delete' , [ExampleController::class , 'userDelete'])->name('example.userDelete');
    
    //restaurant category
    Route::get('restaurant-category-list' , [ExampleController::class , 'restaurantCategoryList'])->name('example.restaurantCategoryList'); 
    Route::get('restaurant-category-single' , [ExampleController::class , 'restaurantCategorySingle'])->name('example.restaurantCategorySingle'); 
    Route::get('restaurant-category-create' , [ExampleController::class , 'restaurantCategoryCreate'])->name('example.restaurantCategoryCreate'); 
    Route::get('restaurant-category-update' , [ExampleController::class , 'restaurantCategoryUpdate'])->name('example.restaurantCategoryUpdate'); 
    Route::get('restaurant-category-delete' , [ExampleController::class , 'restaurantCategoryDelete'])->name('example.restaurantCategoryDelete');

    //product category
    Route::get('product-category-list' , [ExampleController::class , 'ProductCategoryList'])->name('example.ProductCategoryList'); 
    Route::get('product-category-single' , [ExampleController::class , 'productCategrySingle'])->name('example.prodcutCategorySingle'); 
    Route::get('product-category-create' , [ExampleController::class , 'productCategryCreate'])->name('example.prodcutCategoryCreate'); 
    Route::get('product-category-update' , [ExampleController::class , 'productCategryUpdate'])->name('example.prodcutCategoryUpdate'); 
    Route::get('product-category-delete' , [ExampleController::class , 'productCategryDelete'])->name('example.prodcutCategoryDelete');}); 