@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/slider/add">Add New</a>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i< count($data); $i++)
                                            <tr class="odd gradeX">
                                                <td>{{$data[$i][1]}}</td>
                                                <td>{{$data[$i][2]}}</td>
                                                <td>{{$data[$i][3]}}</td>
                                                <td>
                                                    <?php if($data[$i][4]){ ?>
  
                                                        <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$data[$i][4]}}" class="logo" alt="" />

                                                    <?php } ?>
                                                </td>

                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/company/edit/{{ $data[$i][0] }}" title='View/Edit'><i class="fa fa-edit"></i></a>
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