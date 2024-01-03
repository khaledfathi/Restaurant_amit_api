<?php 
namespace App\Repository;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Repository\contracts\ProductCategoryRepositoryContract;
use Illuminate\Support\Facades\DB;

class ProductCategoryRepository implements ProductCategoryRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT id , name  , CONCAT( ? , image) as image FROM product_categories";  
        if ($id != null ){
            $query ="SELECT id , name  , CONCAT( ? , image) as image FROM product_categories WHERE id = $id";  
        }
        return  DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.PRODUCT_CATEGORY_IMAGES_STORAGE.'/']); 
    }

    function index(){
        return ProductCategoryModel::hydrate($this->queryGetWithBaseURLAttached()); 
    }

    function showNoUrl (int $id){
        return ProductCategoryModel::where('id', $id)->first();
    }
    function show (int $id){
        return ProductCategoryModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  ProductCategoryModel::create($data); 
        //custom result
        $id = $record['id']; 
        return ProductCategoryModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    public function update(array $data, int $id){
        $found = ProductCategoryModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = ProductCategoryModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}