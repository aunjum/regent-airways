@extends('frontend.layout.master-layout')
@section('content')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.right_fixed_links').hide();
        });
        var num = 300; //number of pixels before modifying styles
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > num) {
                $('.right_fixed_links').show();
            } else {
                $('.right_fixed_links').hide();
            }
        });


        function locate_point() {
            var base_url = location.href.split('/');
            base_url = base_url[0] + '/' + base_url[1] + '/' + base_url[2];

            $(".info").hide();
            var address1 = document.getElementById('address1').value;
            var address2 = document.getElementById('address2').value;
            var __token = $('[name="_token"]')[0].value;
            var new_route = address1+address2;
            if((new_route != "ChattogramDoha") && (new_route != "DohaChattogram") && (new_route != "DhakaKuala Lumpur") && (new_route != "Kuala LumpurDhaka") && (new_route != "DhakaBangkok") && (new_route != "BangkokDhaka") && (new_route != "DhakaSingapore") && (new_route != "SingaporeDhaka") && (new_route != "DhakaKolkata") && (new_route != "KolkataDhaka") && (new_route != "ChattogramKolkata") && (new_route != "KolkataChattogram") && (new_route != "ChattogramBangkok") && (new_route != "BangkokChattogram") && (new_route != "DhakaMuscat") && (new_route != "MuscatDhaka") && (new_route != "ChattogramMuscat") && (new_route != "MuscatChattogram") && (new_route != "DhakaChattogram") && (new_route != "ChattogramDhaka") && (new_route != "DhakaCoxs Bazar") && (new_route != "Coxs BazarDhaka") && (new_route != "DhakaKathmandu") && (new_route != "KathmanduDhaka") && (new_route != "DhakaDoha") && (new_route != "DohaDhaka")){
                alert('Not Applicable');
                return false;
            }

            if ((address1 != '') && (address2 != '')) {


                $(".info").show();
                $.ajax({
                    type: "POST",
                    url: base_url + "/get_flight_schedule_by_route",
                    data: "address1="+address1+"&address2="+address2+"&_token="+__token,
                    cache: false,
                    success: function (result) {
                        $(".sch_row").remove();
                        $(".title_row").after(result);
                        $("#flight_search_modal").modal('show');
                    }
                });



            }
        }


        function locate_point_by_flight() {
            var base_url = location.href.split('/');
            base_url = base_url[0] + '/' + base_url[1] + '/' + base_url[2];

            $(".info").hide();

            var flight_id = document.getElementById('flight_id').value;
            if (flight_id.trim() == '') {
                alert('Please enter flight ID');
                return false;
            }
            var __token = $('[name="_token"]')[0].value;

            $.ajax({
                type: "POST",
                url: base_url + "/get_flight_schedule_by_flight",
                data: "flight_id="+flight_id+"&_token="+__token,
                cache: false,
                success: function (result) {
                    $(".info").show();
                    $(".sch_row").remove();
                    $(".title_row").after(result);
                    $("#flight_search_modal").modal('show');
                }
            });

        }

    </script>
    <!--=========================================Slider======================================================-->
    <section id="home">

        <div class="pos_rel" style="    z-index: 99;">
            <div class="iframe-vrs book_container col-md-4">
                <ul class="slider_menu">
                    <li onclick="open_book_flight()">
                        <a href="javascript:;">Book a Flight</a>
                    </li>
                    <li onclick="open_manage_booking()">
                        <a href="javascript:;">Manage my Booking</a>
                    </li>
                    {{--<li>--}}
                    {{--<a href="{{ URL::to('/') }}/fare-chart">Fare Chart</a>--}}
                    {{--</li>--}}
                    <li onclick="open_agent()">
                        <a href="javascript:;">Flight Search</a>
                    </li>

                    <!--<li class="sales_promotion" >
                        <a href="javascript:;" >Sales Promotion</a>
                    </li>-->

                    <!--li onclick="open_agent()">
                        <a href="javascript:;">FFP</a><!--Route Map-->
                    </li-->
                    <li onclick="open_map()">
                        <a href="javascript:;" class="msg_btn">Leave a Message</a><!--Frequent Flyer Login--->
                        <!--                        <div class="join_now">Not a member <a href="#">Join Now</a></div>-->
                    </li>
                </ul>
                <div class="container_book_flight none slider_menu_contents_container">

                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">Close</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
                            Book Flight
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">See Instruction</a>
                    <iframe scrolling="no" style="margin-top:5%;width:100%;height: 315px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
                    </iframe>
                </div>

                <div class="container_manage_booking none slider_menu_contents_container">
                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">Close</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
                            Manage Booking
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">See Instruction</a>
                    <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
                    </iframe>
                </div>

                <div class="container_agent none slider_menu_contents_container">
                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">Close</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
                            Search Regent Flight
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <div id="panel">
                        <div class="clearfix"></div>
                        <div class="collapse_area">
                            <br/>
                            <div class="form-group byflightid_container">
                                <label for="inputEmail3" class="col-sm-2 control-label">Search By Flight ID<span class="required">*</span></label>
                                <div class="clearfix"></div>
                                {{ csrf_field() }}

                                <div class="col-sm-4 pull-left">
                                    <input type="text" class="form-control flightid" id="flight_id" placeholder="e.g. RX782" required>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary pull-left" onclick="locate_point_by_flight()">Search</button>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="byroute_container">

                                <label for="inputEmail3" class="col-sm-2 control-label pull-left">Search By Route<span class="required">*</span></label>
                                <br/>
                                <div class="clearfix"></div>
                                <div>
                                    <select class="form-control pull-left" id="address1">
                                        <option value="">Fly From</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Coxs Bazar">Cox's Bazar</option>
                                        <option value="Bangkok">Bangkok</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Muscat">Muscat</option>
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="Doha">Doha</option>
                                    </select>

                                    <select class="form-control pull-left" id="address2" >
                                        <option value="">Fly To</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Coxs Bazar">Cox's Bazar</option>
                                        <option value="Bangkok">Bangkok</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Muscat">Muscat</option>
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="Doha">Doha</option>
                                    </select>

                                    <button type="button" class="btn btn-primary pull-left" onclick="locate_point()">Search</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="desti-head">
                         <div class="heading">
                             Agent Login
                             <div class="head-bottom-bar"></div>
                         </div>
                     </div>
                     <iframe scrolling="yes" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/AgentLogin.aspx">
                     </iframe>-->
                </div>



                <div class="container_map none slider_menu_contents_container">
                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">Close</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
                            Leave a Message
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <br/>
                    <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
                        {{ csrf_field() }}
                        <div class="alert alert-success none live_chat_msg_status"></div>

                        <span class="chat_info_box1">

                <div>
                    <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_name1" name="name" placeholder="Name"  required>
                    </div>
                </div>

                <div>
                    <label class="col-sm-2 control-label">Email<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control chat_email1" name="email" placeholder="Email" required>
                    </div>
                    <label  class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_contact1" name="contact" placeholder="Contact No" required>
                    </div>
                </div>
                            <div>
                    <label  class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-4">
                        <textarea  class="form-control chat_message1" name="message1" required></textarea>
                    </div>
                </div>
                            <div class="gr1-outer">
                    <div class="g-recaptcha" data-sitekey="6LeZLk8UAAAAAPiDmtasdL7O7XnYsbJAfSW7YAoF" id="RecaptchaField1"></div>
                         <input type="hidden" class="hiddenRecaptcha" name="ct_hiddenRecaptcha" id="ct_hiddenRecaptcha1">

                </div>

                <div>
                    <div class="col-sm-4">
                        <button type="button" onclick="return send_message('{{ URL::to('/') }}', 1);" class="btn btn-primary">Continue</button>
                    </div>
                </div>
                </span>

                        {{--<div class="fb_chat1 none">--}}
                        {{--<div class="fb-page"--}}
                        {{--data-href="https://www.facebook.com/flyregent"--}}
                        {{--data-tabs="messages"--}}
                        {{--data-width="420"--}}
                        {{--data-height="240"--}}
                        {{--data-small-header="true"--}}
                        {{--data-adapt-container-width="false"--}}
                        {{--data-hide-cover="true"--}}
                        {{--data-show-facepile="false">--}}
                        {{--<div class="fb-xfbml-parse-ignore">--}}
                        {{--<blockquote>--}}
                        {{--<a href="https://m.me/flyregent">Message Us</a>--}}
                        {{--</blockquote>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </form>
                </div>

                <div class="container_ffp none slider_menu_contents_container">
                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">Close</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
                            Frequent Flyer Login
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 275px;    padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
                    </iframe>
                </div>

            </div>
        </div>


        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jssor-slider/22.2.16/jssor.slider.min.js"></script>
        <script type="text/javascript">
            jssor_1_slider_init = function() {

                var jssor_1_SlideshowTransitions = [
                    {$Duration:1200,$Opacity:2}
                ];

                var jssor_1_options = {
                    $AutoPlay: true,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                /*responsive code begin*/
                /*you can remove responsive code if you don't want the slider scales while window resizing*/
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1920);
                        jssor_1_slider.$ScaleWidth(refSize);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*responsive code end*/
            };
        </script>
        <style>
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                background: url('public/cslider/img/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

            /* jssor slider arrow navigator skin 22 css */
            /*
            .jssora22l                  (normal)
            .jssora22r                  (normal)
            .jssora22l:hover            (normal mouseover)
            .jssora22r:hover            (normal mouseover)
            .jssora22l.jssora22ldn      (mousedown)
            .jssora22r.jssora22rdn      (mousedown)
            .jssora22l.jssora22lds      (disabled)
            .jssora22r.jssora22rds      (disabled)
            */
            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('public/cslider/img/a22.png') center center no-repeat;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
            .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
            .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
        </style>

        <?php
        if (!is_null($slider_data)) {
        ?>
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('public/cslider/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">

                <?php
                $sl = 0;
                foreach ($slider_data as $slider) {

                ?>
                <div>
                    <img data-u="image" src="{{ Helper::getImageBaseUrl() }}/public/upload/slider/{{$slider->image}}" />
                </div>
                <?php $sl++; } ?>
            </div>

        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>

    <?php } ?>
    <!-- #endregion Jssor Slider End -->



        <script  type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script  type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js"></script>
        <style type="text/css">
            .marquee-with-options{
                width: 100%;
                overflow: hidden;
            }
        </style>
        </pre>
        <script type="text/javascript">
            $(function(){
                var $mwo = $('.marquee-with-options');
                $('.marquee').marquee();
                $('.marquee-with-options').marquee({
                    //speed in milliseconds of the marquee
                    speed: 25000,
                    //gap in pixels between the tickers
                    gap: 5,
                    //gap in pixels between the tickers
                    delayBeforeStart: 0,
                    //'left' or 'right'
                    direction: 'left',
                    //true or false - should the marquee be duplicated to show an effect of continues flow
                    duplicated: true,
                    //on hover pause the marquee - using jQuery plugin https://github.com/tobia/Pause
                    pauseOnHover: true
                });
                //Direction upward
            });
        </script>
        <div class="slider-overlay hide">
            <div class="overlay-line"></div>
            <div class="overlay-content">

                <?php if(!is_null($fair_data)){ ?>
                <div class="">
                    <div class="marquee-with-options scrolling_packages">
                        <a href="#" >
                            <ul>

                                <?php
                                foreach ($fair_data as $fair) {
                                $string = strip_tags($fair->description, 'p');
                                $string = explode('-', $string);
                                $string_last = explode('(', $string[1]);
                                $string = strtoupper(trim($string[0]) . trim($string_last[0]));
                                ?>
                                <a href="{{ URL::to('/') }}/fare-chart/{{$string}}" >
                                    <li>
                                        <div class="scroll_item">
                                            <div class="left-part">
                                                <div class="top-part">
                                                    <span class="txt-1">BDT</span>
                                                    <span class="txt-2">{{$fair->title}}</span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="bootum-part">{!! $fair->description !!}</div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <?php } ?>
                            </ul>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section><!--\\slider ends here-->

    <div class="overlay-overflow"></div>
    <!--=========================================End Slider===================================================-->
    <!--=========================================Main Body====================================================-->
    <div class="home_body">

        <div class="BG-map">
            <div class="">
                <div class="clearfix"></div>

                <?php
                if (!is_null($offers_data)) {
                ?>



                <section id="special-offers">
                    <div class="header-outer">
                        <div class="section-header">
                            <span>SPECIAL PROMOTIONS</span>
                        </div>
                    </div>


                    <!--        <div class="tabs-top-border"></div>-->

                    <div class="offers-tabs container">
                        <a href="#" class="left-arrow-tab "><span class="icon-chevron-left"></span></a>
                        <a href="#" class="right-arrow-tab"><span class="icon-chevron-right"></span></a>
                        <div class="controls">
                            <ul class="single-tab">
                                <?php
                                $o = 0;
                                foreach ($offers_data as $offers_amount) {
                                $o++;
                                ?>

                                <li class="<?php if($o == 1) echo 'active';?>" data-tabcontrol="#offer-{{$o}}" data-carausel="#offerCarousel{{$o}}">
                                    <div class="tab-btn control-BG{{$o}}">
                                        <div class="tab-btn-inner">
                                            <div class="circle-outer">
                                                <div class="inner-1">
                                                    <div class="inner-2 control-BG{{$o}}"></div>
                                                </div>
                                            </div><!--circle-outer-->
                                            {{$offers_amount->field1}}
                                        </div>
                                        <div class="arrow"></div>
                                    </div><!--tab-btn-->
                                </li>
                                <?php } ?>
                            </ul>

                            <div class="tab-slide">

                                <!--======================-->

                                <?php
                                $oc = 0;
                                foreach ($offers_data as $offers_con) {
                                $oc++;
                                ?>
                                <div class="tab-area" id="offer-{{$oc}}" style="<?php if($oc == 1){ ?> display:block <?php } ?>">
                                    <div class="row-fluid">
                                    <!--   <div class="span7">
                                    <div class="content">
                                        <div class="content-head">{{$offers_con->title}}</div>
                                     <div class="content-title">Costa Rica Flights and Hotels</div>
                                        {{$offers_con->description}}
                                            </div>
                                        </div>
-->
                                        <div class="span5_" style="position:relative; text-align: right; width:100%" >
                                            <a href="{{ URL::to('/') }}/promotion/{{$offers_con->id}}"><img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$offers_con->image}}" alt="" class="offer_image"/></a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                                <a href="#" name="package"></a>
                                <div class="tour-bottom-line container"></div>
                            </div>
                        </div>
                    </div>

                </section>

                <?php } ?>


                <section id="">
                    <div class="tabs-top-border"></div>
                    <div class="container" style="margin-bottom: 30px;">
                        <ul class="filter-out">
                            <li class="header" >
                                <a href="javascript:;" onclick="show_packages('all')">
                                    <div class="header-outer">
                                        <div class="section-header">
                                            <span>HOLIDAY PACKAGES</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="invertedshiftdown">
                            <ul id="holidayPackageUL">
                                @foreach($holidayPackageCountry as $name)
                                     @php
                                        $lolHTML = 'onclick="show_packages(\''.str_replace("'","\'",$name->country).'\')"';
                                     @endphp
                                    <li class="@if($loop->first) current @endif tab_link" {!! $lolHTML !!} ><a href="javascript:void(0);">{{$name->country}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <br style="clear: both;" />
                        <div class="clearfix"></div>
                        <div class="titem_wrapper">


                        </div>
                        <div class="clearfix"></div>



                        <div class="more_container" style="display: none;">
                            <a href="javascript:;" class="booknow pull-right view_all_button" onclick="show_packages('more');">See More</a>
                            <a href="javascript:;" class="booknow pull-right view_less_button none" onclick="show_less();">See Less</a>
                        </div>


                        <div class="clearfix"></div>
                    </div><!--container-->
                </section>
            </div>
        </div>




        <!--=========================================End Main Body================================================-->

    </div>
@stop
