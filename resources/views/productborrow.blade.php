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

    li a {
        color: black;
    }

    li a:hover {
        color: #006765;
        text-decoration: none;
    }

    .set_borderBT {
        border-bottom: 2px solid #006765;
    }

    .check {
        height: 100%;
        padding: 0.75rem 1.25rem;
    }

    .tab_list_product {
        width: 100%;
        display: grid;
        grid-template-columns: 4fr 1fr;
        grid-gap: 1rem;
        align-self: center;
        justify-content: center;
        border: 1px solid rgba(0, 0, 0, 0.125);
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

    .setnodetail {
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container">

    <span>
        <a href="/">หน้าแรก</a>
        <span>>รายการที่ยืม</span>
    </span>

    <div class="card">

        <div class="card-header" style="padding: 0;">
            <ul class="nav tab-nav-right tab_main" role="tablist">
                <li role="presentation" class="check set_borderBT" href="#t_1" data-toggle="tab">
                    <a href="#t_1" data-toggle="tab" aria-expanded="true">ทั้งหมด</a>
                </li>
                <li role="presentation" class="check" href="#t_2" data-toggle="tab">
                    <a href="#t_2" data-toggle="tab" aria-expanded="false">รออนุมัติ</a>
                </li>
                <li role="presentation" class="check" href="#t_3" data-toggle="tab">
                    <a href="#t_3" data-toggle="tab" aria-expanded="false">รอรับอุปกรณ์</a>
                </li>
                <li role="presentation" class="check" href="#t_4" data-toggle="tab">
                    <a href="#t_4" data-toggle="tab" aria-expanded="false">รับอุปกรณ์แล้ว</a>
                </li>
                <li role="presentation" class="check" href="#t_5" data-toggle="tab">
                    <a href="#t_5" data-toggle="tab" aria-expanded="false">คืนอุปกรณ์</a>
                </li>
                <li role="presentation" class="check" href="#t_6" data-toggle="tab">
                    <a href="#t_6" data-toggle="tab" aria-expanded="false">ยื้มอุปกรณ์เกิน</a>
                </li>
                <li role="presentation" class="check" href="#t_7" data-toggle="tab">
                    <a href="#t_7" data-toggle="tab" aria-expanded="false">ยกเลิกอุปกรณ์</a>
                </li>
            </ul>
        </div>
        <br>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade show active" id="t_1">
                <div class="setnodetail">
                    <span style="padding: 0;">ยังไม่มีรายการ</span>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_2">

                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขการยืมอุปกรณ์</strong>
                        <strong>รอรับอุปกรณ์</strong>
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>asdasdasdasdasdasd</span>
                            </div>

                            <div style="margin-top: 15px;">
                                <span>1</span>
                            </div>

                        </li>

                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>asdasdasdasdasdasd</span>
                            </div>

                            <div style="margin-top: 15px;">
                                <span>1</span>
                            </div>

                        </li>


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                        <button type="button" class="btn btn-danger">ยกเลิกการยืม</button>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขการยืมอุปกรณ์</strong>
                        <strong>รอรับอุปกรณ์</strong>
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>asdasdasdasdasdasd</span>
                            </div>

                            <div style="margin-top: 15px;">
                                <span>1</span>
                            </div>

                        </li>

                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src="{{asset('img/productlist.png')}}" alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>asdasdasdasdasdasd</span>
                            </div>

                            <div style="margin-top: 15px;">
                                <span>1</span>
                            </div>

                        </li>


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                        <button type="button" class="btn btn-danger">ยกเลิกการยืม</button>
                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_3">

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_4">

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_5">

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_6">

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_7">

            </div>

        </div>

    </div>
    <br>

</div>

<script>
    $(document).ready(function() {

    });

    $(".check").on('click', function() {
        $(".check").removeClass("set_borderBT")
        $(this).attr('class', 'check set_borderBT')
    });
</script>
@endsection