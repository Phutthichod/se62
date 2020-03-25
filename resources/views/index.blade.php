@extends('template.layout')

@section('title','pinto')

@section('content')
<div class="container">
    <div class="mt-5">
        <?php


        $th = ["ชื่อปุ๋ย","ชนิด1","ชนิด2","ปริมณการใช้","หน่วย","ช่วงอายุ","ธาตุอาหาร","จัดการ"];
        $btnDelete = createButton('btn btn-danger btn-sm btn-circle','','','<i class="far fa-trash-alt"></i>');
        $btnEditFer = createButton('btn btn-warning btn-sm btn-circle mr-2 btn-update','','data-toggle="modal" data-target="#update-fer"','<i class="far fa-edit"></i>');
        $btnEditSub = createButton('btn btn-warning btn-sm btn-circle mr-2 btn-update','','data-toggle="modal" data-target="#update-sub"','<i class="far fa-edit"></i>');
        $btnDetailSub = createButton('btn btn-info btn-detailSub','','data-toggle="modal" data-target="#detailSub"','รายละเอียด');
        $td1 = ['สูตร 15-15-15','ปุ๋ยแม่','สร้างต้น',500,'กรัม','0-3',[$btnDetailSub,'text-align:center;'],[$btnEditSub.$btnDelete,'text-align:center;']];
        $td2 = ['สูตร 15-0-15','ปุ๋ยลูก','เร่งโต',8500.56,'กรัม','5-25',[$btnDetailSub,'text-align:center;'],[$btnEditSub.$btnDelete,'text-align:center;']];
        $td = [$td2,$td1];
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
