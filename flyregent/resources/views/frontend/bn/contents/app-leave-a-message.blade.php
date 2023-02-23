@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
<style>
    header, .modal-footer-custom, .right_fixed_links, .right_fixed_links_mobile{
        display: none;
    }
</style>
<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">

            
            <div class="intro-inner-wrapper container">

                
                <div class="tab_container" style="min-height: 430px">

                <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
                    <div class="alert alert-success none live_chat_msg_status"></div>

                    <span class="chat_info_box3">
                    <div>
                        <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control chat_name3" name="name" placeholder="Name"  required>
                        </div>
                    </div>

                    <div>
                        <label class="col-sm-2 control-label">Email<span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control chat_email3" name="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div>
                        <label  class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control chat_contact3" name="contact" placeholder="Contact No" required>
                        </div>
                    </div>

                    <div>
                        <div class="col-sm-4">
                            <button type="button" onclick="return send_message('{{ URL::to('/') }}', 3);" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                    </span>

                    <div class="fb_chat3 none">
                        <div class="fb-page" 
                             data-href="https://www.facebook.com/flyregent/" 
                             data-tabs="messages" 
                             data-width="300" 
                             data-height="240" 
                             data-small-header="true" 
                             data-adapt-container-width="false" 
                             data-hide-cover="true" 
                             data-show-facepile="false">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote>
                                    <a href="https://m.me/flyregent/">Message Us</a>
                                </blockquote>
                            </div>
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