<!-- contact form start -->
<div class="right_fixed_links">
    <ul>
        <li>
            <a class="rf_book_flight" href="javascript:;" onclick="open_right_fixed_contents('book_flight')" title="বুক ফ্লাইট">&nbsp;</a>
        </li>
        <li>
            <a class="rf_manage_booking" href="javascript:;" onclick="open_right_fixed_contents('manage_booking')" title="বুকিং পরিবর্তন">&nbsp;</a>
        </li>
        <li>
            <a class="rf_agent sales_promotion" href="javascript:;" title="সেলস প্রোমোশন">&nbsp;</a>
        </li>

        <li>
            <a class="rf_ffp" onclick="open_right_fixed_contents('ffp')" title="FFP">&nbsp;</a>
        </li>
        <li>
            <a class=" rf_route" href="javascript:;" onclick="open_right_fixed_contents('route')" title="একটি বার্তা ত্যাগ">&nbsp;</a>
        </li>
    </ul>
    <div class="rf_menu_contents_container none">
        <div class="rf_book_flight_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">বন্ধ</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
					বুক ফ্লাইট
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('book_flight')">নির্দেশনা দেখুন</a>
            <iframe scrolling="no" style="margin-top:5%;width:100%;height: 250px;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/vars/public/CustomerPanels/Requirements.aspx">
            </iframe>
        </div>
        <div class="rf_manage_booking_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">বন্ধ</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
						বুকিং পরিবর্তন
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <a href="javascript:;" class="instruction pull-right" role="button" onclick="instruction('manage_booking')">বুকিং পরিবর্তন</a>
            <iframe scrolling="no" style="margin-top:5%;width:100%;padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/MMBLogin.aspx">
            </iframe>
        </div>
        <div class="rf_ffp_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">বন্ধ</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
						নিয়মিত যাত্রী লগইন
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <iframe scrolling="yes" style="margin-top:5%;width:100%;height: 290px;    padding-left: 15px;"  frameborder="0" allowtransparency="true" src="http://onlinebooking.flyregent.com/VARS/Public/CustomerPanels/FQTVLogin.aspx">
            </iframe>
        </div>
        <div class="rf_route_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">বন্ধ</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
		একটি বার্তা ত্যাগ
                    <div class="head-bottom-bar"></div>
                </div>
            </div>
            <br/>
            <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
                <div class="alert alert-success none live_chat_msg_status"></div>
  
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
                    <div class="col-sm-4">
                        <button type="button" onclick="return send_message('{{ URL::to('/') }}', 2);" class="btn btn-primary">Continue</button>
                    </div>
                </div>
                </span>

                <div class="fb_chat2 none">
                    <div class="fb-page" 
                         data-href="https://www.facebook.com/flyregent" 
                         data-tabs="messages" 
                         data-width="420" 
                         data-height="240" 
                         data-small-header="true" 
                         data-adapt-container-width="false" 
                         data-hide-cover="true" 
                         data-show-facepile="false">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote>
                                <a href="https://m.me/flyregent">Message Us</a>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </form>
            
            
        </div>
        <div class="rf_agent_contents none rf_menu_contents">
            <a href="javascript:;" class="close-btn blue-outline pull-right" role="button" onclick="close_rf_menu_contents()">বন্ধ</a>
            <div class="clearfix"></div>
            <div class="desti-head">
                <div class="heading">
						এজেন্ট লগইন
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
            <a class="rf_book_flight" href="{{ URL::to('/') }}/iframe/mininav/Book Flight" title="বুক ফ্লাইট">&nbsp;</a>
        </li>
        <li>
            <a class="rf_manage_booking" href="{{ URL::to('/') }}/iframe/mininav/Manage Booking" title="বুকিং পরিচালনা">&nbsp;</a>
        </li>
        <li>
            <a class="rf_agent sales_promotion" href="javascript:;" title="সেলস প্রোমোশন">&nbsp;</a>
        </li>

        <li>
            <a class="rf_ffp" href="{{ URL::to('/') }}/iframe/mininav/Member Login" title="FFP">&nbsp;</a>
        </li>
        <li>
            <a class="rf_route" href="{{ URL::to('/') }}/leave-a-message" title="একটি বার্তা ত্যাগ">&nbsp;</a>
        </li>
    </ul>
</div>