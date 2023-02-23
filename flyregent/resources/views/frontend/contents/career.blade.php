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
                    @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                    @endif
                    
                    <?php
                    if (!is_null($career_data)) {
                        ?>
                    
                    <div class="accordion">
                        <dl>
                            
                    <?php
                    
                        $l = 0;
                        foreach ($career_data as $value) {
                            $l++;
                            
                     ?>
                            
                            <dt>
                            <a href="#accordion{{$l}}" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">{{$value->title}}</a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion{{$l}}" aria-hidden="true">
                                <div class="common_padd">
                                    {{--todo: sts changes--}}
                                {!! $value->description !!}
                                
                                    <br/>
<!--                                    <a href="{{ URL::to('/') }}/apply/{{$value->id}}" class="btn btn-primary">Apply Now</a>-->
                             </div>
                                


                                    
                            </dd>
                            
                    <?php }  ?>
                            
                            
                        </dl>
                    </div>
                    
                    <?php }else{ ?>
                    
                    <div class="alert alert-info">There is no job available right now.</div>
                    
                    <?php } ?>
                    
                </div>



            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop
