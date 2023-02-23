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
                <div class="contents">

                    <div class="content-fade mbDouble" >
                        <div  class="content-title">বাংলাদেশ</div>
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

                                    <div class="gmap">
                                        
                                        <?php if($add->image){ ?>
                                            
                                            <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$add->image}}" alt="" style="width: 100%; max-height: 200px;">
                                            
                                        <?php }else { ?>
                                            
                                        <iframe
                                            width="100%" frameborder="0" style="border:0"
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpdjyeOPpSlU1aHEuGGjm_MLTAGgZFLAA
                                            &q=<?php echo $add->short_desc; ?>" allowfullscreen>
                                        </iframe>
                                        
                                        <?php } ?>
                                        
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
                    <div class="content-title">আন্তর্জাতিক</div>
                    
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

                                    <div class="gmap">
                                        <?php if($add->image){ ?>
                                            
                                        <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$add->image}}" alt="" style="width: 100%; max-height: 180px;">
                                            
                                        <?php }else { ?>
                                        
                                        <iframe
                                            width="100%" frameborder="0" style="border:0"
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpdjyeOPpSlU1aHEuGGjm_MLTAGgZFLAA
                                            &q=<?php echo $add->short_desc; ?>" allowfullscreen>
                                        </iframe>
                                        
                                        <?php } ?>
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