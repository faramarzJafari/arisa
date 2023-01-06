<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class users extends Controller
{
    private $user;
    public function  __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }
    
    public function showUsers(){        
        
            $users = $this->user->getBy('admin',0);
            return view('users',['users'=>$users]);
    }
}
