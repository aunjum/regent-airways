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

                <div class="tab_container min_height">
                    @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                    @endif

                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/experience-submit">


<!--
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="contact" placeholder="Contact No" required>
                            </div>
                        </div>

<!--                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Your Suggestions</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="comments" placeholder="Your Suggestions"></textarea>
                            </div>
                        </div>-->



                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Continue</button>
                            </div>
                        </div>


                    </form>
                </div>



            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop