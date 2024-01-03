<?php

namespace App\Http\Controllers\API;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\API\ProductCategory\UpdateProductCategoryRequest;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Repository\contracts\ProductCategoryRepositoryContract;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
        private ProductCategoryRepositoryContract $productCategoryProvider; 
    public function __construct(
        ProductCategoryRepositoryContract $productCategoryProvider 
    ){
        $this->productCategoryProvider = $productCategoryProvider;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->productCategoryProvider->index(); 
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreProductCategoryRequest $request)
    {
         //prepeare data
        $data = [
            'name' => $request->name,
        ];
        //check if there's image
        $imageFile = $request->file('image');
        if ($imageFile) {
            //upload file and get its name 
            $data['image'] = Helper::uploadImage($imageFile, PRODUCT_CATEGORY_IMAGES_STORAGE);
        } else {
            //get default image file name
            $data['image'] = DEFAULT_PRODUCT_CATEGORY_IMAGE;
        }
        //store data 
        $record = $this->productCategoryProvider->store($data);
        $record['operation'] = true;
        return response()->json($record); 
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(IdRequest $request)
    {
        $record = $this->productCategoryProvider->show($request->id);
        return response()->json($record); 
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateProductCategoryRequest $request)
    {
        //prepeare data 
        $data = $request->all();

        //check if there's new image
        $imageFile = $request->file('image');
        $record = $this->productCategoryProvider->showNoUrl($request->id); //current record
        if ($record && $imageFile) { 
            //upload new image 
            $data['image'] = Helper::uploadImage($imageFile, PRODUCT_CATEGORY_IMAGES_STORAGE);
            //remove old image if not default use image 
            if ( $record->image != DEFAULT_PRODUCT_CATEGORY_IMAGE) { 
                Storage::delete(PRODUCT_CATEGORY_IMAGES_STORAGE.'/'.$record->image); 
            }
        }
        //update 
        if ($this->productCategoryProvider->update($data, $request->id)) {
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
        $record = $this->productCategoryProvider->showNoUrl($request->id);
        if ($record) {
            Storage::delete(PRODUCT_CATEGORY_IMAGES_STORAGE . '/' . $record->image);
        }
        //delete user 
        $found = $this->productCategoryProvider->destroy($request->id);
        if ($found) {
            return response()->json(['operation' => true]);
        }
        return response()->json(['operation' => false, 'msg' => "user not found"]);

    }
}
