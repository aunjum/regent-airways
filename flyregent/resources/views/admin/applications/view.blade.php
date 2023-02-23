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
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="content">
                            <form action="#" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">


                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">First Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->first_name; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Last Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->last_name; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Email</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->email; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Contact No</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->phone; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Keywords</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->keywords; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Notes</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->notes; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Resume</label>
                                <div class="col-md-4">
                                    <a href="{{ Helper::getImageBaseUrl() }}/public/upload/resume/{{$data_row[0]->resume}}" target="_blank">{{$data_row[0]->resume}}</a>
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