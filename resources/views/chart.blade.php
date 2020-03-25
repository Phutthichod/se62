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
    <form action="/borrowList" id="borrowList">

        <div class="card">

            <div class="card-header">
                <div style="padding-right: 70%;">
                    <strong>รายละเอียดการยื้มอุปกรณ์</strong>
                </div>
            </div>

            <div class="card-body">
                @if(session()->get('permission')=="Student")
                <div class="row mb-4" id="row1" style="display: none;">
                    <div class="col-xl-4 col-12 text-right">
                        <strong>ชื่อโครงการ</strong>
                    </div>
                    <div class="col-xl-8 col-12">
                        <input name="project_name" class="form-control" id="name1"></input>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-xl-4 col-12 text-right">
                        <strong>ชื่ออาจารย์ที่อนุมัติ</strong>
                    </div>
                    <div class="col-xl-8 col-12">
                        <input name="teacher_name" class="form-control" id="name2"></input>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-xl-4 col-12 text-right">
                        <strong>เหตุผลการยืมอุปกรณ์</strong>
                    </div>
                    <div class="col-xl-8 col-12">
                        <textarea name="description" class="form-control" id="name4" cols="30" rows="4"></textarea>
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
                @else
                <div class="row mb-4">
                    <div class="col-xl-4 col-12 text-right">
                        <strong>เหตุผลการยืมอุปกรณ์</strong>
                    </div>
                    <div class="col-xl-8 col-12">
                        <textarea name="description" class="form-control" id="name4" cols="30" rows="4"></textarea>
                    </div>
                </div>
                @endif


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

            <ul class="list-group" id="list-access">

            </ul>

            <div class="card-footer" style="text-align: right;">
                <button id="submit" type="button" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger">ยกเลิก</button>
            </div>

        </div>
        <br>

    </form>


</div>

<script src="{{asset('js/cart/cart.js')}}"></script>
<script src="{{asset('js/cart/Accessories.js')}}"></script>
<script>
    $(document).ready(function() {

    });

    let cart = new Cart(3,"dddd","2222","ssss","ssss",5)
    let cart2 = new Cart(2,"dddd","2222","ssss","ssss",1)
    // let cart3 = new Cart(5,"dddd","2222","ssss","ssss",5)

    let accessories = new Accessories()
    accessories.addAccess(cart)
    accessories.addAccess(cart2)
    // accessories.addAccess(cart3)
    let accessList = accessories.getListAccess()

    init()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // localStorage.setItem("accessList", accessories.getListAccess());
    function init() {
        let text = ''
        for (i in accessList) {
            text += `
            <li class="list-group-item tab_list_product" id="tab_list_product${i}">
                <div class="set_object_left" data-id=1 >
                    <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                    <span>${accessList[i].name}</span>
                </div>

                <div style="margin-top: 15px;">
                    <button type="button" id="nega1" class="btn_positive_negative btn_negative">-</button>
                    <span id="amount_product1">${accessList[i].number}</span>
                    <button type="button" id="posi1" class="btn_positive_negative btn_positive">+</button>
                </div>

                <div>
                    <button type="button" class="btn btn-danger btn-sm btn-delete btn_ListItem"><i class="far fa-trash-alt"></i></button>
                </div>

            </li>
            `
        }
        $("#list-access").html(text)
    }


    $("#gridRadios2").on('change', function() {
        $("#row1").attr('style', 'display: flex;');
    });

    $("#gridRadios1").on('change', function() {
        $("#row1").attr('style', 'display: none;');
    });

    $(".btn_positive").on('click', function() {
        let val = parseInt($(this).prev().text())
        val++;
        $(this).prev().text(val)
    });

    $(".btn_negative").on('click', function() {
        let val = parseInt($(this).next().text())
        val--;
        if (val < 1)
            $(this).next().text(1)
        else $(this).next().text(val)
    });

    $("#submit").click(function() {
        let form = $("#borrowList")[0]
        let formData = new FormData(form);
        formData.append("accessories", JSON.stringify(accessList))

        $.ajax({
            type: 'POST',
            url: '/borrow',
            data: formData,
            sync: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data)
                //   location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });


    $(".btn-delete").click(function() {
        let IDelementList = $(this).parent().parent().attr("id");
        swal({
                title: "ยืนยันการยกเลิกการยืมอุปกรณ์ ???",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("กำลังดำเนินการลบรายการ", {
                        icon: "success",
                    }).then((willDelete) => {
                        if (willDelete) {
                            $("#" + IDelementList).remove();
                        }
                    });
                } else {
                    swal("ยกเลิกการดำเนินการ!");
                }
            });
    });
</script>
@endsection
