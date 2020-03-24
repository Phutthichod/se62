
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/style.css')}}">
    <link rel="stylesheet" href="{{asset('lib/datatable/bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('lib/datatable/datatablebootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/twitter-bootstrap 4.1.3.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/dataTables.bootstrap4.min.css')}}">
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('lib/datatable/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('lib/datatable/datatable.min.js')}}"></script>
    <script src="{{asset('lib/datatable/bootstrap4.min.js')}}"></script>
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
