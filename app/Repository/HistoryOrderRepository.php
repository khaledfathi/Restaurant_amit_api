<?php 
namespace App\Repository;
use App\Models\HistoryOrdersModel;
use App\Repository\contracts\HistoryOrderRepositoryContract;

class HistoryOrderRepository implements HistoryOrderRepositoryContract {

    function index(){
        return HistoryOrdersModel::leftJoin('users', 'users.id' , '=','history_orders.user_id')->select(
            'history_orders.id',
            'history_orders.user_id',
            'users.name as user_name',
            'history_orders.status',
            'history_orders.time',
            'history_orders.total',
        )->get(); 
    }
    function show (int $id){
        return HistoryOrdersModel::leftJoin('users', 'users.id' , '=','history_orders.user_id')->select(
            'history_orders.id',
            'history_orders.user_id',
            'users.name as user_name',
            'history_orders.status',
            'history_orders.time',
            'history_orders.total',
        )->where('history_orders.id' , $id)->first(); 
    }
    function store (array $data){
        //store new record
        $record =  HistoryOrdersModel::create($data); 
        //custom result
        $id = $record['id']; 
        return HistoryOrdersModel::where('id' , $id )->first(); 
    }
    public function update(array $data, int $id){
        $found = HistoryOrdersModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = HistoryOrdersModel::find($id); 
        return $found ? $found->delete() : false; 
    }
    //FILTERS
    
    public function filterByUserId(int $id){
         return HistoryOrdersModel::leftJoin('users', 'users.id' , '=','history_orders.user_id')->select(
            'history_orders.id',
            'history_orders.user_id',
            'users.name as user_name',
            'history_orders.status',
            'history_orders.time',
            'history_orders.total',
        )->where('user_id', $id)->get(); 
    }
}