<?php
$status = session('status');
?>
@extends('tdhlayout.app')
@section('content')
    <style>
        .names {
            text-transform: uppercase;
        }
        .pricing-table-features>li {
            font-size: 14px;
            font-weight: 300;
            line-height: 22px;
        }
        .pricing-table-features {
            margin: 0 0 10px;
            padding: 0;
            list-style: none;
        }
    </style>
    <div class="main-content container">
        @if($status=='added')
        <div role="alert" class="alert alert-success alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-check"></span></div>
            <div class="message"><strong>Added!</strong> You are now serving {{ $current->fname }} {{ $current->lname }}.</div>
        </div>
        @elseif($status=='notAvailable')
        <div role="alert" class="alert alert-danger alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-close"></span></div>
            <div class="message"><strong>Error!</strong> Please complete transaction with your patient.</div>
        </div>
        @elseif($status=='pending')
        <div role="alert" class="alert alert-warning alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-attention"></span></div>
            <div class="message"><strong>Pending!</strong> Added to 'Pending List'.</div>
        </div>
        @elseif($status=='ready')
        <div role="alert" class="alert alert-info alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-info"></span></div>
            <div class="message"><strong>Done!</strong> Accept new patient.</div>
        </div>
        @elseif($status=='error')
        <div role="alert" class="alert alert-danger alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-close"></span></div>
            <div class="message"><strong>Error!</strong> There is a problem processing your data.</div>
        </div>
        @endif

        <div class="row">
            @if($current)
            <div class="col-sm-3">
                <div class="pricing-table">
                    <div class="pricing-table-title">Now Serving...</div>
                    <div class="pricing-table-price"><span class="value">{{ \App\Http\Controllers\NumberCtrl::initialSection($current->section) }}{{ $current->num }}</span></div>
                    <div class="panel-divider panel-divider-xl"></div>
                    <ul class="pricing-table-features">
                        <li class="names"><b>{{ $current->lname }}, {{ $current->fname }}</b></li>
                        <li><b>Hospital # :</b> {{ ($current->hospitalNum==null) ? 'N/A': $current->hospitalNum }}</li>
                        <li><b>Section :</b> {{ \App\Http\Controllers\AbbrCtrl::equiv($current->section) }}</li>
                    </ul>
                    <a href="{{ url('patient/card/done/'.$current->id) }}" class="btn btn-primary btn-block">Done</a>
                    <button class="btn btn-info btn-block btn-notify" disabled data-priority="{{ $current->priority }}" data-num="{{ $current->num }}" id="notify">Notify</button>
                    <button data-link="{{ url('patient/card/cancel/'.$current->id) }}" data-modal="modal-cancel" class="btn btn-space btn-warning btn-big md-trigger btn-block btn-cancel">Cancel</button>

                </div>
            </div>
            @endif
            <div class="{{ (isset($current)) ? 'col-sm-9' : 'col-sm-12' }}">

                <div class="panel panel-default">
                    <div class="panel-heading">Card Issuance</div>
                    <div class="panel-body">
                        @if(count($data) > 0)
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Priority #</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Hospital #</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td class="text-center {{ ($row->priority==1) ? 'text-success':'' }}">
                                        @if($row->priority==1)
                                            <span class="text-success"><i class="fa fa-wheelchair"></i></span>
                                        @endif
                                        {{ \App\Http\Controllers\NumberCtrl::initialSection($row->section) }}{{ $row->num }}
                                    </td>
                                    <td class="names">{{ $row->lname }}</td>
                                    <td class="names">{{ $row->fname }}</td>
                                    <td>{{ $row->hospitalNum }}</td>
                                    <td>{{ \App\Http\Controllers\AbbrCtrl::equiv($row->section) }}</td>
                                    @if($row->status=='ready')
                                        <td class="text-success">
                                            for verification
                                        </td>
                                    @else
                                        <td class="text-danger">
                                            {{ $row->status }}
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ url('patient/card/submit/'.$row->id) }}" class="btn btn-success btn-sm">
                                            <small><i class="fa fa-check"></i> Verified</small>
                                        </a>
                                        <a href="{{ url('patient/card/pending/'.$row->id) }}" class="btn btn-warning btn-sm">
                                            <small><i class="fa fa-refresh"></i> Pending</small>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else

                            <div role="alert" class="alert alert-warning">
                                <div class="icon"><span class="s7-attention"></span></div>
                                <div class="message">No patients available!</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
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

    @if($current)
        <script>
            sock.onopen = function() {
                sock.send(JSON.stringify({
                    section: 'card',
                    number: '{{ \App\Http\Controllers\NumberCtrl::initialSection($current->section) }}{{ $current->num }}',
                    priority: '{{ $current->priority }}'
                }));

                sock.send(JSON.stringify({
                    channel: 'pending'
                }));
            };
        </script>
    @else
        <script>
            sock.onopen = function() {
                sock.send(JSON.stringify({
                    section: 'card',
                    number: '&nbsp;'
                }));

                sock.send(JSON.stringify({
                    section: 'vital',
                    channel: 'addNumber'
                }));

                sock.send(JSON.stringify({
                    channel: '{{ $status }}'
                }));
            };
        </script>
    @endif

    <script>
        $('body').on('click','#notify',function(){
            location.reload();
        });
    </script>
    @include('script.cancel')
@endsection