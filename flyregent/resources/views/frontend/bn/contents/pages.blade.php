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

                    <div class="content-fade" >

                        <div class="contents">
                            
                            {{$page_data[0]->description_bn}}


                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop