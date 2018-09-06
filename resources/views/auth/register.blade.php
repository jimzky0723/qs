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
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('resources/layout/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('resources/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
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
                    @if($status=='duplicate')
                        <div class="alert alert-danger">
                            <i class="fas fa-times"></i> Duplicate Username!
                        </div>
                    @elseif($status=='save')
                        <div class="alert alert-success">
                            <i class="fas fa-check"></i> Successfully submitted! Wait for the confirmation.
                        </div>
                    @endif
                    <div class="login-form">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Profession</label>
                                <select class="au-input form-control" name="profession">
                                    <option value="nurse">Nurse</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="au-input au-input--full" type="text" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="au-input au-input--full" type="text" name="lname" placeholder="Last Name" required>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"><i class="fas fa-user-plus"></i> register</button>
                        </form>
                        <hr />
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{ url('login') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->


</body>

</html>
<!-- end document-->