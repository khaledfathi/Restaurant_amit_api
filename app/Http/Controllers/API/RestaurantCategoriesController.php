<?php

namespace App\Http\Controllers\API;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Http\Requests\API\RestaurantCategory\StoreRestaurantCategoryRequest;
use App\Http\Requests\API\RestaurantCategory\UpdateRestaurantCategoryRequest;
use App\Repository\contracts\RestaurantCategoriesRepositoryContract;
use Illuminate\Support\Facades\Storage;

class RestaurantCategoriesController extends Controller
{
    private RestaurantCategoriesRepositoryContract $restaurantCategoryProvider; 
    public function __construct(
        RestaurantCategoriesRepositoryContract $restaurantCategoryProvider 
    ){
        $this->restaurantCategoryProvider = $restaurantCategoryProvider;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->restaurantCategoryProvider->index(); 
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreRestaurantCategoryRequest $request)
    {
         //prepeare data
        $data = [
            'name' => $request->name,
        ];
        //check if there's image
        $imageFile = $request->file('image');
        if ($imageFile) {
            //upload file and get its name 
            $data['image'] = Helper::uploadImage($imageFile, RESTAURANT_CATEGORY_IMAGES_STORAGE);
        } else {
            //get default image file name
            $data['image'] = DEFAULT_RESTAURANT_CATEGORY_IMAGE;
        }
        //store data 
        $record = $this->restaurantCategoryProvider->store($data);
        $record['operation'] = true;
        return response()->json($record); 
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(IdRequest $request)
    {
        $record = $this->restaurantCategoryProvider->show($request->id);
        return response()->json($record); 
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateRestaurantCategoryRequest $request)
    {
        //prepeare data 
        $data = $request->all();

        //check if there's new image
        $imageFile = $request->file('image');
        $record = $this->restaurantCategoryProvider->showNoUrl($request->id); //current record
        if ($record && $imageFile) { 
            //upload new image 
            $data['image'] = Helper::uploadImage($imageFile, RESTAURANT_CATEGORY_IMAGES_STORAGE);
            //remove old image if not default use image 
            if ( $record->image != DEFAULT_RESTAURANT_CATEGORY_IMAGE) { 
                Storage::delete(RESTAURANT_CATEGORY_IMAGES_STORAGE.'/'.$record->image); 
            }
        }
        //update 
        if ($this->restaurantCategoryProvider->update($data, $request->id)) {
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
        $record = $this->restaurantCategoryProvider->showNoUrl($request->id);
        if ($record) {
            Storage::delete(RESTAURANT_CATEGORY_IMAGES_STORAGE . '/' . $record->image);
        }
        //delete user 
        $found = $this->restaurantCategoryProvider->destroy($request->id);
        if ($found) {
            return response()->json(['operation' => true]);
        }
        return response()->json(['operation' => false, 'msg' => "user not found"]);

    }
}
