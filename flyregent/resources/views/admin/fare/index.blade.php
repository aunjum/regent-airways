@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/fare/add">Add New</a>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>One Way</th>
                                        <th>Return</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i< count($data); $i++)
                                            <tr class="odd gradeX">
                                                <td>{{$data[$i][1]}}</td>
                                                <td>{{$data[$i][3]}}</td>
                                                <td>{{$data[$i][4]}}</td>
                                                <td>{{$data[$i][5]}}</td>
                                                <td>{{$data[$i][6]}}</td>

                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/fare/edit/{{ $data[$i][0] }}" title='View/Edit'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/fare/delete/{{ $data[$i][0] }}" title='Delete Fare' onclick="return confirm('are you sure you want to delete this fare')"><i class="fa fa-trash-o"></i></a>
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