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

                
                <div class="tab_container min_height">

                    <?php
                    if (!is_null($page_data)) {
                        ?>
                    <div class="accordion">
                        <dl>
                            
                    <?php
                    
                        $l = 0;
                        foreach ($page_data as $value) {
                            $l++;
                            
                     ?>
                    <!--todo: sts changes-->
                            <dt>
                            <a href="#accordion{{$l}}" aria-expanded="<?php if($l == 1) echo 'true';else echo 'false';?>" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger <?php if($l == 1){ ?> is-collapsed is-expanded <?php } ?>">{{$value->title}}</a>
                            </dt>
                            <dd class="accordion-content accordionItem <?php if($l == 1) echo 'is-expanded';else echo 'is-collapsed';?>" id="accordion{{$l}}" aria-hidden="true">
                                <div class="common_padd">
                                {!! $value->description !!}
                             </div>
                            </dd>
                            
                    <?php } ?>
                            
                            
                        </dl>
                    </div>
                    
                    <?php } ?>
                </div>

            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop