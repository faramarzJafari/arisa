<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class test extends Controller
{
    public function showTest(){
        $questions = Question::all()->last(); 
        $http = Http::get("http://api.weatherapi.com/v1/current.json?key=4e5e1599e778421bbd832749230401&q=tehran&aqi=yes");
        $details = $http->body();
        $weather = json_decode($details);

        return view('test',['questions'=>$questions,'weather'=>$weather]);
        
    }

    public function makeTest(Request $request){
        $validate = $request->validate([
         'test_question'=>['required'],
         'option1'=>['required'],
         'option2'=>['required'],
         'option3'=>['required'],
         'option4'=>['required'],
         'descriptive_question'=>['required'],
        ]);        
        $question = Question::create([
         'test_question'=>$request->test_question,
         'option1'=>$request->option1,
         'option2'=>$request->option2,
         'option3'=>$request->option3,
         'option4'=>$request->option4,
         'descriptive_question'=>$request->descriptive_question,         
        ]);
        return redirect()->route('users');
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
           $question = answer::create([
            'user_id'=>Auth::id(),  
            'test_question'=>$request->option,
            'descriptive_question'=>$request->descriptive_question,
            'file'=>$path_file,
            'wind_kph'=>$json->current->wind_kph,
            'condition'=>$json->current->condition->text,
            'location'=>$json->location->name,

           ]);
           
           if($question){
                return redirect()->route('showResult');
           }
           return redirect()->route('showResult')->withErrors('error','مشکلی برای ارسال سوال پیش امده ');
     }

     public function showResult(){
        $result=answer::all()->last();
        return view('showResult',['result'=>$result]);

     }
}
