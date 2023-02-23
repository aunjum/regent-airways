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
                <div class="min_height">

            <?php
            if (!is_null($page_data)) {
                $sl = 0;
                foreach ($page_data as $ess) {
                    $sl++;
                    ?>
                    <div class="essential-item content-fade">

                        <div class="flyregent-text-holder essential-information">

                            <div class="flyregent-text-inner">

                                <div class="essential-title">{{$ess->title_bn}}</div>

                                <div class="flyregent-text">
                                    <?php 
                                    $len = strlen($ess->description_bn);
                                    if( $len > 650){ 
                                        
                                        echo '<div class="less_contents_'.$sl.'">'.substr(($ess->description_bn), 0, 650).' ... <a href="javascript:show_more('.$sl.')">See More</a></div>';
                                        
                                    }else{
                                        echo $ess->description_bn;
                                    }
                                    ?>
                                    
                                    <div class="more_contents_{{$sl}} none">{{$ess->description_bn}} <a href="javascript:less({{$sl}})">See Less</a></div>
                                </div>

                            </div>                

                        </div>

                        <div class="essential-image-holder" style="margin-left: 20px;">
                            <img class="essential-image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$ess->image}}" alt=""></div>

                    </div>
                    
                    <?php } } ?>



                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop