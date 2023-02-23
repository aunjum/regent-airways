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
                        <form action="{{URL::to('/')}}/admin/display/update" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">

                            {{--todo: sts changes--}}
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $data_row[0]->id }}" name="id">

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Flight No</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="flight_no" value="<?php echo $data_row[0]->flight_no; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">From</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="flight_from" value="<?php echo $data_row[0]->flight_from; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">To</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="flight_to" value="<?php echo $data_row[0]->flight_to; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Time</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="time" value="<?php echo $data_row[0]->time; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Status</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="flight_status" value="<?php echo $data_row[0]->flight_status; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Set Order</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="sort" value="<?php echo $data_row[0]->sort; ?>"> <span class="required">e.g 1, 2, 3</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left"></label>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ URL::to('/') }}/admin/display" class="btn btn-default">Cancel</a>
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