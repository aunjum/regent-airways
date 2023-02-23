<?php
$news_data = Helper::get_news();
?>
<header >
    <nav id="navbar">
        <div class="quick-access">
            <div class="contact-access container2">


                <div class="pull-left ">
                    <a href="{{ URL::to('/') }}/">
                        <?php if ($company_data) { ?>
                            <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$company_data[0]->image}}"/>
                        <?php } ?>
                    </a>
                </div>

                <div class="pull-right contact_container">  
                    <div class="new_block_container pull-right">
                        <a href="javascript:change_language('{{Request::url();}}', 'en')">
                            <img class="english" src="{{ URL::to('/') }}/public/images/flags/gb.png"/> English
                        </a>
                        <a class="" href="{{ URL::to('/') }}/public/apps/regent_airways.apk" download>
                            <img src="{{ URL::to('/') }}/public/images/and.png"> App Download
                        </a>
                        <a href="http://facebook.com/flyregent" target="_blank">
                            <img src="{{ URL::to('/') }}/public/images/like-fb.png"> Like us on Facebook
                        </a>
                    </div>


                    <div class="pull-left tel">
                        <?php if ($company_data) { ?>
                            <div>
                                <a href="mailto:{{$company_data[0]->email}}" class="email">
                                    {{$company_data[0]->email}}
                                </a>
                            </div>
                        <?php } ?>

                        <?php if ($company_data) { ?>
                            <div>
                                <a href="#" class="hotline">
                                    {{$company_data[0]->phone}}
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--quick-access-->
        <?php if ($news_data) { ?>
            <marquee direction="laft" class="scrolling_news">
                <?php echo $news_data[0]->description_bn; ?>
            </marquee>
        <?php } ?>

        <div id="nav">
            <div id="navinner" class="container">
        <!--    <div class="logo"><img src="assets/img/logo.png" alt="logo" class="img-responsive"/></div>-->
                <ul id="mobile" class="nav">
                    <li><a href="{{ URL::to('/') }}/">প্রথম পাতা</a></li>
                    <li><a href="{{ URL::to('/') }}/flight-schedule">বিমান সময়সূচী</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">তথ্য <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/baggage">লাগেজ তথ্য</a></li></br>
                            <li> <a href="{{ URL::to('/') }}/in-flight-seating">বিমান আসনবিন্যাস</a></li></br>
                            <li><a href="{{ URL::to('/') }}/travel-requirements">ভ্রমন শর্ত</a></li></br>
                            <li><a href="{{ URL::to('/') }}/essential-information">গুরত্বপূর্ণ তথ্য</a></li></br>
                            <li><a href="{{ URL::to('/') }}/in-flight-service">ইন-ফ্লাইট সেবা</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">FFP <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/iframe/nav/Member Login">সদস্য লগইন</a></li>
                            <li><a href="{{ URL::to('/') }}/experience">FFP নিবন্ধন</a></li>
                            <li><a href="{{ URL::to('/') }}/rewards">পুরস্কার</a></li>
                            <li style="display:block"><a href="{{ URL::to('/') }}/benefits">সুবিধা</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">গন্তব্য <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/destination-information">গন্তব্যের তথ্য</a></li>
                            <li><a href="{{ URL::to('/') }}/route-map">যাত্রাপথের মানচিত্র</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">প্যাকেজ  <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/package-details">প্যাকেজ গন্তব্য</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">বিক্রয় <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/fare-chart">ভাড়া তালিকা</a></li>
                            <li><a href="{{ URL::to('/') }}/pages/14/Corporate Sales">কর্পোরেট বিক্রয়</a></li>
                            <li><a href="{{ URL::to('/') }}/contact">বিক্রয় অফিসের ঠিকানা</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">রিজেন্ট সম্পর্কে <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/') }}/pages/15/About Us">আমাদের সম্পর্কে</a></li>
                            <li><a href="{{ URL::to('/') }}/pages/16/The Logo">লোগো</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--navbar-->
</header>

<?php
$ses_id = Session::get('ses_id');
if (!isset($ses_id)) {
    ?>

    <script type="text/javascript">
        $(window).load(function () {
            $('#myModal').modal('show');
        });
    </script>
    <style>
    .box_android{
        float:left;width: 50%;
    }
    .box_ffp{
        float:left;width: 50%;
    }
    .adv_popup .box_android a, .adv_popup .box_ffp a{
        width: 70%;    display: inline-block;color:#fff;border: 1px solid #fff;padding: 5px;border-radius: 3px;
    }
    .adv_popup .box_android a:hover, .adv_popup .box_ffp a:hover{
       text-decoration: none;
       opacity: .72;
    }
</style>
<div class="modal hide fade adv_popup" id="myModal" style="width: 450px;">
    <a class="close" data-dismiss="modal">×</a>
    <div class="modal-body" style="padding: 40px 0">
        <?php //$pop_image = Helper::get_popup();?>
        <div class="box_android">
            <div style="margin-bottom: 20px">
                <div style="margin: auto;width:40%;margin:auto;padding-left: 5px;margin-bottom: 15px;"><img src="{{ URL::to('/') }}/public/images/and-pop.png" style="max-width: 100%"></div>
                <div style="text-align: center;"><a href="http://newsite.flyregent.net/public/apps/regent_airways.apk" download style="">Download Android APP</a></div>
            </div>
        </div>
        <div class="box_ffp">
            <div>
                <div style="margin: auto;width:45%;margin:auto;margin-bottom: 15px;"><img src="{{ URL::to('/') }}/public/images/ffp-pop.png" style="max-width: 100%"></div>
                <div style="text-align: center;"><a href="http://onlinebooking.flyregent.com/vars/public/fqtv/register.aspx" target="_blank" >Join FFP</a></div>
            </div>
        </div>
        

    </div>
</div>

    <?php
}

Session::set('ses_id', Session::getId());
?>

<script>
//1182182375194540
    window.fbAsyncInit = function () {
        FB.init({
            appId: '683345118506877',
            xfbml: true,
            version: 'v2.6'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>