<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/styles-template/sb-admin-2.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/twitter-bootstrap 4.1.3.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-googleapis/family_Material_Icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-googleapis/family_Nunito.css')}}">
    <link rel="stylesheet" href="{{asset('css/cp-MDTimePicker/MDTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/fengyuanchen-Datepicker/datepicker.css')}}">

    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/styles-template/sb-admin-2.js')}}"></script>

    <script src="{{asset('js/cp-MDTimePicker/MDTimePicker.js')}}"></script>
    <script src="{{asset('js/fengyuanchen-Datepicker/datepicker.js')}}"></script>
    <script src="{{asset('js/fengyuanchen-Datepicker/datepicker.th-TH.js')}}"></script>
    <script src="{{asset('js/sweetalert/sweetalert.js')}}"></script>
    <script src="{{asset('js/cp-MDTimePicker/MDTimePicker.js')}}"></script>
    <script src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatable/dataTables.bootstrap4.min.js')}}"></script>

</head>

<body>
    <div id="navbar">
        @include('template.navbar')
    </div>
    <div id="container" style="width: 70%; margin:auto">

        <div id="header">
            @include('template.header')
        </div>
        <div id="content" style="text-align: center">
            @yield('content')
        </div>
        <div id="footer">
            @include('template.footer')
        </div>
    </div>
</body>

</html>