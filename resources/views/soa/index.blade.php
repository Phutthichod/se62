@extends('soa.template.layout')

@section('title','pinto')

@section('content')
<div class="container">
    @foreach($catagories as $item)

    <h1>{{$item}}</h1>
    @endforeach
</div>


@endsection
