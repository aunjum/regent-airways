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
    <title>Homepage - Regent Airways</title>
    <meta name="description" content="">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700,900' rel='stylesheet' type='text/css'>
    <?php if($company_data) { ?>
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

    <!--[if IE]>

    <style>
        .margin-bottomline{margin-right:10px;}
    </style>

    <![endif]-->


    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



    
    
    
</head>
<body>

    <!--==========================Navigation============================-->
    @include('frontend/layout/display-navigation')
    <!--==========================End Navigation============================-->

    <!--=========================Main Body==================================-->
    @yield('content')
    <!--=========================End Main Body==================================-->
    
    <!--=========================Footer==================================-->
    @include('frontend/layout/display-footer')
    
    <!--=========================End Footer==================================-->

    <section id="login" class="pop-out mfp-hide">

        <div class="popup-head">

            Login to your account

        </div>

        <form action="" method="post">

            <div class="popups">

                <input type="text" placeholder="Your email address" />

                <span class="icon-envelope-alt"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Password" />

                <span class="icon-unlock"></span>

            </div>

            <button type="submit">Login now</button>

        </form>

    </section>

    <section id="register" class="pop-out mfp-hide">

        <div class="popup-head">

            CREATE NEW ACCOUNT

        </div>

        <form action="" method="post">

            <div class="popups">

                <input type="text" placeholder="Your email address" />

                <span class="icon-envelope-alt"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Password" />

                <span class="icon-unlock"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Confirm password" />

                <span class="icon-unlock"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Password" />

                <span class="icon-user"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Your address" />

                <span class="icon-home"></span>

            </div>

            <div class="popups">

                <input type="text" placeholder="Your phone" />

                <span class="icon-phone-sign"></span>

            </div>

            <button type="submit">Register now</button>

        </form>

    </section>

    <section id="explore" class="mfp-hide" >

        <div id="explore-carousel" class="carousel slide">

            <!-- Carousel items -->

            <div class="carousel-inner">

                <div class="active item">

                    <img src="assets/img/slides/explore.jpg" alt="" />

                    <div class="explore-caption">

                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim.</p>

                    </div>

                </div>

                <div class="item">

                    <img src="assets/img/slides/explore.jpg" alt="" />

                    <div class="explore-caption">

                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim.</p>

                    </div>

                </div>

            </div>

            <!-- Carousel nav -->

            <a class="carousel-control left" href="#explore-carousel" data-slide="prev"><span class="icon-double-angle-left"></span></a>

            <a class="carousel-control right" href="#explore-carousel" data-slide="next"><span class="icon-double-angle-right"></span></a>

        </div>

    </section>


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


       <script type="text/javascript">
         //uses classList, setAttribute, and querySelectorAll
         //if you want this to work in IE8/9 youll need to polyfill these
         (function(){
           var d = document,
                   accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
                   setAria,
                   setAccordionAria,
                   switchAccordion,
                   touchSupported = ('ontouchstart' in window),
                   pointerSupported = ('pointerdown' in window);

           skipClickDelay = function(e){
             e.preventDefault();
             e.target.click();
           }

           setAriaAttr = function(el, ariaType, newProperty){
             el.setAttribute(ariaType, newProperty);
           };
           setAccordionAria = function(el1, el2, expanded){
             switch(expanded) {
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
           switchAccordion = function(e) {
             e.preventDefault();
             var thisAnswer = e.target.parentNode.nextElementSibling;
             var thisQuestion = e.target;
             if(thisAnswer.classList.contains('is-collapsed')) {
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
           for (var i=0,len=accordionToggles.length; i<len; i++) {
             if(touchSupported) {
               accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
             }
             if(pointerSupported){
               accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
             }
             accordionToggles[i].addEventListener('click', switchAccordion, false);
           }
         })();
       </script>
    

</body>
</html>