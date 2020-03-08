@extends('template.layout')

@section('title','pinto')

@section('content')
<?php
    function showDetail($head,$body){
        echo "
                <strong>$head</strong>
                <span>$body</span>
        ";
    }
?>
<link rel="stylesheet" href="{{asset('css/show_profile/style.css')}}">
<link rel="stylesheet" href="{{asset('lib/croppie/croppie.css')}}">

<div class="main">
    <div></div>
    <div class="container">
        <span><a href="/">หน้าแรก</a>>โปรไฟล์</span>
        <div class="card">
            <div class="card-header">
                <div class="show-img-profile">
                    <strong>รูปโปรไฟล์</strong>
                    <span>แก้ไขรูป</span>
                    <div class="upload-img">
                        <input id='pic-logo' type='file' class='item-img file center-block'  accept=".jpg,.png" name='icon_insert' />
                        <img id="profile-show" src="{{session()->get('icon')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="show-profile-detail">
                    {{showDetail("ชื่อเต็ม",session()->get('member')['thainame'])}}
                    {{showDetail("คณะ",session()->get('member')['faculty'])}}
                    {{showDetail("สาขา",session()->get('member')['department'])}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header "><strong class="d-flex justify-content-start ml-3">ติดต่อ</strong> </div>
            <div class="card-body">
                <div class="show-profile-detail">
                    {{showDetail("อีเมล์",session()->get('member')['mail'][0].session()->get('member')['mail'][1])}}
                </div>
            </div>
        </div>
    </div>
    <div class="card card-show-crop" style="float:right;">
        <div class="card-header">
            <strong>รูปโปรไฟล์</strong>
        </div>
        <div class="card-body">
             <center><div id="upload-demo" ></div></center>
        </div>
        <div class="card-footer">
            <button class="btn btn-success crop-submit">ยืนยัน</button>
            <button class="btn btn-danger crop-cancel">ยกเลิก</button>
        </div>
    </div>

</div>




<script src="{{asset('lib/croppie/croppie.js')}}"></script>
<script>
    $('.card-show-crop').hide()
    let img

    $(document).on('change','#pic-logo', function () {
        // $('#change-profile').modal('show')
        $('.card-show-crop').toggle()
        let input = this
        console.log('cahnge');
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function (e) {
                console.log("set");
                img = e.target.result;
                // $('#change-profile').modal('show')
                // $('#img-show-crop').attr('src',IMG)
                crop(img);
            }
            reader.readAsDataURL(input.files[0])


        }
    });
    function crop(img){
            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                width: 150,
                height: 150,
                type:'circle'
            },
                enforceBoundary: false,
                enableExif: true

            });
            $uploadCrop.croppie('bind', {
            url: img
        }).then(function(){
            console.log('jQuery bind complete');
            // $('.card-show-crop').toggle()
        });
    }
    $('.crop-submit').click(function(){
        $('#upload-demo').croppie('result',
            {type:'canvas',size:'viewport'})

            .then(function(r) {
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
               type:'POST',
               url:'/profile',
               data: {
                   icon:r
               },
               success:function(data) {
                  console.log(data)
                  location.reload();
               },
            error: function(data) {
                console.log(data);
            }
            });
                $('#profile-show').attr('src', r);
            });
        $('#upload-demo').croppie('destroy')
        $('.card-show-crop').hide()
    })
    $('.crop-cancel').click(function(){
        $('#upload-demo').croppie('destroy')
        $('.card-show-crop').hide()
    })
</script>
@endsection
