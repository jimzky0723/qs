<?php
    $user = \Illuminate\Support\Facades\Session::get('auth');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>TDH - Queuing System</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('/layout/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{ url('/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="{{ url('/layout/') }}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    @include('layout.menu')

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                        </form>

                        <div class="header-button">
                            <div class="noti-wrap"></div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ url('/layout/') }}/images/icon/avatar.jpg" alt="{{ $user->fname }} {{ $user->lname }}" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ $user->fname }} {{ $user->lname }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ url('/layout/') }}/images/icon/avatar.jpg" alt="{{ $user->fname }} {{ $user->lname }}" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ $user->fname }} {{ $user->lname }}</a>
                                                </h5>
                                                <span class="email">{{ strtoupper($user->access) }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            @if($user->access=='admin')
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{ url('logout') }}">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->

</div>

@yield('modal')
<!-- Jquery JS-->
<script src="{{ url('/layout/') }}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->

<script src="{{ url('/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>

<script src="{{ url('/layout/') }}/vendor/animsition/animsition.min.js"></script>


<!-- Main JS-->
<script src="{{ url('/layout/') }}/js/script.js"></script>
<script>
    var sock = new WebSocket('{{ \Illuminate\Support\Facades\Session::get('socket') }}');
</script>
@yield('script')
</body>

</html>
<!-- end document-->
