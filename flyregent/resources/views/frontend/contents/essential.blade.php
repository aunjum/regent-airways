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

                    <?php
                    if (!is_null($page_data)) {
                        $sl = 0;
                        foreach ($page_data as $ess) {
                            $sl++;
                            ?>
                            <div class="essential-item content-fade">

                                <div class="flyregent-text-holder essential-information">

                                    <div class="flyregent-text-inner">

                                        <div class="essential-title">{{$ess->title}}</div>
{{--todo: sts changes--}}
                                        <div class="flyregent-text">
                                            {!! $ess->description!!}
                                        </div>

                                    </div>                

                                </div>

                                <div class="essential-image-holder" style="margin-left: 20px;">
                                    <img class="essential-image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$ess->image}}" alt=""></div>

                            </div>

                        <?php }
                    }
                    ?>



                </div>

            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop