<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repository\contracts\ProductCategoryRepositoryContract;
use App\Repository\contracts\ProductRepositoryContract;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public ProductRepositoryContract $productProvider; 
    public ProductCategoryRepositoryContract $productCategoryProvider; 
    public function __construct(
        ProductRepositoryContract $productProvider, 
        ProductCategoryRepositoryContract $productCategoryProvider
    ){
        $this->productProvider = $productProvider;
        $this->productCategoryProvider = $productCategoryProvider;
    }
    public function index (){
        $records = $this->productProvider->index(); 
        return view('product.index' , ['records'=>$records]); 
    }
    public function categoryIndex(){
        $records = $this->productCategoryProvider->index(); 
        return view('product.category' , ['records'=>$records]); 
    }
}
