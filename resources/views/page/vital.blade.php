<?php
    $station = session('station');
?>
@extends('tdhlayout.app')
@section('title','Vitals')
@section('content')
    <style>
        .panel-heading .badge {
            float: right;
            font-size: .946154rem;
            padding: 4px 7px;
        }
        .cardNum {
            text-align: center;
            font-size: 140px;
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
            @for($c=1;$c<=3;$c++)
                <?php
                $data = \App\Http\Controllers\PatientCtrl::getVitalData($c);
                ?>
                @if($data)
                    <div class="col-md-4">
                        <div class="panel panel-border-color panel-border-color-primary">
                            <div class="panel-heading panel-heading-divider">
                                Vital {{ $c }} : Now Serving...
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
                                    <a href="{{ url('patient/vital/done/'.$c.'/'.$data->id) }}" class="btn btn-success btn-sm col-sm-4">
                                        <i class="fa fa-check"></i> Done
                                    </a>
                                    <a href="#" data-link="{{ url('patient/vital/cancel/'.$c.'/'.$data->id) }}" data-modal="modal-cancel" class="btn btn-warning btn-sm col-sm-4  md-trigger btn-cancel">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                    <a href="{{ url('patient/vital/notify/'.$c.'/'.$data->id) }}" class="btn btn-info btn-sm col-sm-4 disabled btn-notify">
                                        <i class="fa fa-bell"></i> Notify
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="panel panel-border-color panel-border-color-info">
                            <div class="panel-heading panel-heading-divider">
                                Vital {{ $c }}
                                <span class="badge badge-info badge-{{$c}}">Waiting: {{ \App\Http\Controllers\PatientCtrl::getPendingList(2,'',$c) }}</span>
                            </div>
                            <div class="panel-body">
                                <div class="location text-sm-center">
                                    <img src="{{ url('/') }}/img/logo500.png" width="80%"><br>
                                    <i class="fa fa-user-times"></i> No patient <br />
                                    please select new patient...
                                </div>
                                <hr>
                                <a href="{{ url('patient/vital/next/'.$c.'/0') }}" class="btn btn-info btn-sm btn-block">
                                    <i class="fa fa-arrow-right"></i> Next Patient
                                </a>
                            </div>

                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
@endsection

@section('modal')
    @include('modal')
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

    <script>
        sock.onopen = function() {
            @if($station==1)
            {
                <?php $data = \App\Http\Controllers\PatientCtrl::getVitalData(1); ?>
                <?php if($data): ?>
                sock.send(JSON.stringify({
                    section: 'vital1',
                    number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}',
                    priority: '{{ $data->priority }}'
                }));
                <?php else: ?>
                sock.send(JSON.stringify({
                    section: 'vital1',
                    number: '&nbsp;'
                }));
                sock.send(JSON.stringify({
                    section: 'consultation',
                    channel: 'addNumber'
                }));
                <?php endif; ?>
            }
            @elseif($station==2)
            {
                <?php $data = \App\Http\Controllers\PatientCtrl::getVitalData(2); ?>
                <?php if($data): ?>
                sock.send(JSON.stringify({
                    section: 'vital2',
                    number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}',
                    priority: '{{ $data->priority }}'
                }));
                <?php else: ?>
                sock.send(JSON.stringify({
                    section: 'vital2',
                    number: '&nbsp;'
                }));
                sock.send(JSON.stringify({
                    section: 'consultation',
                    channel: 'addNumber'
                }));
                <?php endif; ?>
            }
            @elseif($station==3)
            {
                <?php $data = \App\Http\Controllers\PatientCtrl::getVitalData(3); ?>
                <?php if($data): ?>
                sock.send(JSON.stringify({
                    section: 'vital3',
                    number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($data->section) }}{{ $data->num }}',
                    priority: '{{ $data->priority }}'
                }));
                <?php else: ?>
                sock.send(JSON.stringify({
                    section: 'vital3',
                    number: '&nbsp;'
                }));
                sock.send(JSON.stringify({
                    section: 'consultation',
                    channel: 'addNumber'
                }));
                <?php endif; ?>


            }
            @endif
        };

        sock.onmessage = function(event) {
            var data = JSON.parse(event.data);
            if(data.channel=='addNumber' && data.section=='vital'){
                $.get(
                    '{{ url('patient/count/2/') }}',
                    function(data){
                        console.log(data);
                        $('.badge-1').html('Waiting: ' + data);
                        $('.badge-2').html('Waiting: ' + data);
                    }
                );
                $.get(
                    '{{ url('patient/count/vital/ob') }}',
                    function(data){
                        console.log(data);
                        $('.badge-3').html('Waiting: ' + data);
                    }
                );
            }
        };
    </script>
    @include('script.cancel')
@endsection