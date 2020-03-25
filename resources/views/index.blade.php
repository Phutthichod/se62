@extends('template.layout')

@section('title','pinto')

@section('content')
<div class="container">
    <div class="mt-5">
        @foreach($catagories as $item)

        <h1>{{$item->name}}</h1>
        @endforeach
        </div>

</div>
<script>
    $('#tableFer').DataTable({
        // "scrollX": true
    });
</script>

@endsection
