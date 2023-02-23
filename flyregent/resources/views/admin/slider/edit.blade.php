@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="content">
                            @if (isset($messages))
                                <div class="alert alert-success alert-white rounded">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <div class="icon"><i class="fa fa-check"></i></div>
                                    <strong>Success!</strong> {{ $messages }}!
                                </div>
                            @endif
                            <form action="{{URL::to('/')}}/admin/slider/update" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">

                                {{--todo: sts changes--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $data_row[0]->id }}" name="id">
                                <input type="hidden" value="{{ $data_row[0]->image }}" name="old_image">
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image</label>
                                    <div class="col-md-9">
                                        <?php if($data_row[0]->image){ ?>

                                            <img src="{{Helper::getImageBaseUrl()}}/public/upload/slider/{{$data_row[0]->image}}" class="slider_image mb" alt="" />

                                        <?php } ?>

                                        <div class="clearfix"></div>
                                        <input type="file" name="image">
                                        <span class="required text-danger">Optimal Image Size: 1600px X 580px</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Set Order</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="sort" value="{{$data_row[0]->sort}}"> <span class="required">e.g 1, 2, 3</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left"></label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ URL::to('/') }}/admin/slider" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop