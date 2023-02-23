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
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i< count($data); $i++)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <?php if($data[$i][1]){ ?>
  
                                                        <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$data[$i][1]}}" class="slider_image" alt="" />

                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    @if($data[$i][2] == 1)
                                                        Active
                                                        @else
                                                        Inactive
                                                        @endif
                                                </td>

                                                <td class="center">
                                                    @if($data[$i][2] == 1)
                                                    <a href="{{ URL::to('/') }}/admin/edit-pages/{{ $data[$i][0] }}/popup" title='View/Edit'><i class="fa fa-edit"></i></a>
                                                    @else
                                                        <a href="#" title='Before edit active this popup first!'><i class="fa fa-edit"></i></a>

                                                    @endif
                                                    <a href="{{ URL::to('/') }}/admin/popup-show-hide/{{ $data[$i][0] }}/@if($data[$i][2] == 1) 0 @else 1 @endif" title='@if($data[$i][2] == 1) Inactive @else Active @endif'><i class="fa @if($data[$i][2] == 1) fa-eye-slash @else fa-eye @endif"></i></a>
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