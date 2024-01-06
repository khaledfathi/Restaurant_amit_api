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
}

