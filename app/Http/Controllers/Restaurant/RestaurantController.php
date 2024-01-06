<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Repository\contracts\RestaurantCategoriesRepositoryContract;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public RestaurantCategoriesRepositoryContract $restaurantCategoryProvider ;
    public RestaurantRepository $restaurantProvider ;
    public function __construct(
        RestaurantCategoriesRepositoryContract $restaurantCategoryProvider,
        RestaurantRepository $restaurantProvider,
    ){
        $this->restaurantCategoryProvider = $restaurantCategoryProvider;  
        $this->restaurantProvider = $restaurantProvider; 
    }
    public function index (){
        $records = $this->restaurantProvider->index(); 
        return view('restaurant.index' , ['records'=>$records]); 
    }
    public function categoryIndex (){
        $records = $this->restaurantCategoryProvider->index(); 
        return view('restaurant.category' , ['records'=>$records]);
    }
}
