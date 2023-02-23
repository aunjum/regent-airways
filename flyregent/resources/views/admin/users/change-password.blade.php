@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="block-flat">
                        <div class="header">
                            <h3>Change Password</h3>
                        </div>

                        @if (isset($errorMessages))
                            <div class="alert alert-danger alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-times-circle"></i></div>
                                <strong>Error!</strong> {{ $errorMessages }}.
                            </div>
                        @endif
                        @if (isset($messages))
                            <div class="alert alert-success alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <strong>Success!</strong> {{ $messages }}!
                            </div>
                        @endif
                        <div class="content">
                            {{ Form::open(array('url' => '/admin/change-password', 'method' => 'post')) }}
                            <?php $userId = Session::get('userId');?>
                            <input name="userId" type="text" value="@if(isset($userId)) {{ $userId }} @endif" hidden>
                            <div class="form-group">
                                <label>New Password</label>
                                <input name="password" type="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input name="confirmPassword" type="password" class="form-control" required>
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