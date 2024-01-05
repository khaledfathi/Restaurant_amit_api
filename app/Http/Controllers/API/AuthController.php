<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return response()->json(['operation'=>true, 'token'=> $token->plainTextToken]);
        }
        return response()->json(['opertaion'=>false , 'msg'=>'invalid user name or password']); 
    }
}
