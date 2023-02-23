@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
<style>
    .colored td{
            background-color: #BC942F;
            color: #fff;
    }
</style>
<?php if($tag){ ?>
<script>
$(document).ready(function() {
        $('html, body').animate({scrollTop: '+=150px'}, 800);
});
</script>
<?php } ?>
<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">
                <div class="">

                    <div class="row-fluid">              

                        <?php if(!is_null($fare_data)){ ?>
                            <div class="regent" >
                                <table >
                                    
                                    <tr>
                                        <td colspan="2">
                                            INTERNATIONAL
                                        </td>
                                        <td >
                                            ONEWAY*
                                        </td>
                                        <td>
                                            RETURN*
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    $k = 0;
                                    foreach ($fare_data as $fvalue) {
                                    if($fvalue->type == 'International'){    
                                    $k++;    
									$current_tag = $fvalue->from.$fvalue->to;
                                    ?>
                                    <tr class="<?php if($k % 2) echo 'flight_even'?> <?php if($tag == $current_tag) echo 'colored'?>">
                                        <td >
                                            {{$fvalue->from}}
                                        </td>
                                        <td>
                                            {{$fvalue->to}}
                                        </td>
                                        <td>
                                            {{$fvalue->one_way}}
                                        </td>
                                        <td>
                                            {{$fvalue->return}}
                                        </td>
                                    </tr>

                                    <?php } } ?>
 
                                </table>
                            </div>
                           <?php } ?>
                        
                        <br/>
                        <br/>

                        <?php if(!is_null($fare_data)){ ?>
                            <div class="regent" >
                                <table >
                                    
                                    <tr>
                                        <td colspan="2">
                                            DOMESTIC
                                        </td>
                                        <td >
                                            ONEWAY*
                                        </td>
                                        <td>
                                            RETURN*
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    $k = 0;
                                    foreach ($fare_data as $fvalue) {
                                    if($fvalue->type == 'Domestic'){    
                                    $k++;    
                                    ?>
                                    <tr class="<?php if($k % 2) echo 'flight_even'?> ">
                                        <td >
                                            {{$fvalue->from}}
                                        </td>
                                        <td>
                                            {{$fvalue->to}}
                                        </td>
                                        <td>
                                            {{$fvalue->one_way}}
                                        </td>
                                        <td>
                                            {{$fvalue->return}}
                                        </td>
                                    </tr>

                                    <?php } } ?>
 
                                </table>
                            </div>
                           <?php } ?>

                     <br/>
                    <br/>
                        
                        
                    <div class="accordion fare">
                        <dl>
                            
                    <?php
                    if (!is_null($tc_data)) {
                        $l = 0;
                        foreach ($tc_data as $tcvalue) {
                            $l++;
                            
                     ?>
                            
                            <dt>
                            <a href="#accordion{{$l}}" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">{{$tcvalue->title}}</a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion{{$l}}" aria-hidden="true">
                                <div class="common_padd">
                                    {{--todo: sts changes--}}

                                    {!! $tcvalue->description !!}
                             </div>
                            </dd>
                            
                    <?php } } ?>
                            
                            
                        </dl>
                    </div>
                    
                    
                    
                    <i>**Fares, Taxes, Terms & Conditions are subject to change without prior notice.</i>
                    
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