@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-white rounded">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <div class="icon"><i class="fa fa-times-circle"></i></div>
                                    <strong>Error!</strong> {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <div class="header">
                            <h3>Add New Role</h3>
                        </div>
                        <div class="content">
                            {{ Form::open(array('url' => '/admin/add-roles', 'method' => 'post' , 'class' => 'form-horizontal group-border-dashed')) }}
                            {{--todo: sts changes--}}
                            {{ csrf_field() }}
                                <div class="form-group ">
                                    <label>Role Name</label>
                                    <input type="text" name="roleName" parsley-trigger="change" required placeholder="Role name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Privileges</label>
                                    <div>
                                        @foreach($privileges as $privilegesValues)
                                            <div class="radio-inline">
                                                <label> <input type="checkbox" name="privileges[]" class="icheck" value="{{ $privilegesValues->id }}"> {{ $privilegesValues->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
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