<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\contracts\UserRepositoryContract;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserRepositoryContract $userProvider ; 
    public function __construct(
        UserRepositoryContract $userProvider
    ){
        $this->userProvider = $userProvider ; 
    }
    public function index (){
        $records = $this->userProvider->index();
        return view('user.index' , ['records'=>$records]); 
    }
}
