<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cebu South Medical Center - QUESYSTEM</title>

    <!-- Bootstrap core CSS -->
    <title>TDH - Queuing System</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('/layout/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/layout/') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{ url('/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Custom styles for this template -->
    <link href="{{ url('/layout/') }}/css/half-slider.css" rel="stylesheet" media="all">
    <style>
        .wrapper {
            margin-top: 70px;
        }
        div#time,#date {
            font-size: 22px;
            font-weight: bold;
        }
        body {
            background: url('{{ asset('/layout/images/backdrop.png') }}'), -webkit-gradient(radial, center center, 0, center center, 460, from(#ccc), to(#ddd));
        }
        .list-group-item {
            margin-bottom: -1px;
            background-color: #237663 !important;
            border: 1px solid #fff !important;
        }
        .list-group-item span {
            color: #fff;
        }
        .alert-date {
            background: #237663;
            border-radius: 0px;
            color: #fff;
        }
        .news {
            color: #fff;
            font-size: 30px;
        }
        .alert-pending {
            background: #676d71;
            min-height: 250px;
            border-top: 3px solid #cecece;
            border-radius: 0px;
            color: #fff;
        }
        .pending {
            text-align: center;
            font-size: 40px;
            border-bottom: 2px solid #fff;
            margin-bottom: 20px;
            font-weight: bold;
            background: #666c70;
            color: #fff;
            line-height: 70px;
        }
        .fa-priority {
            font-size: 30px;
            letter-spacing: -20px;
        }

        ul#news-item {
            list-style-type: square;
        }
        #news-item li{
            display: inline-block;
            margin-right: 30px;
        }

        .table td {
            background: #237663;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            border: 2px solid #fff;
            height: 130px;
            text-align: right;
            padding-top: 40px;
            position: relative;
        }
        .table td .number {
            font-size: 100px;
            line-height: 125px;
            color: #ffe142;
            letter-spacing: -7px;
            margin-right: 10px;
        }
        span.title {
            position: absolute;
            left: 10px;
            top: 10px;
            font-size: 30px;
            text-align: left;
            line-height: 25px;
        }

    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Cebu South Medical Center - QUESYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

    </div>
    <div class="pull-right text-white">
        <span id="date">--:--</span> | <span id="time">--:--</span>
    </div>
</nav>

<div class="wrapper">
    <div class="col-md-12">
        <table class="table table-border">
            <tr>
                <td width="50%">
                    <span class="title">Card Issuance</span>
                    <span class="number section-card">
                        <?php
                        $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('card');
                        ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
                <td>
                    <span class="title">Pedia</span>
                    <span class="number section-pedia">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('pedia'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">Vital: Station 1</span>
                    <span class="number section-vital1">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('vital1'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
                <td>
                    <span class="title">Internal Medicine</span>
                    <span class="number section-im">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('im'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">Vital: Station 2</span>
                    <span class="number section-vital2">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('vital2'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
                <td>
                    <span class="title">Surgery</span>
                    <span class="number section-surgery">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('surgery'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">Vital: Station 3</span>
                    <span class="number section-vital3">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('vital3'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
                <td>
                    <span class="title">OB-Gyne</span>
                    <span class="number section-ob">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('ob'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">Dental</span>
                    <span class="number section-dental">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('dental'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
                <td>
                    <span class="title" style="font-size:22px;">Animal Bite Treatment Center</span>
                    <span class="number section-bite">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber('bite'); ?>
                        @if($getNumber->priority)
                            <i class="fa fa-wheelchair fa-priority"></i>
                        @endif
                        @if($getNumber->num > 0)
                            <?php
                            $sec = \App\ListPatients::find($getNumber->patientId)->section;
                            $initial = \App\Http\Controllers\ScreenCtrl::initialSection($sec);
                            ?>
                        @endif
                        {{ ($getNumber->num > 0) ? $initial: '' }}{!!  $getNumber->num !!}
                    </span>
                </td>
            </tr>
        </table>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<!-- Jquery JS-->
<script src="{{ url('/layout/') }}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->

<script src="{{ url('/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>

<!-- Main JS-->
<script src="{{ url('/layout/') }}/js/script.js"></script>
{{--<script src="{{ url('/layout/') }}/js/responsivevoice.js?key=gxUoeh9z"></script>--}}
<script src="https://code.responsivevoice.org/responsivevoice.js?key=gxUoeh9z"></script>
<script>
    <?php
    $param = \App\Parameters::where('description','socket')->first()->value;
    $param = "ws://".$_SERVER['SERVER_NAME'].":$param";
    ?>
    var sock = new WebSocket('{{ $param }}');

    var playAudio = function(data){
        console.log("Now Serving",data);
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', "{{ url('/layout/bell.mp3') }}");
        audioElement.addEventListener('ended', function() {
            this.play();
        }, false);

        audioElement.play();
        setTimeout(function(){
            responsiveVoice.speak(data.sectionDesc+', '+data.number, "UK English Female", {rate: 0.8});
            audioElement.pause();
        },2300);
    };

    sock.onmessage = function(event) {
        var data = JSON.parse(event.data);
        console.log(data);
        if(data.section=='card'){
            data['sectionDesc'] = 'Card Issuance';
        }else if(data.section=='vital1'){
            data['sectionDesc'] = 'Vital Station 1';
        }else if(data.section=='vital2'){
            data['sectionDesc'] = 'Vital Station 2';
        }else if(data.section=='vital3'){
            data['sectionDesc'] = 'Vital Station 3';
        }else if(data.section=='pedia'){
            data['sectionDesc'] = 'Pedia';
        }else if(data.section=='im'){
            data['sectionDesc'] = 'Internal Medicine';
        }else if(data.section=='surgery'){
            data['sectionDesc'] = 'Surgery';
        }else if(data.section=='ob'){
            data['sectionDesc'] = 'OB GYNE';
        }else if(data.section=='dental'){
            data['sectionDesc'] = 'Dental';
        }else if(data.section=='bite'){
            data['sectionDesc'] = 'Animal Bite Treatment Center';
        }

        var priority = '';
        if(data.priority==1)
        {
            priority = '<i class="fa fa-priority fa-wheelchair"></i>'
        }
        $('.section-'+data.section).html(priority +" "+data.number).fadeOut(500).fadeIn(500);

        if(data.number.length > 0 && data.number != '&nbsp;')
        {
            playAudio(data);
        }
    };
</script>

<script>
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var ampm = 'AM';

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var month = months[today.getMonth()];
        var day = today.getDate();
        var year = today.getFullYear();
        var date = days[today.getDay()];

        if(h > 11){
            ampm = 'PM';
            h = h - 12;
        }
        if(h==0){
            h = 12;
        }
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('date').innerHTML = month +" " + day + ", " + year + " " + date;
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s + " " + ampm;
        t = setTimeout(function() {
            startTime()
        }, 500);
    }
    startTime();
</script>


</body>

</html>
