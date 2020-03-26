@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

<div class="container">
    <div class="mt-5">

        @foreach($acces as $item)
            <h6>{{$item->name}}  </h6>
        @endforeach

        <div class="">
            <h5 class="card-header mb-2">หมวดหมู่</h5>
            <div class="main">
                <div class="card-body" href="/profile/me"> 
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

                <div class="card-body ">
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

                <div class="card-body ">
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

                <div class="card-body ">
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

                <div class="card-body ">
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

                <div class="card-body ">
                    <img class="img-category" src="{{asset('img/avatar.png')}}" alt="">
                    <h6 class="card-title">คอมพิวเตอร์</h6>
                </div>

            </div>
        </div>

    </div>
</div>



<script>


</script>

@endsection
