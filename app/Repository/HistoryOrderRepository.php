<?php 
namespace App\Repository;
use App\Models\HistoryOrdersModel;
use App\Repository\contracts\HistoryOrderRepositoryContract;

class HistoryOrderRepository implements HistoryOrderRepositoryContract {

    function index(){
        return HistoryOrdersModel::get(); 
    }
    function show (int $id){
        return HistoryOrdersModel::where('id' , $id)->first(); 
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
    
    public function filterByOrderId(int $id){
        return HistoryOrdersModel::where('user_id', $id)->get(); 
    }
}