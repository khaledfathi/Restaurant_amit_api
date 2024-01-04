<?php 
namespace App\Repository;
use App\Models\HistoryOrderRequestsModel;
use App\Repository\contracts\HistoryOrderRequestsRepositoryContract;

class HistoryOrderRequsetsRepository implements HistoryOrderRequestsRepositoryContract {

    function index(){
        return HistoryOrderRequestsModel::get(); 
    }
    function show (int $id){
        return HistoryOrderRequestsModel::where('id' , $id)->first(); 
    }
    function store (array $data){
        //store new record
        $record =  HistoryOrderRequestsModel::create($data); 
        //custom result
        $id = $record['id']; 
        return HistoryOrderRequestsModel::where('id' , $id )->first(); 
    }
    public function update(array $data, int $id){
        $found = HistoryOrderRequestsModel::find($id); 
        return $found ? $found->update($data) : false; 
    }

    public function destroy(int $id){
        $found = HistoryOrderRequestsModel::find($id); 
        return $found ? $found->delete() : false; 
    }
    
    //FILTERS
    
    public function filterByOrderId(int $id){
        return HistoryOrderRequestsModel::where('order_id', $id)->get(); 
    }
}