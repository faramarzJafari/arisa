<html dir="rtl" lang="per">
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
        <form action="{{route('login')}}" method="POST">
            @csrf

<div  class="container-sm">
<div class=" row">
        <div class="col-8 col-sm-8 mt-5" >    
            <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">نام کاربری</span>
                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">رمز عبور</span>
                    <input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>           
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">ذخیره اطلاعات</button>
            </div>
            
        </div>
       
    </div>
</div>

</form>
<div class="container-sm">
<div class="row">
    <div class="col-8 col-sm-8">
        <small><a href="{{route('showRegister')}}">ثبت نام</a></small>        
    </div>
</div>

</div>

    </body>

    <script src="{{ mix('js/app.js') }}" ></script>
</html>