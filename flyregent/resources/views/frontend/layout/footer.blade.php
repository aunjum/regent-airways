<footer class="modal-footer-custom">
    <div class="footer-inner">
        <div class="row-fluid container text-center">
<!--            <ul class="social">
                <li><a href="http://facebook.com/flyregent"><span class="icon-facebook-sign"></span> Like Us on Facebook</a></li>
                <li><a href="https://twitter.com/Flyregent"><span class="icon-twitter-sign"></span> Follow us @Flyregent</a></li>
            </ul>-->

<ul class="social footer_social">
	<li>
		<a target="_blank" href="https://play.google.com/store/apps/details?id=net.flyregent.regentairways">
			<img src="{{ URL::to('/') }}/public/images/android.png">
		</a>
		<a target="_blank" href="https://appsto.re/us/1VU2jb.i">
                        <img src="http://www.flyregent.com/public/images/itunes1.png">
                </a>

	</li>
</ul>

<!--<ul class="social footer_social">
	<li>
        	<a target="_blank" href="https://play.google.com/store/apps/details?id=net.flyregent.regentairways">
            		<img src="http://flyregent.com/public/images/android.png">
		</a>
		<a target="_blank" href="https://appsto.re/us/1VU2jb.i">
            		<img src="http://flyregent.com/public/images/itunes_icon.png">
		</a>
	</li>
</ul>-->

<ul class="social footer_social">
	<li>
		<a target="_blank" href="http://facebook.com/flyregent">
			<img src="{{ URL::to('/') }}/public/images/footer-fb.png"> Like Us on Facebook
		</a>
	</li>
</ul>

            
            <ul class="footer-list">
<!--                <li><a href="{{ URL::to('/') }}/live-chat">Live Chat</a> |</li>-->
                <!--<li><a href="{{ URL::to('/') }}/experience">FFP Registration</a> |</li>-->
                <li><a href="{{ URL::to('/') }}/iframe/nav/Agent Login">Agent Login</a> |</li>
                <!--li><a href="{{ URL::to('/') }}/newsletter">Subscribe to E-newsletter</a> |</li-->
                <li> <a href="{{ URL::to('/') }}/career">Career With Us</a> |</li>
                <li> <a href="{{ URL::to('/') }}/contact">Contact Us</a></li>
                {{--<li><a href="{{ URL::to('/') }}/press" title="Press Room" class="item-page-link">RX Picture</a></li>--}}
            </ul>




        </div>
    </div>

    <div class="footer-line">
        <div class="row-fluid container text-center">
            <span class="copyright">
                Copyright © <?php echo date('Y');?> Regent Airways. <img src="{{ URL::to('/') }}/public/images/flyregent-origin-logo-small.png"> A subsidiary of Habib group.<!--a href="http://servoit.com/" target="_blank" style="color: #d9d900">ServoIT Ltd.</--a>
            </span>
        </div>
    </div>
    
    
<!--        <div class="devs_chat_form_container none">
            
            <div class="support" onclick="close_chat()">Support <div class="minimize"></div></div>
            
            <form class="devs_chat_form" enctype="multipart/form-data" method="post" action="#">
                <div class="alert alert-success none live_chat_msg_status"></div>
                <p>Sorry, we aren't online at the moment. Leave a message and we'll get back to you.</p>
                <span class="chat_info_box">
                <div>
                    <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_name" name="name" placeholder="Name"  required>
                    </div>
                </div>

                <div>
                    <label class="col-sm-2 control-label">Email<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control chat_email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div>
                    <label  class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control chat_contact" name="contact" placeholder="Contact No" required>
                    </div>
                </div>

                <div>
                    <div class="col-sm-4">
                        <button type="button" onclick="return send_message('{{ URL::to('/') }}');" class="btn btn-primary" style="width: 100%;">Continue</button>
                    </div>
                </div>
                </span>

                <div class="fb_chat none">
                    <div class="fb-page" 
                         data-href="https://www.facebook.com/Dekhobd-1533097256991208/" 
                         data-tabs="messages" 
                         data-width="270" 
                         data-height="240" 
                         data-small-header="true" 
                         data-adapt-container-width="false" 
                         data-hide-cover="true" 
                         data-show-facepile="false">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote>
                                <a href="https://m.me/Dekhobd-1533097256991208/">Message Us</a>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    
    <div class="devs_chat">
        <img src="{{ URL::to('/') }}/public/images/devs_chat.png" onclick="op_chat()">
    </div>-->
    
</footer>
