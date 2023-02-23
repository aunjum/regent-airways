@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">

                        <div class="header">
                            <h3>Edit Role</h3>
                        </div>
                        <div class="content">
                            {{ Form::open(array('url' => '/admin/edit-roles', 'method' => 'post' , 'class' => 'form-horizontal group-border-dashed')) }}
                            {{--todo: sts changes--}}
                            {{ csrf_field() }}
                                <input type="text" name="roleId" value="@if(isset($roleData)) {{  $roleData[0]->id }}@endif" hidden>
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="roleName" parsley-trigger="change" required placeholder="Role name" class="form-control" value="@if(isset($roleData)) {{  $roleData[0]->name }}@endif">
                                </div>
                                <div class="form-group">
                                    <label>Privileges</label>
                                    <div>
                                        @foreach($privileges as $privilegesValues)
                                            <div class="radio-inline">
                                                <label> <input type="checkbox" name="privileges[]" class="icheck" value="{{ $privilegesValues->id }}" @if(in_array($privilegesValues->id, $assign_priv)) {{'checked'}} @endif>{{ $privilegesValues->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Update</button>
                                <a href="{{ URL::to('/') }}/admin/create-role-form" class="btn btn-danger">Cancel</a>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop