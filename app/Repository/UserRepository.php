<?php 
namespace App\Repository;
use App\Repository\contracts\UserRepositoryContract;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use URL; 

class UserRepository implements UserRepositoryContract {


    function  queryGetWithBaseURLAttached (int $id=null){
        $query ="SELECT name , email , CONCAT( ? , image) as image FROM users";  
        if ($id != null ){
            $query ="SELECT name , email , CONCAT( ? , image) as image FROM users WHERE id = $id";  
        }
        return  DB::select($query , [url('/')]); 
    }

    function index(){
        return UserModel::hydrate($this->queryGetWithBaseURLAttached())->first(); 
    }

    function show (int $id){
        return UserModel::hydrate($this->queryGetWithBaseURLAttached($id))->first(); 
    }
    function store (array $data){
        //store new record
        $record =  UserModel::create($data); 
        //custom result
        $id = $record['id']; 
        return UserModel::hydrate($this->queryGetWithBaseURLAttached())->first(); 
    }
}