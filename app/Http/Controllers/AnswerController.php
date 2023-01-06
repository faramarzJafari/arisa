<?php

namespace App\Http\Controllers;

use App\Repository\answerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AnswerController extends Controller
{
   private $answer;

   public function __construct(answerRepository $answerRepository)
   {
        $this->answer = $answerRepository; 
   }

   public function showResult(){

    $result=$this->answer->getlast();
    return view('showResult',['result'=>$result]);

 }

 public function getTest(Request $request){
       
    $validate = $request->validate([
        'option'=>['required'],
        'descriptive_question'=>['required'],
        // 'file'=>['required'],
        
       ]);
        $http = Http::get("http://api.weatherapi.com/v1/current.json?key=4e5e1599e778421bbd832749230401&q=tehran&aqi=yes");
        $details = $http->body();
        $json = json_decode($details);
       $path_file = $request->file('file')->store('public/answers_file');          

       $answers = ['user_id'=>Auth::id(),  
       'test_question'=>$request->option,
       'descriptive_question'=>$request->descriptive_question,
       'file'=>$path_file,
       'wind_kph'=>$json->current->wind_kph,
       'condition'=>$json->current->condition->text,
       'location'=>$json->location->name,

    ];

       $create = $this->answer->create($answers);    
       
       if($create){
            return redirect()->route('showResult');
       }
       return redirect()->route('showResult')->withErrors('error','مشکلی برای ارسال سوال پیش امده ');
 }



   
}
