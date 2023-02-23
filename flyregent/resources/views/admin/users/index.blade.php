@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">Users List</h3>
                            <a href="{{ URL::to('/') }}/admin/add-users-form" class="btn btn-success pull-right">Add New User</a>
                        <div class="clearfix"></div>
                        </div>
                        
                        <div class="clearfix"></div>
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
                            <div class="table-responsive">
                                <table class="table table-bordered" id="userDatatable" >
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usersList as $usersListValue)
                                            <tr class="odd gradeX">
                                                <td>{{ $usersListValue->user_name }}</td>
                                                <td>{{ $usersListValue->user_email }}</td>
                                                <td>{{ $usersListValue->name }}</td>
                                                <td>
                                                    @if($usersListValue->status == 1)
                                                        {{ "Active" }}
                                                    @else
                                                        {{ "Deactived" }}
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($usersListValue->created_at)) }}</td>
                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/edit-users-form/{{ $usersListValue->user_id }}" title='Edit user'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/delete-user/{{ $usersListValue->user_id }}" title='Delete user' onclick="return confirm('are you sure you want to delete this user')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop