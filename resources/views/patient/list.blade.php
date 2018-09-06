<?php
    $status = session('status');
?>
@extends('tdhlayout.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ url('resources/tdh/') }}/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
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
                    @if(count($data) > 0)
                        <hr />
                        <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="table-primary">
                            <tr>
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
                                    @if($row->priority==1)
                                        <i class="fa fa-wheelchair"></i>
                                    @endif
                                    {{ $row->lname }}, {{ $row->fname }}
                                </td>
                                <td>{{ date('M d, Y',strtotime($row->dob)) }}</td>
                                <td class="text-center">{{ $row->num }}</td>
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
    <div class="modal fade" id="updateInfo" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST" action="{{ url('settings/access/update') }}" class="form-horizontal">
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-sm btn-success">
                            <i class="fa fa-check"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('resources/tdh/') }}/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();
            App.formElements();
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.livePreview();
        });

    </script>
@endsection