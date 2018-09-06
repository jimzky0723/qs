<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Talisay District Hospital - QUESYSTEM</title>

    <!-- Bootstrap core CSS -->
    <title>TDH - Queuing System</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('resources/layout/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{ url('resources/layout/') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{ url('resources/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Custom styles for this template -->
    <link href="{{ url('resources/layout/') }}/css/half-slider.css" rel="stylesheet" media="all">
    <style>
        .wrapper {
            margin-top: 70px;
        }
        div#time,#date {
            font-size: 22px;
            font-weight: bold;
        }
        body {
            background: url('{{ asset('resources/layout/images/backdrop.png') }}'), -webkit-gradient(radial, center center, 0, center center, 460, from(#ccc), to(#ddd));
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
            font-size:20px;
            letter-spacing: -20px;
        }

        ul#news-item {
            list-style-type: square;
        }
        #news-item li{
            display: inline-block;
            margin-right: 30px;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Talisay District Hospital - QUESYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

    </div>
</nav>
<?php
$sections = array(
    'card',
    'vital1',
    'vital2',
    'vital3',
    'pedia'
);
$sections2 = array(
    'im',
    'surgery',
    'ob',
    'dental',
    'bite'
);

?>
<div class="wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    @foreach($sections as $section)
                    <a href="#" class="list-group-item">
                        <span style="font-size:25px">
                            {{ \App\Http\Controllers\AbbrCtrl::equiv($section) }}
                        </span>
                        <?php $getNumber = \App\Http\Controllers\PatientCtrl::getNumber($section); ?>
                        @if($getNumber)
                            <span style="font-size:70px;font-weight:bold;line-height:70px" class="pull-right sec-{{ $section }}">
                                @if($getNumber->priority)
                                    <i class="fa fa-wheelchair fa-priority"></i>
                                @endif
                                {!!  $getNumber->num !!}
                            </span>
                        @else
                            <span style="font-size:70px;font-weight:bold;line-height:70px" class="pull-right sec-{{ $section }}">
                                &nbsp;
                            </span>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    @foreach($sections2 as $section)
                        <a href="#" class="list-group-item">
                        <span style="font-size:{{ ($section=='bite') ? '20px': '25px' }}; float: left;line-height: {{ ($section=='bite') ? '23px': '27px' }};">
                            @if($section=='bite')
                                Animal Bite<br />Treatment Center
                            @else
                                {{ \App\Http\Controllers\AbbrCtrl::equiv($section) }}
                            @endif
                        </span>

                            <span style="font-size:70px;font-weight:bold;line-height:70px" class="pull-right sec-{{ $section }}">
                                <?php
                                    $getNumber = \App\Http\Controllers\PatientCtrl::getNumber($section);
                                ?>
                                @if($getNumber)
                                    @if($getNumber->priority)
                                        <i class="fa fa-wheelchair fa-priority"></i>
                                    @endif
                                    {!!  $getNumber->num !!}
                                @else
                                    &nbsp;
                                @endif

                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" id="myvideo" style="background:#000">
                        <source src="{{ url('videos/kain.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="alert alert-date">
                    <div id="date" class="pull-left">
                        --:--:--
                    </div>
                    <div id="time" class="pull-right">
                        --:--:--
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-pending">
    <h3 class="text-center" style="padding-bottom: 10px;">FOR RETRIEVAL OF FILE</h3>
    <div class="pending-section row">
        @foreach($pending as $row)
        <div class="col-sm-2 pending-{{ $row->id }}">
            <div class="pending">{{ $row->num }}</div>
        </div>
        @endforeach
    </div>

</div>
<footer class="footer bg-dark">
    <div class="col-sm-12">
        <div class="row">

            <marquee class="news">
                <ul id="news-item">
                    @if(count($news) > 0)
                        @foreach($news as $n)
                        <li><i class="fa fa-arrow-right fa-xs"></i> {{ $n->content }}</li>
                        @endforeach
                    @else
                        <li>No news.</li>
                    @endif
                </ul>
            </marquee>
        </div>

    </div>

    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<!-- Jquery JS-->
<script src="{{ url('resources/layout/') }}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->

<script src="{{ url('resources/layout/') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>

<script src="{{ url('resources/layout/') }}/vendor/animsition/animsition.min.js"></script>


<!-- Main JS-->
<script src="{{ url('resources/layout/') }}/js/script.js"></script>
<script src="{{ url('resources/layout/') }}/js/responsivevoice.js"></script>
<script>
    var sock = new WebSocket('{{ \Illuminate\Support\Facades\Session::get('socket') }}');

    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', "{{ url('resources/layout/bell.mp3') }}");
    audioElement.addEventListener('ended', function() {
        this.play();
    }, false);

    audioElement.addEventListener("canplay",function(){
        console.log("Duration:" + audioElement.duration + " seconds");
        console.log("Source:" + audioElement.src);
        console.log("Status: Ready to play").css("color","green");
    });

    sock.onmessage = function(event) {
        var data = JSON.parse(event.data);
        var priority = '';
        if(data.priority==1)
        {
            priority = '<i class="fa fa-priority fa-wheelchair"></i>'
        }
        $('.sec-'+data.section).html(priority +" "+data.number).fadeOut(500).fadeIn(500);

        if(data.channel=='pending')
        {
            $('.pending-section').fadeOut(500);
            getPendingInCard();
        }

        var speech = '';
        switch(data.section){
            case 'card':
                speech = 'at Card Issuance';
                break;
            case 'vital1':
                speech = 'at Vital: Station 1';
                break;
            case 'vital2':
                speech = 'at Vital: Station 2';
                break;
            case 'vital3':
                speech = 'at Vital: Station 3';
                break;
            case 'pedia':
                speech = 'at Pedia Section';
                break;
            case 'im':
                speech = 'at Internal Medicine Section';
                break;
            case 'surgery':
                speech = 'at Surgery Section';
                break;
            case 'ob':
                speech = 'at O.B. Section';
                break;
            case 'dental':
                speech = 'at Dental Section';
                break;
            case 'bite':
                speech = 'at Animal Bite Section';
                break;
            default:

        }
        if(data.number > 0)
        {
            var audioElement = document.createElement('audio');
            audioElement.setAttribute('src', "{{ url('resources/layout/bell.mp3') }}");
            audioElement.addEventListener('ended', function() {
                this.play();
            }, false);

            audioElement.play();
            setTimeout(function(){

                responsiveVoice.speak('Now Serving, Number '+data.number, "UK English Female", {rate: 0.8});
                audioElement.pause();
            },2300);
        }
    };

    function speak(data)
    {

    }

    function getPendingInCard()
    {
        var pending = '';
        $.get(
            '{{ url('patient/card/pending/list') }}',
            function(data){
                jQuery.each( data, function( i, val ) {
                    $( "#" + i ).append( document.createTextNode( " - " + val ) );
                    pending += '<div class="col-sm-2 pending-'+val.id+'"><div class="pending">'+val.num+'</div></div>';
                });
                $('.pending-section').html(pending).fadeIn(500);
            }
        );
    }
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

<script>
    var myvid = document.getElementById('myvideo');
    var myvids = [
        "{{ url('videos/kain.mp4') }}",
        "{{ url('videos/laugh.MKV') }}",
    ];
    myvid.volume = 0.08;
    var activeVideo = 0;
    myvid.addEventListener('ended', function(e) {
        // update the active video index
        activeVideo = (++activeVideo) % myvids.length;

        // update the video source and play
        myvid.src = myvids[activeVideo];
        myvid.play();
    });
</script>
</body>

</html>
