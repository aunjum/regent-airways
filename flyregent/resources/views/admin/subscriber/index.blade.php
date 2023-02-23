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
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Country</th>
                                        <th>Submission Time</th>
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
                                                <td>{{date("d/m/Y H:i:s a", strtotime($data[$i][6]))}}</td>

                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/subscriber/delete/{{ $data[$i][0] }}" title='Delete Subscriber' onclick="return confirm('are you sure you want to delete this subscriber')"><i class="fa fa-trash-o"></i></a>
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