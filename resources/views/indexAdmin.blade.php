@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

<div class="container">
    <div class="mt-5">

        <div class="">
            <div class="card-header">
                <span class="font-weight-bold">หมวดหมู่</span>
                <button type="button" class="btn btn-primary btn-sm"
                        data-toggle="modal" data-target="#addCatalogies"
                        style="float:right;"><i class="fas fa-plus"> เพิ่มหมวดหมู่</i></button>
            </div>

            <div class="main">
                @foreach($catagories ?? '' as $item)
                    
                    <div class="card-body"> 
                        <a href="accessoriesAdmin/{{$item->id}}">
                            <img class="img-category" src="{{asset($item->icon)}}" alt="">
                            <h6 class="card-title">{{$item->name}}</h6>
                        </a>
                        <button data-toggle="modal" data-id="{{$item->id}}" data-icon="{{$item->icon}}"  
                                data-name="{{$item->name}}" data-description="{{$item->description}}" 
                                data-target="#editCatalogies" style="color:white;" 
                                class="btn btn-primary btn-warning btn-sm tt edit-cat" data-toggle="tooltip" title="แก้ไข">
                                <i class="fas fa-edit"></i></button>

                        <button data-id="{{$item->id}}" data-name="{{$item->name}}" 
                                class="btn btn-primary btn-danger btn-sm tt " data-toggle="tooltip" title="ลบ">
                                <i class="fas fa-trash-alt"></i></button>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCatalogies" tabindex="-1" role="dialog" aria-labelledby="addCatalogiesLabel" aria-hidden="true" style="margin:20px;">
        <form method="post" action="/catagories/insert" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header header-modal">
                        <h4 class="modal-title" >เพิ่มหมวดหมู่</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    
                    <div class="modal-body">

                        <div class="form-group">
                            <span style="float:left" for="recipient-name" class="col-form-label">ชื่อ :</span>
                            <input type="text" class="form-control" id="catagories-name" name="catagories-name" placeholder="ชื่อหมวดหมู่">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="message-text" class="col-form-label">รายละเอียด :</span>
                            <textarea type="text" class="form-control" id="message-text" name="message-text" placeholder="อธิบายรายละเอียด"></textarea>
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="insert-img" class="col-form-label">รูป :</span>
                            <input type="file" name="catagories-picture"/>
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

    <div class="modal fade" id="editCatalogies" tabindex="-1" role="dialog" aria-labelledby="editCatalogiesLabel" aria-hidden="true" style="margin:20px;">
        <form method="post" action="/catagories/edit" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header header-modal">
                        <h4 class="modal-title" >แก้ไขหมวดหมู่</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                        <input type="hidden" name="catagID" value="">
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <span style="float:left" for="recipient-name" class="col-form-label">ชื่อ :</span>
                            <input type="text" class="form-control" id="catagories-name" name="catagories-name-edit" placeholder="ชื่อหมวดหมู่">
                        </div>

                        <div class="form-group">
                            <span style="float:left" for="message-text" class="col-form-label">รายละเอียด :</span>
                            <textarea type="text" class="form-control" id="message-text" name="message-text-edit" placeholder="อธิบายรายละเอียด"></textarea>
                        </div>
  
                        <div class="form-group">
                            <span style="float:left" for="insert-img" class="col-form-label">รูป :</span>
                            <div class="show-img">
                                <img id="show-img" src="" alt="">
                                <input type="file" name="catagories-picture-edit"/>
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

    $('#addCatalogies').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })

    $('#editCatalogies').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })

    $(document).ready(function() {
        $('.tt').tooltip();
        
        $(document).on('click','.edit-cat',function(){
            let name = $(this).attr("data-name");
            let description = $(this).attr("data-description");
            let img = $(this).attr("data-icon");
            let catagID = $(this).attr("data-id")
            $('input[name=catagID]').val(catagID)
            $('input[name=catagories-name-edit]').val(name)
            $('textarea[name=message-text-edit]').val(description)
            $("#show-img").attr("src",img)
        })
        $("input[name=catagories-picture-edit]").change(function(){
            let input = this
            if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function (e) {
                img = e.target.result;
                $("#show-img").attr("src",img)
            }
            reader.readAsDataURL(input.files[0])
        }
        })


        // $(document).on('click','.delete-cat',function(){
        //     swal({
        //     title: "คุณต้องการลบ",
        //     text: `${_username} หรือไม่ ?`,
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonClass: "btn-danger",
        //     cancelButtonClass: "btn-secondary",
        //     confirmButtonText: "ยืนยัน",
        //     cancelButtonText: "ยกเลิก",
        //     closeOnConfirm: false,
        //     closeOnCancel: function() {
        //         $('[data-toggle=tooltip]').tooltip({
        //             boundary: 'window',
        //             trigger: 'hover'
        //         });
        //         return true;
        //     }
        //     },
        //     function(isConfirm) {
        //         if (isConfirm) {
        //             swal({
        //                 title: "ลบข้อมูลสำเร็จ",
        //                 type: "success",
        //                 confirmButtonClass: "btn-danger",
        //                 confirmButtonText: "ตกลง",
        //                 closeOnConfirm: false,
        //             }, function(isConfirm) {
        //                 if (isConfirm) {
        //                     delete_1(_uid)
        //                 }
        //             });
        //         } else {

        //         }
        //     });

        // })

    });
  
</script>

@endsection
