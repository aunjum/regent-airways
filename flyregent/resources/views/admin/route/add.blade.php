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
                            <form action="{{URL::to('/')}}/admin/route/add" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                                {{--todo: sts changes--}}
                                {{ csrf_field() }}
                                <div class="form-group">
                                     <label class="col-md-2 control-label pull-left">Select Type</label>
                                     <div class="col-md-4">
                                         <select class="form-control" name="type">
                                             <option value="International">International</option>
                                             <option value="Domestic">Domestic</option>
                                         </select>
                                     </div>
                                 </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Route Name*</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Route Name(BN)*</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name_bn" required>
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
                                        <a href="{{ URL::to('/') }}/admin/route" class="btn btn-default">Cancel</a>
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