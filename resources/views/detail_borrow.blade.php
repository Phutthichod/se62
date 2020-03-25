@extends('template.layout')

@section('title','pinto')

@section('content')
<div class="container">
    <div class="mt-5">
    <div class="card">
        <div class="card-header">
            <h2>รายละเอียดการยืม</h2>
        </div>
        <div class="card-body">

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>อุปกรณ์</h2><h2>จำนวน</h2>
        </div>
        <div class="card-body">
            <div class="show-item">
                <img src="" alt="">
                <span class="detail"></span>
                <div class="number"></div>
            </div>
        </div>
    </div>


</div>
<script>
    $('#tableFer').DataTable({
        "scrollX": true
    });
</script>

@endsection
