@extends('frontend.bn.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/bn/layout/content-slider')
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
<!--                      <iframe src="https://planefinder.net/" style="width: 800px; height: 400px"></iframe>-->
                        <a href="{{ URL::to('/') }}/route-map-live">
                        <img src="{{ URL::to('/') }}/public/images/route.jpg" style="width: 100%">
                        </a>

                    </div>
                    
                    <div class="flight_schedule_route_page"> 

                    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.js"></script>
                     <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.css" rel='stylesheet' type='text/css'>
                    <script type="text/javascript">
                        (function ($) {
                            $(function () {
                                $("#scroller").simplyScroll({orientation: 'vertical', customClass: 'vert'});
                            });
                        })(jQuery);
                    </script>

                     <link href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css" rel='stylesheet' type='text/css'>
                    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js"></script>

                    <div class="display_title">
                        রিজেন্ট ফ্লাইট অবস্থা
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
                            <div class="head_col1">ফ্লাইট নম্বর</div>  
                            <div class="head_col2">হতে</div>  
                            <div class="head_col3">পর্যন্ত</div>  
                            <div class="head_col4">সময়</div>  
                            <div class="head_col5">অবস্থা</div>  
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
                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop