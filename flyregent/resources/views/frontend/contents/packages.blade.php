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


                    <div class="tab_container min_height">

                        <section id="">
                            <div class="tabs-top-border"></div>
                            <div class="container" style="margin-bottom: 30px;">
                                <ul class="filter-out">
                                    <li class="header" >
                                        <a href="javascript:;" onclick="show_packages('all')">
                                            <div class="header-outer">
                                                <div class="section-header">
                                                    <span>HOLIDAY PACKAGES</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="invertedshiftdown">
                                    <ul id="holidayPackageUL">
                                        @foreach($holidayPackageCountry as $name)
                                            @php
                                                $lolHTML = 'onclick="show_packages(\''.str_replace("'","\'",$name->country).'\')"';
                                            @endphp
                                            <li class="@if($loop->first) current @endif tab_link" {!! $lolHTML !!} ><a href="javascript:void(0);">{{$name->country}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br style="clear: both;" />
                                <div class="clearfix"></div>
                                <div class="titem_wrapper">

                                </div>
                                <div class="clearfix"></div>



                                <div class="more_container" style="display: none;">
                                    <a href="javascript:;" class="booknow pull-right view_all_button" onclick="show_packages('more');">See More</a>
                                    <a href="javascript:;" class="booknow pull-right view_less_button none" onclick="show_less();">See Less</a>
                                </div>


                                <div class="clearfix"></div>
                            </div><!--container-->
                        </section>

                    </div>

                </div>
            </section>



        </div>
    </div>
    <!--=========================================End Main Body================================================-->
@stop
