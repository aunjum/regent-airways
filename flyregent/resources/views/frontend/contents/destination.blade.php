@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')

<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>
        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">
                <div class="contents">

                    <div class="content-fade" >
                        <div  class="content-title">Domestic</div>
                        <div class="contents">
                            <?php
                            if (!is_null($page_data)) {
                            $sl = 0;
                            foreach ($page_data as $temp) {
                            $sl++;
                            if($temp->country=="Bangladesh"){
                            ?>
                            <div class="essential-item content-fade">

                                <div class="flyregent-text-holder essential-information">

                                    <div class="flyregent-text-inner">

                                        <div class="essential-title">{{$temp->title}}</div>

                                        <div class="flyregent-text">
                                            {!! $temp->description !!}
                                        </div>

                                    </div>

                                </div>

                                <div class="essential-image-holder" style="margin-left: 20px;">
                                    <img class="essential-image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$temp->image}}" alt=""></div>

                            </div>

                            <?php } } } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-inner-wrapper container">
                <div class="contents">

                    <div class="content-fade" >
                        <div  class="content-title">International</div>
                        <div class="contents">
                            <?php
                            if (!is_null($page_data)) {
                            $sl = 0;
                            foreach ($page_data as $temp) {
                            $sl++;
                            if($temp->country !="Bangladesh"){
                            ?>
                            <div class="essential-item content-fade">

                                <div class="flyregent-text-holder essential-information">

                                    <div class="flyregent-text-inner">

                                        <div class="essential-title">{{$temp->title}}</div>

                                        <div class="flyregent-text">
                                            {!! $temp->description !!}
                                        </div>

                                    </div>

                                </div>

                                <div class="essential-image-holder" style="margin-left: 20px;">
                                    <img class="essential-image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$temp->image}}" alt=""></div>

                            </div>

                            <?php } } } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop