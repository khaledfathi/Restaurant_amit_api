<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Providers\UserRepositoryProvider;
use App\Repository\contracts\UserRepositoryContract;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepositoryContract $userProvider; 
    public function __construct(
        UserRepositoryContract $userProvider
    ){
        $this->userProvider = $userProvider;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->userProvider->index(); 
        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]; 
        $record = $this->userProvider->store($data);
        $record['operation'] = true;   
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $record = $this->userProvider->show($request->id);
        return response()->json($record); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
