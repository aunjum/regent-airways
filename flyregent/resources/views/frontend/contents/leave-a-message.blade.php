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

                
                <div class="tab_container" style="min-height: 430px">
                <h4 class="text-info">Leave a message</h4>
                    <hr>
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
                    <label  class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-4">
                        <textarea  class="form-control chat_message3" name="message" required></textarea>
                    </div>
                </div>
                            <div class="gr3-outer">
                    <div class="g-recaptcha" data-sitekey="6LeZLk8UAAAAAPiDmtasdL7O7XnYsbJAfSW7YAoF" id="RecaptchaField3"></div>
                               <input type="hidden" class="hiddenRecaptcha" name="ct_hiddenRecaptcha" id="ct_hiddenRecaptcha3">

                </div>

                    <div>
                        <div class="col-sm-4">
                            <button type="button" onclick="return send_message('{{ URL::to('/') }}', 3);" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                    </span>

                    {{--<div class="fb_chat3">--}}
                        {{--<div class="fb-page" --}}
                             {{--data-href="https://www.facebook.com/flyregent/" --}}
                             {{--data-tabs="messages" --}}
                             {{--data-width="300" --}}
                             {{--data-height="240" --}}
                             {{--data-small-header="true" --}}
                             {{--data-adapt-container-width="false" --}}
                             {{--data-hide-cover="true" --}}
                             {{--data-show-facepile="false">--}}
                            {{--<div class="fb-xfbml-parse-ignore">--}}
                                {{--<blockquote>--}}
                                    {{--<a href="https://m.me/flyregent/">Message Us</a>--}}
                                {{--</blockquote>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </form>

                </div>

 

            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop