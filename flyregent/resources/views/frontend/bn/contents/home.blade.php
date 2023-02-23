@extends('frontend.bn.layout.master-layout')
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
    </script>
<!--=========================================Slider======================================================-->
    <section id="home">
        
        <div class="pos_rel" style="    z-index: 99;">
            <div class="iframe-vrs book_container col-md-4">
                <ul class="slider_menu">
                    <li>
                        <a href="javascript:;" onclick="open_book_flight()">বুক ফ্লাইট</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="open_manage_booking()">বুকিং পরিবর্তন</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="sales_promotion">সেলস প্রোমোশন</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="open_ffp()">FFP</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="open_map()" class="msg_btn">একটি বার্তা ত্যাগ</a>
                    </li>
                </ul>
                <div class="container_book_flight none slider_menu_contents_container">

                        <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">বন্ধ</a>
                        <div class="clearfix"></div>
                            <div class="desti-head">
                            <div class="heading">
									বুক ফ্লাইট
                                <div class="head-bottom-bar"></div>
                            </div>
                        </div>
                        <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">নির্দেশনা দেখুন</a>
                        <iframe scrolling="no" style="margin-top:5%;width:100%;height: 315px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
                        </iframe>
                </div>
                
                <div class="container_manage_booking none slider_menu_contents_container">
                    <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">বন্ধ</a>
                    <div class="clearfix"></div>
                    <div class="desti-head">
                        <div class="heading">
								বুকিং পরিবর্তন
                            <div class="head-bottom-bar"></div>
                        </div>
                    </div>
                    <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">নির্দেশনা দেখুন</a>
                    <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
                    </iframe>
                </div>
                
                <div class="container_agent none slider_menu_contents_container">
                        <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">বন্ধ</a>
                        <div class="clearfix"></div>
                        <div class="desti-head">
                            <div class="heading">
									এজেন্ট লগইন
                                <div class="head-bottom-bar"></div>
                            </div>
                        </div>
                        <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/AgentLogin.aspx">
                        </iframe>
                </div>
                

                
                <div class="container_map none slider_menu_contents_container">
                        <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">বন্ধ</a>
                        <div class="clearfix"></div>
                        <div class="desti-head">
                            <div class="heading">
				একটি বার্তা ত্যাগ
                                <div class="head-bottom-bar"></div>
                            </div>
                        </div>
                        <br/>
            <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
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
                </div>

                <div>
                    <label  class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_contact1" name="contact" placeholder="Contact No" required>
                    </div>
                </div>

                <div>
                    <div class="col-sm-4">
                        <button type="button" onclick="return send_message('{{ URL::to('/') }}', 1);" class="btn btn-primary">Continue</button>
                    </div>
                </div>
                </span>

                <div class="fb_chat1 none">
                    <div class="fb-page" 
                         data-href="https://www.facebook.com/flyregent/" 
                         data-tabs="messages" 
                         data-width="420" 
                         data-height="240" 
                         data-small-header="true" 
                         data-adapt-container-width="false" 
                         data-hide-cover="true" 
                         data-show-facepile="false">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote>
                                <a href="https://m.me/flyregent/">Message Us</a>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </form>
                </div>
                
                <div class="container_ffp none slider_menu_contents_container">
                        <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_sl_menu_contents()">বন্ধ</a>
                        <div class="clearfix"></div>
                        <div class="desti-head">
                            <div class="heading">
									নিয়মিত যাত্রী লগইন
                                <div class="head-bottom-bar"></div>
                            </div>
                        </div>
                        <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 275px;    padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
                        </iframe>
                </div>
                
                </div>
            </div>

        <!--todo:sts changes-->
        <link href="{{asset('public/assets/engine1/style.css') }}" rel='stylesheet' type='text/css'>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<?php
            if (!is_null($slider_data)) {
?>
<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
            <?php
                $sl = 0;
                foreach ($slider_data as $slider) {
                    
                    ?>
            <li><img src="{{ Helper::getImageBaseUrl() }}/public/upload/slider/{{$slider->image}}" alt="slide{{$sl}}" title="slide1" id="wows1_{{$sl}}"/></li>

                <?php $sl++; } ?>
        </ul>
    </div>

    <div class="ws_shadow"></div>
</div>	
 <?php } ?>
    <!--todo:sts changes-->
<script type='text/javascript' src="{{asset('public/assets/engine1/wowslider.js') }}"></script>
<script type='text/javascript' src="{{asset('public/assets/engine1/script.js') }}"></script>

        
<!--        <div id="home-slider" style="width: 100%; height: 470px; margin: 0px auto; ">
            
            <?php
            if (!is_null($slider_data)) {
                $sl = 0;
                foreach ($slider_data as $slider) {
                    $sl++;
                    ?>

                    <div class="ls-layer " style="slidedelay: 2000; slidedirection: fade;  durationin: 1000; durationout: 1000; easingIn : easing; easingOut : easing;">
                        <img src="{{ Helper::getImageBaseUrl() }}/public/upload/slider/{{$slider->image}}" class="ls-bg" alt="">
                    </div>

                <?php }
            } ?>
            
        </div>-->


        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js"></script>
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
        <div class="slider-overlay">
            <div class="overlay-line"></div>
            <div class="overlay-content">
                
                <?php if(!is_null($fair_data)){ ?>
                <div class="">
                    <div class="marquee-with-options scrolling_packages">
                        <a href="#" >
                            <ul>
                                
                                <?php
                                foreach ($fair_data as $fair) {
                                ?>
                                <li>
                                    <div class="scroll_item">
                                        <div class="left-part">
                                            <div class="top-part">
                                                <span class="txt-1">৳</span>
                                                <span class="txt-2">{{$fair->title_bn}}</span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="bootum-part">{{$fair->description_bn}}</div>
                                        </div>
                                    </div>
                                </li>
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



<?php
if (!is_null($offers_data)) {
    ?>



    <section id="special-offers">
        <div class="header-outer">
                                    <div class="section-header" style="margin-top: -51px;">
                                        <span>বিশেষ প্রোমোশন</span>
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
                                <div class="span7">
                                    <div class="content">
                                        <div class="content-head">{{$offers_con->title}}</div>
<!--                                        <div class="content-title">Costa Rica Flights and Hotels</div>-->
                                        {{$offers_con->description}}
                                    </div>
                                </div>
                                <div class="span5" style="position:relative; text-align: right;" >
                                    <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$offers_con->image}}" alt="" class="offer_image"/>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="tour-bottom-line container"></div>
                </div>
            </div>
        </div>
    
    </section>

<?php } ?>

    
    
    <div class="BG-map">
        <div class="">
            <div class="clearfix"></div>
            <section id="">
                <div class="tabs-top-border"></div>
                <div class="container" style="margin-bottom: 30px;">
                    <ul class="filter-out">
                        <li class="header" >
                            <?php $url = URL::to('/');?>
                            <a href="javascript:;" onclick="show_packages('all', '<?php echo $url?>')">
                                <div class="header-outer">
                                    <div class="section-header">
                                        <span>ছুটির প্যাকেজ</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="invertedshiftdown">
                        <ul>
                            <li class="current tab_link Bangkok_Link" onclick="show_packages('Bangkok', '<?php echo $url?>')"><a href="javascript:;">থাইল্যান্ড</a></li>
                            <li class="tab_link" onclick="show_packages('Kuala Lumpur', '<?php echo $url?>')"><a href="javascript:;">মালয়েশিয়া</a></li>
                            <li class="tab_link" onclick="show_packages('Singapore', '<?php echo $url?>')"><a href="javascript:;">সিঙ্গাপুর</a></li>
                            <li class="tab_link" onclick="show_packages('Kolkata', '<?php echo $url?>')"><a href="javascript:;">কলকাতা</a></li>
                            <li class="tab_link" onclick="show_packages('cox', '<?php echo $url?>')"><a href="javascript:;">কক্সবাজার</a></li>
                        </ul>
                    </div>
                    <br style="clear: both;" />
                    <div class="clearfix"></div>
                    <div class="titem_wrapper">


                        <?php
                        if (!is_null($package_data)) {
                            $p = 0;
                            foreach ($package_data as $package) {
                                $p++;
                                ?>
                                <div class="tour_item <?php if($p % 4 == 0) { echo ' tour-row-end'; } if($p > 4) echo 'none';?> ">
                                    <div class="tour-visual">
                                        <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$package->image}}" alt="" />
                                        <div class="hover"></div>
                                    </div>
                                    <div class="head">
                                        <a href="{{ URL::to('/') }}/package/{{$package->id}}/{{$package->title}}"><?php echo $package->title;?> </a>
                                    </div>
                                    <div class="rate">
                                        <div class="tag-line">
                                            {{$package->short_desc}}
                                        </div>
                                    </div>
                                </div><!--\\tour1-->

    <?php }
} ?>


                    </div>
                    <div class="clearfix"></div>

                    
                    
                    <div class="more_container" style="<?php if($p <= 4){ ?>display: none;<?php } ?>">
                    <a href="javascript:;" class="booknow pull-right view_all_button" onclick="show_packages('more', '<?php echo $url?>');">আরো দেখুন</a>
                    <a href="javascript:;" class="booknow pull-right view_less_button none" onclick="show_less();">কম দেখুন</a>
                    </div>
                        
                    
                    <div class="clearfix"></div>
                </div><!--container-->
            </section>
        </div>
    </div>
<!--=========================================End Main Body================================================-->

</div>
@stop