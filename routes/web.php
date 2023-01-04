<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\firstStep;
use App\Http\Controllers\login;
use App\Http\Controllers\test;
use App\Http\Controllers\users;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\DependencyInjection\RoutingResolverPass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(test::class)->middleware('Authen')->group(function(){
    Route::get('/showTest','showTest')->name('showTest');
    Route::post('/makeTest','makeTest')->name('makeTest');
    Route::post('/getTest','getTest')->name('getTest');
    Route::get('/showResult','showResult')->name('showResult');
});

Route::controller(dashboard::class)->middleware('isAdmin')->group(function () {
    Route::get('/dashboard', 'index')->middleware('isAdmin')->name('dashboard'); 
    Route::get('/logout','logout')->name('logout');
    Route::get('/users','users')->name('users');
});

Route::controller(users::class)->middleware('isAdmin')->group(function () {
    Route::get('/users','showUsers')->name('users');
});


Route::controller(login::class)->group(function(){        
    Route::get('/register','ShowRegister')->name('showRegister');
    Route::Post('/getInfoRegister','register')->name('register');
    Route::get('/login','index')->name('showLogin');
    Route::post('/getInfo','login')->name('login');
    
    
});


