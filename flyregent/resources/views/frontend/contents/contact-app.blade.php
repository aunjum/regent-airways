@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
<style>
    header, .modal-footer-custom, .right_fixed_links, .right_fixed_links_mobile{
        display: none;
    }
</style>
<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">
                <div class="contents">

                    <div class="content-fade mbDouble" >
                        <div  class="content-title">Bangladesh</div>
                        <div class="contents">

                    <?php
                    if (!is_null($add_data)) {
                        $a = 0;
                        foreach ($add_data as $add) {
                            if ($add->country == 'Bangladesh') {

                                $a++;
                                ?>
                                <div class="col-md-3">
                                    <?php if ($a > 1) { ?>
                                        <hr/>
                                    <?php } ?>

                                    <div class="address">
                                        <h3>
                                            <span style="font-size:18px;"><?php echo $add->title; ?></span> 
                                        </h3>

                                        <?php echo $add->short_desc; ?>
                                        <?php echo $add->description; ?>
                                    </div>


                                    <div class="clearfix"></div>

                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
                    
                    </div>
                    </div>

                    <div class="content-fade " >
                    <div class="content-title">International</div>
                    
                    <div class="contents">

                    <?php
                    if (!is_null($add_data)) {
                        $a = 0;
                        foreach ($add_data as $add) {
                            if ($add->country == 'International') {

                                $a++;
                                ?>
                                <div class="col-md-3">
                                    <?php if ($a > 1) { ?>
                                        <hr/>
                                    <?php } ?>

                                    <div class="address">
                                        <h3>
                                            <span style="font-size:18px;"><?php echo $add->title; ?></span> 
                                        </h3>

                                        <?php echo $add->short_desc; ?>
                                        <?php echo $add->description; ?>
                                    </div>


                                    <div class="clearfix"></div>

                                </div>

                                <?php
                            }
                        }
                    }
                    ?>

                </div>
                </div>

                </div>
            </div>
        </section>

    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop