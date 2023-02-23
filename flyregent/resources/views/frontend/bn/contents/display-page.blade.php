<style>.container2{width:96% !important;}</style>
@extends('frontend.bn.layout.display-layout')
@section('content')
<style>
    caption{
        background:#b68d2a;
        font-size:140%;
        border-bottom:none;
        padding:10px;
        color: #fff;
    }
    .regent td{
        padding: 10px 5px;
    }
    .display_title{
        position: absolute;
        top: 2%;
        left: 43%;
        color: #b68d2a;
        font-size: 22px;
        z-index: 99999;
        font-weight: bold;
        text-align: center;
    }
    .date_time{
        color: #d00000;  
        margin-top: 8px;
    }

    #scroller div {
        padding: 10px 3px !important;
    }
    .schedule_block{
    -webkit-transition: all .6s ease-in-out;
    -moz-transition: all .6s ease-in-out;
    -o-transition: all .6s ease-in-out;
    transition: all .6s ease-in-out;
    }

</style>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
                $.ajax({
                    type: "POST",
                    url: "http://newsite.flyregent.net/get_promotional_user",
//                    data: "type=all",
                    cache: false,
                    success: function (result) {
                        $( "#promotional_user" ).html('Congratulations! '+result+', your feedback has been received. Thanks for your participation.');
                    }
                });

        }, 3000);
    });
    
    
    $(document).ready(function () {

        setInterval(function () {

            var displayed = $('#displayed').val();

            if (displayed == 'schedule_block') {
                $('.slider_block').show();
                $('.schedule_block').hide();
                $('#displayed').val('slider_block');
            } else {
                $('.schedule_block').show();
                $('.slider_block').hide();
                $('#displayed').val('schedule_block');
            }



        }, 60000);
    });
</script>
<!--todo:sts changes-->
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.css" rel='stylesheet' type='text/css'>
<script type="text/javascript">
    (function ($) {
        $(function () {
            $("#scroller").simplyScroll({orientation: 'vertical', customClass: 'vert'});
        });
    })(jQuery);
</script>

<!--todo:sts changes-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css" rel='stylesheet' type='text/css'>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js"></script>


<div class="display_title">
    Regent Flight Schedule
    <div class="date_time">
        <div class="clock"></div>
    </div>

    <script type="text/javascript">
        var clock;

        $(document).ready(function () {
            clock = $('.clock').FlipClock({
                clockFace: 'TwelveHourClock'
            });
        });
    </script>
</div>

<input type="hidden" id="displayed" value="schedule_block">

<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0" style=" padding:70px 0px 0px 50px">

            <div class="schedule_block" style="padding-bottom: 96px;">

                <div class="display_head">
                    <div class="head_col1">Flight Number</div>  
                    <div class="head_col2">From</div>  
                    <div class="head_col3">To</div>  
                    <div class="head_col4">Time</div>  
                    <div class="head_col5">Status</div>   
                </div>
                <ul id="scroller">
                    <?php
                    if (!is_null($page_data)) {
                        $i = 1;
                        foreach ($page_data as $value) {
                            $i++;
                            ?>
                            <li class="<?php
                            if ($i % 2 == 0)
                                echo 'flight_even';
                            else
                                echo 'flight_odd'
                                ?>">
                                <div class="col1">{{$value->flight_no}}</div>
                                <div class="col2">{{$value->flight_from}}</div>
                                <div class="col3">{{$value->flight_to}}</div>
                                <div class="col4">{{$value->time}}</div>
                                <div class="col5">{{$value->flight_status}}</div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>


            </div>

            <div class="clearfix"></div>

            <div class="slider_block none" style="width: 1242px; padding-bottom: 60px">
                <?php if ($display_image) { ?>
                    <link href="{{asset('public/display_slider/style.css')}}" rel='stylesheet' type='text/css'>
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>

                                <?php
                                foreach ($display_image as $dimg) {
                                    ?>
                                    <li><a href="#"><img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$dimg->image}}" alt="" title="" id="wows1_0"/></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!--	<div class="ws_bullets"><div>
                                        <a href="#" title="kualalumpur2"><span><img src="data1/tooltips/kualalumpur2.jpg" alt="kualalumpur2"/>1</span></a>
                                        <a href="#" title="road_side_view"><span><img src="data1/tooltips/road_side_view.jpg" alt="road_side_view"/>2</span></a>
                                </div>
                                </div>-->


                    </div>
                    <!--todo:sts changes-->
                     <script type='text/javascript' src="{{asset('public/display_slider/wowslider.js')}}"></script>
                     <script type='text/javascript' src="{{asset('public/display_slider/script.js')}}"></script>
                <?php } ?>

            </div>

            <div class="clearfix"></div>


        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop