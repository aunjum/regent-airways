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
                            <form action="{{URL::to('/')}}/admin/add-page" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">

                                <input type="hidden" value="{{ $type }}" name="type">
                                {{--todo: sts changes--}}
                                {{ csrf_field() }}
                                <?php if ($type == 'address') { ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label pull-left">Select Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="country">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="International">International</option>
                                            </select>
                                        </div>
                                    </div>

                                <?php } ?>
                                <?php if ($type == 'destination') { ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label pull-left">Select Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="country">
                                                <option value="Bangladesh">Domestic</option>
                                                <option value="International">International</option>
                                            </select>
                                        </div>
                                    </div>

                                <?php } ?>
                                
                                
                                <?php if ($type == 'offers') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Amount</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="field1">
                                    </div>
                                </div>
                                <?php } ?>
                                
                                
                                <?php if (($type != 'popup') && ($type != 'display_image')) { ?>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Title*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="title">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Title(BN)*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="title_bn">
                                    </div>
                                </div>


                                <?php } ?>
                                
                                <?php if ($type == 'press') { ?>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Date*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" name="field1">
                                    </div>
                                </div>
                                <?php } ?>

                                
                                <?php if ($type == 'packages') { ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label pull-left">Select Country</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="country">
                                                <option value="Bangkok">Bangkok</option>
                                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="cox">Cox's Bazar</option>
                                                <option value="Saint Martin">Kathmandu</option>
                                                <option value="Muscat">Oman</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Short Description</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Short Description(BN)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc_bn">
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
                                <?php if ($type == 'address') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc">
                                    </div>
                                </div>
                                
                                <?php } ?>
                                <?php if ($type == 'address') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Longitude & Latitude</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="l_n_l" placeholder="Example : 23.26,25.36 (Longitude,Latitude)">
                                    </div>
                                </div>

                                <?php } ?>
                                
                                
                                <?php if ($type != 'display_image') { ?>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Description*</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Description(BN)*</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="description_bn"></textarea>
                                    </div>
                                </div>

                                
                                <?php } ?>
                                
                                <?php if(($type != 'news') && ($type != 'baggage') && ($type != 'tc') && ($type != 'instructions') && ($type != 'fair') && ($type != 'display_scroll')){ ?>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image"> 
                                        <span class="required text-danger">
                                            <?php if ($type == 'packages') { ?> Optimal Image Size: 216px X 146px <?php } ?>
                                            <?php if ($type == 'offers') { ?> Optimal Image Size: 370px X 140px <?php } ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image(BN)</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image_bn"> 
                                        <span class="required text-danger">
                                            <?php if ($type == 'packages') { ?> Optimal Image Size: 216px X 146px <?php } ?>
                                            <?php if ($type == 'offers') { ?> Optimal Image Size: 370px X 140px <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
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
                                        <a href="{{ URL::to('/') }}/admin/{{ $type }}" class="btn btn-default">Cancel</a>
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
