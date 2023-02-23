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
                            <form action="{{URL::to('/')}}/admin/company/update" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                                {{--todo: sts changes--}}
                                {{ csrf_field() }}

                                <input type="hidden" value="{{ $data_row[0]->id }}" name="id">
                                <input type="hidden" value="{{ $data_row[0]->image }}" name="old_image">
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Name*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="test" value="{{ $data_row[0]->name }}" name="name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Email*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="test" value="{{ $data_row[0]->email }}" name="email">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Phone*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="test" value="{{ $data_row[0]->phone }}" name="phone">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Logo</label>
                                    <div class="col-md-9">
                                        <?php if($data_row[0]->image){ ?>

                                            <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$data_row[0]->image}}" class="slider_image" alt="" />

                                        <?php } ?>

                                        <div class="clearfix"></div>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left"></label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ URL::to('/') }}/admin/company" class="btn btn-default">Cancel</a>
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