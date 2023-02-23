@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
<!--                            <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/add-page/news">Add New</a>
                            -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th width="80%">Description</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i< count($data); $i++)
                                            <tr class="odd gradeX">
                                                <td>{!! $data[$i][2] !!}</td>
                                                <td>
                                                    @if($data[$i][3] == 1)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/edit-pages/{{ $data[$i][0] }}/news" title='View/Edit'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/news-show-hide/{{ $data[$i][0] }}/@if($data[$i][3] == 1) 0 @else 1 @endif" title='@if($data[$i][3] == 1) Inactive @else Active @endif'><i class="fa @if($data[$i][3] == 1) fa-eye-slash @else fa-eye @endif"></i></a>
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