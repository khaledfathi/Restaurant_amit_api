<?php
namespace App\Helper;
use Illuminate\Support\Facades\Storage; 

class Helper {
    static public function uploadImage (\Illuminate\Http\UploadedFile $file , String $storageTarget):string{
        $fileName =  time() .'_'.random_int(000,999).'.'. $file->getClientOriginalExtension();
        $file->storeAs($storageTarget , $fileName); 
        return  $fileName;

    }
    static public function isDefaultUserImage (String $path ){
        return  $path == url('/').'/'.STORAGE_ROOT.'/'.USER_IMAGES_STORAGE.'/'.DEFAULT_USER_IMAGE ; 
    }
}