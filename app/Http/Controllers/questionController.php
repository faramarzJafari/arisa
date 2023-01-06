<?php

namespace App\Http\Controllers;

use App\Repository\questionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class questionController extends Controller
{
    private $question;

    public function __construct(questionRepository $questionRepository)
    {
        $this->question =  $questionRepository;
    }

    public function showTest(){

        
        $questions = $this->question->getlast();
        
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

        $question =[
            'test_question'=>$request->test_question,
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
            'descriptive_question'=>$request->descriptive_question,         
        ];
        $create = $this->question->create($question);
      
        return redirect()->route('users');
     }
   
}
