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

                <div class="content-fade mbDouble" >

                    <?php if ($title == 'Book Flight') { ?>

                        <?php if ($from == 'mininav') { ?>

                            <div class="content-title">
									বুক ফ্লাইট
                            </div>

                        <?php } ?>
                    
                    <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">নির্দেশনা দেখুন</a>
                        <iframe scrolling="no" style="margin-top:5%;width:100%;height: 300px;    padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
                        </iframe>

                    <?php } ?>


                    <?php if ($title == 'Manage Booking') { ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                বুকিং পরিচালনা
                            </div>
                        <?php } ?>

                        <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">নির্দেশনা দেখুন</a>
                        <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
                        </iframe>


                    <?php } ?>

                    <?php if ($title == 'Member Login') { ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                নিয়মিত যাত্রী লগইন
                            </div>
                        <?php } ?>

                        <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 300px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
                        </iframe>


                    <?php } ?>

                    <?php if ($title == 'Route Map') { ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
									যাত্রাপথের মানচিত্র
                            </div>
                        <?php } ?> 

                        <br/>
                        <img src="{{ URL::to('/') }}/public/images/route.jpg" style="width: 100%">


                    <?php } ?>

                    <?php if ($title == 'Agent Login') { ?>

                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                এজেন্ট লগইন 
                            </div>
                        <?php } ?>

                        <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/AgentLogin.aspx">
                        </iframe>

                    <?php } ?>

                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop