<?php
$station = session('section');
$access = \Illuminate\Support\Facades\Session::get('access');
$tmp = array(
    'cashier',
    'msw'
);
$sections = array();
foreach($tmp as $s)
{
    if($access->$s==1)
        array_push($sections,$s);
}

$count =  \App\Http\Controllers\PatientCtrl::getPendingList(3,'consultation');

?>
@extends('tdhlayout.app')
@section('title','Special Lane')
@section('content')
    <style>
        .panel-heading .badge {
            float: right;
            font-size: .946154rem;
            padding: 4px 7px;
        }
        .cardNum {
            text-align: center;
            font-size: 110px;
            line-height: 150px;
            background: #2cc185;
            padding: 20px;
            color: #fff;
            letter-spacing: -8px;
        }
        .emptyNum {
            text-align: center;
            font-size: 150px;
            line-height: 150px;
            background: #e6e6e6;
            padding: 20px;
            color: #000;
        }
    </style>
    <div class="main-content container">
        <div class="row">
            @foreach($sections as $section)
                <?php
                $data = \App\Http\Controllers\PatientCtrl::getConsultationData($section);
                ?>
                @if($data)
                    <div class="col-md-6">
                        <div class="panel panel-border-color panel-border-color-primary">
                            <div class="panel-heading panel-heading-divider">
                                {{ \App\Http\Controllers\AbbrCtrl::equiv($section) }}: Now Serving...
                            </div>
                            <div class="panel-body">
                                <div class="cardNum">
                                    <small>{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}</small>
                                </div>
                                <hr />
                                <h5 class="text-sm-center"><strong>{{ $data->lname }}, {{ $data->fname }}</strong></h5>
                                <div class="location text-sm-center">
                                    <strong>Hospital # :</strong> {{ ($data->hospitalNum==null) ? 'N/A': $data->hospitalNum }}<br />
                                    <strong>Department :</strong> {{ \App\Http\Controllers\AbbrCtrl::equiv($data->section) }}
                                </div>
                                <hr>

                                <div class="row">
                                    <a href="{{ url('patient/consultation/done/'.$data->id) }}" class="btn btn-success btn-sm col-sm-4">
                                        <i class="fa fa-check"></i> Done
                                    </a>
                                    <a href="#" data-link="{{ url('patient/consultation/cancel/'.$data->id) }}" data-modal="modal-cancel" class="btn btn-warning btn-sm col-sm-4  md-trigger btn-cancel">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                    <a href="{{ url('patient/consultation/notify/'.$data->id) }}" class="btn btn-info btn-sm disabled btn-notify col-sm-4">
                                        <i class="fa fa-bell"></i> Notify
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="panel panel-border-color panel-border-color-info">
                            <div class="panel-heading panel-heading-divider">
                                Dept: {{ \App\Http\Controllers\AbbrCtrl::equiv($section) }}
                                <span class="badge badge-info badge-{{ $section }}">Waiting: {{ $count[$section] }}</span>
                            </div>
                            <div class="panel-body">
                                <div class="location text-sm-center">
                                    <img src="{{ url('/') }}/img/logo500.png" width="70%"><br>
                                    <i class="fa fa-user-times"></i> No patient <br />
                                    please select new patient...
                                </div>
                                <hr>
                                <a href="{{ url('patient/consultation/'.$section) }}" class="btn btn-info btn-sm btn-block">
                                    <i class="fa fa-arrow-right"></i> Next Patient
                                </a>
                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('modal')
    @include('modal')
@endsection

@section('script')
    @include('script.cancel')
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
    <script>
        sock.onopen = function() {
            sock.send(JSON.stringify({
                action: 'registerSpecialPage',
                userId: "user{{ Session::get('userId') }}"
            }))
            //cashier
            @if($station=='cashier')
            <?php $data = \App\Http\Controllers\PatientCtrl::getConsultationData('cashier'); ?>
            <?php if($data): ?>
            sock.send(JSON.stringify({
                section: 'cashier',
                number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}',
                priority: '{{ $data->priority }}',
                action: 'sendToScreenPage'
            }));
            <?php else: ?>
            sock.send(JSON.stringify({
                section: 'cashier',
                number: '&nbsp;',
                action: 'sendToScreenPage'
            }));
            <?php endif; ?>

            //msw
            @elseif($station=='msw')
            <?php $data = \App\Http\Controllers\PatientCtrl::getConsultationData('msw'); ?>
            <?php if($data): ?>
            sock.send(JSON.stringify({
                section: 'msw',
                number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}',
                priority: '{{ $data->priority }}',
                action: 'sendToScreenPage'
            }));
            <?php else: ?>
            sock.send(JSON.stringify({
                section: 'msw',
                number: '&nbsp;',
                action: 'sendToScreenPage'
            }));
            <?php endif; ?>
            <?php endif; ?>
        };


        sock.onmessage = function(event) {
            var data = JSON.parse(event.data);

            $.get(
                '{{ url('patient/count/3/consultation') }}',
                function(data){
                    console.log(data);
                    if(data.cashier || data.msw)
                        swal("Hey", "New patient(s) on queue!", "success");

                    $('.badge-cashier').html('Waiting: ' + data.cashier);
                    $('.badge-msw').html('Waiting: ' + data.msw);
                }
            );
        };
    </script>
@endsection