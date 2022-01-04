<?php
    $status = session('status');
?>
@extends('tdhlayout.app')
@section('content')
    <div class="main-content container">
        @if($status=='saved')
            <div role="alert" class="alert alert-success alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
                <div class="icon"><span class="s7-check"></span></div>
                <div class="message"><strong>Success!</strong> 1 news added.</div>
            </div>
        @elseif($status=='urlUpdated')
            <div role="alert" class="alert alert-success alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
                <div class="icon"><span class="s7-check"></span></div>
                <div class="message"><strong>Success!</strong> Server IP address successfully updated.</div>
            </div>
        @elseif($status=='updated')
            <div role="alert" class="alert alert-success alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
                <div class="icon"><span class="s7-check"></span></div>
                <div class="message"><strong>Success!</strong> News successfully updated.</div>
            </div>
        @elseif($status=='deleted')
            <div role="alert" class="alert alert-info alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
                <div class="icon"><span class="s7-info"></span></div>
                <div class="message"><strong>Success!</strong> News successfully removed.</div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                @if($info)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-divider">
                            Update News
                            <a class="btn btn-success btn-xs pull-right" style="color: #fff;" href="{{ url('settings/parameters') }}">
                                +
                            </a>

                        </div>
                        <div class="panel-body">
                            <form action="{{ url('settings/news/update') }}" method="post" data-parsley-validate="" novalidate="">
                                {{ csrf_field() }}
                                <input type="hidden" name="currentId" value="{{ $info->id }}" />
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" required name="description" placeholder="Content of news here..." style="resize: none;line-height:20px !important;" rows="7">{!! $info->content !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-block btn-primary">Update</button>
                                            <button type="button" class="btn btn-space btn-block btn-danger md-trigger btn-cancel" data-modal="modal-remove" data-link="{{ url('settings/news/delete/'.$info->id) }}">Delete</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-divider">Add News</div>
                        <div class="panel-body">
                            <form action="{{ url('settings/news/save') }}" method="post" data-parsley-validate="" novalidate="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" required name="description" placeholder="Content of news here..." style="resize: none;line-height:20px !important;" rows="7"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-block btn-primary">Add News</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">System Parameters</div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('settings/parameters/url/update') }}">
                        {{ csrf_field() }}
                        <div class="input-group mb-2">
                            <div class="input-group-prepend"><span class="input-group-text">WS Port</span></div>
                            <input type="text" placeholder="5001" name="url" class="form-control" value="{{ $url }}">

                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-check"></i> Update
                            </button>
                        </div>
                        <small class="text-muted">
                            (Example: 5001)
                        </small>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">News List</div>
                    <div class="panel-body">
                        @if(count($data) > 0)
                            <table class="table table-sm table-hover table-bordered table-striped">
                                <thead class="table-primary">
                                <tr>
                                    <th width="20%">Date Created</th>
                                    <th>Content</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>
                                        <a href="{{ url('settings/parameters/news/'.$row->id) }}">
                                            {{ date('M d, Y h:i A',strtotime($row->created_at)) }}</td>
                                        </a>
                                    <td>
                                        {!! $row->content !!}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr />
                            <div class="text-center">
                                {{--{{ $data->links() }}--}}
                            </div>
                        @else
                            <div role="alert" class="alert alert-warning alert-dismissible">
                                <div class="icon"><span class="s7-attention"></span></div>
                                <div class="message"><strong>Warning!</strong> No news yet!</div>
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
    <script src="{{ url('resources/tdh/') }}/lib/parsley/parsley.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();
            $('form').parsley();
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.livePreview();
        });

    </script>
    @include('script.cancel')
@endsection