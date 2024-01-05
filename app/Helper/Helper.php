<?php
namespace App\Helper;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Storage; 

class Helper {
    static public function uploadImage (\Illuminate\Http\UploadedFile $file , String $storageTarget):string{
        $fileName =  time() .'_'.random_int(000,999).'.'. $file->getClientOriginalExtension();
        $file->storeAs($storageTarget , $fileName); 
        return  $fileName;
    }
    static public function isAdmin(int $id){
        $user = UserModel::find($id); 
        if ($user) {
            return $user->email == ADMIN_EMAIL; 
        }
        return false ; 
    }
}