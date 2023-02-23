@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/display/add">Add New</a>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Flight No</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i< count($data); $i++)
                                            <tr class="odd gradeX">
                                                <td>{{$data[$i][1]}}</td>
                                                <td>{{$data[$i][2]}}</td>
                                                <td>{{$data[$i][3]}}</td>
                                                <td>{{$data[$i][4]}}</td>
                                                <td>{{$data[$i][5]}}</td>
                                                <td>{{$data[$i][6]}}</td>

                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/display/edit/{{ $data[$i][0] }}" title='View/Edit'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/display/delete/{{ $data[$i][0] }}" title='Delete' onclick="return confirm('are you sure you want to delete this display')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endfor
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