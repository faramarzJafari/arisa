<html dir="rtl" lang="fa">
    <head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>

<div class="container">
    <div class="row">
        <div class="col-8"></div>
        <div class="col-8">
            
                <table class="table">
            <thead>
                <tr>
                
                <th scope="col">نام کاربر</th>                
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row"></th>
                    <td>{{$user->name}}</td>                    
                    </tr>
                <tr>
            @endforeach
            <div>
</tbody>
</table>
<form action="{{route('showLogin')}}">
        @csrf
        <button class="btn btn-danger mt-5" type="submit">خروج</button>
    </form>
        <div class="col-8"></div>
    </div>
</div>
    
