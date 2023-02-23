@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="block-flat">
                        <div class="header">
                            <h3>User Form</h3>
                        </div>
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-white rounded">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <div class="icon"><i class="fa fa-times-circle"></i></div>
                                    <strong>Error!</strong> {{ $error }}.
                                </div>
                            @endforeach
                        @endif
                        <div class="content">
                            {{ Form::open(array('url' => '/admin/add-users', 'method' => 'post')) }}
                            {{--todo: sts changes--}}
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="userName" parsley-trigger="change" required placeholder="Enter user name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" parsley-trigger="change" required placeholder="Enter email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" placeholder="Password" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input name="confirmPassword" type="password" required placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                        <option selected disabled>Select Role</option>
                                        @if(isset($usersRoles))
                                            @foreach($usersRoles as $usersRolesValues)
                                                <option value="{{ $usersRolesValues->id }}">{{ $usersRolesValues->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactived</option>
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-danger" type="reset">Reset</button>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop