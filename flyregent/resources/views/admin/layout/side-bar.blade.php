<div class="cl-sidebar" data-position="right" data-step="1" data-intro="<strong>Fixed Sidebar</strong> <br/> It adjust to your needs." >
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
        <div class="menu-space">
            <div class="content">
<!--                <div class="side-user">
                    <div class="avatar"><img src="{{ URL::to('/') }}/public/images/avatar1_50.jpg" alt="Avatar" /></div>
                    <div class="info">
                        <a href="#">Jeff Hanneman</a>
                        <img src="images/state_online.png" alt="Status" /> <span>Online</span>
                    </div>
                </div>-->
                <?php
                    $userPermission = Session::get('permission');
                ?>
                <ul class="cl-vnavigation">

                    <li><a href="{{ URL::to('/') }}/admin"><i class="fa fa-users"></i><span>Dashboard</span></a></li>
                    
                    @if(in_array(1, $userPermission))
                        <li><a href="#"><i class="fa fa-files-o"></i><span>CMS Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::to('/') }}/admin/pages">Pages</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/baggage">Baggage Information</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/in-flight">In-Flight Seating</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/travel">Travel Requirements</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/essential">Essential Information</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/flight-service">In-flight Service</a></li>
								
								                                <li><a href="{{ URL::to('/') }}/admin/rewards">Rewards</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/benefits">Benefits</a></li>
								
                                <li><a href="{{ URL::to('/') }}/admin/destination">Destination Information</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/package-details">Package Details</a></li>
                                
                                <li><a href="{{ URL::to('/') }}/admin/fare">Fare</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/tc">Terms & Conditions</a></li>
                                
                                <li><a href="{{ URL::to('/') }}/admin/instructions">Instructions</a></li>
                            </ul>
                        </li>
                    @endif
                    
                   <?php if((in_array(1, $userPermission)) or (in_array(22, $userPermission))){ ?>       
			 <li><a href="#"><i class="fa fa-users"></i><span>Flight Schedule</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::to('/') }}/admin/flight">Flight</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/route">Route</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    
                    @if(in_array(2, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/news"><i class="fa fa-bullhorn"></i><span>News</span></a></li>
                    @endif
                    
                    @if(in_array(16, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/press"><i class="fa fa-bullhorn"></i><span>Press</span></a></li>
                    @endif
                    
                    @if(in_array(3, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/slider"><i class="fa fa-puzzle-piece"></i><span>Slider</span></a></li>
                    @endif
                    @if(in_array(4, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/fair"><i class="fa fa-puzzle-piece"></i><span>Fare Scroll</span></a></li>
                    @endif
                    {{--@if(in_array(5, $userPermission))--}}
                        {{--<li><a href="{{ URL::to('/') }}/admin/packages"><i class="fa fa-tags"></i><span>Packages</span></a></li>--}}
                    {{--@endif--}}
                    @if(in_array(5, $userPermission))
                        <li><a href="#"><i class="fa fa-tags"></i><span>Holiday Packages</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::route('admin.holiday-package.index')}}"><i class="fa fa-tags"></i><span>Packages</span></a></li>
                                <li><a href="{{ URL::route('admin.holiday-package_booking.list')}}"><i class="fa fa-list-alt"></i><span>Bookings Request</span></a></li>
                                <li><a href="{{ URL::route('admin.holiday-package_booking.transaction')}}"><i class="fa fa-money"></i><span>Payment Transaction</span></a></li>

                            </ul>
                        </li>
                     @endif
                    @if(in_array(6, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/address"><i class="fa fa-location-arrow"></i><span>Office Address</span></a></li>
                    @endif
                    @if(in_array(7, $userPermission))
                    <li><a href="{{ URL::to('/') }}/admin/company"><i class="fa fa-building-o"></i><span>Company</span></a></li>
                    @endif
                    @if(in_array(11, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/offers"><i class="fa fa-building-o"></i><span>Offers</span></a></li>
                    @endif
                    
                    @if(in_array(10, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/popup"><i class="fa fa-building-o"></i><span>Popup</span></a></li>
                    @endif

                    @if(in_array(8, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/media"><i class="fa fa-picture-o"></i><span>Media</span></a></li>
                    @endif

                    @if(in_array(14, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/circular"><i class="fa fa-picture-o"></i><span>Job Circular</span></a></li>
                    @endif

                    @if(in_array(15, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/applications"><i class="fa fa-picture-o"></i><span>Job Applications</span></a></li>
                    @endif
                    @if(in_array(21, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/ffp-registration"><i class="fa fa-users"></i><span>FFP Registration</span></a></li>
                    @endif
                    @if(in_array(19, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/feedback"><i class="fa fa-envelope"></i><span>Feedback</span></a></li>
                    @endif
                    
                    @if(in_array(18, $userPermission))
                        <li><a href="{{ URL::to('/') }}/admin/subscribers"><i class="fa fa-envelope"></i><span>Newsletter Subscribers</span></a></li>
                    @endif


                    @if(in_array(17, $userPermission))
                        <li><a href="#"><i class="fa fa-users"></i><span>Display</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::to('/') }}/admin/display">Flight Schedule</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/display_image">Display Image</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/display_scroll">Display Scroll</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(in_array(9, $userPermission))
                        <li><a href="#"><i class="fa fa-users"></i><span>User Module</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::to('/') }}/admin/users">User</a></li>
                                <li><a href="{{ URL::to('/') }}/admin/create-role-form">Role</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(in_array(9, $userPermission))
                        <li><a href="#"><i class="fa fa-mobile-phone"></i><span>Mobile API</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL::route('admin.mobile.offer')}}">Offers</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
<!--        <div class="text-right collapse-button" style="padding:7px 9px;">
            <input type="text" class="form-control search" placeholder="Search..." />
            <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>-->
    </div>
</div>
