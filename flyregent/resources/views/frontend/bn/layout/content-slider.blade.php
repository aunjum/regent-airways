<section id="home-small" class="">

	<div id="home-slider-3" style="width: 100%; height: 100px; margin: 0px auto; ">

            <?php
            $content_slider_data = Helper::get_content_slider();
            if(!is_null($content_slider_data)){

                $sl = 0;
                foreach ($content_slider_data as $con_slider) {
                    $sl++;
                    ?>
            
            
                <div class="ls-layer " style="<?php if($sl == 1){ ?> slidedirection: top; slidedelay: 2000; durationin: 2000; durationout: 1000; delayout: 500; <?php }elseif($sl == 2){ ?> slidedelay: 1000;<?php }else{ ?> slidedelay:1000; delayout: 500; transition2d: all; <?php } ?>"> 

			 <img src="{{ Helper::getImageBaseUrl() }}/public/upload/slider/{{$con_slider->image}}" class="ls-bg" alt="">

		</div>
            
            <?php } } ?>

	</div>

	<div class="slider-overlay-3">

		<div class="overlay-line-3"></div>

		<div class="overlay-content container">

			<div class="overlay-tool2"> </div>

			<div class="about-page">

				<div class="page-title">

				<?php 
                                if ($title == 'Book Flight'){
                                    echo 'বুক ফ্লাইট';
                                }elseif($title == 'Manage Booking'){
                                    echo 'বুকিং পরিবর্তন';
                                }elseif($title == 'Frequent Flyer Login'){
                                    echo 'নিয়মিত যাত্রী লগইন';
                                }elseif($title == 'Route Map'){
                                    echo 'যাত্রাপথের মানচিত্র';
                                }elseif($title == 'Agent Login'){
                                    echo 'এজেন্ট লগইন ';
                                }elseif($title == 'Corporate Sales'){
                                    echo 'কর্পোরেট বিক্রয়';
                                }elseif($title == 'About Us'){
                                    echo 'আমাদের সম্পর্কে়';
                                }elseif($title == 'The Logo'){
                                    echo 'লোগো';
                                }else{
                                echo $title;
                                }
                                ?>

				</div>

			</div>

		</div>

	</div>

</section><!--\\slider ends here-->