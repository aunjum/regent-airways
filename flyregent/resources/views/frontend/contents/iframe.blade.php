@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
<style>
    .nop p{
        padding: 0 !important;
    }
</style>
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
                                Book Flight
                            </div>

                        <?php } ?>
                    
                    <!--a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">See Instruction</a-->
                        <iframe scrolling="no" style="margin-top:5%; width:100%; height: 290px; padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
                        </iframe>

                    <?php } ?>


                    <?php if ($title == 'Manage Booking') { ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                Manage Booking
                            </div>
                        <?php } ?>

                        <!--a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">See Instruction</a-->
                        <br/>
                        <div class="clearfix"></div>
                        <div style="width:270px;margin:auto;">
                            <iframe scrolling="no" style="margin-top:5%;width:100%; height:240px; padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
                        </iframe>
                        </div>
                        <!--div class="contents">
                            <?php
                            $mb = Helper::get_manage_booking_ins();
                            if (!is_null($mb)) {
                                ?>
                                <div class="essential-title">{{$mb[0]->title}}</div>

                                <div class="nop">
                                    {!! $mb[0]->description !!}
                                </div>
                                <?php
                            }
                            ?>
                        </div-->

                    <?php } ?>

                    <?php if ($title == 'Join FFP'){ ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                Join FFP
                            </div>
                        <?php } ?>

                        <iframe scrolling="no" style="margin-top:5%;width:100%;height: 300px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
                        </iframe>


                    <?php } ?>

                    <?php if ($title == 'Member Login'){ ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                Member Login
                            </div>
                        <?php } ?>

                        <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 300px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
                        </iframe>


                    <?php } ?>

                    <?php if ($title == 'Route Map') { ?>


                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                Route Map
                            </div>
                        <?php } ?> 

                        <br/>
                        <img src="{{ URL::to('/') }}/public/images/route.jpg" style="width: 100%">


                    <?php } ?>

                    <?php if ($title == 'Agent Login') { ?>

                        <?php if ($from == 'mininav') { ?>
                            <div class="content-title">
                                Agent Login
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
