@extends('frontend.layout.master-layout')
@section('content')
    <!--=========================================Slider======================================================-->
    @include('frontend/layout/content-slider')
    <style>
        caption{
            background:#b68d2a;
            font-size:140%;
            border-bottom:none;
            padding:10px;
            color: #fff;
        }
        .regent td{
            padding: 10px 5px;
        }
        .vert {
            height: 400px !important;
        }
        .vert .simply-scroll-clip{
            height: 400px !important;
        }
        .display_head div{
            font-size: 13px;
            padding: 8px 2.7px;
        }
        .head_col5, .col5 {
            width: 15%;
        }
        .head_col3, .head_col4, .col3, .col4 {
            width: 12%;
        }
        .head_col1, .col1 {
            width: 8%;
        }
        .head_col2, .col2 {
            width: 21%;
        }
        #scroller div, #scroller div {
            padding: 10px 3.4px;
            font-size: 13px;
        }
        #scroller,#scroller2{
            margin-left: 5px;

        }
        #scroller li,#scroller2 li{
            list-style-type: none;

        }
    </style>
    <!--=========================================Main Body====================================================-->
    <!--todo:sts changes-->
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.0.5/jquery.simplyscroll.min.css" rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        (function ($) {
            $(function () {
//                $("#scroller").simplyScroll({orientation: 'vertical', customClass: 'vert'});
            });
            $(function () {
//                $("#scroller2").simplyScroll({orientation: 'vertical', customClass: 'vert'});
            });
        })(jQuery);
    </script>
    <div class="BG-map">
        <div class="BG-map-inner">
            <div class="clearfix"></div>

            <section id="intro-wrapper" class="mb0">
                <div class="intro-inner-wrapper container">
                    <div class="min_height">
                        <div class="">
                            <div class="clearfix"></div>
                            <div class="text-center flight_type">
                                <h2 class="inter content-fade">International Flights</h2>
                            </div>
                            <div class="regent" >
                                <table id="flight_schedule_table">
                                    <tr>
                                        <td>Destination</td>
                                        <td >Route</td>
                                        <td>Days of Operation</td>
                                        <td>Via</td>
                                        <td>Flight No</td>
                                        <td>Departure Time</td>
                                        <td>Arrival Time</td>

                                    </tr>
                                    {{--@foreach($inn_data as $value)--}}
                                                {{--<tr class="@if($loop->iteration % 2) flight_even @else colored @endif">--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['destination']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['route']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['day']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['via']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['flight']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['dep_time']}}--}}
                                                    {{--</td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$value['arr_time']}}--}}
                                                    {{--</td>--}}


                                                {{--</tr>--}}

                                    {{--@endforeach--}}

                                    @foreach($inn_data as $key => $data)
                                        @foreach($data as $value)
                                            @if($loop->iteration == 1)
                                                <tr class="@if($loop->iteration % 2) flight_even @else colored @endif">
                                                    @php $rows = count($data); @endphp
                                                    <td rowspan="{{$rows+intval($rows/2)-1}}" style="background: @if($loop->parent->iteration % 2) #f5f5f5; @else #ececec @endif">
                                                        {{$key}}
                                                    </td>
                                                    <td>
                                                        {{$value['route']}}
                                                    </td>
                                                    <td>
                                                        {{$value['day']}}
                                                    </td>
                                                    <td>
                                                        {{$value['via']}}
                                                    </td>
                                                    <td>
                                                        {{$value['flight']}}
                                                    </td>
                                                    <td>
                                                        {{$value['dep_time']}}
                                                    </td>
                                                    <td>
                                                        {{$value['arr_time']}}
                                                    </td>

                                                </tr>
                                            @else

                                                <tr class="@if($loop->iteration % 2) flight_even @else colored @endif">
                                                    <td>
                                                        {{$value['route']}}
                                                    </td>
                                                    <td>
                                                        {{$value['day']}}
                                                    </td>
                                                    <td>
                                                        {{$value['via']}}
                                                    </td>
                                                    <td>
                                                        {{$value['flight']}}
                                                    </td>
                                                    <td>
                                                        {{$value['dep_time']}}
                                                    </td>
                                                    <td>
                                                        {{$value['arr_time']}}
                                                    </td>

                                                </tr>
                                                @if(!($loop->iteration % 2) && !$loop->last)
                                                    <tr>
                                                        <td colspan="8" style="background: #ffffff;">

                                                        </td>
                                                    </tr>
                                                @endif

                                            @endif




                                        @endforeach
                                        <tr>
                                            <td colspan="8" style="background: #f7cb4d;">

                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>

                        </div>
                        <br/>
                        <br/>
                        <br/>

                        <div class="clearfix"></div>
                        <div class="">
                            <div class="clearfix"></div>

                            <div class="text-center flight_type">
                                <h2 class="inter content-fade">Domestic Flights</h2>
                            </div>
                            <div class="regent" >
                                <table id="domestic_flight_schedule">
                                    <tr>
                                        <td>Destination</td>
                                        <td >Route</td>
                                        <td>Days of Operation</td>
                                        <td>Flight No</td>
                                        <td>Departure Time</td>
                                        <td>Arrival Time</td>
                                    </tr>
                                    @foreach($local_data as $key => $data)
                                        @foreach($data as $value)
                                            @if($loop->iteration == 1)
                                                <tr class="@if($loop->iteration % 2) flight_even @else colored @endif">
                                                    @php
                                                        $rows = count($data);
                                                        if(($rows%2)){
                                                           $rowSpan = $rows+intval($rows/2);
                                                        }
                                                        else{
                                                          $rowSpan =  $rows+intval($rows/2)-1;
                                                        }
                                                    @endphp
                                                    <td rowspan="{{$rowSpan}}" style="background: @if($loop->parent->iteration % 2) #f5f5f5; @else #ececec @endif">
                                                        {{$key}}
                                                    </td>
                                                    <td>
                                                        {{$value['route']}}
                                                    </td>
                                                    <td>
                                                        {{$value['day']}}
                                                    </td>
                                                    <td>
                                                        {{$value['flight']}}
                                                    </td>
                                                    <td>
                                                        {{$value['dep_time']}}
                                                    </td>
                                                    <td>
                                                        {{$value['arr_time']}}
                                                    </td>



                                                </tr>
                                            @else

                                                <tr class="@if($loop->iteration % 2) flight_even @else colored @endif">
                                                    <td>
                                                        {{$value['route']}}
                                                    </td>
                                                    <td>
                                                        {{$value['day']}}
                                                    </td>
                                                    <td>
                                                        {{$value['flight']}}
                                                    </td>
                                                    <td>
                                                        {{$value['dep_time']}}
                                                    </td>
                                                    <td>
                                                        {{$value['arr_time']}}
                                                    </td>

                                                </tr>
                                                @if(!($loop->iteration % 2) && !$loop->last)
                                                    <tr>
                                                        <td colspan="6" style="background: #ffffff;">

                                                        </td>
                                                    </tr>
                                                @endif

                                            @endif




                                        @endforeach
                                        <tr>
                                            <td colspan="6" style="background: #f7cb4d;">

                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>




                        </div>
                        <br/>
                        <span style="color: red;">Note: *RX1741/1742 will operate from 13th Dec'18</span><br>
                        <span style="color: red;">* All times are set in LT(local time).</span>
                    </div>
                </div>
            </section>



        </div>
    </div>
    <!--=========================================End Main Body================================================-->
@stop

@section('extrascript')
    <script>
         function spanFlightScheduleRow(tableId,indexOfColumnToRowSpan){
             var $table = $('#'+tableId);


             //this is the code to do spanning, should work for any table
             var rowSpanMap = {};
             $table.find('tr').each(function(){
                 var valueOfTheSpannableCell = $($(this).children('td')[indexOfColumnToRowSpan]).text();
                 $($(this).children('td')[indexOfColumnToRowSpan]).attr('data-original-value', valueOfTheSpannableCell);
                 rowSpanMap[valueOfTheSpannableCell] = true;
             });

             for(var rowGroup in rowSpanMap){
                 var $cellsToSpan = $('td[data-original-value="'+rowGroup+'"]');
                 var numberOfRowsToSpan = $cellsToSpan.length;
                 $cellsToSpan.each(function(index){
                     if(index==0){
                         $(this).attr('rowspan', numberOfRowsToSpan);
                     }else{
                         $(this).hide();
                     }
                 });
             }
         }
        $(document).ready(function(){
            //this is where you put in your settings
//            spanFlightScheduleRow('flight_schedule_table',0);
//            spanFlightScheduleRow('domestic_flight_schedule',0);

        });
    </script>
    @stop