@extends('admin.layout.master-layout')
@section('content')
<style>
    .form-group .col-md-4{
        margin-top: 7px;
    }

</style>
<div class="container-fluid" id="pcont">
    <div class="cl-mcont">
        <div class="row">
            <div class="col-md-12">
                <div class="block-flat">
                    <div class="header">
                        <h3 class="pull-left">{{ $title }}</h3>
                        <a class="btn btn-success pull-right" href="{{ URL::to('/') }}/admin/chat">Back</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content">



                        <form action="{{URL::to('/')}}/admin/chat/reply" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                            {{--todo: sts changes--}}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->name; ?>
                                    <input type="hidden" name="name" value="<?php echo $data_row[0]->name; ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Email</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->email; ?>
                                    <input type="hidden" name="email" value="<?php echo $data_row[0]->email; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Contact No</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->contact; ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Message</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->message; ?>
                                </div>
                            </div>

                            
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Message*</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                    </div>
                                </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left"></label>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Reply</button>
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