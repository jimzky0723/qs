<?php
    $status = session('status');
?>
@extends('tdhlayout.app')
@section('content')
    <style>
        .names  {
            text-transform: uppercase
        }
    </style>
    <div class="main-content container">
        @if($status=='save')
        <div role="alert" class="alert alert-success alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-check"></span></div>
            <div class="message"><strong>Success!</strong> 1 user added successfully.</div>
        </div>
        @elseif($status=='deleted')
        <div role="alert" class="alert alert-success alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-check"></span></div>
            <div class="message"><strong>Success!</strong> 1 user deleted successfully.</div>
        </div>
        @elseif($status=='duplicate')
        <div role="alert" class="alert alert-danger alert-dismissible">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="s7-close"></span></button>
            <div class="icon"><span class="s7-close"></span></div>
            <div class="message"><strong>Duplicate username!</strong>  Please use different username.</div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                @if($info)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-divider">
                            Update User
                            <a class="btn btn-success btn-xs pull-right" style="color: #fff;" href="{{ url('settings/user') }}">
                                +
                            </a>
                        </div>
                        <div class="panel-body">
                            <form action="{{ url('settings/user/update') }}" method="post" data-parsley-validate="" novalidate="">
                                {{ csrf_field() }}
                                <input type="hidden" name="currentId" value="{{ $info->id }}" />
                                <div class="form-group">
                                    <label>Profession</label>
                                    <select class="form-control custom-select" name="profession">
                                        <option value="nurse" {{ ($info->profession=='nurse') ? 'selected':'' }}>Nurse</option>
                                        <option value="doctor" {{ ($info->profession=='doctor') ? 'selected':'' }}>Doctor</option>
                                        <option value="staff" {{ ($info->profession=='staff') ? 'selected':'' }}>Staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="fname" placeholder="First Name" value="{{ $info->fname }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lname" placeholder="Last Name" value="{{ $info->lname }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Access Level</label>
                                    <select class="form-control custom-select" name="access">
                                        <option value="standard" {{ ($info->access=='standard') ? 'selected':'' }}>Standard</option>
                                        <option value="admin"{{ ($info->access=='admin') ? 'selected':'' }}>Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" placeholder="Username" value="{{ $info->username }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Unchanged">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control custom-select" name="status">
                                        <option value="1" {{ ($info->status=='1') ? 'selected':'' }}>Active</option>
                                        <option value="0" {{ ($info->status=='0') ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-block btn-primary">Update</button>
                                            <button type="button" class="btn btn-space btn-block btn-danger md-trigger btn-cancel" data-modal="modal-remove" data-link="{{ url('settings/user/delete/'.$info->id) }}">Delete</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-divider">Add User</div>
                        <div class="panel-body">
                            <form action="{{ url('settings/user/save') }}" method="post" data-parsley-validate="" novalidate="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Profession</label>
                                    <select class="form-control custom-select" name="profession">
                                        <option value="nurse">Nurse</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Profession</label>
                                    <select class="form-control custom-select" name="access">
                                        <option value="standard">Standard</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control custom-select" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-block btn-primary">Save</button>
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
                    <div class="panel-heading">User List
                        <div class="tools">
                            <form method="POST" action="{{ url('settings/user') }}">
                                {{ csrf_field() }}
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="keyword" placeholder="enter keyword . . ." value="{{ \Illuminate\Support\Facades\Session::get('userKeyword') }}">
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
                                <th>Username</th>
                                <th class="number">Profession</th>
                                <th class="number">First Name</th>
                                <th class="number">Last Name</th>
                                <th class="number">Access</th>
                                <th class="number">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>
                                        <a href="{{ url('settings/user/update/' . $row->id) }}">
                                            <span class="s7-note"></span> {{ $row->username }}
                                        </a>
                                    </td>
                                    <td class="number names">{{ $row->profession }}</td>
                                    <td class="number names">{{ $row->fname }}</td>
                                    <td class="number names">{{ $row->lname }}</td>
                                    <td class="number names">{{ $row->access }}</td>
                                    <td class="number">
                                        <font class="{{ ($row->status==1) ? 'text-success' : 'text-danger' }}">
                                            {{ ($row->status==1) ? 'Active' : 'Inactive' }}
                                        </font>
                                    </td>
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
    </div>
@endsection

@section('modal')
    @include('modal')
@endsection

@section('script')
    @include('script.cancel')
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
@endsection