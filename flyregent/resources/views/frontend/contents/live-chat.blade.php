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

                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/live-chat">



                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{{Session::get('name')}}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{{Session::get('email')}}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="contact" placeholder="Contact No" value="{{{Session::get('contact')}}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-md-4 control-label">Your Message<span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea class="form-control textarea" name="message" placeholder="Your Message"></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Send</button>
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