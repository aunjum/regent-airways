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
                                <label class="col-md-2 control-label pull-left">Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->name; ?>
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
                                <label class="col-md-2 control-label pull-left">Suggestions</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->comments; ?>
                                </div>
                            </div>

                        
                            <h4>Ticket Purchase</h4>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Efficiency of counter staff</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->counter_eff);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Information received from the counter staff</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->info_counter_staff);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Time spent for purchasing the ticket</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->time_pur_tick);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Overall satisfaction with our counter services</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->counter_satis);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Efficiency of the check-in staff</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->eff_chk_staff);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Time spent for check-in</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->time_chk_in);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Baggage handling</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->bag_hand);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Your overall satisfaction with our airport Service</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->air_svc_satis);
                                    ?>
                                </div>
                            </div>

                            <h4>In-Flight Service</h4>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Flight attendant's service before take-off</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->fl_att_ser);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Efficiency of the flight attendants</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->eff_fl_att);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Appearance of the flight attendants</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->app_fl_att);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Selection of newspapers and magazines</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->sel_nesws_mag);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Flight attendant's announcements(Clarity)</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->fl_att_ann_cl);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Flight attendant's announcements(Content)</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->fl_att_ann_con);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Cockpit crew announcements(Clarity)</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->cok_ann_cl);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Cockpit crew announcements(Content)</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->cok_ann_con);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Your overall satisfaction with our in-flight service</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->in_fl_ser_sat);
                                    ?>
                                </div>
                            </div>

                            <h4>Snacks</h4>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Quality of the snacks</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->snck_qua);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Quantity of the snacks</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->snck_quan);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Presentation of the snacks</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->snck_pre);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Your overall satisfaction with our snacks</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->snck_sat);
                                    ?>
                                </div>
                            </div>
                            
                            <h4>Aircraft Interior</h4>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Seating comfort</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->seat_com);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Temperature in the cabin</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->cab_temp);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Cleanliness of the cabin</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->cab_clean);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Your overall satisfaction with our aircraft interior</label>
                                <div class="col-md-4">
                                    <?php
                                    echo Helper::get_feedback_title($data_row[0]->air_int_sat);
                                    ?>
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