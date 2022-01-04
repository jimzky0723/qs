<?php
    $invalid = session('invalid');
    $notOb = session('notOb');
    $busy = session('busy');
    $pending = session('pending');
    $info = session('info');
    $success = session('success');
    if($info){
        $info = (object)$info;
    }
    if($success){
        $success = (object)$success;
    }
?>
@extends('tdhlayout.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
@endsection
@section('content')
    <div class="main-content container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Today's Patients
                    <div class="tools">
                        <form method="POST" action="{{ url('patient/list') }}">
                            {{ csrf_field() }}
                            <div class="input-group mb-2">
                                <div class="col-6 col-sm-5 col-lg-5">
                                    <input id="datepicker7" type="text" autocomplete="off" name="dateCreated" class="form-control datepicker" placeholder="mm/dd/yyyy" value="{{ (isset($keyword) ? $keyword->dateCreated:'') }}">
                                </div>
                                <input type="text" class="form-control" name="keyword" placeholder="enter keyword . . ." value="{{ (isset($keyword) ? $keyword->name:'') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><span class="s7-search"></span> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">

                    @if($notOb)
                    <hr />
                    <div role="alert" class="alert alert-danger">
                        <div class="icon"><span class="s7-close"></span></div>
                        <div class="message"><strong>Oopss!</strong> The patient is not an OB-Gyne patient.</div>
                    </div>
                    @endif

                    @if($invalid)
                        <hr />
                        <div role="alert" class="alert alert-danger">
                            <div class="icon"><span class="s7-close"></span></div>
                            <div class="message"><strong>Oopss!</strong> The patient does not belong to {{ $invalid }}.</div>
                        </div>
                    @endif

                    @if($busy)
                        <hr />
                        <div role="alert" class="alert alert-danger">
                            <div class="icon"><span class="s7-close"></span></div>
                            <div class="message"><strong>Oopss!</strong> {{ $busy }} is not available.  Please complete transaction with the patient.</div>
                        </div>
                    @endif

                    @if($pending)
                        <hr />
                        <div role="alert" class="alert alert-danger">
                            <div class="icon"><span class="s7-close"></span></div>
                            <div class="message"><strong>Oopss!</strong> The patient is still busy in {{ $pending }}</div>
                        </div>
                    @endif

                    @if($info)
                    <hr />
                    <div role="alert" class="alert alert-success">
                        <div class="icon"><span class="s7-check"></span></div>
                        <div class="message"><strong>Forwarded!</strong> Patient successfully forwarded to {{ $info->forward }}.</div>
                    </div>
                    @endif

                    @if($success)
                        <hr />
                        <div role="alert" class="alert alert-success">
                            <div class="icon"><span class="s7-check"></span></div>
                            <div class="message"><strong>Forwarded!</strong> Patient successfully forwarded to {{ $success->forward }}.</div>
                        </div>
                    @endif

                    @if(count($data) > 0)
                        <hr />
                        <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="table-primary">
                            <tr>
                                <th width="5%"></th>
                                <th>Complete Name</th>
                                <th>Date of Birth</th>
                                <th class="text-center">Priority #</th>
                                <th class="text-center">Current</th>
                                <th>Date Registered</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>
                                    <button class="btn btn-success btn-xs btn-forward md-trigger" data-modal="modal-forward" data-id="{{ $row->id }}">
                                        <i class="fa fa-send"></i>
                                    </button>
                                </td>
                                <td>
                                    @if($row->priority==1)
                                        <i class="fa fa-wheelchair"></i>
                                    @endif
                                    {{ $row->lname }}, {{ $row->fname }}
                                </td>
                                <td>{{ date('M d, Y',strtotime($row->dob)) }}</td>
                                <td class="text-center">{{ \App\Http\Controllers\NumberCtrl::initialSection($row->section) }}{{ $row->num }}</td>
                                <?php
                                    $classStep = '';
                                    if($row->step==99)
                                        $classStep = 'text-danger';
                                    else if($row->step==4)
                                        $classStep = 'text-success';
                                ?>
                                <td class="text-center {{ $classStep }}">
                                    {{ \App\Http\Controllers\AbbrCtrl::step($row->step) }}
                                </td>
                                <td>{{ date('M d, Y h:i A',strtotime($row->created_at)) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <hr />
                        <div class="text-center">
                            {{ $data->links() }}
                        </div>
                    @else
                        <hr />
                        <div role="alert" class="alert alert-warning alert-dismissible">
                            <div class="icon"><span class="s7-attention"></span></div>
                            <div class="message"><strong>Opps!</strong> No patient found.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div id="modal-forward" class="modal-container modal-effect-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="s7-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="mb-4">Queuing Override</h3>
                </div>
                <hr />
                <div class="mt-1 mb-1 text-center">
                    <button data-section="card" class="btn btn-section btn-space btn-dark btn-big col-sm-5"><i class="icon s7-credit"></i> Card Issuance</button>
                    <button data-section="vital1" class="btn btn-section btn-space btn-info btn-big col-sm-5"><i class="icon s7-note2"></i> Vital: Station 1</button>
                    <button data-section="vital2" class="btn btn-section btn-space btn-info btn-im btn-big col-sm-5"><i class="icon s7-note2"></i> Vital: Station 2</button>
                    <button data-section="vital3" class="btn btn-section btn-space btn-info btn-im btn-big col-sm-5"><i class="icon s7-note2"></i> Vital: Station 3</button>
                    <hr />
                    <button data-section="pedia" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> Pedia</button>
                    <button data-section="im" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> Internal Medicine</button>
                    <button data-section="surgery" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> Surgery</button>
                    <button data-section="ob" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> OB-Gyne</button>
                    <button data-section="dental" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> Dental</button>
                    <button data-section="bite" class="btn btn-section btn-space btn-primary btn-big col-sm-5"><i class="icon fa fa-stethoscope"></i> Animal Bite</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('/') }}/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/lib/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('/') }}/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();
            App.formElements();

            $.fn.niftyModal('setDefaults',{
                overlaySelector: '.modal-overlay',
                contentSelector: '.modal-content',
                closeSelector: '.modal-close',
                classAddAfterOpen: 'modal-show',
                classModalOpen: 'modal-open',
                classScrollbarMeasure: 'modal-scrollbar-measure',
                afterOpen: function(){
                    $("html").addClass('mai-modal-open');
                },
                afterClose: function(){
                    $("html").removeClass('mai-modal-open');
                }
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.livePreview();
        });
    </script>
    <script>
        var id, link;
        $('.btn-forward').on('click',function () {
            id = $(this).data('id');
        })
        $('.btn-section').on('click',function () {
            link = "{{ url('patient/forward') }}/"+$(this).data('section')+"/"+id;
            window.location.href = link;
        })
    </script>
    <script>
{{--        @if($info)--}}
{{--        sock.onopen = function() {--}}
{{--            sock.send(JSON.stringify({--}}
{{--                section: "{{ $info->section }}",--}}
{{--                number: "{{ \App\Http\Controllers\NumberCtrl::initialSection($info->sec) }}{{ $info->num }}",--}}
{{--                priority: "{{ $info->priority }}"--}}
{{--            }));--}}

{{--            sock.send(JSON.stringify({--}}
{{--                channel: 'pending'--}}
{{--            }));--}}
{{--        };--}}
{{--        @endif--}}
    </script>
@endsection