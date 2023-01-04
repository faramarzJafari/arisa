<html dir="rtl" lang="fa">
    <head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>

  
<div class="container">
    <div class="row">
        <div class="col-8"></div>
        <div class="col-8">
        <h4>خلاصه آزمون شما</h4>
        <br>
    <h5>جواب سوال چهارگزینه ای شما</h5>
    <br>
   
    @php
        $option = match($result->test_question){
            'option1' =>'گزینه 1',
            'option2' =>'گزینه 2',
            'option3' =>'گزینه 3',
            'option4' =>'گزینه 4',
            default =>'خطا',
        }
     @endphp
     <h4>{{$option}}</h4>
     <br>
     <h5>جواب سوال تشریحی شما</h5>
     <h6>{{$result->descriptive_question}}</h6>
        </div>
        <form action="{{route('showLogin')}}">
        @csrf
        <button class="btn btn-danger"  type="submit">خروج</button>
    </form>
        <div class="col-8"></div>
    </div>
</div>
    
    