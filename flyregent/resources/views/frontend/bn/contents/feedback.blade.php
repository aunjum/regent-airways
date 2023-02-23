@extends('frontend.bn.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/bn/layout/content-slider')

<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">

                <div class="tab_container min_height">
                    @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                    @endif

                    <form class="form-horizontal ffp-form" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/feedback-submit">

                        <input type="hidden" name="puserid" value="<?php echo $promotional_user_id;?>">
                        <h5>Passenger Details:</h5>
                        <br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">First Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Middle Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sur Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sure_name" placeholder="Sure Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender<span class="required">*</span></label>
                            <div class="col-sm-4">
                                                                    <select class="form-control" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date of Birth<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="date_of_birth" placeholder="Date of Barth [DD-MM-YYYY]" required>
                            </div>
                        </div>

                        <h5>Passport Details:</h5>
                        <br/>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Document Type<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="document_type" placeholder="Document Type" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Document Number<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="document_number" placeholder="Document Number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Issuing Country<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="issuing_country" placeholder="Issuing Country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Expired date<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="expire_date" placeholder="Expired date [DD-MM-YYYY]" required>
                            </div>
                        </div>
                        
                        <h5>Others:</h5>
                        <br/>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">City of Residence <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="residence_city" placeholder="Residence City" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">State of Residence <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="residence_state" placeholder="Residence State" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Country of Resident <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="resident_country" placeholder="Resident Country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Nationality<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nationality" placeholder="Nationality" required>
                            </div>
                        </div>
<!--                        <div class="table-responsive">          
                            <table class="table feedback text-center">
                                <thead>
                                    <tr>
                                        <th class="feedback_title">Ticket Purchase</th>
                                        <th>Excellent</th>
                                        <th>Good</th>
                                        <th>Average</th>
                                        <th>Below Average</th>
                                        <th>Poor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Efficiency of counter staff</td>
                                        <td><input type="radio" name="counter_eff" value="1"></td>
                                        <td><input type="radio" name="counter_eff" value="2"></td>
                                        <td><input type="radio" name="counter_eff" value="3"></td>
                                        <td><input type="radio" name="counter_eff" value="4"></td>
                                        <td><input type="radio" name="counter_eff" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Information received from the counter staff</td>
                                        <td><input type="radio" name="info_counter_staff" value="1"></td>
                                        <td><input type="radio" name="info_counter_staff" value="2"></td>
                                        <td><input type="radio" name="info_counter_staff" value="3"></td>
                                        <td><input type="radio" name="info_counter_staff" value="4"></td>
                                        <td><input type="radio" name="info_counter_staff" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Time spent for purchasing the ticket</td>
                                        <td><input type="radio" name="time_pur_tick" value="1"></td>
                                        <td><input type="radio" name="time_pur_tick" value="2"></td>
                                        <td><input type="radio" name="time_pur_tick" value="3"></td>
                                        <td><input type="radio" name="time_pur_tick" value="4"></td>
                                        <td><input type="radio" name="time_pur_tick" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Overall satisfaction with our counter services</td>
                                        <td><input type="radio" name="counter_satis" value="1"></td>
                                        <td><input type="radio" name="counter_satis" value="2"></td>
                                        <td><input type="radio" name="counter_satis" value="3"></td>
                                        <td><input type="radio" name="counter_satis" value="4"></td>
                                        <td><input type="radio" name="counter_satis" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Efficiency of the check-in staff</td>
                                        <td><input type="radio" name="eff_chk_staff" value="1"></td>
                                        <td><input type="radio" name="eff_chk_staff" value="2"></td>
                                        <td><input type="radio" name="eff_chk_staff" value="3"></td>
                                        <td><input type="radio" name="eff_chk_staff" value="4"></td>
                                        <td><input type="radio" name="eff_chk_staff" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Time spent for check-in</td>
                                        <td><input type="radio" name="time_chk_in" value="1"></td>
                                        <td><input type="radio" name="time_chk_in" value="2"></td>
                                        <td><input type="radio" name="time_chk_in" value="3"></td>
                                        <td><input type="radio" name="time_chk_in" value="4"></td>
                                        <td><input type="radio" name="time_chk_in" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Baggage handling</td>
                                        <td><input type="radio" name="bag_hand" value="1"></td>
                                        <td><input type="radio" name="bag_hand" value="2"></td>
                                        <td><input type="radio" name="bag_hand" value="3"></td>
                                        <td><input type="radio" name="bag_hand" value="4"></td>
                                        <td><input type="radio" name="bag_hand" value="5"></td>
                                    </tr>

                                    <tr class="pb_row">
                                        <td class="text-left">Your overall satisfaction with our airport Service</td>
                                        <td><input type="radio" name="air_svc_satis" value="1"></td>
                                        <td><input type="radio" name="air_svc_satis" value="2"></td>
                                        <td><input type="radio" name="air_svc_satis" value="3"></td>
                                        <td><input type="radio" name="air_svc_satis" value="4"></td>
                                        <td><input type="radio" name="air_svc_satis" value="5"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        ----In-Flight Service---
                        <div class="table-responsive">          
                            <table class="table feedback text-center">
                                <thead>
                                    <tr class="pt_row">
                                        <th class="feedback_title">In-Flight Service</th>
                                        <th>Excellent</th>
                                        <th>Good</th>
                                        <th>Average</th>
                                        <th>Below Average</th>
                                        <th>Poor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Flight attendant's service before take-off</td>
                                        <td><input type="radio" name="fl_att_ser" value="1"></td>
                                        <td><input type="radio" name="fl_att_ser" value="2"></td>
                                        <td><input type="radio" name="fl_att_ser" value="3"></td>
                                        <td><input type="radio" name="fl_att_ser" value="4"></td>
                                        <td><input type="radio" name="fl_att_ser" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Efficiency of the flight attendants</td>
                                        <td><input type="radio" name="eff_fl_att" value="1"></td>
                                        <td><input type="radio" name="eff_fl_att" value="2"></td>
                                        <td><input type="radio" name="eff_fl_att" value="3"></td>
                                        <td><input type="radio" name="eff_fl_att" value="4"></td>
                                        <td><input type="radio" name="eff_fl_att" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Appearance of the flight attendants</td>
                                        <td><input type="radio" name="app_fl_att" value="1"></td>
                                        <td><input type="radio" name="app_fl_att" value="2"></td>
                                        <td><input type="radio" name="app_fl_att" value="3"></td>
                                        <td><input type="radio" name="app_fl_att" value="4"></td>
                                        <td><input type="radio" name="app_fl_att" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Selection of newspapers and magazines</td>
                                        <td><input type="radio" name="sel_nesws_mag" value="1"></td>
                                        <td><input type="radio" name="sel_nesws_mag" value="2"></td>
                                        <td><input type="radio" name="sel_nesws_mag" value="3"></td>
                                        <td><input type="radio" name="sel_nesws_mag" value="4"></td>
                                        <td><input type="radio" name="sel_nesws_mag" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" colspan="6">Flight attendant's announcements</td>
                                    </tr>

                                    <tr>
                                        <td class="align-right">Clarity :</td>
                                        <td><input type="radio" name="fl_att_ann_cl" value="1"></td>
                                        <td><input type="radio" name="fl_att_ann_cl" value="2"></td>
                                        <td><input type="radio" name="fl_att_ann_cl" value="3"></td>
                                        <td><input type="radio" name="fl_att_ann_cl" value="4"></td>
                                        <td><input type="radio" name="fl_att_ann_cl" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="align-right">Content :</td>
                                        <td><input type="radio" name="fl_att_ann_con" value="1"></td>
                                        <td><input type="radio" name="fl_att_ann_con" value="2"></td>
                                        <td><input type="radio" name="fl_att_ann_con" value="3"></td>
                                        <td><input type="radio" name="fl_att_ann_con" value="4"></td>
                                        <td><input type="radio" name="fl_att_ann_con" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left" colspan="6">Cockpit crew announcements</td>
                                    </tr>

                                    <tr>
                                        <td class="align-right">Clarity :</td>
                                        <td><input type="radio" name="cok_ann_cl" value="1"></td>
                                        <td><input type="radio" name="cok_ann_cl" value="2"></td>
                                        <td><input type="radio" name="cok_ann_cl" value="3"></td>
                                        <td><input type="radio" name="cok_ann_cl" value="4"></td>
                                        <td><input type="radio" name="cok_ann_cl" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="align-right">Content :</td>
                                        <td><input type="radio" name="cok_ann_con" value="1"></td>
                                        <td><input type="radio" name="cok_ann_con" value="2"></td>
                                        <td><input type="radio" name="cok_ann_con" value="3"></td>
                                        <td><input type="radio" name="cok_ann_con" value="4"></td>
                                        <td><input type="radio" name="cok_ann_con" value="5"></td>
                                    </tr>

                                    <tr class="pb_row">
                                        <td class="text-left">Your overall satisfaction with our in-flight service</td>
                                        <td><input type="radio" name="in_fl_ser_sat" value="1"></td>
                                        <td><input type="radio" name="in_fl_ser_sat" value="2"></td>
                                        <td><input type="radio" name="in_fl_ser_sat" value="3"></td>
                                        <td><input type="radio" name="in_fl_ser_sat" value="4"></td>
                                        <td><input type="radio" name="in_fl_ser_sat" value="5"></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        ----Snacks---------
                        <div class="table-responsive">          
                            <table class="table feedback text-center">
                                <thead>
                                    <tr class="pt_row">
                                        <th class="feedback_title">Snacks</th>
                                        <th>Excellent</th>
                                        <th>Good</th>
                                        <th>Average</th>
                                        <th>Below Average</th>
                                        <th>Poor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Quality of the snacks :</td>
                                        <td><input type="radio" name="snck_qua" value="1"></td>
                                        <td><input type="radio" name="snck_qua" value="2"></td>
                                        <td><input type="radio" name="snck_qua" value="3"></td>
                                        <td><input type="radio" name="snck_qua" value="4"></td>
                                        <td><input type="radio" name="snck_qua" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Quantity of the snacks</td>
                                        <td><input type="radio" name="snck_quan" value="1"></td>
                                        <td><input type="radio" name="snck_quan" value="2"></td>
                                        <td><input type="radio" name="snck_quan" value="3"></td>
                                        <td><input type="radio" name="snck_quan" value="4"></td>
                                        <td><input type="radio" name="snck_quan" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Presentation of the snacks</td>
                                        <td><input type="radio" name="snck_pre" value="1"></td>
                                        <td><input type="radio" name="snck_pre" value="2"></td>
                                        <td><input type="radio" name="snck_pre" value="3"></td>
                                        <td><input type="radio" name="snck_pre" value="4"></td>
                                        <td><input type="radio" name="snck_pre" value="5"></td>
                                    </tr>

                                    <tr class="pb_row">
                                        <td class="text-left">Your overall satisfaction with our snacks</td>
                                        <td><input type="radio" name="snck_sat" value="1"></td>
                                        <td><input type="radio" name="snck_sat" value="2"></td>
                                        <td><input type="radio" name="snck_sat" value="3"></td>
                                        <td><input type="radio" name="snck_sat" value="4"></td>
                                        <td><input type="radio" name="snck_sat" value="5"></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        ----Aircraft Interior---------
                        <div class="table-responsive">          
                            <table class="table feedback text-center">
                                <thead>
                                    <tr class="pt_row">
                                        <th class="feedback_title">Aircraft Interior</th>
                                        <th>Excellent</th>
                                        <th>Good</th>
                                        <th>Average</th>
                                        <th>Below Average</th>
                                        <th>Poor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Seating comfort</td>
                                        <td><input type="radio" name="seat_com" value="1"></td>
                                        <td><input type="radio" name="seat_com" value="2"></td>
                                        <td><input type="radio" name="seat_com" value="3"></td>
                                        <td><input type="radio" name="seat_com" value="4"></td>
                                        <td><input type="radio" name="seat_com" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Temperature in the cabin</td>
                                        <td><input type="radio" name="cab_temp" value="1"></td>
                                        <td><input type="radio" name="cab_temp" value="2"></td>
                                        <td><input type="radio" name="cab_temp" value="3"></td>
                                        <td><input type="radio" name="cab_temp" value="4"></td>
                                        <td><input type="radio" name="cab_temp" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Cleanliness of the cabin</td>
                                        <td><input type="radio" name="cab_clean" value="1"></td>
                                        <td><input type="radio" name="cab_clean" value="2"></td>
                                        <td><input type="radio" name="cab_clean" value="3"></td>
                                        <td><input type="radio" name="cab_clean" value="4"></td>
                                        <td><input type="radio" name="cab_clean" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Your overall satisfaction with our aircraft interior</td>
                                        <td><input type="radio" name="air_int_sat" value="1"></td>
                                        <td><input type="radio" name="air_int_sat" value="2"></td>
                                        <td><input type="radio" name="air_int_sat" value="3"></td>
                                        <td><input type="radio" name="air_int_sat" value="4"></td>
                                        <td><input type="radio" name="air_int_sat" value="5"></td>
                                    </tr>
                                    ----end Aircraft Interior---

                                </tbody>
                            </table>
                        </div>


                        <div class="clearfix"></div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Your Suggestions</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="comments" placeholder="Your Suggestions" style="width: 40%;"></textarea>
                            </div>
                        </div>
-->


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>



            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop