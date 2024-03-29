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
        html, body {margin: 0; height: 100%; overflow: hidden}
        .navbar-brand {
            font-size: 1.8rem;
        }
        .wrapper {
            margin-top: 90px;
        }
        div#time,#date {
            font-size: 50px;
            font-weight: bold;
            text-shadow: 6px 5px 6px rgb(0 0 0 / 12%);
        }
        body {
            {{--background: url('{{ asset('/layout/images/backdrop.png') }}'), -webkit-gradient(radial, center center, 0, center center, 460, from(#ccc), to(#ddd));--}}
            background: url('{{ asset('/img/background.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
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
            border-radius: 0px;
            color: #fff;
        }
        .news {
            color: #fff;
            font-size: 30px;
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
            background: rgb(131 0 0 / 50%);
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            /*border: 5px solid #9c5959;*/
            padding: 30px;
            text-align: center;
            vertical-align: middle;
            min-height: 150px;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            /*box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;*/
        }
        .table td .number {
            font-size: 250px;
            color: #efff2f;
            letter-spacing: -15px;
            text-shadow: 6px 5px 6px rgb(0 0 0 / 12%);
        }
        span.title {
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 40px;
            text-align: left;
            line-height: 25px;
        }

        .table {
            border-collapse: separate;
            border-spacing: 1.5em;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"><img style="width: 6.8rem;" src="{{ url('/img/doh_csmc_ihomp.png') }}" alt=""> Cebu South Medical Center - QUESYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

    </div>
</nav>

<div class="wrapper">
    <div class="col-md-12">
        <table class="table table-border" cellspacing="3">
            <tr>
                <td style="font-size:60px;">{{ \App\Http\Controllers\AbbrCtrl::equiv($section) }}</td>
                <td width="65%" colspan="2" rowspan="3" style="padding-bottom: 0px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" id="myvideo" style="background:#000" controls autoplay>
                            <source src="{{ url('videos/0-DOH1.mp4') }}" type="video/mp4">
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
                </td>
            </tr>
            <tr>
                <td width="35%">
                    <span class="number section-department">
                        <?php $getNumber = \App\Http\Controllers\ScreenCtrl::getNumber($section); ?>
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

<footer class="footer bg-dark">
    <div class="col-sm-12">
        <div class="row">

            <marquee class="news">
                <ul id="news-item">
                    @if(count($news) > 0)
                        @foreach($news as $n)
                            <li><i class="fa fa-angle-double-right fa-xs"></i> {{ $n->content }}</li>
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
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', "{{ url('/layout/bell.mp3') }}");
        audioElement.addEventListener('ended', function() {
            this.play();
        }, false);

        audioElement.play();
        setTimeout(function(){
            responsiveVoice.speak('Now Serving, ticket number, '+data.number, "UK English Female", {rate: 0.8});
            audioElement.pause();
        },2300);
    };

    sock.onmessage = function(event) {
        var data = JSON.parse(event.data);
        console.log(data)
        if(data.action == 'sendToScreenPage'){
            if(data.section == "{{ $section }}"){
                var priority = '';
                if(data.priority==1)
                {
                    priority = '<i class="fa fa-priority fa-wheelchair"></i>'
                }
                $('.section-department').html(priority +" "+data.number).fadeOut(500).fadeIn(500);

                if(data.number.length > 0 && data.number != '&nbsp;')
                {
                    playAudio(data);
                }
            }
        }
    }
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

<script>
    $.ajax({
        url: "{{ url('/get/videos') }}",
        type: "GET",
        success: function(data){
            console.log(data)

            var myvid = document.getElementById('myvideo');
            var myvids = data
            console.log(myvids)
            myvid.volume = 0.25;
            var activeVideo = 0;
            myvid.addEventListener('ended', function(e) {
                // update the active video index
                activeVideo = (++activeVideo) % myvids.length;

                // update the video source and play
                myvid.src = myvids[activeVideo];
                myvid.play();
            });
        }
    })

</script>
</body>

</html>
