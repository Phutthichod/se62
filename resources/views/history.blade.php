@extends('template.layout')

@section('title','pinto')

@section('content')
<div class="container">
    <div class="mt-5">
        <?php
            $th = ['id','ชื่อผู้ใช้','status'];
            createTable('tableFer',$th,$td);
        ?>
    </div>

</div>

<script>
    $('#tableFer').DataTable({
        "scrollX": true
    });
</script>

@endsection

