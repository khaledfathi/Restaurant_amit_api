<?php
namespace App\Repository\contracts; 

interface  ProductCategoryRepositoryContract {
    public function index(); 
    public function store(array $data);
    function showNoUrl (int $id);
    public function show(int $id);
    public function update(array $data, int $id);
    public function destroy(int $id);
}