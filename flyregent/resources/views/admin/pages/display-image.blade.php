@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                                                        <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/add-page/display_image">Add New</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Image</th>
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

                                                <td class="center">
                                                    <a href="{{ URL::to('/') }}/admin/edit-pages/{{ $data[$i][0] }}/display_image" title='View/Edit'><i class="fa fa-edit"></i></a>
                                                    <a href="{{ URL::to('/') }}/admin/page/delete/{{ $data[$i][0] }}/display_image" title='Delete' onclick="return confirm('are you sure you want to delete this image')"><i class="fa fa-trash-o"></i></a>
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