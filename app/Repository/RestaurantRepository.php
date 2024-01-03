<?php 
namespace App\Repository;
use App\Models\RestaurantModel;
use App\Repository\contracts\RestaurantRepositoryContract;
use Illuminate\Support\Facades\DB;

class RestaurantRepository implements RestaurantRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT 
            restaurants.id , 
            restaurants.restaurant_category_id as category_id, 
            restaurant_categories.name as category_name,
            restaurants.name,
            restaurants.address, 
            restaurants.phone, 
            restaurants.lat,
            restaurants.long,
            CONCAT( ? , restaurants.image) as image 
            FROM restaurants  LEFT JOIN restaurant_categories ON restaurants.restaurant_category_id = restaurant_categories.id"; 

        
        if ($id != null ){
            $query .= " WHERE restaurants.id = $id";  
        }
        return  DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.RESTAURANT_IMAGES_STORAGE.'/']); 
    }

    function index(){
        return RestaurantModel::hydrate($this->queryGetWithBaseURLAttached()); 
    }

    function showNoUrl (int $id){
        return RestaurantModel::where('id', $id)->first();
    }
    function show (int $id){
        return RestaurantModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  RestaurantModel::create($data); 
        //custom result
        $id = $record['id']; 
        return RestaurantModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    public function update(array $data, int $id){
        $found = RestaurantModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = RestaurantModel::find($id); 
        return $found ? $found->delete() : false; 
    }
    //FILTERS 

    public function filterByCategory(int $id){
        $query ="SELECT 
        restaurants.id , 
        restaurants.restaurant_category_id as category_id, 
        restaurant_categories.name as category_name,
        restaurants.name,
        restaurants.address, 
        restaurants.phone, 
        restaurants.lat,
        restaurants.long,
        CONCAT( ? , restaurants.image) as image 
        FROM restaurants  LEFT JOIN restaurant_categories ON restaurants.restaurant_category_id = restaurant_categories.id 
        WHERE restaurant_categories.id = ?"; 
        $exec =   DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.RESTAURANT_IMAGES_STORAGE.'/' , $id]); 
        return RestaurantModel::hydrate($exec); 
    } 
}