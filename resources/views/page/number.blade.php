<?php
    $status = session('status');
?>
@extends('tdhlayout.app')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ url('resources/tdh') }}/lib/jquery.gritter/css/jquery.gritter.css"/>
@endsection
@section('content')

    <style>
        .currentNumber {
            text-align: center;
            font-weight: bold;
            font-size: 165px;
            letter-spacing: -7px;
        }
        .btn-im {
            background: #000080;
            color: #fff;
        }
        .btn-ob {
            color: #fff;
            background: #ec528d;
        }
        .btn-dental {
            color: #fff;
            background: #800080;
        }
        .btn {
            position:relative;
        }
        .lastNumber {
            position: absolute !important;
            right: 3px;
            top:0px;
            background: #fff;
            color: #000;
        }
    </style>
    <div class="main-content container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">Get Priority Number</div>
                    <div class="panel-body">
                        <div class="mt-1 mb-1 text-center">
                            <button data-modal="modal-senior" class="btn btn-space btn-success btn-big col-sm-5 md-trigger">
                                <i class="icon fa fa-wheelchair"></i> Senior/Pregnant/PWD
                            </button>
                            <button class="btn btn-space btn-info hover btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="pedia" data-equiv="Pedia" data-priority="0" data-number="{{ $sectionNumber['pedia'] }}">
                                <i class="icon fa fa-stethoscope"></i>
                                Pedia
                                <span class="badge lastNumber">{{ $sectionNumber['pedia'] }}</span>
                            </button>
                        </div>
                        <div class="mt-1 mb-1 text-center">
                            <button class="btn btn-space btn-im btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="im" data-equiv="Internal Medicine" data-priority="0" data-number="{{ $sectionNumber['im'] }}">
                                <i class="icon fa fa-stethoscope"></i> Internal Medicine
                                <span class="badge lastNumber">{{ $sectionNumber['im'] }}</span>
                            </button>
                            <button class="btn btn-space btn-danger btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="surgery" data-equiv="Surgery" data-priority="0" data-number="{{ $sectionNumber['surgery'] }}">
                                <i class="icon fa fa-stethoscope"></i>
                                Surgery
                                <span class="badge lastNumber">{{ $sectionNumber['surgery'] }}</span>
                            </button>
                        </div>
                        <div class="mt-1 mb-1 text-center">
                            <button class="btn btn-space btn-ob btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="ob" data-equiv="OB" data-priority="0" data-number="{{ $sectionNumber['ob'] }}">
                                <i class="icon fa fa-stethoscope"></i> OB
                                <span class="badge lastNumber">{{ $sectionNumber['ob'] }}</span>
                            </button>
                            <button class="btn btn-space btn-dental btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="dental" data-equiv="Dental" data-priority="0" data-number="{{ $sectionNumber['dental'] }}">
                                <i class="icon fa fa-stethoscope"></i> Dental
                                <span class="badge lastNumber">{{ $sectionNumber['dental'] }}</span>
                            </button>
                        </div>
                        <div class="mt-1 mb-1 text-center">
                            <button data-modal="modal-surgery" class="btn btn-space btn-danger btn-big col-sm-10 md-trigger"><i class="icon fa fa-stethoscope"></i> Animal Bite </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-full-color panel-full-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        <div class="tools"><span class="icon s7-close"></span></div><span class="title">Last Number</span>
                    </div>
                    <div class="panel-body number">
                        <div class="currentNumber">
                            {{ (isset($lastNumber)) ? $lastNumber : '--' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <style>
        .modal-main-icon {
            margin-bottom: 10px;
        }
    </style>
    <div id="modal-surgery" class="modal-container modal-effect-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="s7-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="mb-4">Animal Bite</h3>
                </div>
                <div class="mt-1 mb-1 text-center">
                    <button class="btn btn-space btn-im btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="surgery" data-equiv="Surgery" data-priority="0"  data-number="{{ $sectionNumber['surgery'] }}">
                        <i class="icon fa fa-stethoscope"></i> 1st Dose / ER
                        <span class="badge lastNumber">{{ $sectionNumber['surgery'] }}</span>
                    </button>
                    <button class="btn btn-space btn-danger btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="bite" data-equiv="Animal Bite" data-priority="0" data-number="{{ $sectionNumber['bite'] }}">
                        <i class="icon fa fa-stethoscope"></i> 2nd Dose / 3rd Dose
                        <span class="badge lastNumber">{{ $sectionNumber['bite'] }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-senior" class="modal-container modal-effect-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="s7-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-primary"><span class="modal-main-icon fa fa-wheelchair"></span></div>
                    <h3 class="mb-4">Senior/Pregnant/PWD</h3>
                </div>
                <div class="mt-1 mb-1 text-center">
                    <button class="btn btn-space btn-im btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="im" data-equiv="Internal Medicine" data-priority="1" data-number="{{ $sectionNumber['im'] }}">
                        <i class="icon fa fa-stethoscope"></i> Internal Medicine
                        <span class="badge lastNumber">{{ $sectionNumber['im'] }}</span>
                    </button>
                    <button class="btn btn-space btn-danger btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="surgery" data-equiv="Surgery" data-priority="1" data-number="{{ $sectionNumber['surgery'] }}">
                        <i class="icon fa fa-stethoscope"></i> Surgery
                        <span class="badge lastNumber">{{ $sectionNumber['surgery'] }}</span>
                    </button>
                </div>
                <div class="mt-1 mb-1 text-center">
                    <button class="btn btn-space btn-ob btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="ob" data-equiv="OB" data-priority="1" data-number="{{ $sectionNumber['ob'] }}">
                        <i class="icon fa fa-stethoscope"></i> OB
                        <span class="badge lastNumber">{{ $sectionNumber['ob'] }}</span>
                    </button>
                    <button class="btn btn-space btn-dental btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="dental" data-equiv="Dental" data-priority="1" data-number="{{ $sectionNumber['dental'] }}">
                        <i class="icon fa fa-stethoscope"></i> Dental
                        <span class="badge lastNumber">{{ $sectionNumber['dental'] }}</span>
                    </button>
                </div>
                <div class="mt-1 mb-1 text-center">
                    <button data-modal="modal-senior-surgery" class="btn btn-space btn-danger btn-big col-sm-5 md-trigger" data-number="{{ $sectionNumber['bite'] }}">
                        <i class="icon fa fa-stethoscope"></i> Animal Bite
                        <span class="badge lastNumber">{{ $sectionNumber['bite'] }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-senior-surgery" class="modal-container modal-effect-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="s7-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="mb-4">Animal Bite</h3>
                </div>
                <div class="mt-1 mb-1 text-center">
                    <button class="btn btn-space btn-im btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="surgery" data-equiv="Surgery" data-priority="1" data-number="{{ $sectionNumber['surgery'] }}"><i class="icon fa fa-stethoscope"></i> 1st Dose / ER </button>
                    <button class="btn btn-space btn-danger btn-big col-sm-5 md-trigger" data-modal="modal-form"  data-section="bite" data-equiv="Animal Bite" data-priority="1" data-number="{{ $sectionNumber['bite'] }}"><i class="icon fa fa-stethoscope"></i> 2nd Dose / 3rd Dose </button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-form" class="modal-container modal-effect-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="s7-close"></span></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('number') }}" method="post" data-parsley-validate="" novalidate="">
                    {{ csrf_field() }}
                    <input type="hidden" id="txtSection" name="section" />
                    <input type="hidden" id="txtPriority" name="priority" />

                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" parsley-trigger="change" disabled id="txtEquiv" value="" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hospital Number</label>
                        <input type="text" name="hospitalNum" data-mask="hospitalNumber" parsley-trigger="change" placeholder="Enter last 6 digit hospital number" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" parsley-trigger="change" required="" placeholder="Enter last name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" parsley-trigger="change" required="" placeholder="Enter first name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                    <div class="row pt-0 pt-0 pt-lg-5">
                        <div class="col-lg-12">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button type="button" class="modal-close btn btn-space btn-secondary" data-dismiss="modal">Close</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('resources/tdh/') }}/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/parsley/parsley.min.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        sock.onopen = function() {
            sock.send(JSON.stringify({
                section: 'consultation',
                channel: 'addNumber'
            }));
            console.log('sent');
        }
    </script>
    <script type="text/javascript">
        //Set Nifty Modals defaults
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

        $(document).ready(function(){
            //initialize the javascript
            App.init();
            $('form').parsley();
            $("[data-mask='hospitalNumber']").mask("999999");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.livePreview();
        });

    </script>
    <script type="text/javascript">
        $('.md-trigger').on('click',function(){
            var section = $(this).data('section');
            var equiv = $(this).data('equiv');
            var priority = $(this).data('priority');
            var number = $(this).data('number');
            $('#txtEquiv').val(equiv);
            $('#txtSection').val(section);
            $('#txtPriority').val(priority);
            if(number){
                $.ajax({
                    url: "{{ url('print/store') }}/"+number+"/"+equiv,
                    type: "GET",
                    success: function(){
                        window.open("http://localhost/tdh/qs/print");
                    }
                });
            }
        });

        function print(url) {
            var printWindow = window.open( url);
            printWindow.print();
            printWindow.close();
        };

        @if($status=='added')
        $.extend($.gritter.options, {
            position: "bottom-right"
        }), $.gritter.add({
            title: "Success!",
            position: "bottom-right",
            text: "1 patient added successfully.",
            image: App.conf.assetsPath + "/" + App.conf.imgPath + "/tdh.jpg",
            class_name: "gritter-theme",
            time: ""
        });
        @endif
    </script>
@endsection