<?php

namespace App\Http\Controllers\API;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Http\Requests\API\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\API\Restaurant\UpdateRestaurantRequest;
use App\Repository\contracts\RestaurantRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResturantController extends Controller
{
    private RestaurantRepositoryContract $restaurantProvider; 
    public function __construct(
        RestaurantRepositoryContract $restaurantProvider 
    ){
        $this->restaurantProvider = $restaurantProvider;   
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->restaurantProvider->index(); 
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreRestaurantRequest $request)
    {
        // dd($request->all()); 
         //prepeare data
        $data = [
            'restaurant_category_id'=>$request->restaurant_category_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address'=>$request->address, 
            'lat'=>$request->lat,
            'long'=>$request->long
        ];
        //check if there's image
        $imageFile = $request->file('image');
        if ($imageFile) {
            //upload file and get its name 
            $data['image'] = Helper::uploadImage($imageFile, RESTAURANT_IMAGES_STORAGE);
        } else {
            //get default image file name
            $data['image'] = DEFAULT_RESTAURANT_IMAGE;
        }
        //store data 
        $record = $this->restaurantProvider->store($data);
        $record['operation'] = true;
        return response()->json($record); 
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(IdRequest $request)
    {
        $record = $this->restaurantProvider->show($request->id);
        return response()->json($record); 
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateRestaurantRequest $request)
    {
        //prepeare data 
        $data = $request->all();

        //check if there's new image
        $imageFile = $request->file('image');
        $record = $this->restaurantProvider->showNoUrl($request->id); //current record
        if ($record && $imageFile) { 
            //upload new image 
            $data['image'] = Helper::uploadImage($imageFile, RESTAURANT_IMAGES_STORAGE);
            //remove old image if not default use image 
            if ( $record->image != DEFAULT_RESTAURANT_IMAGE) { 
                Storage::delete(RESTAURANT_IMAGES_STORAGE.'/'.$record->image); 
            }
        }
        //update 
        if ($this->restaurantProvider->update($data, $request->id)) {
            return response()->json(['operation' => true]);
        } else {
            return response()->json(['operation' => false, 'msg' => "user not found"]);
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(IdRequest $request)
    {
        //delete image file 
        $record = $this->restaurantProvider->showNoUrl($request->id);
        if ($record) {
            Storage::delete(RESTAURANT_IMAGES_STORAGE . '/' . $record->image);
        }
        //delete user 
        $found = $this->restaurantProvider->destroy($request->id);
        if ($found) {
            return response()->json(['operation' => true]);
        }
        return response()->json(['operation' => false, 'msg' => "user not found"]);

    } 

    //FLITERS 
    public function filterByCategory(IdRequest $request){
        $records = $this->restaurantProvider->filterByCategory($request->id); 
        return response()->json($records);
    }
}
