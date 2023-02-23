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

                <div class="content-fade mbDouble" >

                    <div class="content-title">
                        {{$package_data[0]->title}}
                    </div>

                    <div class="contents">


                        <div class="pull-left">
                            <h2><?php echo $package_data[0]->short_desc; ?></h2>
                            <img class="pull-right radius details_image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$package_data[0]->image}}"/>

                            <?php echo $package_data[0]->description; ?>

                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop