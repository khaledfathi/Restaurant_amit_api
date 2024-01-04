<?php
namespace App\Repository\contracts; 

interface HistoryOrderRequestsRepositoryContract {
    public function index(); 
    public function store(array $data);
    public function show(int $id);
    public function update(array $data, int $id);
    public function destroy(int $id);
    
    //filters
    public function filterByOrderId(int $id);
}