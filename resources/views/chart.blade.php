@extends('template.layout')

@section('title','pinto')

@section('content')

<link rel="stylesheet" href="{{asset('css/show_profile/style.css')}}">

<style>
    .tab_main {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-gap: 1rem;
        align-self: center;
        justify-content: center;
    }

    .tab_list_product {
        width: 100%;
        display: grid;
        grid-template-columns: 3fr 1fr 1fr;
        grid-gap: 1rem;
        align-self: center;
        justify-content: center;
    }

    .set_object_left {
        text-align: left;
        padding-left: 5%;
    }

    .btn_ListItem {
        width: 30%;
        height: 60%;
        margin-top: 10px;
    }

    .btn_negative_positive {
        border: 1px solid rgba(0, 0, 0, .09);
    }
</style>

<div class="container">

    <span>
        <a href="/">หน้าแรก</a>
        <span>>ตะกร้า</span>
    </span>

    <div class="card">

        <div class="card-header">
            <div style="padding-right: 70%;">
                <strong>รายละเอียดการยื้มอุปกรณ์</strong>
            </div>
        </div>

        <div class="card-body">

            <div class="row mb-4" id="row1" style="display: none;">
                <div class="col-xl-4 col-12 text-right">
                    <strong>ชื่อโครงการ</strong>
                </div>
                <div class="col-xl-8 col-12">
                    <input class="form-control" id="name1"></input>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-4 col-12 text-right">
                    <strong>ชื่ออาจารย์ที่อนุมัติ</strong>
                </div>
                <div class="col-xl-8 col-12">
                    <input class="form-control" id="name2"></input>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-xl-4 col-12 text-right">
                    <strong>เหตุผลการยืมอุปกรณ์</strong>
                </div>
                <div class="col-xl-8 col-12">
                    <textarea class="form-control" id="name4" cols="30" rows="4"></textarea>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-4 col-12 text-right">
                    <strong>ลักษณะการยืม</strong>
                </div>
                <div class="col-xl-8 col-12" style="text-align: left;">
                    <input type="radio" id="gridRadios1" name="radio" value="1" checked>
                    <label for="1">แบบทั่วไป</label><br>
                    <input type="radio" id="gridRadios2" name="radio" value="2">
                    <label for="2">แบบโครงการ</label><br>
                </div>
            </div>


        </div>

    </div>
    <br>

    <div class="card">

        <div class="card-header">
            <div class="tab_list_product">
                <strong class="set_object_left">อุปกรณ์</strong>
                <strong>จำนวนชิ้น</strong>
                <strong>แอคชั่น</strong>
            </div>
        </div>

        <ul class="list-group">

            <li class="list-group-item tab_list_product">

                <div class="set_object_left">
                    <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                    <span>asdasdasdasdasdasd</span>
                </div>

                <div style="margin-top: 15px;">
                    <button type="button" id="nega1" class="btn_negative_positive">-</button>
                    <span id="amount_product1">1</span>
                    <button type="button" id="posi1" class="btn_negative_positive">+</button>
                </div>

                <div>
                    <button type="button" id="delete" class="btn btn-danger btn-sm btn-delete btn_ListItem"><i class="far fa-trash-alt"></i></button>
                </div>

            </li>

            <li class="list-group-item tab_list_product">

                <div class="set_object_left">
                    <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                    <span>asdasdasdasdasdasd</span>
                </div>

                <div style="margin-top: 15px;">
                    <button type="button" id="nega2" class="btn_negative_positive">-</button>
                    <span id="amount_product2">1</span>
                    <button type="button" id="posi2" class="btn_negative_positive">+</button>
                </div>

                <div>
                    <button type="button" id="delete" class="btn btn-danger btn-sm btn-delete btn_ListItem"><i class="far fa-trash-alt"></i></button>
                </div>

            </li>


        </ul>

        <div class="card-footer" style="text-align: right;">
            <button type="button" class="btn btn-success">ยืนยัน</button>
            <button type="button" class="btn btn-danger">ยกเลิก</button>
        </div>

    </div>
    <br>

</div>

<script>
    let amount1 = document.getElementById("amount_product1").textContent;
    $(document).ready(function() {



    });

    $("#gridRadios2").on('change', function() {
        $("#row1").attr('style', 'display: flex;');
    });

    $("#gridRadios1").on('change', function() {
        $("#row1").attr('style', 'display: none;');
    });

    $("#posi1").on('click', function() {
        document.getElementById("amount_product1").textContent = ++amount1;
    });

    $("#nega1").on('click', function() {
        document.getElementById("amount_product1").textContent = --amount1;
    });
</script>
@endsection
