<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <?php
    $company_data = Helper::get_company();
    ?>
    <head>
        <meta charset="utf-8">
        <title>{{$title}} - Regent Airways</title>
        <meta name="description" content="">
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700,900' rel='stylesheet' type='text/css'>

        <?php if ($company_data) { ?>
            <link rel="shortcut icon" href="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$company_data[0]->image}}">
        <?php } ?>
    <!--todo:sts changes-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.2/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/flexslider-min.css" rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.3/magnific-popup.min.css" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/refineslide.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/refineslide-theme-dark.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/layerslider.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/smoothness/jquery-ui-1.10.3.custom.min.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/main.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{asset('public/assets/css/custom.css') }}" rel='stylesheet' type='text/css'>

        <style>
            body{
                font-family: 'kalpurush' !important;
            }
            #nav li a{
                font-size: 17px;
            }
            .slider_menu li{
                padding-right: 105px;
            }
            .regent tr:first-child td{
                font-size: 17px;
            }
            .regent td{
                font-size: 15px;
            }
        </style>
        <!--[if IE]>
    
        <style>
            .margin-bottomline{margin-right:10px;}
        </style>
    
        <![endif]-->


        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {

                var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener");
                _floatbox.css("right", "-333px");

                _floatbox_opener.click(function () {
                    if (_floatbox.hasClass('visiable')) {
                        _floatbox.animate({"right": "-333px"}, {duration: 300}).removeClass('visiable');
                    } else {
                        _floatbox.animate({"right": "0px"}, {duration: 300}).addClass('visiable');
                    }
                });

                $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function () {
                    $(this).css('border-color', '');
                    $("#result").slideUp();
                });
            });

            function filter(active) {
                $(".tour").hide();
                $("." + active + "").show();
            }
            function open_tour_details(which) {
                $(".tour" + which).slideToggle('slow');
            }
            function open_book_flight() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);

                if ($('.container_book_flight').css('display') == 'none') {
                    $('.container_book_flight').show("slide", {direction: "right"}, 1000);
                } else {
                    $('.container_book_flight').hide("slide", {direction: "right"}, 1000);
                }
            }
            function open_manage_booking() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);

                if ($('.container_manage_booking').css('display') == 'none') {
                    $('.container_manage_booking').show("slide", {direction: "right"}, 1000);
                } else {
                    $('.container_manage_booking').hide("slide", {direction: "right"}, 1000);
                }
            }
            function open_agent() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);

                if ($('.container_agent').css('display') == 'none') {
                    $('.container_agent').show("slide", {direction: "right"}, 1000);
                } else {
                    $('.container_agent').hide("slide", {direction: "right"}, 1000);
                }
            }
            function open_map() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);

                if ($('.container_map').css('display') == 'none') {
                    $('.container_map').show("slide", {direction: "right"}, 1000);
                } else {
                    $('.container_map').hide("slide", {direction: "right"}, 1000);
                }
            }
            function open_ffp() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);


                if ($('.container_ffp').css('display') == 'none') {
                    $('.container_ffp').show("slide", {direction: "right"}, 1000);
                } else {
                    $('.container_ffp').hide("slide", {direction: "right"}, 1000);
                }
            }

            function close_sl_menu_contents() {
                $('.slider_menu_contents_container').hide("slide", {direction: "right"}, 1000);
            }

            //        $(window).scroll(function(){
            //            if ($(window).scrollTop() > 110) {
            //                $('.quick-access').hide();
            //                $('#navbar').addClass('fixed');
            //            } else {
            //                $('.quick-access').show();
            //                $('#navbar').removeClass('fixed');
            //            }
            //        });


            function open_right_fixed_contents(which) {
                $('.rf_menu_contents').hide();

                if ($('.rf_menu_contents_container').css('display') == 'none') {
                    $('.rf_menu_contents_container').show("slide", {direction: "rigth"}, 1000);
                    $('.rf_' + which + '_contents').show();
                } else {
                    $('.rf_menu_contents_container').hide("slide", {direction: "rigth"}, 1000);
                }

            }


            function close_rf_menu_contents() {
                $('.rf_menu_contents_container').hide("slide", {direction: "right"}, 1000);
            }


            function op_chat() {
                $('.devs_chat_form_container').show();
                $('.devs_chat').hide();
                $('.live_chat_msg_status').hide();
            }
            function close_chat() {
                $('.devs_chat_form_container').hide();
                $('.devs_chat').show();
            }


            function show_more(which) {
                $('.less_contents_' + which).hide();
                $('.more_contents_' + which).show();
            }

            function less(which) {
                $('.less_contents_' + which).show();
                $('.more_contents_' + which).hide();
            }

            function show_less() {
                $('.tour_item').hide();
                count = 0;
                $('.tour_item').each(function () {
                    count++;
                    if (count <= 4) {
                        $(this).show();
                    }
                });

                $('.view_all_button').show();
                $('.view_less_button').hide();
            }



            function show_packages(which, base_url) {

                if (which == 'all') {
                    $('.more_container').hide();
                    $('.tab_link').addClass('selected');

                    $.ajax({
                        type: "POST",
                        url: base_url + "/get_packages",
                        data: "type=all",
                        cache: false,
                        success: function (result) {
                            $(".titem_wrapper").show();
                            $(".titem_wrapper").html(result);
                        }
                    });

                }

                if (which == 'more') {

                    $('.tour_item').show();
                    $('.view_all_button').hide();
                    $('.view_less_button').show();

                }

                if ((which != 'more') && (which != 'all')) {

                    $('.tab_link').removeClass('selected');

                    $.ajax({
                        type: "POST",
                        url: base_url + "/get_packages",
                        data: "type=" + which,
                        cache: false,
                        success: function (result) {

                            result = result.split('@');

                            $(".titem_wrapper").show();
                            $(".titem_wrapper").html(result[0]);

                            if (result[1] > 4) {
                                $('.more_container').show();
                                $('.view_all_button').show();
                                $('.view_less_button').hide();
                            } else {
                                $('.view_all_button').hide();
                                $('.view_less_button').hide();
                            }

                        }
                    });

                    $('.tab_link').removeClass('current');
                }



            }

            $(function () {
                $(".invertedshiftdown li").click(function (e) {
                    e.preventDefault();
                    $(".invertedshiftdown li").removeClass("selected");
                    $(this).addClass("selected");
                });
            });


            function translate(which) {
                $('.ln_contents').hide();
                $('.contents_' + which).show();
                $('.ln_btn').removeClass('active_ln');
                $('.btn_' + which).addClass('active_ln');
            }

            function translate2(which) {
                $('.ln_contents2').hide();
                $('.contents_' + which).show();
                $('.ln_btn2').removeClass('active_ln');
                $('.btn_' + which).addClass('active_ln');
            }

            function instruction(which) {
                $('#myModal_' + which).modal('show');
            }

            function send_message(base_url, formNo) {
                chat_name = $('.chat_name'+formNo).val();
                chat_email = $('.chat_email'+formNo).val();
                chat_contact = $('.chat_contact'+formNo).val();
                _token = $('input[name="_token"]')[0].val();
                message = $('.chat_message'+formNo).val();

                
                var error = '';

                if (chat_name.trim() == '') {
                    $('.chat_name'+formNo).addClass('danger_field');
                    error = 'true';
                } else {
                    $('.chat_name'+formNo).removeClass('danger_field');
                }

                if (chat_email.trim() == '') {
                    $('.chat_email'+formNo).addClass('danger_field');
                    error = 'true';
                } else {
                    $('.chat_email'+formNo).removeClass('danger_field');
                }

                if (chat_contact.trim() == '') {
                    $('.chat_contact'+formNo).addClass('danger_field');
                    error = 'true';
                } else {
                    $('.chat_contact'+formNo).removeClass('danger_field');
                }

                if(formNo==1){
                    var response = grecaptcha.getResponse();
                    if(!response.length) {
                        console.log(response);
                        error = 'true';
                        $('.rc-anchor-light.rc-anchor-normal').css('border','1px solid #da0a0a');
                    }
                    else{
                        $('.rc-anchor-light.rc-anchor-normal').css('border','1px solid #d3d3d3');
                    }
                }

                if (error != '') {
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "/send-live-chat",
                    data: 'name=' + chat_name + '&email=' + chat_email+ '&contact=' + chat_contact + '&_token=' + _token +'&message='+message,
                    cache: false,
                    success: function (result) {
                        $( ".chat_info_box"+formNo ).hide();
                        $(".live_chat_msg_status").text(result);
                        $(".live_chat_msg_status").show();
                        $(".live_chat_msg_status").removeClass('none');
                        $(".fb_chat"+formNo).show();
                    }
                });
            }
        $(document).ready(function (){
          $(".sales_promotion").click(function(){                
                 $('html, body').animate({
                      scrollTop: $(".msg_btn").offset().top
                }, 2000);               
            });
        });
        </script>



        <!--Start of Zopim Live Chat Script-->
    <!--<script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="//v2.zopim.com/?3VZYPWDxaLlMr1mGS3P7n6stkljTWkS2";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>-->
        <!--End of Zopim Live Chat Script-->


    </head>
    <body>

        <!--==========================Book Ticket============================-->

        @include('frontend/bn/layout/book-ticket')

        <!--==========================End Book Ticket============================-->
        <!--==========================Navigation============================-->
        @include('frontend/bn/layout/navigation')
        <!--==========================End Navigation============================-->

        <!--=========================Main Body==================================-->
        @yield('content')
        <!--=========================End Main Body==================================-->
        <!--=========================Footer==================================-->
        @include('frontend/bn/layout/footer')
        <!--=========================End Footer==================================-->


        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/jquery.mobilemenu.js') }}"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/jquery.flexslider-min.js"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.3/jquery.magnific-popup.min.js"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/jquery.refineslide.min.js') }}"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/layerslider.transitions.js') }}"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
        <script type='text/javascript' src="{{asset('public/assets/js/main.js') }}"></script>
        <script type='text/javascript' src="{{asset('public/js/regentscript.js') }}"></script>


        <script type="text/javascript">
            //uses classList, setAttribute, and querySelectorAll
            //if you want this to work in IE8/9 youll need to polyfill these
            (function () {
                var d = document,
                        accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
                        setAria,
                        setAccordionAria,
                        switchAccordion,
                        touchSupported = ('ontouchstart' in window),
                        pointerSupported = ('pointerdown' in window);

                skipClickDelay = function (e) {
                    e.preventDefault();
                    e.target.click();
                }

                setAriaAttr = function (el, ariaType, newProperty) {
                    el.setAttribute(ariaType, newProperty);
                };
                setAccordionAria = function (el1, el2, expanded) {
                    switch (expanded) {
                        case "true":
                            setAriaAttr(el1, 'aria-expanded', 'true');
                            setAriaAttr(el2, 'aria-hidden', 'false');
                            break;
                        case "false":
                            setAriaAttr(el1, 'aria-expanded', 'false');
                            setAriaAttr(el2, 'aria-hidden', 'true');
                            break;
                        default:
                            break;
                    }
                };
                //function
                switchAccordion = function (e) {
                    e.preventDefault();
                    var thisAnswer = e.target.parentNode.nextElementSibling;
                    var thisQuestion = e.target;
                    if (thisAnswer.classList.contains('is-collapsed')) {
                        setAccordionAria(thisQuestion, thisAnswer, 'true');
                    } else {
                        setAccordionAria(thisQuestion, thisAnswer, 'false');
                    }
                    thisQuestion.classList.toggle('is-collapsed');
                    thisQuestion.classList.toggle('is-expanded');
                    thisAnswer.classList.toggle('is-collapsed');
                    thisAnswer.classList.toggle('is-expanded');

                    thisAnswer.classList.toggle('animateIn');
                };
                for (var i = 0, len = accordionToggles.length; i < len; i++) {
                    if (touchSupported) {
                        accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
                    }
                    if (pointerSupported) {
                        accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
                    }
                    accordionToggles[i].addEventListener('click', switchAccordion, false);
                }
            })();
        </script>

        <!-- Modal -->
        <div class="modal fade none" id="myModal_book_flight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">বুক ফ্লাইট নির্দেশনা</h4>
                    </div>
                    <div class="modal-body">

                        <div class="contents">
                            <?php
                            $bfi = Helper::get_book_flight_ins();
                            if (!is_null($bfi)) {
                                ?>
                                <div class="essential-title">{{$bfi[0]->title_bn}}</div>

                                <div class="flyregent-text">
                                    {{$bfi[0]->description_bn}}
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">বন্ধ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade none" id="myModal_manage_booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">বুকিং পরিবর্তন নির্দেশনা</h4>
                    </div>
                    <div class="modal-body">


                        <div class="contents">
                            <?php
                            $mb = Helper::get_manage_booking_ins();
                            if (!is_null($mb)) {
                                ?>
                                <div class="essential-title">{{$mb[0]->title_bn}}</div>

                                <div class="flyregent-text">
                                    {{$mb[0]->description_bn}}
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">বন্ধ</button>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>