<html dir="rtl" lang="fa">
    <head>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('getTest')}}" method="post" enctype="multipart/form-data">
       @csrf
       <div class="container">
        <div class="row">
            <div class="col-4-sm"></div>
            <div class="col-8-sm mt-4 shadow-lg text_center">
                <h3>سوالات :</h3>
                <br>
                <h5>سوال تستی :</h5>
                    <h5>{{$questions->test_question}}</h5>
                    <div class="row">
                        <div class="col-3 mt-2">
                           <div class="form-check">
                                <input class="form-check-input" name="option" value="option1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$questions->option1}}
                                    </label>
                            </div>
                        </div>

                        <div class="col-3">
                        <div class="form-check">
                                <input class="form-check-input" name="option" value="option2" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    {{$questions->option2}}
                                    </label>
                            </div>
                        </div>

                        <div class="col-3">
                        <div class="form-check">
                                <input class="form-check-input" name="option" value="option3" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    {{$questions->option3}}
                                    </label>
                            </div>
                        </div>

                        <div class="col-3">
                        <div class="form-check">
                                <input class="form-check-input" name="option" value="option4" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    {{$questions->option4}}
                                    </label>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="mb-2">سوال تشریحی</h5>
                         
                            <li class="mt-2">{{$questions->descriptive_question}}</li>
                                <div class="form-floating mt-2 mb-5">
                                    <textarea name="descriptive_question" class="form-control" placeholder="جواب تشریحی" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">جواب سوال تشریحی</label>
                                </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <h6>ارسال فایل:</h6>
                        <input name ='file' type="file">
                    </div>                   
                    <div class="mt-3 mb-3">
                        <h5>وضعیت هوا :</h5>
                        <h5>شهر</h5>
                        <h6>{{$weather->location->name}}</h6>
                        <h5>وضعیت</h5>            
                        <h6>{{$weather->current->condition->text}}</h6>           
                        <h5>سرعت باد(کیلومتر بر ساعت)</h5>
                        <h6>{{$weather->current->wind_kph}}</h6>
                      </div>
                <button class="mt-2 mb-2" type="submit">ارسال جواب</button> 
            </div>

            <div class="col-4-sm"></div>
        </div>
       
    </div>
</form>
   

    </body>
</html>