@extends('frontend.layout.master-layout')
@section('content')
    <!--=========================================Slider======================================================-->

    @include('frontend/layout/content-slider')

    <!--=========================================Main Body====================================================-->
    {{--<script--}}
    {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK1Cm738jGeCPojpp2OpURWJWDTMj2X8Y">--}}
    {{--</script>--}}


    <div class="BG-map">
        <div class="BG-map-inner">
            <div class="clearfix"></div>

            <section id="intro-wrapper" class="mb0">
                <div class="intro-inner-wrapper container">
                    <div class="contents">

                        <div class="content-fade mbDouble" >
                            <div  class="content-title">Bangladesh</div>
                            <div class="contents">

                                <div class="accordion">
                                    <dl>
                                        @foreach($domestic as $key => $addresses)
                                            <dt>
                                                <a href="#accordion{{$loop->iteration}}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger @if($loop->first) is-collapsed is-expanded @endif">{{$key}}</a>
                                            </dt>
                                            <dd class="accordion-content accordionItem @if($loop->first) is-expanded @else is-collapsed @endif" id="accordion{{$loop->iteration}}" aria-hidden="true">
                                                <div class="common_padd">
                                                    @foreach($addresses as $address)
                                                        <div class="row" style="margin-left: 0 !important;">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div  style="width: 55%;float: left;">
                                                                    <h3>
                                                                        @php
                                                                            $titlePart = explode('-',$address->title);
                                                                            $title_address = isset($titlePart[1]) ? $titlePart[1] : $address->title;

                                                                        @endphp
                                                                        <span style="font-size:18px;">{{$title_address}}</span>
                                                                    </h3>
                                                                    {!!  $address->short_desc !!}
                                                                    {!!  $address->description !!}
                                                                </div>
                                                                <div style="margin-left: 55%;padding: 5px;">
                                                                    <div class="myMap" style="height:190px;">
                                                                        <span class="latlong">{{$address->longitude_latitude}}</span>
                                                                        <span class="title">{{$address->title}}</span>
                                                                        <span class="address">{{trim($address->short_desc)}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>



                        <div class="content-fade " >
                            <div class="content-title">International</div>

                            <div class="contents">

                                <div class="accordion">
                                    <dl>
                                        @foreach($international as $key => $addresses)
                                            @php
                                                $a = $address->title;
                                                $t = strpos($a,'- ');
                                                $ex = substr($a,$t+1);

                                            @endphp
                                            <dt>
                                                <a href="#accordion{{$loop->iteration}}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger @if($loop->first) is-collapsed is-expanded @endif">{{$key}}</a>
                                            </dt>
                                            <dd class="accordion-content accordionItem @if($loop->first) is-expanded @else is-collapsed @endif" id="accordion{{$loop->iteration}}" aria-hidden="true">
                                                <div class="common_padd">
                                                    @foreach($addresses as $address)
                                                        @php
                                                            $c = count($addresses);
                                                        @endphp

                                                        @if($c == 1)
                                                            <div class="row" style="margin-left: 0 !important;">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div  style="width: 55%;float: left;">
                                                                        <h3>
                                                                            @php
                                                                                $titlePart = explode('-',$address->title);
                                                                                $title_address = isset($titlePart[1]) ? $titlePart[1] : $address->title;

                                                                            @endphp
                                                                            <span style="font-size:18px;">{{$title_address}}</span>
                                                                        </h3>
                                                                        {!!  $address->short_desc !!}
                                                                        {!!  $address->description !!}
                                                                    </div>
                                                                    <div style="margin-left: 55%;padding: 5px;">
                                                                        <div class="myMap" style="height:190px;">
                                                                            <span class="latlong">{{$address->longitude_latitude}}</span>
                                                                            <span class="title">{{$address->title}}</span>
                                                                            <span class="address">{{trim($address->short_desc)}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif

                                                    @endforeach
                                                </div>

                                                @if($c>1)

                                                    <div class="contents">

                                                        <div class="accordion">
                                                            <dl>
                                                                @foreach($addresses as $address)
                                                                    @php
                                                                        $a = $address->title;
                                                                        $t = strpos($a,'- ');
                                                                        $ex = substr($a,$t+1);
                                                                    @endphp

                                                                    <dt>
                                                                        <a href="#accordion{{$loop->iteration}}" aria-expanded="@if($loop->first) false @else false @endif" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger @if($loop->first) is-collapsed  @endif">{{$ex}}</a>
                                                                    </dt>

                                                                    <dd class="accordion-content accordionItem @if($loop->first) is-collapsed @else is-collapsed @endif" id="accordion{{$loop->iteration}}" aria-hidden="true">
                                                                        <div class="common_padd">
                                                                            <div class="row" style="margin-left: 0 !important;">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div  style="width: 55%;float: left;">
                                                                                        <h3>
                                                                                            @php
                                                                                                $titlePart = explode('-',$address->title);
                                                                                                $title_address = isset($titlePart[1]) ? $titlePart[1] : $address->title;

                                                                                            @endphp
                                                                                            <span style="font-size:18px;">{{$title_address}}</span>
                                                                                        </h3>
                                                                                        {!!  $address->short_desc !!}
                                                                                        {!!  $address->description !!}
                                                                                    </div>
                                                                                    <div style="margin-left: 55%;padding: 5px;">
                                                                                        <div class="myMap" style="height:190px;">
                                                                                            <span class="latlong">{{$address->longitude_latitude}}</span>
                                                                                            <span class="title">{{$address->title}}</span>
                                                                                            <span class="address">{{trim($address->short_desc)}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </dd>

                                                            </dl>
                                                        </div>
                                                    </div>

                                                @endif



                                            </dd>
                                        @endforeach
                                    </dl>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAYMZwGFaTA8MgyVq6PSgZhlrlL1rfIOAw"></script>
    <script>
        $(document).ready(function() {
            $('.myMap').each(function (index, el) {

                var coordinates = $(el).children('.latlong').text().split(",");
                var title = $(el).children('.title').text();
                var address = $(el).children('.address').text();

                if (coordinates.length != 2) {
                    $(el).hide();
                    return;
                }
                var latlng = new google.maps.LatLng(parseFloat(coordinates[0]), parseFloat(coordinates[1]));
                var myOptions = {
                    zoom: 18,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: false,
                    mapTypeControl: true,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL
                    }
                };
                var map = new google.maps.Map(el, myOptions);

                var contentString = '<div id="content">'+
                    '<h6>'+title+'</h6>'+
                    // '<div id="bodyContent">'+
                    // '<p>'+address+'</p>'+
                    // '</div>'+
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: title
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

            });


        });

    </script>

    <!--=========================================End Main Body================================================-->
@stop