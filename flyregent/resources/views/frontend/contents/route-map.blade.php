@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
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
        color: #b68d2a;
        font-size: 22px;
        z-index: 99999;
        font-weight: bold;
        text-align: center;
        margin-top: 30px;
    }
    .date_time{
        color: #d00000;  
        margin-top: 8px;

    }
    .flip-clock-wrapper{
        left: 33%;
    }
    .vert {
        height: 400px !important;
    }
    .vert .simply-scroll-clip{
        height: 400px !important;
    }
</style>
<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">
                <div class="contents min_height">

                    <div class="content-fade text-center" >

                        <a href="{{ URL::to('/') }}/route-map-live">
                            <img src="{{ URL::to('/') }}/public/images/route.jpg" style="width: 100%">
                        </a>

                    </div>
                    
                     <!-- <div class="flight_schedule_route_page">

                    <script type='text/javascript' src="{{asset('public/scroll/jquery.simplyscroll.js')}}"></script>
                    <link href="{{asset('public/scroll/jquery.simplyscroll.css')}}" rel='stylesheet' type='text/css'>
                    <script type="text/javascript">
                        (function ($) {
                            $(function () {
                                $("#scroller").simplyScroll({orientation: 'vertical', customClass: 'vert'});
                            });
                        })(jQuery);
                    </script>

                    <link href="{{asset('public/clock/flipclock.css')}}" rel='stylesheet' type='text/css'>
                    <script type='text/javascript' src="{{asset('public/clock/flipclock.js')}}"></script>

                    <div class="display_title">
                        Regent Flight Status
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

                    <div class="clearfix"></div>



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


                    </div> -->
                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop
