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

                    <?php
                    if (!is_null($page_data)) {
                        $sl = 0;
                        foreach ($page_data as $temp) {
                            $sl++;
                            ?>
                            <div class="essential-item content-fade">

                                <div class="flyregent-text-holder essential-information">

                                    <div class="flyregent-text-inner">

                                        <div class="essential-title">{{$temp->title_bn}}</div>

                                        <div class="flyregent-text">
                                            {{$temp->description_bn}}
                                        </div>

                                    </div>                

                                </div>

                                <div class="essential-image-holder" style="margin-left: 20px;">
                                    <img class="essential-image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$temp->image}}" alt=""></div>

                            </div>

                        <?php }
                    } ?>



                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop