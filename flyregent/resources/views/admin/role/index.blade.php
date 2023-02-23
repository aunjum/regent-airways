@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        @if (isset($errorMessages))
                            <div class="alert alert-danger alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-times-circle"></i></div>
                                <strong>Error!</strong> {{ $errorMessages }}
                            </div>
                        @endif
                        @if (isset($messages))
                            <div class="alert alert-success alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <strong>Success!</strong> {{ $messages }}
                            </div>
                        @endif
                        <div class="header">
                            <h3 class="pull-left">Role List</h3>
                        <a href="{{ URL::to('/') }}/admin/add-roles-form" class="btn btn-success pull-right">Add New Role</a>
                        <div class="clearfix"></div>
                        </div>


                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="roleDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Roles</th>
                                        <th>Create Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $rolesValue)
                                            <tr class="odd gradeX">
                                                <td>{{ $rolesValue->name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rolesValue->created_at)) }}</td>
                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/edit-roles-form/{{ $rolesValue->id }}" title='Edit role'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/delete-roles/{{ $rolesValue->id }}" title='Delete role' onclick="return confirm('are you sure you want to delete this user')"><i class="fa fa-trash-o"></i></a>
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