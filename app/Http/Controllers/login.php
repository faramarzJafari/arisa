<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function login(Request $request){
       
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
 
        $user = User::where('name',$request->name)->first();
        
        
            if($user != null){
                $password=$user->password;
            }else{
                return redirect()->route('showRegister');
            }
            
            $check_pass = Hash::check($request->password,$password);
            
            if ($user && $check_pass) {
                $request->session()->regenerate();
                if($user->admin){
                    return redirect()->intended('dashboard');    
                }
                return redirect()->intended('showtest');
            }
            return redirect()->route('showLogin');
            // ->withErrors(['error'=>'نام کاربری یا رمز عبور اشتباه است'])
        
        
        
    }


    public function ShowRegister(){
        return view('register');
    }

    public function register(Request $request){
        
        $validate = $request->validate([
            'name' => ['required','unique:Users'],
            'password' => ['required','confirmed'],
            'password_confirmation'=> ['required'],
        ]);
        if(User::where('admin',true)->get()->count()){
            $admin = false;         
        }else{
            $admin = true;         
        }
        
        $register = User::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'admin'=>$admin,
        ]);
        if($admin){
            return redirect()->route('dashboard');
        }
            return redirect()->route('showTest');
    }


    public function firstStep(){

        return view('firstStep');

   }

//    public function getInfo(Request $request){


//     $validated = $request->validate([
//         'name' => 'required',
//         'password' => 'required|confirmed',
//         'password_confirmation' => 'required'
//     ]);

//     $create_admin = User::create([
//         'name'=>$request->name,
//         'password'=>Hash::make($request->password),
//         'admin'=> true,
//     ]);

//     $id = User::where('name',$request->name)->first()->id;
    
//     if ($create_admin){
//         Auth::loginUsingId($id);
//         $request->session()->regenerate();

//         return redirect()->intended('dashboard');
//     }
//    }
}
