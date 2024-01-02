<?php
namespace App\Repository\contracts; 

interface  UserRepositoryContract {
    public function index(); 
    public function store(array $data);
    public function show(int $id);
    // public function update(Request $request, string $id);
    // public function destroy(string $id);
}