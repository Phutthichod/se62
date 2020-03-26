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
                @if(session()->get('permission')=="Student")
                <li role="presentation" class="check" href="#t_2" data-toggle="tab">
                    <a href="#t_2" data-toggle="tab" aria-expanded="false">รออนุมัติ</a>
                </li>

                @else
                <li role="presentation" class="check" href="#t_8" data-toggle="tab">
                    <a href="#t_8" data-toggle="tab" aria-expanded="false">คำขออนุญาติ</a>
                </li>
                @endif
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
                    <a href="#t_6" data-toggle="tab" aria-expanded="false">ยืมอุปกรณ์เกิน</a>
                </li>
                <li role="presentation" class="check" href="#t_7" data-toggle="tab">
                    <a href="#t_7" data-toggle="tab" aria-expanded="false">ยกเลิกอุปกรณ์</a>
                </li>
            </ul>
        </div>
        <br>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade show active" id="t_1">
                @if(sizeof($borrowList)>0)
                    @foreach($borrowList as $item)
                    <div style="margin-bottom: 20px;">
                        <div class="card-header tab_list_product">
                            <strong class="set_object_left">หมายเลขรายการ {{$item->id}}</strong>
                            <strong>{{$item->status}}</strong>
                        </div>

                        <ul class="list-group">
                            @foreach($item->borrowingItems()->get() as $borrowItem)
                            {{-- {{$borrowItem}} --}}
                            <li class="list-group-item tab_list_product">

                                <div class="set_object_left">
                                    <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                    <span>{{$borrowItem->accessories->name}}</span>
                                </div>

                                <div style="margin-top: 15px;">
                                <span>{{$borrowItem->number}}</span>
                                </div>

                            </li>
                            @endforeach


                        </ul>

                        <div class="card-footer" style="text-align: right; background-color: white;">
                            <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                            @if($item->status=="รอรับ"||$item->status=="รออนุมัติ")
                            <button data-id={{$item->id}} type="button"  class="btn btn-danger cancel-borrow">ยกเลิกการยืม</button>
                            @endif
                        </div>
                    </div>

                    @endforeach
                @else
                <div class="setnodetail">
                    <span style="padding: 0;">ยังไม่มีรายการ</span>
                </div>
                @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_2">
                @if(sizeof($borrowStatus["รออนุมัติ"])>0)
                    @foreach($borrowStatus["รออนุมัติ"] as $item)
                    <div style="margin-bottom: 20px;">
                        <div class="card-header tab_list_product">
                            <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                            <strong>{{$item->status}}</strong>
                        </div>

                        <ul class="list-group">
                            @foreach($item->borrowingItems()->get() as $borrowItem)
                            {{-- {{$borrowItem}} --}}
                            <li class="list-group-item tab_list_product">

                                <div class="set_object_left">
                                    <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                    <span>{{$borrowItem->accessories->name}}</span>
                                </div>

                                <div style="margin-top: 15px;">
                                <span>{{$borrowItem->number}}</span>
                                </div>

                            </li>
                            @endforeach


                        </ul>

                        <div class="card-footer" style="text-align: right; background-color: white;">
                            <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                            <button data-id={{$item->id}} type="button"  class="btn btn-danger cancel-borrow">ยกเลิกการยืม</button>
                        </div>
                    </div>

                    @endforeach
                @else
                <div class="setnodetail">
                    <span style="padding: 0;">ยังไม่มีรายการ</span>
                </div>
                @endif

            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_3">
                @if(sizeof($borrowStatus["รอรับ"])>0)
                    @foreach($borrowStatus["รอรับ"] as $item)
                    <div style="margin-bottom: 20px;">
                        <div class="card-header tab_list_product">
                            <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                            <strong>{{$item->status}}</strong>
                        </div>

                        <ul class="list-group">
                            @foreach($item->borrowingItems()->get() as $borrowItem)
                            {{-- {{$borrowItem}} --}}
                            <li class="list-group-item tab_list_product">

                                <div class="set_object_left">
                                    <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                    <span>{{$borrowItem->accessories->name}}</span>
                                </div>

                                <div style="margin-top: 15px;">
                                <span>{{$borrowItem->number}}</span>
                                </div>

                            </li>
                            @endforeach


                        </ul>

                        <div class="card-footer" style="text-align: right; background-color: white;">
                            <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                            <button data-id={{$item->id}} type="button" class="btn btn-danger cancel-borrow">ยกเลิกการยืม</button>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="setnodetail">
                    <span style="padding: 0;">ยังไม่มีรายการ</span>
                </div>
                @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_4">
                @if(sizeof($borrowStatus["ยืมแล้ว"])>0)
                @foreach($borrowStatus["ยืมแล้ว"] as $item)
                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                        <strong>{{$item->status}}</strong>
                    </div>

                    <ul class="list-group">
                        @foreach($item->borrowingItems()->get() as $borrowItem)
                        {{-- {{$borrowItem}} --}}
                      <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>{{$borrowItem->accessories->name}}</span>
                            </div>

                            <div style="margin-top: 15px;">
                            <span>{{$borrowItem->number}}</span>
                            </div>

                        </li>
                        @endforeach


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>

                    </div>
                </div>
                @endforeach
            @else
            <div class="setnodetail">
                <span style="padding: 0;">ยังไม่มีรายการ</span>
            </div>
            @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_5">
                @if(sizeof($borrowStatus["คืนแล้ว"])>0)
                @foreach($borrowStatus["คืนแล้ว"] as $item)
                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                        <strong>{{$item->status}}</strong>
                    </div>

                    <ul class="list-group">
                        @foreach($item->borrowingItems()->get() as $borrowItem)
                        {{-- {{$borrowItem}} --}}
                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>{{$borrowItem->accessories->name}}</span>
                            </div>

                            <div style="margin-top: 15px;">
                            <span>{{$borrowItem->number}}</span>
                            </div>

                        </li>
                        @endforeach


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>

                    </div>
                </div>
                @endforeach
            @else
            <div class="setnodetail">
                <span style="padding: 0;">ยังไม่มีรายการ</span>
            </div>
            @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_6">
                @if(sizeof($borrowStatus["ยืมเกิน"])>0)
                    @foreach($borrowStatus["ยืมเกิน"] as $item)
                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                        <strong>{{$item->status}}</strong>
                    </div>

                    <ul class="list-group">
                        @foreach($item->borrowingItems()->get() as $borrowItem)
                        {{-- {{$borrowItem}} --}}
                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>{{$borrowItem->accessories->name}}</span>
                            </div>

                            <div style="margin-top: 15px;">
                            <span>{{$borrowItem->number}}</span>
                            </div>

                        </li>
                        @endforeach


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>

                    </div>
                </div>
                @endforeach
            @else
            <div class="setnodetail">
                <span style="padding: 0;">ยังไม่มีรายการ</span>
            </div>
            @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_7">
                @if(sizeof($borrowStatus["ยกเลิก"])>0)
                @foreach($borrowStatus["ยกเลิก"] as $item)
                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                        <strong>{{$item->status}}</strong>
                    </div>

                    <ul class="list-group">
                        @foreach($item->borrowingItems()->get() as $borrowItem)
                        {{-- {{$borrowItem}} --}}
                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>{{$borrowItem->accessories->name}}</span>
                            </div>

                            <div style="margin-top: 15px;">
                            <span>{{$borrowItem->number}}</span>
                            </div>

                        </li>
                        @endforeach


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>

                    </div>
                </div>
                @endforeach
            @else
            <div class="setnodetail">
                <span style="padding: 0;">ยังไม่มีรายการ</span>
            </div>
            @endif
            </div>

            <div role="tabpanel" class="tab-pane fade" id="t_8">
                @if(sizeof($teacherAllow)>0)
                @foreach($teacherAllow as $item)
                <div style="margin-bottom: 20px;">
                    <div class="card-header tab_list_product">
                        <strong class="set_object_left">หมายเลขรายการ{{$item->id}}</strong>
                        <strong>{{$item->status}}</strong>
                    </div>

                    <ul class="list-group">
                        @foreach($item->borrowingItems()->get() as $borrowItem)
                        {{-- {{$borrowItem}} --}}
                        <li class="list-group-item tab_list_product">

                            <div class="set_object_left">
                                <img src='{{asset($borrowItem->accessories->icon)}}' alt="" style="width: 70px; height: 70px; margin-right: 5%;">
                                <span>{{$borrowItem->accessories->name}}</span>
                            </div>

                            <div style="margin-top: 15px;">
                            <span>{{$borrowItem->number}}</span>
                            </div>

                        </li>
                        @endforeach


                    </ul>

                    <div class="card-footer" style="text-align: right; background-color: white;">
                        <button type="button" class="btn btn-success">ดูข้อมูลการยืม</button>
                        <button data-id={{$item->id}} type="button"  class="btn btn-danger borrowed">อนุมัติ</button>
                    </div>
                </div>
                @endforeach
            @else
            <div class="setnodetail">
                <span style="padding: 0;">ยังไม่มีรายการ</span>
            </div>
            @endif
            </div>

        </div>

    </div>
    <br>

</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    });

    $(".check").on('click', function() {
        $(".check").removeClass("set_borderBT")
        $(this).attr('class', 'check set_borderBT')
    });
    $(".cancel-borrow").click(function(){
        let id = $(this).attr("data-id")

        swal({
                title: "ยืนยันการยกเลิกการยืมอุปกรณ์ ???",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'delete',
                        url: `/cancel/${id}`,
                        sync: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // alert(data)
                            //   location.reload();
                        },error: function(data) {
                            alert(data)
                            //   location.reload();
                        }
                    });
                    swal("กำลังดำเนินการลบรายการ", {
                        icon: "success",
                    }).then((willDelete) => {
                        if (willDelete) {
                            location.reload();
                        }
                    });
                } else {
                    swal("ยกเลิกการดำเนินการ!");
                }
            });
})
$(".borrowed").click(function(){
        let id = $(this).attr("data-id")

        swal({
                title: "ยืนยันการให้ ???",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'get',
                        url: `/borrowed/${id}`,
                        data:{
                            status:"รอรับ"
                        },
                        sync: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data)
                            // alert(data)
                            //   location.reload();
                        },error: function(data) {
                            console.log(data)
                            //   location.reload();
                        }
                    });
                    swal("กำลังดำเนินการให้รายการ", {
                        icon: "success",
                    }).then((willDelete) => {
                        if (willDelete) {
                            location.reload();
                        }
                    });
                } else {
                    swal("ให้แล้ว!");

                }
            });
        })
</script>
@endsection
