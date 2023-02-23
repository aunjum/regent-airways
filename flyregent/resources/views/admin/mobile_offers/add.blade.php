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
                        <form action="{{URL::route('admin.mobile.offer_store')}}" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Title<span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="title" required maxlength="255">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Subtitle<span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="subtitle" required maxlength="255">
                                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label  class="col-md-2 control-label pull-left" for="image">Image<span class="text-danger">[380 X 173][max 2MB] *</span></label>
                                <div class="col-md-4">
                                <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="image" placeholder="image" required>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Order<span class="text-danger">[1,2.3]</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="order" value="0">
                                    <span class="text-danger">{{ $errors->first('order') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left"></label>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{URL::route('admin.mobile.offer')}}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop