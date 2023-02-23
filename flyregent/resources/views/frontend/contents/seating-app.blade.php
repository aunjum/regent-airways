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

                    <?php
                    if (!is_null($page_data)) {

                        foreach ($page_data as $value) {
                            ?>

                            <div class="content-fade mbDouble" >

                                <div class="content-title">
                                    {{$value->title}}
                                </div>
                                <!--todo: sts changes-->
                                <div class="contents">
                                    {!! $value->description !!}


                                    <?php if ($value->image) { ?>
                                        <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$value->image}}" class="content-image"/>
                                    <?php } ?>

                                </div>


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