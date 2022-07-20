<?php
    $status = session('status');
?>
<!DOCTYPE html><html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ url('/') }}/img/favicon.png">
    <title>Login: QueSystem</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/theme-switcher/theme-switcher.min.css"/>
    <link type="text/css" href="{{ url('/') }}/css/app.css" rel="stylesheet">
</head>
<body class="mai-splash-screen">
<div class="mai-wrapper mai-login">
    <div class="main-content container">
        <div class="splash-container row">
            <div class="col-md-6 user-message"><span class="splash-message text-right">Hello!<br> it's good to<br> see you again</span><span class="alternative-message text-right"><a href="{{ url('/screen/screen1') }}" target="_blank">Go to Queuing Screen</a></span></div>
            <div class="col-md-6 form-message"><img src="{{ url('/') }}/img/logo-2x.png" alt="logo" width="169" height="28" class="logo-img mb-4"><span class="splash-description text-center mt-5 mb-5">Login to your account</span>
                <form method="post" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    @if($status=='error')
                    <div role="alert" class="alert alert-theme alert-danger alert-dismissible">
                        <div class="icon"><span class="s7-close"></span></div>
                        <div class="message"><strong>Invalid username or password!</strong></div>
                    </div>
                    @elseif($status=='inactive')
                    <div role="alert" class="alert alert-theme alert-info alert-dismissible">
                        <div class="icon"><span class="s7-info"></span></div>
                        <div class="message"><strong>Your account is inactive!!</strong></div>
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><i class="icon s7-user"></i></div>
                            <input id="username" name="username" type="text" placeholder="Username" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                            <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group login-submit">
                        <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                    </div>
                    <div class="form-group row login-tools">
                        <div class="col-sm-6 login-remember">
                            <label class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                            </label>
                        </div>
                        <div class="col-sm-6 pt-2 text-sm-right login-forgot-password"><a href="#">Forgot Password?</a></div>
                    </div>
                </form>
                <div class="out-links"><a href="#">© 2018 QueSystem</a></div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('/') }}/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/js/app.js" type="text/javascript"></script>
<script src="{{ url('/') }}/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        App.livePreview();
    });

</script>
</body>

</html>