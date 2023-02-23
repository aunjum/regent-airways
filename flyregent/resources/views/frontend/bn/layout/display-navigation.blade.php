<?php
$company_data = Helper::get_company();
$news_data = Helper::get_news();
?>
<header style="    height: 85px;">
    <nav id="navbar" style="width: 100%;">
        <div class="quick-access">
            <div class="contact-access container2">
                <div class="pull-left ">
                    <a href="{{ URL::to('/') }}/">
                        <?php if($company_data) { ?>
                        <img src="{{ Helper::getImageBaseUrl() }}/public/upload/blog/{{$company_data[0]->image}}"/>
                        <?php } ?>
                    </a>
                </div>
                <div class="pull-right contact_container">
                <div class=" tel">
                    <?php if($company_data) { ?>
                    <div>
                    <a href="mailto:{{$company_data[0]->email}}" class="email">
                        {{$company_data[0]->email}}
                    </a>
                        </div>
                    <?php } ?>
                    
                    <?php if($company_data) { ?>
                    <div>
                        <a href="tel:{{$company_data[0]->phone}}" class="hotline" style="line-height: 20px">
                        {{$company_data[0]->phone}}
                    </a>
                    </div>
                    <?php } ?>
                    
                </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </nav>
    <!--navbar-->
</header>
