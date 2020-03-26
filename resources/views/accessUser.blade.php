@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

<div class="container">
    <div class="mt-5">

        <div class="">
            <h5 class="card-header mb-2">หมวดหมู่ > {{$dataCat->name}}</h5>
            <div class="main">
                @foreach($acces ?? '' as $item)
                    
                    <div class="card-body"> 
                        <img class="img-category" src="{{asset($item->icon)}}" alt="">

                        <h6 class="card-title">{{$item->name}}</h6>

                        <?php if($item['isBorrow'] == 1){ ?>
                            <button class="btn btn-primary btn-sm tt" data-toggle="tooltip" title="สามารยืมได้">
                            <i class="far fa-check-circle"></i></button>
                        <?php }else{ ?>
                            <button class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="ไม่สามารยืมได้">
                            <i class="far fa-times-circle"></i></button>
                        <?php } ?>

                        <button 
                            data-id="{{$item->id}}"  data-key="{{$item->access_key}}" data-name="{{$item->name}}"
                            data-description="{{$item->description}}" data-icon="{{$item->icon}}" data-status="{{$item->isBorrow}}" 
                            data-toggle="modal"  data-target="#detailAccessories" style="color:white;" 
                            class="btn btn-warning btn-sm tt detail-acc" data-toggle="tooltip" title="รายละเอียด">
                            <i class="fas fa-info-circle"></i></button>

                        <button data-id="{{$item->id}}" data-name="{{$item->name}}" 
                            class="btn btn-success btn-sm tt " data-toggle="tooltip" title="เพิ่มลงการยืม">
                            <i class="fas fa-plus-circle"></i></button>
                    </div>

                @endforeach

            </div>
        </div>

    </div>


    <div class="modal fade" id="detailAccessories" tabindex="-1" role="dialog" aria-labelledby="adetailAccessoriesLabel" aria-hidden="true" style="margin:20px;">
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" >รายละเอียด</h4>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                        <input type="hidden" name="catagID" value={{$dataCat->id}}>
                    </div>

                    <div class="modal-body1" style="padding:16px;">
     
                        <div class="form-group">
                            <span style="float:left" for="insert-img" class="col-form-label">รูป :</span>
                            <div class="show-img-detail">
                                <img id="show-img-detail" src="" alt="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span style="float:left" for="access-name" class="col-form-label">ชื่อ :</span>
                            <input  disabled="disabled" type="text" class="form-control bor" id="access-name" name="access-name" style="background-color:aliceblue;">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="access-number" class="col-form-label">หมายเลขคุรุภัณฑ์ :</span>
                            <input disabled="disabled" type="text" class="form-control bor" id="access-number" name="access-number" style="background-color:aliceblue;">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="message-text" class="col-form-label">รายละเอียด :</span>
                            <textarea disabled="disabled" type="text" class="form-control bor" id="message-text" name="message-text" style="background-color:aliceblue;"></textarea>
                        </div>

                        <div class="form-group">
                            <span style="float:left" class="col-form-label">สถานะ :</span>
                            <input disabled="disabled" type="text" class="form-control bor" id="access-status" name="access-status" style="background-color:aliceblue;">
                         
                        </div>

                    </div>

                    <div class="modal-footer">
                        {{-- <button type="submit" class="btn btn-success"></button> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>



<script>

    $(document).ready(function() {
        $('.tt').tooltip();

        $(document).on('click','.detail-acc',function(){

            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            let key = $(this).attr("data-key");
            let description = $(this).attr("data-description");
            let status = $(this).attr("data-status");
            let img = $(this).attr("data-icon");

            if(status == 1){
                $("input[name=access-status").val("สามารถยืมได้");
            }if(status == 0){
                $("input[name=access-status").val("ไม่สามารถยืมได้");
            }
            
            //$('input[name=accessID]').val(id)
            $('input[name=access-name]').val(name)
            $('input[name=access-number]').val(key)
            $('textarea[name=message-text]').val(description)
            $("#show-img-detail").attr("src",img)
        })

    });


</script>

@endsection
