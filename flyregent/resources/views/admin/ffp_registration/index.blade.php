@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            @if (Session::has('message'))
                            <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($data){
                                            foreach ($data as $value) {
                                        ?>
                                            <tr class="odd gradeX">
                                                <td>{{$value->first_name}} {{$value->middle_name}} {{$value->sure_name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->contact}}</td>
                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/ffp-registration/view/{{$value->id}}" title='View'><i class="fa fa-eye"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/ffp-registration/delete/{{$value->id}}" title='Delete' onclick="return confirm('are you sure you want to delete this registration')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php } } ?>
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