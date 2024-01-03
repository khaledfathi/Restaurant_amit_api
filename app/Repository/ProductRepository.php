<?php 
namespace App\Repository;
use App\Models\ProductModel;
use App\Models\RestaurantModel;
use App\Repository\contracts\ProductRepositoryContract;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT 
            products.id, 
            products.product_category_id,
            product_categories.name as product_category_name, 
            products.restaurant_id ,             
            restaurants.name as restaurant_name,
            products.name,
            products.quantity,
            products.price,
            products.discount,
            CONCAT( ? , products.image) as image 
            FROM products  LEFT JOIN product_categories ON products.product_category_id = product_categories.id
            LEFT JOIN restaurants ON products.restaurant_id = restaurants.id"; 
        
        if ($id != null ){
            $query .= " WHERE products.id = $id";  
        }
        return  DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.PRODUCT_IMAGES_STORAGE.'/']); 
    }

    function index(){
        return ProductModel::hydrate($this->queryGetWithBaseURLAttached()); 
    }

    function showNoUrl (int $id){
        return ProductModel::where('id', $id)->first();
    }
    function show (int $id){
        return ProductModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  ProductModel::create($data); 
        //custom result
        $id = $record['id']; 
        return ProductModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    public function update(array $data, int $id){
        $found = ProductModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = ProductModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}