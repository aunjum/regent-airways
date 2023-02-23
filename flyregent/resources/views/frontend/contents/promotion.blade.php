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

                <div class="content-fade mbDouble" >

                    <div class="content-title">
                        {{$data_row->title}}
                    </div>

                    <div class="contents">


                        <div class="">
                            <h2><?php echo $data_row->short_desc; ?></h2>
                            <img class="pull-right radius details_image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$data_row->image}}"/>

                            <?php echo $data_row->description; ?>

                            
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