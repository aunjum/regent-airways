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
                        <form action="{{URL::to('/')}}/admin/charge/update" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">


                            <input type="hidden" value="{{ $data_row[0]->id }}" name="id">



                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Select Type</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="Reissue" <?php if ($data_row[0]->type == 'Reissue') echo 'selected'; ?>>Reissue</option>
                                        <option value="Refund" <?php if ($data_row[0]->type == 'Refund') echo 'selected'; ?>>Refund</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Conditions</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="conditions" value="<?php echo $data_row[0]->conditions; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Y Class</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="y_class" value="<?php echo $data_row[0]->y_class; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">B Class</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="b_class" value="<?php echo $data_row[0]->b_class; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">M Class</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="m_class" value="<?php echo $data_row[0]->m_class; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">L Class</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="l_class" value="<?php echo $data_row[0]->l_class; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">K Class</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="k_class" value="<?php echo $data_row[0]->k_class; ?>">
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
                                    <a href="{{ URL::to('/') }}/admin/charge" class="btn btn-default">Cancel</a>
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