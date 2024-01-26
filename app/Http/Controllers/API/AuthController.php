<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->email == ADMIN_EMAIL){
                $token = $request->user()->createToken($request->email, ['admin']);
            }else {
                $token = $request->user()->createToken($request->email, ['normal']);
            }
            //get logedin user 
            $query = 'SELECT id, name , email , CONCAT( ? , image) as image  FROM users WHERE email = ? '; 
            $hydrateQury =  DB::select($query , [url('/').'/'.STORAGE_ROOT.'/'.USER_IMAGES_STORAGE.'/' , $request->email] ); 
            $user = UserModel::hydrate($hydrateQury)->first(); 

            return response()->json(['operation'=>true, 'token'=> $token->plainTextToken , 'user'=> $user]);
        }        
        return response()->json(['operation'=>false , 'msg'=>'invalid user name or password']); 
    }
}
