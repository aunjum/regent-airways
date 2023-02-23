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
                <div class="">

                    <div class="row-fluid">              
                        <div class="international">

                            <div class="text-center flight_type">
                                <h2 class="inter content-fade">আন্তর্জাতিক ফ্লাইট</h2>
                            </div>

                            <div class="regent" >
                                <table >
                                    
                                    <tr>
                                        <td>
                                            ফ্লাইট
                                        </td>
                                        <td >
                                            দিন
                                        </td>
                                        <td>
                                            যাত্রা <br/>সময়
                                        </td>
                                        <td>
                                            পৌঁছান <br/> সময়
                                        </td>
                                    </tr>
                                    <?php 
                                    if(!is_null($route)){
                                        
                                        for($m = 0; $m < count($route); $m++){
                                        if($route[$m][2] == 'International')  {  
                                            
                                           $int_route_id = $route[$m][0];
                                   ?>
                                    <tr>
                                        <td colspan="4" class="flight_route">
                                            <?php echo $route[$m][1]?>
                                        </td>
                                    </tr>
                                    
                                    <?php

                                    if(!is_null($flight_data[$int_route_id])){
                                    for($k = 0; $k < count($flight_data[$int_route_id]); $k++){
                                    ?>
                                    <tr class="<?php if($k % 2) echo 'flight_even'?> ">
                                        <td >
                                            {{$flight_data[$int_route_id][$k][0]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$int_route_id][$k][1]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$int_route_id][$k][2]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$int_route_id][$k][3]}}
                                        </td>
                                    </tr>

                                    <?php } }?>
                                    
                                    <?php } } }?>
                                    
                                    
                                </table>
                            </div>


                        </div>
                        
              

                        <div class="domestic">
                            <div class="text-center flight_type">
                                <h2 class="inter content-fade">অভ্যন্তরীণ ফ্লাইট</h2>
                            </div>

                            <div class="regent" >
                                <table >
                                    <tr>
                                        <td>
                                            ফ্লাইট
                                        </td>
                                        <td >
                                            দিন
                                        </td>
                                        <td>
                                            যাত্রা <br/>সময়
                                        </td>
                                        <td>
                                            পৌঁছান <br/> সময়
                                        </td>
                                    </tr>
                                    
                                    
                                    <?php 
                                    if(!is_null($route)){
                                        
                                        for($i = 0; $i < count($route); $i++){
                                        if($route[$i][2] == 'Domestic')  {  
                                            
                                           $route_id = $route[$i][0];
                                   ?>
                                    
                                    <tr class="flight_route">
                                        <td colspan="4">
                                            <?php echo $route[$i][1]?>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    for($j = 0; $j < count($flight_data[$route_id]); $j++){
                                    ?>
                                    <tr class="<?php if($j % 2) echo 'flight_even'?> ">
                                        <td >
                                            {{$flight_data[$route_id][$j][0]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$route_id][$j][1]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$route_id][$j][2]}}
                                        </td>
                                        <td>
                                            {{$flight_data[$route_id][$j][3]}}
                                        </td>
                                    </tr>
                                    
                                        <?php } ?>

                                    <?php } } } ?>

                                </table>
                            </div>


                        </div>
                    </div>
                    <br/>
                    <br/>

                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop