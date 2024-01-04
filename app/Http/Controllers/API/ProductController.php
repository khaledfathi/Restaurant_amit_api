<?php

namespace App\Http\Controllers\API;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\StoreProductRequest;
use App\Http\Requests\API\Product\UpdateProductRequest;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Repository\contracts\ProductRepositoryContract;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        private ProductRepositoryContract $productProvider; 
    public function __construct(
        ProductRepositoryContract $productProvider 
    ){
        $this->productProvider = $productProvider;   
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->productProvider->index(); 
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all()); 
         //prepeare data
        $data = [
            'restaurant_id'=>$request->restaurant_id,
            'product_category_id'=>$request->product_category_id,
            'name' => $request->name,
        ];
        //check if there's image
        $imageFile = $request->file('image');
        if ($imageFile) {
            //upload file and get its name 
            $data['image'] = Helper::uploadImage($imageFile, PRODUCT_IMAGES_STORAGE);
        } else {
            //get default image file name
            $data['image'] = DEFAULT_PRODUCT_IMAGE;
        }
        //store data 
        $record = $this->productProvider->store($data);
        $record['operation'] = true;
        return response()->json($record); 
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(IdRequest $request)
    {
        $record = $this->productProvider->show($request->id);
        return response()->json($record); 
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateProductRequest $request)
    {
        //prepeare data 
        $data = $request->all();

        //check if there's new image
        $imageFile = $request->file('image');
        $record = $this->productProvider->showNoUrl($request->id); //current record
        if ($record && $imageFile) { 
            //upload new image 
            $data['image'] = Helper::uploadImage($imageFile, PRODUCT_IMAGES_STORAGE);
            //remove old image if not default use image 
            
            // if ( $record->image != DEFAULT_PRODUCT_IMAGE) { 
            //     Storage::delete(PRODUCT_IMAGES_STORAGE.'/'.$record->image); 
            // }
        }
        //update 
        if ($this->productProvider->update($data, $request->id)) {
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
        
        // $record = $this->productProvider->showNoUrl($request->id);
        // if ($record) {
        //     Storage::delete(PRODUCT_IMAGES_STORAGE . '/' . $record->image);
        // }

        //delete user 
        $found = $this->productProvider->destroy($request->id);
        if ($found) {
            return response()->json(['operation' => true]);
        }
        return response()->json(['operation' => false, 'msg' => "user not found"]);

    } 

}
