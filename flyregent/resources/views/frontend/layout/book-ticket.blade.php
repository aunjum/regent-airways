<!-- contact form start -->
<div class="right_fixed_links">
    <ul>
        <li>
            <a class="rf_book_flight" href="javascript:;" onclick="open_right_fixed_contents('book_flight')" title="Book a Flight">Book a Flight</a>
        </li>
        <li>
            <a class="rf_manage_booking" href="javascript:;" onclick="open_right_fixed_contents('manage_booking')" title="Manage my Booking">Manage Booking</a>
        </li>
        <li>
            <a class="rf_agent sales_promotion" href="javascript:;" title="Sales Promotion">Sales Promotion</a>
        </li>
        <!--li>
            <a class="rf_ffp" href="javascript:;" onclick="open_right_fixed_contents('ffp')" title="FFP">&nbsp;</a>
        </li-->
        <li>
            <a class="rf_route" onclick="open_right_fixed_contents('route')" href="javascript:;" title="Leave a Message">Leave a Message</a>
        </li>

    </ul>
    <div class="rf_menu_contents_container none">
        <div class="rf_book_flight_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">Close</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
                    Book a Flight
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">See Instruction</a>
            <iframe scrolling="no" style="margin-top:5%;width:100%;height: 250px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
            </iframe>
        </div>
        <div class="rf_manage_booking_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">Close</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
                    Manage Booking
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">See Instruction</a>
            <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
            </iframe>
        </div>
        <div class="rf_ffp_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">Close</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
                    Frequent Flyer Login
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 290px;    padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
            </iframe>
        </div>
        <div class="rf_route_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">Close</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
                    Leave a Message
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <br/>
            <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
                <div class="alert alert-success none live_chat_msg_status"></div>
                {{ csrf_field() }}

                <span class="chat_info_box2">
                <div>
                    <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_name2" name="name" placeholder="Name"  required>
                    </div>
                </div>

                <div>
                    <label class="col-sm-2 control-label">Email<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control chat_email2" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div>
                    <label  class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_contact2" name="contact" placeholder="Contact No" required>
                    </div>
                </div>
                               <div>
                    <label  class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-4">
                        <textarea  class="form-control chat_message2" name="message2" required></textarea>
                    </div>
                </div>
                            <div class="gr2-outer">
                    <div class="g-recaptcha" data-sitekey="6LeZLk8UAAAAAPiDmtasdL7O7XnYsbJAfSW7YAoF" id="RecaptchaField2"></div>
                        <input type="hidden" class="hiddenRecaptcha" name="ct_hiddenRecaptcha" id="ct_hiddenRecaptcha2">

                </div>

                <div>
                    <div class="col-sm-4">
                        <button type="button" onclick="return send_message('{{ URL::to('/') }}', 2);" class="btn btn-primary">Continue</button>
                    </div>
                </div>
                </span>

                {{--<div class="fb_chat2 none">--}}
                    {{--<div class="fb-page" --}}
                         {{--data-href="https://www.facebook.com/flyregent/" --}}
                         {{--data-tabs="messages" --}}
                         {{--data-width="420" --}}
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
        <div class="rf_agent_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">Close</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
                    Agent Login
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/AgentLogin.aspx">
            </iframe>
        </div>
    </div>
</div>


<!------this ticket will show only on mobile--------->
<div class="right_fixed_links_mobile">
    <ul>
        <li>
            <a class="rf_book_flight" href="{{ URL::to('/') }}/iframe/mininav/Book Flight" title="Book Flight">&nbsp;</a>
        </li>
        <li>
            <a class="rf_manage_booking" href="{{ URL::to('/') }}/iframe/mininav/Manage Booking" title="Manage Booking">&nbsp;</a>
        </li>
        <li>
            <a class="rf_agent sales_promotion" href="javascript:;" title="Sales Promotion">&nbsp;</a>
        </li>

        <!--li>
            <a class="rf_ffp" href="{{ URL::to('/') }}/iframe/mininav/Member Login" title="FFP">&nbsp;</a>
        </li-->
        <li>
            <a class="rf_route" href="{{ URL::to('/') }}/leave-a-message" title="Leave a Message">&nbsp;</a>
        </li>
    </ul>
</div>
