@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">


<div class="container">
    <div class="mt-5">

        <div class="">
            <h5 class="card-header mb-2">หมวดหมู่</h5>

            <div class="main">
                @foreach($catagories as $item)
                    <a href="accessoriesUser/{{$item->id}}">
                        <div class="card-body2"> 
                            <img class="img-category" src="{{asset($item->icon)}}" alt="">
                            <h6 class="card-title">{{$item->name}}</h6>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>

    </div>
</div>



<script>
  
</script>

@endsection
