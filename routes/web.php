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
Route::group(['prefix'=>'/order'], function (){
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/full-details/{id}', [OrderController::class, 'fullDetails'])->name('order.fullDetails');
}); 

Route::group(['prefix'=>'/example'], function (){
    //auth example
    Route::get('auth-login' , [ExampleController::class , 'authLogin'])->name('example.authLogin'); 

    //users example
    Route::get('user-list' , [ExampleController::class , 'userList'])->name('example.userList'); 
    Route::get('user-single' , [ExampleController::class , 'userSingle'])->name('example.userSingle'); 
    Route::get('user-create' , [ExampleController::class , 'userCreate'])->name('example.userCreate'); 
    Route::get('user-update' , [ExampleController::class , 'userUpdate'])->name('example.userUpdate'); 
    Route::get('user-delete' , [ExampleController::class , 'userDelete'])->name('example.userDelete');
    
    //restaurant category example
    Route::get('restaurant-category-list' , [ExampleController::class , 'restaurantCategoryList'])->name('example.restaurantCategoryList'); 
    Route::get('restaurant-category-single' , [ExampleController::class , 'restaurantCategorySingle'])->name('example.restaurantCategorySingle'); 
    Route::get('restaurant-category-create' , [ExampleController::class , 'restaurantCategoryCreate'])->name('example.restaurantCategoryCreate'); 
    Route::get('restaurant-category-update' , [ExampleController::class , 'restaurantCategoryUpdate'])->name('example.restaurantCategoryUpdate'); 
    Route::get('restaurant-category-delete' , [ExampleController::class , 'restaurantCategoryDelete'])->name('example.restaurantCategoryDelete');

    //restaurant example
    Route::get('restaurant-list' , [ExampleController::class , 'restaurantList'])->name('example.restaurantList'); 
    Route::get('restaurant-single' , [ExampleController::class , 'restaurantSingle'])->name('example.restaurantSingle'); 
    Route::get('restaurant-create' , [ExampleController::class , 'restaurantCreate'])->name('example.restaurantCreate'); 
    Route::get('restaurant-update' , [ExampleController::class , 'restaurantUpdate'])->name('example.restaurantUpdate'); 
    Route::get('restaurant-delete' , [ExampleController::class , 'restaurantDelete'])->name('example.restaurantDelete');
    Route::get('restaurant-filter-by-category' , [ExampleController::class , 'restaurantFilterByCategory'])->name('example.restaurantFilterByCategory');

    //product category example
    Route::get('product-category-list' , [ExampleController::class , 'productCategoryList'])->name('example.productCategoryList'); 
    Route::get('product-category-single' , [ExampleController::class , 'productCategorySingle'])->name('example.prodcutCategorySingle'); 
    Route::get('product-category-create' , [ExampleController::class , 'productCategoryCreate'])->name('example.prodcutCategoryCreate'); 
    Route::get('product-category-update' , [ExampleController::class , 'productCategoryUpdate'])->name('example.prodcutCategoryUpdate'); 
    Route::get('product-category-delete' , [ExampleController::class , 'productCategoryDelete'])->name('example.prodcutCategoryDelete');

    //product example
    Route::get('product-list' , [ExampleController::class , 'productList'])->name('example.productList'); 
    Route::get('product-single' , [ExampleController::class , 'productSingle'])->name('example.prodcutSingle'); 
    Route::get('product-create' , [ExampleController::class , 'productCreate'])->name('example.prodcutCreate'); 
    Route::get('product-update' , [ExampleController::class , 'productUpdate'])->name('example.prodcutUpdate'); 
    Route::get('product-delete' , [ExampleController::class , 'productDelete'])->name('example.prodcutDelete');
    Route::get('product-filter-by-category' , [ExampleController::class , 'productFilterByCategory'])->name('example.prodcutFilterByCategory');
    Route::get('product-filter-by-restaurant' , [ExampleController::class , 'productFilterByRestaurant'])->name('example.prodcutFilterByRestaurant');
    Route::get('product-filter-by-category-and-restaurant' , [ExampleController::class , 'productFilterByCategoryAndRestaurant'])->name('example.prodcutFilterByCategoryAndRestaurant');
   
    //order example
    Route::get('order-list' , [ExampleController::class , 'orderList'])->name('example.orderList'); 
    Route::get('order-single' , [ExampleController::class , 'orderSingle'])->name('example.orderSingle'); 
    Route::get('order-create' , [ExampleController::class , 'orderCreate'])->name('example.orderCreate'); 
    Route::get('order-update' , [ExampleController::class , 'orderUpdate'])->name('example.orderUpdate');
    Route::get('order-delete' , [ExampleController::class , 'orderDelete'])->name('example.orderDelete');
    Route::get('order-filter-by-user' , [ExampleController::class , 'orderFilterByUser'])->name('example.orderFilterByUser');

});