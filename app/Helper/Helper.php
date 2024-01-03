<?php
namespace App\Helper;
use Illuminate\Support\Facades\Storage; 

class Helper {
    static public function uploadImage (\Illuminate\Http\UploadedFile $file , String $storageTarget):string{
        $fileName =  time() .'_'.random_int(000,999).'.'. $file->getClientOriginalExtension();
        $file->storeAs($storageTarget , $fileName); 
        return  $fileName;

    }
}