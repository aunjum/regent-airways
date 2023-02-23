@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

<style>
    body{
        background: #fff;
    }
    header, .modal-footer-custom, .right_fixed_links, .right_fixed_links_mobile{
        display: none;
    }
    #intro-wrapper{
        padding-top: 0px;
    }
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

                <div class=" mbDouble" >

                <!--a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">See Instruction</a-->
                <br/>
                <div class="clearfix"></div>
                <div style="width:270px;margin:auto;">
                    <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
                </iframe>
                </div>
                <div class="contents">
                    <?php
                    $mb = Helper::get_manage_booking_ins();
                    if (!is_null($mb)) {
                        ?>
                        <div class="essential-title">{{$mb[0]->title}}</div>

                        <div class="nop">
                            {{$mb[0]->description}}
                        </div>
                        <?php
                    }
                    ?>
                </div>
                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop