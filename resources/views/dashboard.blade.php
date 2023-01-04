<html dir="rtl" lang="fa">
    <head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>

 <form action="{{route('makeTest')}}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                    <h4>متن سوال تستی خود را بنویسید :</h4>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">متن سوال :</span>
                        <input type="text" name="test_question" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <h5>گزینه های تستی</h5>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">گزینه اول</span>
                        <input type="text" name="option1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">گزینه دوم</span>
                        <input type="text" name="option2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">گزینه سوم</span>
                        <input type="text" name="option3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">گزینه چهارم</span>
                        <input type="text" name="option4" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
            </div>
            <br>
            <h4>متن سوال تشریحی خود را بنویسید</h4>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">متن سوال تشریحی</span>
                <input type="text" name="descriptive_question" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-5" type="submit">ثبت سوال</button>
 </form>
<a  class="btn btn-primary mt-5 mb-2" href="{{route('users')}}" >کاربران</a>
 <form action="{{route('showLogin')}}">
        @csrf
        <button class="btn btn-danger" type="submit">خروج</button>
    </form>

    <script src="{{ mix('js/app.js') }}" ></script>
    </body>

</html>