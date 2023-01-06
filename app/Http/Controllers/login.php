<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{

    private $user;

    public function __construct(UserRepository $userRepository)
    {   
        $this->user = $userRepository;
    }


    public function index(){
        return view('login');
    }
    
    public function login(Request $request){
       
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
         
        $user = $this->user->first('name',$request->name);
        
        
            if($user != null){
                $password=$user->password;
            }else{
                return redirect()->route('showRegister');
            }
            
            $check_pass = Hash::check($request->password,$password);

            if ($user && $check_pass) {
                Auth::attempt(['name'=>$request->name,'password'=>$request->password]);
                $request->session()->regenerate();
                if($user->admin){
                   
                    return redirect()->intended('dashboard');    
                }
                $request->session()->regenerate();
                return redirect()->intended('showtest');
            }
            return redirect()->route('showLogin');
            
        
        
        
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
        if($this->user->count()){
            $admin = false;         
        }else{
            $admin = true;         
        }
        
        $register = $this->user->create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'admin'=>$admin,
        ]);
        if($admin){
            Auth::attempt(['name'=>$request->name,'password'=>$request->password]);
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        Auth::attempt(['name'=>$request->name,'password'=>$request->password]);
            $request->session()->regenerate();
            return redirect()->route('showTest');
    }


    public function firstStep(){

        return view('firstStep');

   }
}
