<?php

namespace App\Http\Controllers\API;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Http\Requests\API\User\UpdateUserRequest;
use App\Repository\contracts\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //prepeare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]; 
        //check if there's image
        $imageFile =  $request->file('image'); 
        if ($imageFile){
            //upload file and get its name 
            $data['image'] = Helper::uploadImage($imageFile , USER_IMAGES_STORAGE);
        }else {
            //get default image file name
            $data['image'] = DEFAULT_USER_IMAGE;
        }
        //store data 
        $record = $this->userProvider->store($data);
        $record['operation'] = true;   
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(IdRequest $request)
    {
        $record = $this->userProvider->show($request->id);
        return response()->json($record); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {        
        //prepeare data 
        $data = $request->all(); 
        //check if there's new image
        $imageFile =  $request->file('image'); 
        if ($imageFile){
            //upload new image 
            $data['image'] = Helper::uploadImage($imageFile , USER_IMAGES_STORAGE);
            //remove old image if not default use image 
            $oldImage = $this->userProvider->show($request->id)->image; 
            if ( ! Helper::isDefaultUserImage($oldImage) ) {
                Storage::delete($oldImage);
            }
            //update 
            $this->userProvider->update($data , $request->id); 
        }
        if ($this->userProvider->update($data , $request->id)){
            return response()->json (['operation'=> true]); 
        }else {
            return response()->json (['operation'=> false , 'msg'=>"user not found"]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdRequest $request)
    {
        $found = $this->userProvider->destroy($request->id) ;
        if ($found) {
            return response()->json (['operation'=> true]); 
        }
        return response()->json (['operation'=> false , 'msg'=>"user not found"]); 

    }
}
