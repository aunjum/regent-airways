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
                            <form action="{{URL::to('/')}}/admin/flight/add" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                                {{--todo: sts changes--}}
                                {{ csrf_field() }}

                                <div class="form-group">
                                     <label class="col-md-2 control-label pull-left">Select Route</label>
                                     <div class="col-md-4">
                                         <select class="form-control" name="route_id">
                                             <?php
                                             foreach ($data_temp as $value) {
                                             ?>
                                             <option value="<?php echo $value->id;?>"><?php echo $value->name;?>(<?php echo $value->type;?>)</option>
                                             <?php
                                             }
                                             ?>
                                         </select>
                                     </div>
                                 </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Flight</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="flight">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Via</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="via" value="DIRECT">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Flight(BN)</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="flight_bn">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Day</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="day">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Day(BN)</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="day_bn">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Departure Time</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="dep_time">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Departure Time(BN)</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="dep_time_bn">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Arrival Time</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="arr_time">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Arrival Time(BN)</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="arr_time_bn">
                                    </div>
                                </div>
                                
				<div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Flight Status</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="flight_status"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Set Order</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="sort"> <span class="required">e.g 1, 2, 3</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left"></label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ URL::to('/') }}/admin/flight" class="btn btn-default">Cancel</a>
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
