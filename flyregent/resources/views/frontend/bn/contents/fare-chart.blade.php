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

                        <?php if(!is_null($fare_data)){ ?>
                            <div class="regent" >
                                <table >
                                    
                                    <tr>
                                        <td colspan="2">
                                            আন্তর্জাতিক
                                        </td>
                                        <td >
                                            একমুখী*
                                        </td>
                                        <td>
                                            ফেরৎ*
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    $k = 0;
                                    foreach ($fare_data as $fvalue) {
                                    if($fvalue->type == 'International'){    
                                    $k++;    
                                    ?>
                                    <tr class="<?php if($k % 2) echo 'flight_even'?> ">
                                        <td >
                                            {{$fvalue->from_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->to_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->one_way_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->return_bn}}
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
                                            আন্তর্জাতিক
                                        </td>
                                        <td >
                                            একমুখী*
                                        </td>
                                        <td>
                                            ফেরৎ*
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
                                            {{$fvalue->from_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->to_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->one_way_bn}}
                                        </td>
                                        <td>
                                            {{$fvalue->return_bn}}
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
                            <a href="#accordion{{$l}}" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">{{$tcvalue->title_bn;}}</a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion{{$l}}" aria-hidden="true">
                                <div class="common_padd">
                                {{$tcvalue->description_bn;}}
                             </div>
                            </dd>
                            
                    <?php } } ?>
                            
                            
                        </dl>
                    </div>
                    
                    
                    
                    <i>**ভাড়া, শুল্ক, শর্তাবলী পূর্বে নোটিশ ছাড়াই পরিবর্তন যোগ্য.</i>
                    
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