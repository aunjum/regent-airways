<title>Regent Route Map</title>
<?php
$company_data = Helper::get_company();
?>
<?php if ($company_data) { ?>
    <link rel="shortcut icon" href="<?php echo Helper::getImageBaseUrl() ?>/public/upload/blog/<?php echo $company_data[0]->image ?>">
<?php } ?>
<!--todo:sts changes-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.2/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.1/flexslider-min.css" rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.3/magnific-popup.min.css" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/refineslide.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/refineslide-theme-dark.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/layerslider.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/smoothness/jquery-ui-1.10.3.custom.min.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/main.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('public/assets/css/custom.css')}}" rel='stylesheet' type='text/css'>
<style>
    *{
        margin:0;
        padding: 0;
    }
    .map_logo{
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 4;
        background: #fff;
        padding: 5px 10px 10px 5px;
        border-radius: 5px;
        border: 1px solid #cdcdcd;
    }

    #map-canvass {
        height: 100%;
        margin: 0px;
        padding: 0px
    }
    #panel {
        position: absolute;
        top: 10px;
        right: 1%;
        z-index: 5;
        background-color: #e7c453;
        padding: 20px 15px 20px 15px;
        border-radius: 5px;
        border: 1px solid #e5ae09;
min-width: 25%;
    }
    .info{
        padding: 10px 0 0 0;
    }
    .back{
        padding-bottom: 10px;
    }
    .back a{
        color:#620202;
        font-weight: bold;
    }
    .back img{
        width:6px;
        margin-right: 2px;
    }
    .flightid{
        height: 30px !important;
    }
    .btn-primary{
        margin: 0 0 0 7px;
    }
    #address1 {
        width: auto;
    }
    #address2 {
        width: auto;
    }
    .byflightid_container{
        background: #eaeaea;
        border: 1px solid #ccc;
            padding: 18px 10px 38px 10px;
    }
    .byroute_container{
        background: #eaeaea;
        border: 1px solid #ccc;
            padding: 18px 10px 3px 10px;
    }
    .search_title{
        font-size: 18px;
        margin: 0;
        line-height: 15px;
        color: #620202;
    }
    #collapse_button{
        color: #620202;
        font-weight: bold;
        font-size: 12px;
        position: absolute;
        right: 0;
        top: 0;
        margin: 0 4px 0 0;
        
    }
    
</style>

<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&key=AIzaSyC2tGceQcsnL1KHF4lP9N2-RQwGrroGhBk"></script>         


<script>

    var geocoder;
    var map;
    var geocodeMarkers = [];
    var flightPath;

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(23.810332, 90.412518);
        var mapOptions = {
            zoom: 3,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.BOTTOM_CENTER
            },
        }


        map = new google.maps.Map(document.getElementById('map-canvass'), mapOptions);

        //custome code for pointing
        var locations = [
            ['<h4>Dhaka</h4>', 23.810332, 90.412518],
            ['<h4>Kuala Lumpur</h4>', 3.139003, 101.686855],
            ['<h4>Chittagong</h4>', 22.347537, 91.812332],
            ['<h4>Bangkok</h4>', 13.756331, 100.501765],
            ['<h4>Singapore</h4>', 1.352083, 103.819836],
            ['<h4>Kolkata</h4>', 22.572646, 88.363895],
            ['<h4>Coxs Bazar</h4>', 21.522539, 91.958344],
            ['<h4>Muscat</h4>', 23.6408468, 58.2148829],
	    ['<h4>Kathmandu</h4>', 27.6999411,85.3437316],
	    ['<h4>Doha</h4>', 25.2656798,51.5934317,13.5]
        ];

        // Setup the different icons and shadows
        var iconURLPrefix = 'http://devsxpress.com/regentairways/public/images/';

        var icons = [
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
            iconURLPrefix + 'red_dot.png',
 	    iconURLPrefix + 'red_dot.png',
 	    iconURLPrefix + 'red_dot.png'
        ]
        var iconsLength = icons.length;


        var infowindow = new google.maps.InfoWindow({
            maxWidth: 160
        });

        var markers = new Array();

        var iconCounter = 0;

        // Add the markers and infowindows to the map
        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: icons[iconCounter]
            });

            markers.push(marker);

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));

            iconCounter++;
            // We only have a limited number of possible icon colors, so we may have to restart the counter
            if (iconCounter >= iconsLength) {
                iconCounter = 0;
            }
        }

        // end custome code for pointing

    }

    function codeAddress(address, address2) {

        // Emptying last addresses because of recent query
        for (var i = 0; i < geocodeMarkers.length; i++) {
            geocodeMarkers[i].setMap(null);
        }

        // Empty array
        geocodeMarkers.length = 0;

        // Empty flight route
        if (typeof flightPath !== "undefined") {
            flightPath.setMap(null);
            flightPath = undefined;
        }

        //var address = document.getElementById('address1').value;

        geocoder.geocode({'address': address}, function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

                // Adding marker to geocodeMarkers
                geocodeMarkers.push(
                        new google.maps.Marker({
                            //alert(results[0].geometry.location);
                            position: results[0].geometry.location
                        })
                        );

                // Attempting to display
                displayMarkers();

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }

        });

        //var address2 = document.getElementById('address2').value;

        geocoder.geocode({'address': address2}, function (results2, status2) {

            if (status2 == google.maps.GeocoderStatus.OK) {

                // Adding marker to geocodeMarkers
                geocodeMarkers.push(
                        new google.maps.Marker({
                            position: results2[0].geometry.location
                        })
                        );

                // Attempting to display
                displayMarkers();

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }

        });


    }

    function displayMarkers() {

        // If geocoded successfully for both addresses
        if (geocodeMarkers.length === 2) {

            // Bounds for the markers so map can be placed properly
            var bounds = new google.maps.LatLngBounds(
                    geocodeMarkers[0].getPosition(),
                    geocodeMarkers[1].getPosition()
                    );

            // Fit map to bounds
            //map.fitBounds(bounds);
			map.setZoom(4);

            // Setting markers to map
            geocodeMarkers[0].setMap(map);
            geocodeMarkers[1].setMap(map);
            //alert(geocodeMarkers[0]);

            flightPath = new google.maps.Polyline({
                path: [geocodeMarkers[0].getPosition(), geocodeMarkers[1].getPosition()],
                strokeColor: "#AF0007",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                map: map
            });

        }

    }

    google.maps.event.addDomListener(window, 'load', initialize);


    function locate_point() {
        var base_url = location.href.split('/');
        base_url = base_url[0] + '/' + base_url[1] + '/' + base_url[2];
    
        $(".info").hide();
        var address1 = document.getElementById('address1').value;
        var address2 = document.getElementById('address2').value;
		var new_route = address1+address2;
        if((new_route != "DhakaKuala Lumpur") && (new_route != "Kuala LumpurDhaka") && (new_route != "DhakaBangkok") && (new_route != "BangkokDhaka") && (new_route != "DhakaSingapore") && (new_route != "SingaporeDhaka") && (new_route != "DhakaKolkata") && (new_route != "KolkataDhaka") && (new_route != "ChittagongKolkata") && (new_route != "KolkataChittagong") && (new_route != "ChittagongBangkok") && (new_route != "BangkokChittagong") && (new_route != "DhakaMuscat") && (new_route != "MuscatDhaka") && (new_route != "ChittagongMuscat") && (new_route != "MuscatChittagong") && (new_route != "DhakaChittagong") && (new_route != "ChittagongDhaka") && (new_route != "DhakaCoxs Bazar") && (new_route != "Coxs BazarDhaka") && (new_route != "DhakaKathmandu") && (new_route != "KathmanduDhaka") && (new_route != "DhakaDoha") && (new_route != "DohaDhaka")){
            alert('Not Applicable');
            return false;
        }

        if ((address1 != '') && (address2 != '')) {


            $(".info").show();
            $.ajax({
                type: "POST",
                url: base_url + "/get_flight_schedule_by_route",
                data: "address1="+address1+"&address2="+address2,
                cache: false,
                success: function (result) {
                    $(".sch_row").remove();
                    $(".title_row").after(result);
                }
            });
            

            if ((address1 == 'Dhaka') && (address2 == 'Kolkata')) {
                address1 = 'Kolkata';
                address2 = 'Dhaka';
            }



            codeAddress(address1, address2);
        }
    }


function locate_point_by_flight() {
    var base_url = location.href.split('/');
    base_url = base_url[0] + '/' + base_url[1] + '/' + base_url[2];
    
    $(".info").hide();
    
    var flight_id = document.getElementById('flight_id').value;
    if (flight_id.trim() == '') {
        alert('Please enter flight ID');
        return false;
    }

    $.ajax({
        type: "POST",
        url: base_url + "/get_flight_schedule_by_flight",
        data: "flight_id="+flight_id,
        cache: false,
        success: function (result) {
            $(".info").show();
            $(".sch_row").remove();
            $(".title_row").after(result);
        }
    });

}

function collapse() {
    $(".collapse_area").toggle();
}
</script>
<?php
$company_data = Helper::get_company();
?>
<div class="map_logo">
    <a href="<?php echo URL::to('/') ?>/">
        <?php if ($company_data) { ?>
            <img src="<?php echo Helper::getImageBaseUrl() ?>/public/upload/blog/<?php echo $company_data[0]->image; ?>"/>
        <?php } ?>
    </a>
</div>

<div id="panel">
    <a href="javascript:collapse()" id="collapse_button">Collapse</a>
    <div class="text-left pull-left">
        <h2 class="search_title">Search Regent Flight</h2>
    </div>

    <div class="text-right back pull-right">
        <a href="<?php echo URL::to('/') ?>/route-map" style="">
            <img src="<?php echo URL::to('/') ?>/public/images/back.png"/>Back
        </a>
    </div>
    <div class="clearfix"></div>
    <div class="collapse_area">
    
    <div class="form-group byflightid_container">
        <label for="inputEmail3" class="col-sm-2 control-label">Search By Flight ID<span class="required">*</span></label>
        <div class="clearfix"></div>
        <div class="col-sm-4 pull-left">
            <input type="text" class="form-control flightid" id="flight_id" placeholder="e.g. RX782" required>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-primary pull-left" onclick="locate_point_by_flight()">Search</button>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="byroute_container">
     
    <label for="inputEmail3" class="col-sm-2 control-label pull-left">Search By Route<span class="required">*</span></label>
    <br/>
    <div class="clearfix"></div>
    <div>
    <select class="form-control pull-left" id="address1">
        <option value="">Fly From</option>
        <option value="Dhaka">Dhaka</option>
	<option value="Chittagong">Chittagong</option>
	<option value="Coxs Bazar">Cox's Bazar</option>
	<option value="Bangkok">Bangkok</option>       
	<option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Singapore">Singapore</option>
        <option value="Kolkata">Kolkata</option>
        <option value="Muscat">Muscat</option>
	<option value="Kathmandu">Kathmandu</option>
	<option value="Doha">Doha</option>
    </select>

    <select class="form-control pull-left" id="address2" >
        <option value="">Fly To</option>
	<option value="Dhaka">Dhaka</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Coxs Bazar">Cox's Bazar</option>       
        <option value="Bangkok">Bangkok</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Singapore">Singapore</option>
        <option value="Kolkata">Kolkata</option>
        <option value="Muscat">Muscat</option>
        <option value="Kathmandu">Kathmandu</option>
        <option value="Doha">Doha</option>
    </select>
        
         <button type="button" class="btn btn-primary pull-left" onclick="locate_point()">Search</button>
        </div>
    <div class="clearfix"></div>
    </div>
    
    <div class="info none">

        <div class="regent" >
            <table >

                <tr class="title_row">
                    <td>
                        Flight
                    </td>
                    <td >
                        Day
                    </td>
                    <td>
                        Departure <br/>Time
                    </td>
                    <td>
                        Arrival <br/> Time
                    </td>
                    <td>
                        Status
                    </td>
                </tr>




            </table>
        </div>

        <br/>


    </div>

    </div>
</div>

<div id="map-canvass"></div>

