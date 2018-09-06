<?php
    $status = session('status');
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
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('resources/layout/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('resources/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('resources/layout/') }}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition page-content--bge5">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ url('resources/layout/') }}/images/icon/logo.png" alt="CoolAdmin">
                        </a>
                    </div>
                    @if($status=='error')
                    <div class="alert alert-danger">
                        <i class="fas fa-user-times"></i> Invalid Username or Password!
                    </div>
                    @elseif($status=='inactive')
                        <div class="alert alert-info">
                            <i class="fas fa-user"></i> Your account is inactive!
                        </div>
                    @endif
                    <div class="login-form">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"><i class="fas fa-lock"></i> sign in</button>
                        </form>
                        <hr />
                        <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="{{ url('register') }}">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->
<script src="{{ url('resources/layout/') }}/vendor/jquery-3.2.1.min.js"></script>

</body>

</html>
<!-- end document-->