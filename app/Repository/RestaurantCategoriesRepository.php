<?php 
namespace App\Repository;
use App\Models\RestaurantCategoryModel;
use App\Repository\contracts\RestaurantCategoriesRepositoryContract;
use Illuminate\Support\Facades\DB;

class RestaurantCategoriesRepository implements RestaurantCategoriesRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT id , name  , CONCAT( ? , image) as image FROM restaurant_categories"; 
        if ($id != null ){
            $query ="SELECT id , name  , CONCAT( ? , image) as image FROM  restaurant_categories WHERE id = $id";  
        }
        return  DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.RESTAURANT_CATEGORY_IMAGES_STORAGE.'/']); 
    }

    function index(){
        return RestaurantCategoryModel::hydrate($this->queryGetWithBaseURLAttached()); 
    }

    function showNoUrl (int $id){
        return RestaurantCategoryModel::where('id', $id)->first();
    }
    function show (int $id){
        return RestaurantCategoryModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  RestaurantCategoryModel::create($data); 
        //custom result
        $id = $record['id']; 
        return RestaurantCategoryModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    public function update(array $data, int $id){
        $found = RestaurantCategoryModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = RestaurantCategoryModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}