<?php 
namespace App\Repository;
use App\Models\OrderRequestsModel;
use App\Repository\contracts\OrderRequestsRepositoryContract;

class OrderRequestsRepository implements OrderRequestsRepositoryContract {

    function index(){
        return OrderRequestsModel::get(); 
    }
    function show (int $id){
        return OrderRequestsModel::where('id' , $id)->first(); 
    }
    function store (array $data){
        //store new record
        $record =  OrderRequestsModel::create($data); 
        //custom result
        $id = $record['id']; 
        return OrderRequestsModel::where('id' , $id )->first(); 
    }
    public function update(array $data, int $id){
        $found = OrderRequestsModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = OrderRequestsModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}