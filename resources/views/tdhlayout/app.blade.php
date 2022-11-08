<?php
    $auth = \Illuminate\Support\Facades\Session::get('auth');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ url('/') }}/img/favicon.png">
    <title>@yield('title','Cebu South Medical Center')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/theme-switcher/theme-switcher.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/font-awesome/css/font-awesome.min.css"/>
    @yield('head')
    <link type="text/css" href="{{ url('/') }}/css/app.css" rel="stylesheet">
    <link type="text/css" href="{{ url('/') }}/css/style.css" rel="stylesheet">
</head>
    <style>
        body {
            background: url('{{ asset('layout/images/backdrop.png') }}'), -webkit-gradient(radial, center center, 0, center center, 460, from(#ccc), to(#ddd));
        }
    </style>
<body>

<nav class="navbar navbar-expand navbar-dark mai-top-header">
    <div class="container"><a href="#" class="navbar-brand"></a>
        <!--Left Menu-->
        <ul class="nav navbar-nav mai-top-nav">

        </ul>
        <!--Icons Menu-->
        <ul class="navbar-nav float-lg-right mai-icons-nav">


        </ul>
        <!--User Menu-->
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
            <li class="dropdown nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle nav-link"> <img src="{{ url('/') }}/img/logo500.png"><span class="user-name">{{ $auth->fname }} {{ $auth->lname }}</span><span class="angle-down s7-angle-down"></span></a>
                <div role="menu" class="dropdown-menu">
{{--                    <a href="#" class="dropdown-item"> <span class="icon s7-tools"> </span>Account Settings</a>--}}
{{--                    <a href="#" class="dropdown-item"> <span class="icon s7-unlock"> </span>Change Password</a>--}}
                    <a href="{{ url('logout') }}" class="dropdown-item"><span class="icon s7-power"> </span>Log Out</a></div>
            </li>
        </ul>
    </div>
</nav>
<div class="main-wrapper">
    @include('tdhlayout.menu')
    @yield('content')
</div>
@yield('modal')
<div class="modal-overlay"></div>
<script src="{{ url('/') }}/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/js/app.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    <?php
        $param = \App\Parameters::where('description','socket')->first()->value;
        $param = "ws://".$_SERVER['SERVER_NAME'].":$param";
    ?>
    var sock = new WebSocket('{{ $param }}');
</script>
@yield('script')
<script>
    var url = window.location.href;
    var parts = url.split('/');
    var filename = parts[0]+'//'+parts[2]+'/'+parts[3]+'/'+parts[4]+'/'+parts[5];
    if(parts.length > 6)
    {
        filename += '/'+parts[6];
    }
    $('a[href="'+filename+'"]').addClass('active');
    $('a[href="'+filename+'"]').parent().parent().parent().addClass('open');

    $(".loading").show();

    setTimeout(function(){
        $('.btn-notify').attr('disabled',false)
        $('.btn-notify').removeClass('disabled');
    }, 5000)
</script>
</body>
</html>