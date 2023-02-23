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
                            <form action="{{URL::to('/')}}/admin/update-pages" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">

                                <input type="hidden" value="{{ $type }}" name="type">
                                {{--todo: sts changes--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="@if(isset($data_row[0]->id)){{ $data_row[0]->id }}@endif" name="id">
                                <input type="hidden" value="@if(isset($data_row[0]->image)){{ $data_row[0]->image }}@endif" name="old_image">
                                <input type="hidden" value="@if(isset($data_row[0]->image_bn)){{ $data_row[0]->image_bn }}@endif" name="old_image_bn">
                                
                                <?php if ($type == 'address') { ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label pull-left">Select Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="country">
                                                <option value="Bangladesh" <?php if(isset($data_row[0]) && $data_row[0]->country == 'Bangladesh') echo 'selected';?>>Bangladesh</option>
                                                <option value="International" <?php if(isset($data_row[0]) && $data_row[0]->country == 'International') echo 'selected';?>>International</option>
                                            </select>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php if ($type == 'destination') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Select Type</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="country">
                                            <option value="Bangladesh" <?php if(isset($data_row[0]) && $data_row[0]->country == 'Bangladesh') echo 'selected';?>>Domestic</option>
                                            <option value="International" <?php if(isset($data_row[0]) && $data_row[0]->country == 'International') echo 'selected';?>>International</option>
                                        </select>
                                    </div>
                                </div>

                                <?php } ?>
                                
                                <?php if ($type == 'offers') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Amount</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="field1" value="{{ $data_row[0]->field1 }}">
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <?php if ($type == 'press') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Date*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" name="field1" value="{{ $data_row[0]->field1 }}">
                                    </div>
                                </div>
                                <?php } ?>
                                
                                
                                <?php if(($type != 'news') && ($type != 'popup') && ($type != 'display_image') && ($type != 'display_scroll')){ ?>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Title*</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="test" value="{{ $data_row[0]->title }}" name="title">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Title(BN)*</label>
                                    <div class="col-md-9">
                                        {{--todo: sts changes--}}

                                        <input class="form-control" type="test" value="@if(isset($data_row[0]->title_bn)){{ $data_row[0]->title_bn }}@endif" name="title_bn">
                                    </div>
                                </div>

                                
                                <?php } ?>
                                
                                <?php if ($type == 'packages') { ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label pull-left">Select Country</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="country">
                                                <option value="Bangkok" <?php if($data_row[0]->country == 'Bangkok') echo 'selected';?>>Bangkok</option>
                                                <option value="Kuala Lumpur" <?php if($data_row[0]->country == 'Kuala Lumpur') echo 'selected';?>>Kuala Lumpur</option>
                                                <option value="Singapore" <?php if($data_row[0]->country == 'Singapore') echo 'selected';?>>Singapore</option>
                                                <option value="Kolkata" <?php if($data_row[0]->country == 'Kolkata') echo 'selected';?>>Kolkata</option>
                                                <option value="cox" <?php if($data_row[0]->country == 'cox') echo 'selected';?>>Cox's Bazar</option>
                                            	<option value="Kathmandu" <?php if($data_row[0]->country == 'Kathmandu') echo 'selected';?>>Kathmandu</option>
                                            	<option value="Muscat" <?php if($data_row[0]->country == 'Muscat') echo 'selected';?>>Muscat</option>
					    </select>
                                        </div>
                                    </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Short Description</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc" value="{{ $data_row[0]->short_desc }}">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Short Description(BN)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc_bn" value="{{ $data_row[0]->short_desc_bn }}">
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
                                <?php if ($type == 'address') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="short_desc" value="{{ $data_row[0]->short_desc }}">
                                    </div>
                                </div>
                                
                                <?php } ?>
                                <?php if ($type == 'address') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Logitude and Latitude</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="l_n_l" value="{{ $data_row[0]->longitude_latitude }}">
                                    </div>
                                </div>

                                <?php } ?>
                                
                                <?php if (($type != 'popup') && ($type != 'display_image')) { ?>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Description*</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="description">{{ $data_row[0]->description }}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Description(BN)*</label>
                                    <div class="col-md-9">
                                        {{--todo: sts changes--}}

                                        <textarea class="ckeditor form-control" name="description_bn">@if(isset($data_row[0]->description_bn)){{ $data_row[0]->description_bn }}@endif</textarea>
                                    </div>
                                </div>
                                
                                
                                <?php } ?>
                                
                                
                                <?php if(($type != 'news') && ($type != 'baggage') && ($type != 'tc') && ($type != 'instructions') && ($type != 'fair') && ($type != 'display_scroll') && ($data_row[0]->id != 16)){ ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image</label>
                                    <div class="col-md-9">
                                        <?php if($data_row[0]->image){ ?>
                                        <div class="mb">
                                            <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$data_row[0]->image}}" class="medium_image" alt="" />
                                        </div>
                                        <?php } ?>

                                        <div class="clearfix"></div>
                                        <input type="file" name="image">
                                        <span class="required text-danger">
                                            <?php if ($type == 'packages') { ?> Optimal Image Size: 216px X 146px <?php } ?>
                                            <?php if ($type == 'offers') { ?> Optimal Image Size: 370px X 140px <?php } ?>
                                            <?php if ($type == 'popup') { ?> Optimal Image Size: 580px X 370px <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Image(BN)</label>
                                    <div class="col-md-9">
                                        {{--todo: sts changes --}}
                                        <?php if(isset($data_row[0]->image_bn) && $data_row[0]->image_bn ){ ?>
                                        <div class="mb">
                                            <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$data_row[0]->image_bn}}" class="medium_image" alt="" />
                                        </div>
                                        <?php } ?>

                                        <div class="clearfix"></div>
                                        <input type="file" name="image_bn">
                                        <span class="required text-danger">
                                            <?php if ($type == 'packages') { ?> Optimal Image Size: 216px X 146px <?php } ?>
                                            <?php if ($type == 'offers') { ?> Optimal Image Size: 370px X 140px <?php } ?>
                                            <?php if ($type == 'popup') { ?> Optimal Image Size: 580px X 370px <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
                                <?php if ($type != 'display_scroll') { ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Set Order</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="sort" value="{{$data_row[0]->sort}}"> <span class="required">e.g 1, 2, 3</span>
                                    </div>
                                </div>
                                <?php } ?>
                                
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
