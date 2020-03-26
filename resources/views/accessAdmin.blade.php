@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

<div class="container">
    <div class="mt-5">

        <div class="">
            <div class="card-header">
                <span class="font-weight-bold">หมวดหมู่ > {{$dataCat->name}}</span>
                <button type="button" class="btn btn-primary btn-sm"
                        data-toggle="modal" data-target="#addAccessories"
                        style="float:right;"><i class="fas fa-plus"> เพิ่มอุปกรณ์</i></button>
            </div>

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

                            data-toggle="modal"  data-target="#editAccessories" style="color:white;" 
                            class="btn btn-primary btn-warning btn-sm tt edit-acc" data-toggle="tooltip" title="แก้ไข">
                            <i class="fas fa-edit"></i></button>

                        <button data-id="{{$item->id}}" data-name="{{$item->name}}" 
                            class="btn btn-primary btn-danger btn-sm tt" data-toggle="tooltip" title="ลบ">
                            <i class="fas fa-trash-alt"></i></button>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

    <div class="modal fade" id="addAccessories" tabindex="-1" role="dialog" aria-labelledby="addAccessoriesLabel" aria-hidden="true" style="margin:20px;">
        <form method="post" action="/accessories/insert" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header header-modal">
                        <h4 class="modal-title" >เพิ่มอุปกรณ์{{$dataCat->name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <input type="hidden" name="catagID" value={{$dataCat->id}}>
                    </div>

                    <div class="modal-body1" style="padding:16px;">
                        
                        <div class="form-group">
                            <span style="float:left" for="access-name" class="col-form-label">ชื่อ :</span>
                            <input type="text" class="form-control" id="access-name" name="access-name" placeholder="ชื่ออุปกรณ์">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="access-number" class="col-form-label">หมายเลขคุรุภัณฑ์ :</span>
                            <input type="text" class="form-control" id="access-number" name="access-number" placeholder="หมายเลขคุรุภัณฑ์">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="message-text" class="col-form-label">รายละเอียด :</span>
                            <textarea type="text" class="form-control" id="message-text" name="message-text" placeholder="อธิบายรายละเอียด"></textarea>
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="access-status" class="col-form-label">สถานะ :</span>
                            <div style="margin-right:200px" class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios"  value=1 checked>
                                <label class="form-check-label" for="exampleRadios1">สามารถยืมได้</label>
                            </div>
                            <div style="margin-right:182px;" class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios"  value=0 >
                                <label class="form-check-label" for="exampleRadios2">ไม่สามารถยืมได้</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="insert-img" class="col-form-label">รูป :</span>
                            <input type="file" name="access-picture"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <div class="modal fade" id="editAccessories" tabindex="-1" role="dialog" aria-labelledby="editAccessoriesLabel" aria-hidden="true" style="margin:20px;">
        <form method="post" action="/accessories/edit" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header header-modal">
                        <h4 class="modal-title" >แก้ไขอุปกรณ์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                        <input type="hidden" name="accessID" value="">
                        <input type="hidden" name="catagID" value={{$dataCat->id}}>
                    </div>
                    
                    <div class="modal-body2" style="padding:16px;">
                        <div class="form-group">
                            <span style="float:left" for="access-nam-edite" class="col-form-label">ชื่อ :</span>
                            <input type="text" class="form-control" id="access-nam-edite" name="access-name-edit" placeholder="ชื่อหมวดหมู่">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="access-number-edit" class="col-form-label">หมายเลขคุรุภัณฑ์ :</span>
                            <input type="text" class="form-control" id="access-number-edit" name="access-number-edit" placeholder="หมายเลขคุรุภัณฑ์">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="message-text-edit" class="col-form-label">รายละเอียด :</span>
                            <textarea type="text" class="form-control" id="message-text-edit" name="message-text-edit" placeholder="อธิบายรายละเอียด"></textarea>
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="access-status" class="col-form-label">สถานะ :</span>
                            <div style="margin-right:200px" class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios-edit" id="exampleRadios1" value=1>
                                <label class="form-check-label" for="exampleRadios1">สามารถยืมได้</label>
                            </div>
                            <div style="margin-right:182px;" class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios-edit" id="exampleRadios2" value=0>
                                <label class="form-check-label" for="exampleRadios2">ไม่สามารถยืมได้</label>
                            </div>
                        </div>
  
                        <div class="form-group">
                            <span style="float:left" for="insert-img" class="col-form-label">รูป :</span>
                            <div class="show-img1">
                                <img id="show-img1" src="" alt="">
                                <input type="file" name="access-picture-edit"/>
                            </div>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>


<script>
    $('#addAccessories').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })

    $('#editAccessories').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })


    $(document).ready(function() {
        $('.tt').tooltip();
        
        $(document).on('click','.edit-acc',function(){
            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            let key = $(this).attr("data-key");
            let description = $(this).attr("data-description");
            let status = $(this).attr("data-status");
            let img = $(this).attr("data-icon");

            if(status == 1){
                $("#exampleRadios1").prop('checked', true);
            }if(status == 0){
                $("#exampleRadios2").prop('checked', true);
            }
            
            $('input[name=accessID]').val(id)
            $('input[name=access-name-edit]').val(name)
            $('input[name=access-number-edit]').val(key)
            $('textarea[name=message-text-edit]').val(description)
            
            $("#show-img1").attr("src",img)
        })
        $("input[name=access-picture-edit]").change(function(){
            let input = this
            if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function (e) {
                img = e.target.result;
                $("#show-img1").attr("src",img)
            }
            reader.readAsDataURL(input.files[0])
        }
        })

     
    });


</script>

@endsection
