<?php 
namespace App\Repository;
use App\Repository\contracts\UserRepositoryContract;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use URL; 

class UserRepository implements UserRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT id , name , email , CONCAT( ? , image) as image FROM users";  
        if ($id != null ){
            $query ="SELECT id , name , email , CONCAT( ? , image) as image FROM users WHERE id = $id";  
        }
        return  DB::select($query , [url('/').'/'.STORAGE_ROOT]); 
    }

    function index(){
        return UserModel::hydrate($this->queryGetWithBaseURLAttached()); 
    }

    function show (int $id){
        return UserModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  UserModel::create($data); 
        //custom result
        $id = $record['id']; 
        return UserModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    public function update(array $data, int $id){
        $found = UserModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = UserModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}