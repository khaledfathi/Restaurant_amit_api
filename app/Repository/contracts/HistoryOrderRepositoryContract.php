<?php
namespace App\Repository\contracts; 

interface HistoryOrderRepositoryContract {
    public function index(); 
    public function store(array $data);
    public function show(int $id);
    public function update(array $data, int $id);
    public function destroy(int $id);
    public function filterByUserId(int $id);
}