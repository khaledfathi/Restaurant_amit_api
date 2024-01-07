<?php

namespace App\Http\Controllers\Examples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /********* Auth API Examples **************/
    function authLogin(){
        return view('example.auth.login');
    }
    /********* -END- Auth API Examples **************/

    /********* User API Examples **************/
    function userList(){
        return view('example.user.list');
    }
    function userSingle(){
        return view('example.user.single');
    }
    function userCreate(){
        return view('example.user.create');
    }
     function userUpdate(){
        return view('example.user.update');
    }
   function userDelete(){
        return view('example.user.delete');
    }
    /********* -END- User API Examples **************/
 
    /********* Restaurant Category API Examples **************/
    function restaurantCategoryList(){
        return view('example.restaurantCategory.list');
    }
    function restaurantCategorySingle(){
        return view('example.restaurantCategory.single');
    }
    function restaurantCategoryCreate(){
        return view('example.restaurantCategory.create');
    }
     function restaurantCategoryUpdate(){
        return view('example.restaurantCategory.update');
    }
   function restaurantCategoryDelete(){
        return view('example.restaurantCategory.delete');
    }
    /********* -END- Restaurant Category API Examples **************/

    /********* Restaurant API Examples **************/
    function restaurantList(){
        return view('example.restaurant.list');
    }
    function restaurantSingle(){
        return view('example.restaurant.single');
    }
    function restaurantCreate(){
        return view('example.restaurant.create');
    }
     function restaurantUpdate(){
        return view('example.restaurant.update');
    }
   function restaurantDelete(){
        return view('example.restaurant.delete');
    }
   function restaurantFilterByCategory(){
        return view('example.restaurant.filterByCategory');
    }
    /********* -END- Restaurant API Examples **************/
   
    /********* Product Category API Examples **************/
    function productCategoryList(){
        return view('example.productCategory.list');
    }
    function productCategorySingle(){
        return view('example.productCategory.single');
    }
    function productCategoryCreate(){
        return view('example.productCategory.create');
    }
     function productCategoryUpdate(){
        return view('example.productCategory.update');
    }
   function productCategoryDelete(){
        return view('example.productCategory.delete');
    }
    /********* -END- Product Category API Examples **************/

    /********* Product API Examples **************/
    function productList(){
        return view('example.product.list');
    }
    function productSingle(){
        return view('example.product.single');
    }
    function productCreate(){
        return view('example.product.create');
    }
     function productUpdate(){
        return view('example.product.update');
    }
   function productDelete(){
        return view('example.product.delete');
    }
   function productFilterByCategory(){
        return view('example.product.filterByCategory');
    }
   function productFilterByRestaurant(){
        return view('example.product.filterByRestaurant');
    }
   function productFilterByCategoryAndRestaurant(){
        return view('example.product.filterByCategoryAndRestaurant');
    }
    /********* -END- Product API Examples **************/

    /********* Order API Examples **************/
    function orderList(){
        return view('example.order.list');
    }
    function orderSingle(){
        return view('example.order.single');
    }
    function orderCreate(){
        return view('example.order.create');
    }
     function orderUpdate(){
        return view('example.order.update');
    }
    function orderDelete(){
        return view('example.order.delete');
    }
    function orderFilterByUser(){
        return view('example.order.filterByUser');
    }
    /********* -END- Order API Examples **************/
}

