@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/login/style.css')}}">
<div class="container">
    <div class="login-form">
        <div class="logo">
            <img src="{{ asset('img/KU_SubLogo.png') }}" alt=""><strong>ระบบยืมคืนอุปกรณ์</strong>
        </div>

        <form action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="password">
            </div>
            <button class="btn btn-success">Login</button>

        </form>
    </div>

</div>


@endsection
