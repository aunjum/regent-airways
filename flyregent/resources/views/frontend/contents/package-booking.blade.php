@extends('frontend.layout.master-layout')
@section('extraStyle')
    <link href="{{asset('public/css/holiday-booking.css')}}" rel='stylesheet' type='text/css'>
@stop
@section('content')
    <section id="intro-wrapper main_oveflow_hdn" class="booking-lst-stp">
        <div class="container">
            <div class="row" style="margin-bottom: 30px;">
                <table id="pagesDatatable" class="table table-bordered table-responsive" style="margin-top: 5%;">
                    <thead class="table_head">
                    <tr>
                        <td>Place</td>
                        <td>Hotel</td>
                        <td>Title</td>
                        <td>Package</td>
                        <td>Adult</td>
                        <td>Child</td>
                        <td>Infant</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($package_info as $info)
                        <tr style="font-size:14px;">
                            @if($loop->first)
                                <td>{{$package_details->package->place}}</td>
                                <td>{{$package_details->hotel}}</td>
                                <td class="dtitle">{{$package_details->package->title}}</td>
                            @else
                                <td colspan="3"></td>
                            @endif
                            <td>{{$info->type}}</td>
                            <td style="text-align: right;">{{number_format($info->adult,'2','.',',')}}</td>
                            <td style="text-align: right;">{{number_format($info->child,'2','.',',')}}</td>
                            <td style="text-align: right;">{{number_format($info->infant,'2','.',',')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="country_list">
                    <p style="font-size: 16px;text-transform: uppercase;font-weight: 400;background: #c22927;padding: 10px;color: #fff;">{{$package_details->hotel}}</p>
                    <!-- Form related error message show -->
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div id="errormessageArea" class="alert alert-danger hide">
                        <span></span>
                    </div>
                    <form class="col-sm-12 col-md-12" method="post" action="{{URL::route('make_booking')}}" enctype="multipart/form-data">
                        <div class="col-sm-12 col-md-12 col">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="span7 col well booking_form_holder" style="float:right;margin:0;padding: 10px;">
                                <div>
                                    @php
                                        $country = $package_details->package->country;
                                    @endphp
                                    <input type="hidden" value="{{$package_details->package->id}}" name="package_id"/>
                                    <input type="hidden" value="{{$package_details->id}}" name="details_id"/>
                                    <input type="hidden" value="{{$package_type}}" name="package_type"/>
                                    <input type="hidden" value="{{$country}}" name="country" class="country"/>
                                    <input type="hidden" value="0" name="totalDays"/>
                                    <input type="hidden" value="0" name="totalNights"/>
                                    <input type="hidden" value="0" name="adult"/>
                                    <input type="hidden" value="0" name="child"/>
                                    <input type="hidden" value="0" name="infant"/>
                                    <input type="hidden" value="0" name="adult_no"/>
                                    <input type="hidden" value="0" name="child_no"/>
                                    <input type="hidden" value="0" name="infant_no"/>
                                    <input type="hidden" value="0" name="total"/>

                                    <p type="btn" style="font-size: 14px;text-transform: uppercase;background: #c22927;text-align: center;font-color: #fff;padding: 8px;color: #fff;">Booking Information</p>
                                    <div class="booking_info">
                                        <div class="formrow">
                                            <span class="formcol"><label>Check In</label><input name="check_in"  type="text"  placeholder="dd/mm/yyyy" id="startdate"  autocomplete="off" /></span>
                                            <span class="formcol padleft"><label>Check Out</label><input name="check_out"  type="text" placeholder="dd/mm/yyyy" id="enddate" autocomplete="off"  /></span>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="formrow">
                                            @if(preg_match('/single/i',$package_type))
                                                <span class="formcol_33" style="display: none;">
                                            <label>Adult</label>
                                                    <!--'a_pdoc' => $request->a_pdoc-->
                                            <select id="Adulttype"  class="vAdult" required="" disabled="">
                                                <option class="vAdult" value="1" selected>1</option>
                                            </select>
                                         </span>
                                            @else
                                                <span class="formcol_33">
                                            <label>Adult</label>
                                            <select id="Adulttype"  class="vAdult" required="" disabled="">
                                                {{--<option value="">Select No. of Adult</option>--}}
                                                @for($i = 2 ; $i < 11 ; $i++)
                                                    <option class="vAdult" @if($i==2) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </span>
                                                <span class="formcol_33 padleft">
                                            <label>Child</label>
                                            <select id="Childtype" class="vChild" required="" disabled="">
                                                <option value="0">Select No. of Child</option>
                                                @for($i = 1 ; $i < 7 ; $i++)
                                                    <option class="selectedC" value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </span>
                                                <span class="formcol_33 padleft">
                                            <label>Infant</label>
                                            <select id="Infanttype" class="vInfant" required="" disabled="">
                                                <option value="0">Select No. of Infant</option>
                                                @for($i = 1 ; $i < 7 ; $i++)
                                                    <option class="selectedI" value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="peresonal_info">
                                        <div id="passengerACI">
                                            @if(preg_match('/single/i',$package_type))
                                                <div class="adult_no">
                                                    <label>Adult : 1 </label>
                                                    <div class= "formrow" style="margin-top:5px;">
                                                <span class='formcol_33'>
                                                    <input placeholder="Firstname ***" type="text" class="" id="firstName" name="a_firstname[1]" value="" required /> </span>
                                                        <span class='formcol_33 padleft'>
                                                <input placeholder="Lastname ***" type="text" class="form-control"
                                                       id="lastName" name="a_lastName[1]" value="" required /> </span>
                                                        <span class='formcol_33 padleft'><input  placeholder="Date of Birth" type="text" class="form-control initDatePicker" value=""  autocomplete="off"/>
                                                </span>
                                                        <div class="formrow">
                                                    <span class='formcol_33'>
                                                        <select placeholder="Gender" type="text" class="form-control" id="gender" name="a_gender[1]" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Fenale">Female</option>
                                                        </select>
                                                    </span>
                                                            <span class='formcol_33 padleft'>
                                                    <input placeholder="Country ***" type="text" class="form-control" id="counrty" name="a_countr[1]" value="" required />
                                                    </span>
                                                            <span class='formcol_33 padleft'>
                                                    <input placeholder="Passport No."
                                                           type="text" class="form-control" id="passport_no" name="a_passport_no[1]" value=""/>
                                                    </span>
                                                            @if(strtolower($country) == "cox's bazar")
                                                                <span class="">
                                                    <span style="font-size: 14px">NID / Birth Certificate / Driving License/ Others :</span>
                                                    <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                                    </span>
                                                            @else
                                                                <span class="formcol">
                                                                <span style="font-size: 14px">Passport : </span>
                                                                <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                                            </span>
                                                                <span class="formcol">
                                                                <span style="font-size: 14px">Visa : </span>
                                                                <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        @else
                                            <div class="adult_no">
                                                <label>Adult : 1 </label>
                                                <div class= "formrow" style="margin-top:5px;">
                                            <span class='formcol_33'><input placeholder="Firstname ***" type="text" class="" id="firstName"
                                                                            name="a_firstname[1]" value="" required /> </span>
                                                    <span class='formcol_33 padleft'><input placeholder="Lastname ***" type="text" class="form-control"
                                                                                            id="lastName" name="a_lastName[1]" value="" required /> </span>
                                                    <span class='formcol_33 padleft'><input  placeholder="Date of Birth" type="text" class="form-control initDatePicker" autocomplete="off" name="a_date_of_birth[1]"/></span>
                                                </div>
                                                <div class="formrow">
                                            <span class='formcol_33'>
                                                <select placeholder="Gender" type="text" class="form-control" id="gender" name="a_gender[1]" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Fenale">Female</option>
                                                </select>
                                            </span>
                                                    <span class='formcol_33 padleft'>
                                            <input placeholder="Country ***" type="text" class="form-control" id="counrty" name="a_country[1]" value="" required/>
                                            </span>
                                                    <span class=''><input placeholder="Passport No." type="text" class="form-control" id="passport_no" name="a_passport_no[1]" value=""/></span>
                                                    <span class="">
                                            <?php if(strtolower($country) == "cox's bazar"){?>
                                                        <span class="formcol">
                                            <span style="font-size: 14px">NID / Birth Certificate / Driving License / Others : </span>
                                            <input type="file" name="a_pdoc[]" accept=".png,.jpg,.jpeg,.pdf" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                            </span>
                                                        <?php }else { ?>
                                                        <span class="formcol">
                                                        <span style="font-size: 14px">Passport : </span>
                                            <input type="file" name="a_pdoc[]" accept=".png,.jpg,.jpeg,.pdf" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                                </span>
                                                    <span class="formcol">
                                                        <span style="font-size: 14px">Visa : </span>
                                                        <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;
                                                        padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                                        <?php } ?>
                                                    </span>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="adult_no">
                                                <label>Adult : 2 </label>
                                                <div class= "formrow" style="margin-top:5px;">
                                            <span class='formcol_33'><input placeholder="Firstname ***" type="text" class="" id="firstName"
                                                                            name="a_firstname[2]" value="" required /> </span>
                                                    <span class='formcol_33 padleft'><input placeholder="Lastname ***" type="text" class="form-control"
                                                                                            id="lastName" name="a_lastName[2]" value="" required /> </span>
                                                    <span class='formcol_33 padleft'><input  placeholder="Date of Birth" type="text" class="form-control initDatePicker" name="a_date_of_birth[2]" autocomplete="off"></span>
                                                </div>
                                                <div class="formrow">
                                            <span class='formcol_33'>
                                                <select placeholder="Gender" type="text" class="form-control" id="gender" name="a_gender[2]" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Fenale">Female</option>
                                                </select>
                                            </span>
                                                    {{--<span class='formcol_33 padleft'><input placeholder="Country" type="text" class="form-control" id="counrty" name="a_countr[2]" value="" /></span>--}}
                                                    <span class='formcol_33 padleft'>
                                            <input placeholder="Country ***" type="text" class="form-control" id="counrty" name="a_country[2]" value="" required/>
                                            </span>
                                                    <span class='formcol_33 padleft'><input placeholder="Passport No." type="text" class="form-control" id="passport_no" name="a_passport_no[2]" value=""/></span>
                                                    <span>
                                            <?php if(strtolower($country) == "cox's bazar"){?>
                                                        <span class="formcol">
                                            <span style="font-size: 14px">NID / Birth Certificate / Driving License / Others : </span>
                                            <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>
                                            </span>
                                                        <?php }else { ?>
                                                        <span class="formcol">
                                                        <span style="font-size: 14px">Passport : </span>
                                            <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>

                                                   </span>
                                                <span class="formcol"><span style="font-size: 14px">Visa : </span>
                                            <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="a_pdoc[]" style="padding-right: 20px;padding-top: 10px;padding-bottom: 20px; font-size: 14px;"/>


                                                    <?php } ?>
                                                </span></span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div id="extraAdult"></div>
                                    <div id="extraChild"></div>
                                    <div id="extraInfant"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary hide">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span3 sidebar" style="margin:0;">
                            <div class="well " style="">
                                <div class="summaryArea">
                                    <div class="md-card-content" style="border-bottom:  0.05px solid black;margin: 1em auto;">
                                        <p type="btn" style="font-size: 14px;text-transform: uppercase;background: #c22927;text-align:center;font-color:#fff;padding:8px;color: #fff;margin-top:-23px">Summary</p>
                                        <div class="col-sm-6 col-md-6 dayNights">
                                            <label>Days: <span id="daysCount">0</span></label>
                                            <label>Nights: <span id="nightCount">0</span></label>
                                        </div>
                                    </div>
                                    <div class="m">
                                        <div class="sidebar-max uk-width-medium-1-3" id="adult" style="width:100%;" >
                                            <div class="row-fluid">
                                                <label>Adult: <span id="adultCount">0</span> => <span style="float: right;" id="adultAmount">0 BDT</span></label>
                                                <label class="summary_hideable_item">Child: <span id="childCount">0</span> => <span style="float: right;" id="childAmount">0 BDT</span></label>
                                                <label class="summary_hideable_item">Infant: <span id="infantCount">0</span> => <span style="float: right;" id="infantAmount">0 BDT</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-card-content sidebar-max" style="border-top:  0.05px solid black;display: block">
                                        <div class="persond" style="margin-top:10px";>
                                            <div class="uk-width-medium-1-3">
                                                <label>Total: <span id="personCount">0</span> => <span style="float: right;" id="totalAmount">0 BDT</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-card-content sidebar-mob" style="">
                                    <p style="font-size: 14px;text-transform: uppercase;background: #c22927;text-align: center;font-color: #fff;padding: 8px;color: #fff;margin-top: 6px;">Contact Information</p>
                                    <div class="formrow">
                                        <span class="">
                                            <input type="text" placeholder="Enter Mobile Number" minlength="11" maxlength="14" class="form-control" id="counrty" name="mobile" required />
                                        </span>
                                        <span class="">
                                            <input type="email" placeholder="Enter Email" class="form-control" id="email" name="email" required />
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@stop

@section('extrascript')
    <script>
        window.isSingle = @if(preg_match('/single/i',$package_type)) true; @else false; @endif
            window.adultPrice = {{$package_info[0]->adult}};
        window.childPrice = {{$package_info[0]->child ?? 0}};
        window.infantPrice = {{$package_info[0]->infant ?? 0}};
        window.adultAditionalPrice = {{$package_info[1]->adult ?? 0}};
        window.childAditionalPrice = {{$package_info[1]->child ?? 0}};
        window.infantAditionalPrice = {{$package_info[1]->infant ?? 0}};
    </script>
    <script type='text/javascript' src="{{asset('public/js/holiday-booking.js') }}"></script>
@stop