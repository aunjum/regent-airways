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
                        <form action="{{URL::to('/')}}/admin/fare/update" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">


                            <input type="hidden" value="{{ $data_row[0]->id }}" name="id">

                            {{--todo: sts changes--}}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Select Route</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="International" <?php if ($data_row[0]->type == 'International') echo 'selected'; ?>>International</option>
                                        <option value="Domestic" <?php if ($data_row[0]->type == 'Domestic') echo 'selected'; ?>>Domestic</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">From</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="from">
                                        <option value="DHAKA" <?php if ($data_row[0]->from == 'DHAKA') echo 'selected'; ?>>DHAKA</option>
                                        <option value="KUALA LUMPUR" <?php if ($data_row[0]->from == 'KUALA_LUMPUR') echo 'selected'; ?>>KUALA LUMPUR</option>
                                        <option value="SINGAPORE" <?php if ($data_row[0]->from == 'SINGAPORE') echo 'selected'; ?>>SINGAPORE</option>
                                        <option value="BANGKOK" <?php if ($data_row[0]->from == 'BANGKOK') echo 'selected'; ?>>BANGKOK</option>
                                        <option value="CHITTAGONG" <?php if ($data_row[0]->from == 'CHITTAGONG') echo 'selected'; ?>>CHITTAGONG</option>
                                        <option value="KOLKATA" <?php if ($data_row[0]->from == 'KOLKATA') echo 'selected'; ?>>KOLKATA</option>
                                        <option value="MUSCAT" <?php if ($data_row[0]->from == 'MUSCAT') echo 'selected'; ?>>MUSCAT</option>
                                        <option value="KATHMANDU" <?php if ($data_row[0]->from == 'KATHMADU') echo 'selected'; ?>>KATHMANDU</option>
					<option value="DOHA" <?php if ($data_row[0]->from == 'DOHA') echo 'selected'; ?>>DOHA</option>
                                        <option value="CHITTAGONG & v.v." <?php if ($data_row[0]->from == "CHITTAGONG & v.v.") echo 'selected'; ?>>CHITTAGONG & v.v.</option>
                                        <option value="COX'S BAZAAR & v.v." <?php if ($data_row[0]->from == "COX'S BAZAAR & v.v.") echo 'selected'; ?>>COX'S BAZAAR & v.v.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">From(BN)</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="from_bn">
                                        <option value="ঢাকা" <?php if ($data_row[0]->from == 'ঢাকা') echo 'selected'; ?>>ঢাকা</option>
                                        <option value="কুয়ালালামপুর" <?php if ($data_row[0]->from == 'কুয়ালালামপুর') echo 'selected'; ?>>কুয়ালালামপুর</option>
                                        <option value="সিঙ্গাপুর" <?php if ($data_row[0]->from == 'সিঙ্গাপুর') echo 'selected'; ?>>সিঙ্গাপুর</option>
                                        <option value="ব্যাংকক" <?php if ($data_row[0]->from == 'ব্যাংকক') echo 'selected'; ?>>ব্যাংকক</option>
                                        <option value="চট্টগ্রাম" <?php if ($data_row[0]->from == 'চট্টগ্রাম') echo 'selected'; ?>>চট্টগ্রাম</option>
                                        <option value="কলকাতা" <?php if ($data_row[0]->from == 'কলকাতা') echo 'selected'; ?>>কলকাতা</option>
                                        <option value="চট্টগ্রাম & v.v." <?php if ($data_row[0]->from == "চট্টগ্রাম & v.v.") echo 'selected'; ?>>চট্টগ্রাম & v.v.</option>
                                        <option value="কক্সবাজার & v.v." <?php if ($data_row[0]->from == "কক্সবাজার & v.v.") echo 'selected'; ?>>কক্সবাজার & v.v.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">To</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="to">
                                        <option value="DHAKA" <?php if ($data_row[0]->to == 'DHAKA') echo 'selected'; ?>>DHAKA</option>
                                        <option value="KUALA LUMPUR" <?php if ($data_row[0]->to == 'KUALA_LUMPUR') echo 'selected'; ?>>KUALA LUMPUR</option>
                                        <option value="SINGAPORE" <?php if ($data_row[0]->to == 'SINGAPORE') echo 'selected'; ?>>SINGAPORE</option>
                                        <option value="BANGKOK" <?php if ($data_row[0]->to == 'BANGKOK') echo 'selected'; ?>>BANGKOK</option>
                                        <option value="CHITTAGONG" <?php if ($data_row[0]->to == 'CHITTAGONG') echo 'selected'; ?>>CHITTAGONG</option>
                                        <option value="KOLKATA" <?php if ($data_row[0]->to == 'KOLKATA') echo 'selected'; ?>>KOLKATA</option>
                                        <option value="MUSCAT" <?php if ($data_row[0]->to == 'MUSCAT') echo 'selected'; ?>>MUSCAT</option>
                                        <option value="KATHMANDU" <?php if ($data_row[0]->to == 'KATHMADU') echo 'selected'; ?>>KATHMANDU</option>
                                        <option value="DOHA" <?php if ($data_row[0]->to == 'DOHA') echo 'selected'; ?>>DOHA</option>
                                        <option value="CHITTAGONG & v.v." <?php if ($data_row[0]->to == "CHITTAGONG & v.v.") echo 'selected'; ?>>CHITTAGONG & v.v.</option>
                                        <option value="COX'S BAZAAR & v.v." <?php if ($data_row[0]->to == "COX'S BAZAAR & v.v.") echo 'selected'; ?>>COX'S BAZAAR & v.v.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">To(BN)</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="to_bn">
                                        <option value="ঢাকা" <?php if ($data_row[0]->to == 'ঢাকা') echo 'selected'; ?>>ঢাকা</option>
                                        <option value="কুয়ালালামপুর" <?php if ($data_row[0]->to == 'কুয়ালালামপুর') echo 'selected'; ?>>কুয়ালালামপুর</option>
                                        <option value="সিঙ্গাপুর" <?php if ($data_row[0]->to == 'সিঙ্গাপুর') echo 'selected'; ?>>সিঙ্গাপুর</option>
                                        <option value="ব্যাংকক" <?php if ($data_row[0]->to == 'ব্যাংকক') echo 'selected'; ?>>ব্যাংকক</option>
                                        <option value="চট্টগ্রাম" <?php if ($data_row[0]->to == 'চট্টগ্রাম') echo 'selected'; ?>>চট্টগ্রাম</option>
                                        <option value="কলকাতা" <?php if ($data_row[0]->to == 'কলকাতা') echo 'selected'; ?>>কলকাতা</option>
                                        <option value="চট্টগ্রাম & v.v." <?php if ($data_row[0]->to == "চট্টগ্রাম & v.v.") echo 'selected'; ?>>চট্টগ্রাম & v.v.</option>
                                        <option value="কক্সবাজার & v.v." <?php if ($data_row[0]->to == "কক্সবাজার & v.v.") echo 'selected'; ?>>কক্সবাজার & v.v.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">One Way</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="one_way" value="<?php echo $data_row[0]->one_way; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">One Way(BN)</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="one_way_bn" value="<?php echo $data_row[0]->one_way_bn; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Return</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="return" value="<?php echo $data_row[0]->return; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Return(BN)</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="return_bn" value="<?php echo $data_row[0]->return_bn; ?>">
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
                                    <a href="{{ URL::to('/') }}/admin/fare" class="btn btn-default">Cancel</a>
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
