<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class users extends Controller
{
    
    public function showUsers(){
        $users = User::where('admin',0)->get();
        return view('users',['users'=>$users]);
    }
}
