@extends('template.layout')

@section('title','pinto')

@section('content')
<?php
    function showDetail($head,$body){
        echo "
                <strong>$head</strong>
                <span>$body</span>
        ";
    }
?>
<link rel="stylesheet" href="{{asset('css/show_profile/style.css')}}">
<div class="container">
    <span><a href="/">หน้าแรก</a>>โปรไฟล์</span>
    <div class="card">
        <div class="card-header">
            <div class="show-img-profile">
                <strong>รูปโปรไฟล์</strong>
                <span>แก้ไขรูป</span>
                <img src="{{session()->get('member')['icon']}}" alt="">
            </div>
        </div>
        <div class="card-body">
            <div class="show-profile-detail">
                {{showDetail("ชื่อเต็ม",session()->get('member')['thainame'])}}
                {{showDetail("คณะ",session()->get('member')['faculty'])}}
                {{showDetail("สาขา",session()->get('member')['department'])}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header "><strong class="d-flex justify-content-start ml-3">ติดต่อ</strong> </div>
        <div class="card-body">
            <div class="show-profile-detail">
                {{showDetail("อีเมล์",session()->get('member')['mail'][0].session()->get('member')['mail'][1])}}
            </div>
        </div>
    </div>
</div>


@endsection
