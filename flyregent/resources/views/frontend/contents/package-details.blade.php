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
                @if($package_data)
                <div class="content-fade mbDouble" >

                    <div class="content-title">
                        {{$package_data->place}}
                    </div>

                    <div class="contents">
                        <div style="max-width:100%" class="package_details">
                            <div style="float: left; width: 75%">
                                <h2>{{$package_data->title}}</h2>
                            </div>
                            <div style="float: left; width: 25%">
                                <img style="max-width: 200px; max-height: 200px;" class="pull-right radius details_image" src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$package_data->image}}"/>
                            </div>
                            @foreach($package_data->details as $detail)
                            <span style="font-size: 16px; font-weight: 700;">{{$detail->hotel}}:</span>
                            <table class="holiday_package_hotel" border="0" bordercolor="#ccc" cellpadding="5" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">Package</th>
                                    <th scope="col">Adult</th>
                                    <th scope="col">Child</th>
                                    <th scope="col">Infant</th>
                                    <th scope="col">Book Now</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(json_decode($detail->packages) as $package)
                                <tr>
                                    <td><strong>{{$package->type}}</strong></td>
                                    <td align="right">@if($package->adult){{number_format($package->adult,'2','.',',')}}@endif</td>
                                    <td align="right">@if($package->adult){{number_format($package->child,'2','.',',')}}@endif</td>
                                    <td align="right">@if($package->adult){{number_format($package->infant,'2','.',',')}}@endif</td>

                                    <td>
                                        @if($package->bookable)
                                        <form action="{{URL::route('package-booking')}}" method="POST" enctype="multipart/form-data" style="margin: 0 0 0;" target="_blank">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$detail->holiday_package_id}}" name="package_id">
                                            <input type="hidden" value="{{$detail->id}}" name="detail_id">
                                            <input type="hidden" value="{{$package->type}}" name="type">
                                            <input class="form-btn" type="submit" value="Book Now">
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endforeach
                            {!! $package_data->description !!}
                        </div>

                    </div>
                </div>
                    @endif


            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop
