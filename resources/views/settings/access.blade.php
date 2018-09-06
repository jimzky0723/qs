<?php
$status = session('status');
$section = array(
    'registration',
    'card',
    'vital',
    'pedia',
    'im',
    'surgery',
    'ob',
    'dental',
    'bite'
);

?>
@extends('tdhlayout.app')
@section('content')
    <div class="main-content container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">User Priviledges
                    <div class="tools">
                        <form method="POST" action="{{ url('settings/access') }}">
                            {{ csrf_field() }}
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="keyword" placeholder="enter keyword . . ." value="{{ \Illuminate\Support\Facades\Session::get('accessKeyword') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><span class="s7-search"></span> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    @if(count($data) > 0)
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="table-primary">
                            <tr>
                                <th>Complete Name</th>
                                <th class="text-center">Registration</th>
                                <th class="text-center">Card<br />Issuance</th>
                                <th class="text-center">Vital<br />Signs</th>
                                <th class="text-center">Pedia</th>
                                <th class="text-center">IM</th>
                                <th class="text-center">Surgery</th>
                                <th class="text-center">OB</th>
                                <th class="text-center">Dental</th>
                                <th class="text-center">Animal<br />Bite</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <?php
                                $access = \App\Http\Controllers\AdminCtrl::getAccess($row->id);
                                ?>
                                <tr>
                                    <td>
                                        <a href="#updateInfo" data-toggle="modal" data-id="{{ $row->id }}">
                                            <i class="fa fa-edit"></i>
                                            {{ $row->lname }}, {{ $row->fname }}
                                        </a>
                                    </td>
                                    @foreach($section as $row)
                                        <td class="text-center">
                                            @if($access->$row)
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                                <i class="fa fa-times text-danger"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr />
                        <div class="text-center">
                            {{ $data->links() }}
                        </div>
                    @else
                        <div role="alert" class="alert alert-warning alert-dismissible">
                            <div class="icon"><span class="s7-attention"></span></div>
                            <div class="message"><strong>Warning!</strong> No user found.</div>
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
                        <h3 class="title-header">
                            Access Level
                        </h3>
                        <br />
                        {{ csrf_field() }}
                        <input type="hidden" name="userId" id="userId" value="" />
                        <table class="table table-bordered table-access switchArea">
                            <tr>
                                <td>Loading...</td>
                            </tr>
                        </table>
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
        $('a[href="#updateInfo"]').on('click',function(){
            var id = $(this).data('id');
            $('#userId').val(id);
            var content = '';
                    @foreach($section as $row)
            var equiv = "{{ \App\Http\Controllers\AbbrCtrl::equiv($row) }}";
            var section = "{{ $row }}";

            content += '<tr>\n' +
                '<td class="text-right bg-dark" style="color:#fff;">'+equiv+'</td>\n' +
                '<td class="text-center">\n' +
                '     <label class="switch switch-text switch-primary" id="'+section+'">\n' +
                '        <input type="checkbox" class="switch-input" checked="true" name="{{ $row }}">\n' +
                '       <span data-on="On" data-off="Off" class="switch-label"></span>\n' +
                '        <span class="switch-handle"></span>\n' +
                '    </label>\n' +
                '    </td>\n' +
                ' </tr>';
            @endforeach
            $('.switchArea').html(content);

            $.get(
                "{{ url('settings/access/get') }}/"+id,
                function (data){
                    var content = '';
                    @foreach($section as $row)
                        var val = data{{ '.'.$row }};
                        var equiv = "{{ \App\Http\Controllers\AbbrCtrl::equiv($row) }}";
                        var stats = $('checkbox[name="{{ $row }}"]');

                    content += '<tr>' +
                        '<td class="text-right bg-dark" style="color:#fff;">'+equiv+'</td>' +
                        '<td class="text-center">' +
                        '<div class="switch-button switch-button-yesno">';
                    if(val==0){
                        content += '<input type="checkbox" name="{{ $row }}" id="{{ $row }}">';
                    }else{
                        content += '<input type="checkbox" checked name="{{ $row }}" id="{{ $row }}">'
                    }
                    content += '<span><label for="{{ $row }}"></label></span>\n' +
                        '    </div>' +
                        '</td>' +
                        '</tr>';

                    @endforeach

                    $('.switchArea').html(content);
                }
            );
        });
    </script>
@endsection