<?php 
namespace App\Repository;
use App\Models\OrderModel;
use App\Repository\contracts\OrderRepositoryContract;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryContract {

    function index(){
        return OrderModel::get(); 
    }
    function show (int $id){
        return OrderModel::where('id' , $id)->first(); 
    }
    function store (array $data){
        //store new record
        $record =  OrderModel::create($data); 
        //custom result
        $id = $record['id']; 
        return OrderModel::where('id' , $id )->first(); 
    }
    public function update(array $data, int $id){
        $found = OrderModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = OrderModel::find($id); 
        return $found ? $found->delete() : false; 
    }
}