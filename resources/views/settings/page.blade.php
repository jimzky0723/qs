<?php
    $sections = array(
        'card',
        'vital1',
        'vital2',
        'vital3',
        'pedia',
        'im',
        'surgery',
        'ob',
        'dental',
        'bite',
        'cashier',
        'msw',
        );
?>
@extends('tdhlayout.app')
@section('content')
    <div class="main-content container">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ url('settings/pages/screen2') }}" class="href">
                            <h3 class="pt-2"><span class="icon s7-angle-right"></span> User Screen</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ url('settings/pages/getnumber') }}" class="href">
                            <h3 class="pt-2"><span class="icon s7-angle-right"></span> Get Number</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-bottom: 3px solid #000;margin-bottom: 30px;">

        <div class="row">
            @foreach($sections as $sec)
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ url('screen/default/'.$sec) }}" class="href" target="_blank">
                            <h3 class="pt-2"><span class="icon s7-angle-right"></span> {{ \App\Http\Controllers\AbbrCtrl::equiv($sec) }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection



@section('script')
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
@endsection