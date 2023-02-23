<?php
namespace App\Http\Controllers;

use App\HolidayPackage;
use App\HolidayPackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Storage;
use GuzzleHttp\Client;


class PagesController extends Controller {

    public function pages($page_id, $title) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language


        $page_data = DB::table('blog')->where('id', '=', $page_id)->get();

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.pages', $data);
    }

    public function iframe($from, $type) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        //$viewEditData = DB::table('users')->where('user_id', '=', $id)->get();
        $data = array(
            'title' => $type,
            'from' => $from,
        );

        return view('frontend'.$loc.'.contents.iframe', $data);
    }
    public function app_booking() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $data = array(
            'title' => 'Manage Booking',
        );

        return view('frontend'.$loc.'.contents.iframe_app', $data);
    }
    public function contact() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'বিক্রয় অফিসের ঠিকানা';
        }else{
            $loc = '';
            $title = 'SALES OFFICE ADDRESS';
        }
        //end language

        $add_data = DB::table('blog')
            ->where('type', '=', 'address')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $domestic = [];
        $international = [];
        if(count($add_data)){
            foreach ($add_data as $data){
                $titlePartFirst = explode('-', $data->title);
                if($data->country == "Bangladesh"){
                    $domestic[trim($titlePartFirst[0])][] = $data;
                }
                if($data->country == "International"){
                    $international[trim($titlePartFirst[0])][] = $data;
                }
            }
        }


        $data = array(
            'title' => $title,
            'domestic' => $domestic,
            'international' => $international,
        );


        return view('frontend'.$loc.'.contents.contact', $data);
    }

    public function app_contact() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'বিক্রয় অফিসের ঠিকানা';
        }else{
            $loc = '';
            $title = 'SALES OFFICE ADDRESS';
        }
        //end language

        $add_data = DB::table('blog')
            ->where('type', '=', 'address')
            ->where('status', '=', 1)
            ->get();

        $data = array(
            'title' => $title,
            'add_data' => $add_data,
        );

        return view('frontend'.$loc.'.contents.contact-app', $data);
    }

    public function package_details($id, $title) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language


        $package_data = HolidayPackage::where('id',$id)->with('details')->first();


        $title = 'Package '. $package_data ? $package_data->country : '';

        $data = array(
            'title' => $title,
            'package_data' => $package_data,
        );

        return view('frontend'.$loc.'.contents.package-details', $data);
    }
    public function promotion($id) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $data_row = DB::table('blog')
            ->where('id', '=', $id)
            ->first();


        $data = array(
            'title' => 'SPECIAL PROMOTION',
            'data_row' => $data_row,
        );

        return view('frontend'.$loc.'.contents.promotion', $data);
    }
    public function essential() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'গুরত্বপূর্ণ তথ্য';
        }else{
            $loc = '';
            $title = 'Essential Information';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'essential')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.essential', $data);
    }

    public function app_essential() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'গুরত্বপূর্ণ তথ্য';
        }else{
            $loc = '';
            $title = 'Essential Information';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'essential')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.essential-app', $data);
    }

    public function destination() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'গন্তব্যের তথ্য';
        }else{
            $loc = '';
            $title = 'Destination Information';
        }
        //end language
        $page_data = DB::table('blog')
            ->where('type', '=', 'destination')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();
        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.destination', $data);
    }

    public function flight_schedule() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'বিমান সময়সূচী';
        }else{
            $loc = '';
            $title = 'Flight Schedule';
        }
        //end language
        $inn_data = DB::table('route')
            ->join('flight_schedule', 'flight_schedule.route_id', '=', 'route.id')
            ->where('route.status', '=', 1)
            ->where('flight_schedule.flight_status', '=', 1)
            ->where('route.type', '=', 'International')
            ->orderBy('flight_schedule.route_id', 'asc')
            ->orderBy('flight_schedule.sort', 'asc')
            ->get();

//        return $inn_data;

        //these place has been remove from re-arrange the data
        $excludePlaces = ['CGP','DAC'];
        $interNationalFlights = self::internationalFligtDataFormater($inn_data,$excludePlaces);

        $local_data = DB::table('route')
            ->join('flight_schedule', 'flight_schedule.route_id', '=', 'route.id')
            ->where('route.status', '=', 1)
            ->where('flight_schedule.flight_status', '=', 1)
            ->where('route.type', '=', 'Domestic')
            ->orderBy('flight_schedule.route_id', 'asc')
            ->orderBy('flight_schedule.sort', 'asc')
            ->get();
        //these place has been remove from re-arrange the data
        $domesticFlights = self::domesticFligtDataFormater($local_data);

        $route = null;
        $data = array(
            'title' => $title,
            'route' => $route,
            'inn_data' => $interNationalFlights,
            'local_data' => $domesticFlights,
        );

        return view('frontend'.$loc.'.contents.flight-schedule', $data);
    }



    public function baggage() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'লাগেজ তথ্য';
        }else{
            $loc = '';
            $title = 'BAGGAGE INFORMATION';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'baggage')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.baggage', $data);
    }

    public function app_baggage() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'লাগেজ তথ্য';
        }else{
            $loc = '';
            $title = 'BAGGAGE INFORMATION';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'baggage')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.baggage-app', $data);
    }

    public function in_flight() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'বিমান আসনবিন্যাস';
        }else{
            $loc = '';
            $title = 'In-Flight Seating';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'in-flight')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.seating', $data);
    }


    public function flight_status() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'যাত্রাপথের মানচিত্র';
        }else{
            $loc = '';
            $title = 'Flight Status';
        }
        //end language

        $page_data = DB::table('flight_schedule')
            ->leftJoin('route', 'route.id', '=', 'flight_schedule.route_id')
            ->where('flight_schedule.flight_status', '=', 1)
            ->orderBy('flight_schedule.sort', 'asc')
            ->get();


        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.flight-status', $data);
    }


    public function app_in_flight() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'বিমান আসনবিন্যাস';
        }else{
            $loc = '';
            $title = 'In-Flight Seating';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'in-flight')
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.seating-app', $data);
    }

    public function travel_requirements() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ভ্রমন শর্ত';
        }else{
            $loc = '';
            $title = 'Travel Requirements';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'travel')
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.travel', $data);
    }

    public function app_travel_requirements() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ভ্রমন শর্ত';
        }else{
            $loc = '';
            $title = 'Travel Requirements';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'travel')
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.travel-app', $data);
    }

    public function flight_service() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ইন-ফ্লাইট সেবা';
        }else{
            $loc = '';
            $title = 'In-flight Service';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'flight-service')
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.flight-service', $data);
    }

    public function packages()
    {
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }

        $holidayPackageCountry = HolidayPackage::select('country')->orderBy('country','asc')->groupBy('country')->get();



        $data = array(
            'holidayPackageCountry' => $holidayPackageCountry,
            'title' => 'Packages',
        );

        return view('frontend'.$loc.'.contents.packages', $data);
    }


    public function app_flight_service() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ইন-ফ্লাইট সেবা';
        }else{
            $loc = '';
            $title = 'In-flight Service';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'flight-service')
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.flight-service-app', $data);
    }

    public function allpackagedetails() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'প্যাকেজ গন্তব্য';
        }else{
            $loc = '';
            $title = 'PACKAGE DESTINATIONS';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'package-details')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();
        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.all-package-details', $data);
    }

    public function fare_chart($tag = null) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ভাড়া তালিকা';
        }else{
            $loc = '';
            $title = 'Fare Chart';
        }
        //end language

        $fare_data = DB::table('fare')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$fare_data){
            $fare_data = NULL;
        }

        $tc_data = DB::table('blog')
            ->where('type', '=', 'tc')
            ->orderBy('sort', 'asc')
            ->get();

        if (!$tc_data) {
            $tc_data = NULL;
        }


        $data = array(
            'title' => $title,
            'fare_data' => $fare_data,
            'tc_data' => $tc_data,
            'tag' => $tag,
        );

        return view('frontend'.$loc.'.contents.fare-chart', $data);
    }

    public function career() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ক্যারিয়ার';
        }else{
            $loc = '';
            $title = 'Career With Us';
        }
        //end language

        $career_data = DB::table('blog')
            ->where('type', '=', 'circular')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if (!$career_data) {
            $career_data = NULL;
        }

        $data = array(
            'title' => $title,
            'career_data' => $career_data,
        );

        return view('frontend'.$loc.'.contents.career', $data);
    }

    public function apply($id) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $career_data = DB::table('blog')
            ->where('id', '=', $id)
            ->get();

        if (!$career_data) {
            $career_data = NULL;
        }

        $data = array(
            'title' => 'Careers at Regent Airways',
            'career_data' => $career_data,
        );

        return view('frontend'.$loc.'.contents.apply', $data);
    }

    public function route_map() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'যাত্রাপথের মানচিত্র';
        }else{
            $loc = '';
            $title = 'Route Map';
        }
        //end language

        $page_data = DB::table('display_flight_schedule')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = null;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.route-map', $data);
    }

    public function route_map_live() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'যাত্রাপথের মানচিত্র';
        }else{
            $loc = '';
            $title = 'Regent Route Map';
        }
        //end language


        $data = array(
            'title' => $title,
        );

        return view('frontend'.$loc.'.contents.route-map-live', $data);
    }

    public function submit_app() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $phone = Input::get('phone');
        $keywords = Input::get('keywords');
        $notes = Input::get('notes');


        if (Input::file('resume')) {
            $upload_file = Input::file('resume');

//            $file_name = $upload_file->getClientOriginalName();
//            $upload_success = $upload_file->move(getcwd() . '/public/upload/resume/', $file_name);
            //todo:stsbd change
            $relativePath = "/public/upload/resume/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);
        }else{
            $file_name = '';
        }


        $id = DB::table('applications')->insertGetId(
            array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'keywords' => $keywords,
                'notes' => $notes,
                'resume' => $file_name,
                'createdate' => date("Y-m-d H:i:s"),
            )
        );

        if ($id) {
            Session::flash('message', 'Thank you, Your application has been submitted successfully.');
            Session::flash('message_type', 'success');
            return Redirect::to('career');
        }

    }

    public function press() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'RX এর ছবি';
        }else{
            $loc = '';
            $title = 'RX Picture';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'press')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->paginate(10);

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.press', $data);
    }

    public function press_details($id) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('id', '=', $id)
            ->where('status', '=', 1)
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => 'Press',
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.press-details', $data);
    }


    public function display() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $display_user_id = Session::get('display_user_id');
        $page_data = null;
        $display_image = null;
        $display_scroll_data = null;

        if(isset($display_user_id)){

            $page_data = DB::table('display_flight_schedule')
                ->where('status', '=', 1)
                ->orderBy('sort', 'asc')
                ->get();

            if(!$page_data){
                $page_data = null;
            }

            $display_image = DB::table('blog')
                ->where('type', '=', 'display_image')
                ->where('status', '=', 1)
                ->orderBy('sort', 'asc')
                ->get();

            if(!$display_image){
                $display_image = null;
            }

            $display_scroll_data = DB::table('blog')
                ->where('type', '=', 'display_scroll')
                ->where('status', '=', 1)
                ->orderBy('sort', 'asc')
                ->get();

            if(!$display_scroll_data){
                $display_scroll_data = null;
            }



            $title = 'Login';
            $file = 'display-page';
        }else{
            $title = 'Regent Flight Schedule';
            $file = 'display-login';
        }


        $data = array(
            'title' => $title,
            'page_data' => $page_data,
            'display_image' => $display_image,
            'display_scroll_data' => $display_scroll_data,
        );

        return view('frontend'.$loc.'.contents.'.$file, $data);
    }

    public function display_login()
    {


        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $rules = array(
            'user_name' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('display')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{

            $userName = Input::get('user_name');
            $userPassword =Input::get('password');

            $loginData = DB::table('users')->where('user_name', '=', $userName)->get();

            if(isset($loginData[0]->user_password)){
                if(password_verify($userPassword, $loginData[0]->user_password)){

                    Session::put('display_user_id', $loginData[0]->user_id);
                    Session::put('userName', $loginData[0]->user_name);
                    Session::put('userEmail', $loginData[0]->user_email);

                    return Redirect::to('display');
                }else{
                    Session::set('message', 'Invalid password! Please try again!');
                    return Redirect::to('display');
                }
            }else{
                Session::set('message', 'Invalid password! Please try again!');
                return Redirect::to('display');
            }
        }
    }


    public function newsletter() {


        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'ই-নিউজ লেটারের সদস্যতা';
        }else{
            $loc = '';
            $title = 'News letter Registration';
        }
        //end language

        $data = array(
            'title' => $title,
        );

        return view('frontend'.$loc.'.contents.newsletter', $data);
    }


    public function newsletter_submit() {


        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $title = Input::get('title');
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $gender = Input::get('gender');
        $email = Input::get('email');
        $phone = Input::get('phone');
        $country = Input::get('country');

        $temp = DB::table('subscriber')
            ->where('status', '=', 1)
            ->where('email', '=', $email)
            ->get();
        if($temp){
            Session::flash('message', 'You have already subscribed to our newsletter.');
            Session::flash('message_type', 'danger');
            return Redirect::to('newsletter');
        }

        $id = DB::table('subscriber')->insertGetId(
            array(
                'title' => $title,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender,
                'country' => $country,
                'createdate' => date("Y-m-d H:i:s"),
            )
        );

        if ($id) {
            Session::flash('message', 'Thank you for subscribing our newsletter.');
            Session::flash('message_type', 'success');
            return Redirect::to('newsletter');
        }

    }


    public function experience() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'আপনার অভিজ্ঞতা';
        }else{
            $loc = '';
            $title = 'Experience';
        }
        //end language

        $data = array(
            'title' => $title,
        );

        return view('frontend'.$loc.'.contents.experience', $data);
    }


    public function experience_submit() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $temp = DB::table('user_experience')
            ->where('email', '=', Input::get('email'))
            ->where('status', '=', 1)
            ->get();
        if($temp){
            Session::flash('message', 'You have already registered. ');
            Session::flash('message_type', 'danger');
            return Redirect::to('experience');
        }

        $id = DB::table('user_experience')->insertGetId(
            array(
                'email' => Input::get('email'),
                'contact' => Input::get('contact'),
                'createdate' => date("Y-m-d H:i:s"),
            )
        );


        return Redirect::to('feedback/' . $id);
    }

    public function feedback($id) {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'আপনার অভিজ্ঞতা';
        }else{
            $loc = '';
            $title = 'Experience';
        }
        //end language

        $data = array(
            'title' => $title,
            'promotional_user_id' => $id,
        );

        return view('frontend'.$loc.'.contents.feedback', $data);
    }


    public function feedback_submit() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $puserid = Input::get('puserid');

//        $chk_fed = DB::table('feedback')
//                ->where('status', '=', 1)
//                ->where('puserid', '=', $puserid)
//                ->get();
//        if($chk_fed){
//            Session::flash('message', 'You already given your feedback. ');
//            Session::flash('message_type', 'danger');
//            return Redirect::to('feedback/'.$puserid);
//        }
//        
//        $temp = DB::table('promotional_user')
//                ->where('status', '=', 1)
//                ->where('id', '=', $puserid)
//                ->get();
//
//        $name = $temp[0]->name;
//        $email = $temp[0]->email;
//        $phone = $temp[0]->contact;


        DB::table('user_experience')
            ->where('id', $puserid)
            ->update(
                array(
                    'first_name' => Input::get('first_name'),
                    'middle_name' => Input::get('middle_name'),
                    'sure_name' => Input::get('sure_name'),
                    'gender' => Input::get('gender'),
                    'date_of_birth' => Input::get('date_of_birth'),
                    'document_type' => Input::get('document_type'),
                    'document_number' => Input::get('document_number'),
                    'issuing_country' => Input::get('issuing_country'),
                    'expire_date' => Input::get('expire_date'),
                    'residence_city' => Input::get('residence_city'),
                    'residence_state' => Input::get('residence_state'),
                    'resident_country' => Input::get('resident_country'),
                    'nationality' => Input::get('nationality'),
                )
            );

//        DB::table('user_experience')
//                ->
//                ->update(
//                array(
//                    'first_name' => Input::get('first_name'),
//                    'middle_name' => Input::get('middle_name'),
//                    'sure_name' => Input::get('sure_name'),
//                    'gender' => Input::get('gender'),
//                    'date_of_birth' => Input::get('date_of_birth'),
//                    'document_type' => Input::get('document_type'),
//                    'document_number' => Input::get('document_number'),
//                    'issuing_country' => Input::get('issuing_country'),
//                    'expire_date' => Input::get('expire_date'),
//                    'residence_city' => Input::get('residence_city'),
//                    'residence_state' => Input::get('residence_state'),
//                    'resident_country' => Input::get('resident_country'),
//                    'nationality' => Input::get('nationality'),
////                    'puserid' => $puserid,
////                    'counter_eff' => Input::get('counter_eff'),
////                    'info_counter_staff' => Input::get('info_counter_staff'),
////                    'time_pur_tick' => Input::get('time_pur_tick'),
////                    'counter_satis' => Input::get('counter_satis'),
////                    'eff_chk_staff' => Input::get('eff_chk_staff'),
////                    'time_chk_in' => Input::get('time_chk_in'),
////                    'bag_hand' => Input::get('bag_hand'),
////                    'air_svc_satis' => Input::get('air_svc_satis'),
////                    'fl_att_ser' => Input::get('fl_att_ser'),
////                    'eff_fl_att' => Input::get('eff_fl_att'),
////                    'app_fl_att' => Input::get('app_fl_att'),
////                    'sel_nesws_mag' => Input::get('sel_nesws_mag'),
////                    'fl_att_ann_cl' => Input::get('fl_att_ann_cl'),
////                    'fl_att_ann_con' => Input::get('fl_att_ann_con'),
////                    'cok_ann_cl' => Input::get('cok_ann_cl'),
////                    'cok_ann_con' => Input::get('cok_ann_con'),
////                    'in_fl_ser_sat' => Input::get('in_fl_ser_sat'),
////                    'snck_qua' => Input::get('snck_qua'),
////                    'snck_quan' => Input::get('snck_quan'),
////                    'snck_pre' => Input::get('snck_pre'),
////                    'snck_sat' => Input::get('snck_sat'),
////                    'seat_com' => Input::get('seat_com'),
////                    'cab_temp' => Input::get('cab_temp'),
////                    'cab_clean' => Input::get('cab_clean'),
////                    'air_int_sat' => Input::get('air_int_sat'),
////                    'name' => $name,
////                    'email' => $email,
////                    'phone' => $phone,
////                    'comments' => Input::get('comments'),
//                    'createdate' => date("Y-m-d H:i:s"),
//                )
//        );

        Session::flash('message', 'Thank you for your feedback. Your feedback has been added successfully. ');
        Session::flash('message_type', 'success');
        return Redirect::to('feedback/'.$puserid);

    }

    public function live_chat() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language


        $data = array(
            'title' => 'Live Chat',
        );

        return view('frontend'.$loc.'.contents.live-chat', $data);
    }


    public function live_chat_submit() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $name = Input::get('name');
        $email = Input::get('email');
        $contact = Input::get('contact');
        $message = Input::get('message');

//        Session::set('name', $name);
//        Session::set('email', $email);
//        Session::set('contact', $contact);

        $temp = DB::table('chat')
            ->where('is_seen', '=', 0)
            ->where('status', '=', 1)
            ->where('email', '=', $email)
            ->get();

        if(count($temp)){
            echo 'You already have sent a message which is pending. Please wait for reply.';
            exit();
        }

        $id = DB::table('chat')->insertGetId(
            array(
                'name' => $name,
                'email' => $email,
                'contact' => $contact,
                'message' => $message,
                'createdate' => date("Y-m-d H:i:s"),
            )
        );

        if ($id) {
            echo 'Message has been added successfully.';
        }

    }

    public function rewards() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'পুরস্কার';
        }else{
            $loc = '';
            $title = 'Rewards';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'rewards')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.rewards', $data);
    }

    public function benefits() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'সুবিধা';
        }else{
            $loc = '';
            $title = 'Benefits';
        }
        //end language

        $page_data = DB::table('blog')
            ->where('type', '=', 'benefits')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$page_data){
            $page_data = NULL;
        }

        $data = array(
            'title' => $title,
            'page_data' => $page_data,
        );

        return view('frontend'.$loc.'.contents.benefits', $data);
    }

    public function leave_a_message() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'Leave a Message';
        }else{
            $loc = '';
            $title = 'Leave a Message';
        }
        //end language


        $data = array(
            'title' => $title,
        );

        return view('frontend'.$loc.'.contents.leave-a-message', $data);
    }

    public function getData() {

        $data = array();
        $data = DB::table('user_experience')
            ->where('status', '=', 1)
            ->get();
        return json_encode($data);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
    }

    public function app_user_experience_submit() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
        }else{
            $loc = '';
        }
        //end language

        $id = DB::table('user_experience')->insertGetId(
            array(
                'first_name' => Input::get('first_name'),
                'middle_name' => Input::get('middle_name'),
                'sure_name' => Input::get('sure_name'),
                'gender' => Input::get('gender'),
                'date_of_birth' => Input::get('date_of_birth'),
                'document_type' => Input::get('document_type'),
                'document_number' => Input::get('document_number'),
                'issuing_country' => Input::get('issuing_country'),
                'expire_date' => Input::get('expire_date'),
                'residence_city' => Input::get('residence_city'),
                'residence_state' => Input::get('residence_state'),
                'resident_country' => Input::get('resident_country'),
                'nationality' => Input::get('nationality'),
                'createdate' => date("Y-m-d H:i:s"),
            )
        );

        if ($id) {
            Session::flash('message', 'Thank you for your feedback. Your feedback has been added successfully. ');
            Session::flash('message_type', 'success');
            return Redirect::to('app/user-experience');
        }

    }
    public function app_leave_a_message() {

        //language
        $ln = Session::get('lan');
        if($ln == 'bn'){
            $loc = '.bn';
            $title = 'Leave a Message';
        }else{
            $loc = '';
            $title = 'Leave a Message';
        }
        //end language


        $data = array(
            'title' => $title,
        );

        return view('frontend'.$loc.'.contents.app-leave-a-message', $data);
    }

    private static function domesticFligtDataFormater($scheduleData){

        //destination full name with code name
        $destinationFullName = [
            'BKK' => 'Bangkok',
            'DMM' => 'Dammam',
            'DOH' => 'Doha',
            'KTM' => 'Katmandu',
            'CCU' => 'Kolkata',
            'KUL' => 'Kualalumpur',
            'MCT' => 'Muscat',
            'SIN' => 'Singapore',
            'DAC' => 'Dhaka',
            'CGP' => 'Chattogram',
            'CXB' => 'Cox\'s Bazar',
            'JSR' => 'Jashore',
            'SPD' => 'Saidpur'
        ];
        $flightsData = [];
        //these place has been remove from re-arrange the data
        $fromIndex = 0;
        $toIndex = 1;

        //destination full name with code name
        $domesticFligts = [
            'Chattogram' => [],
            'Cox\'s Bazar' => [],
            'Dhaka' => [],
//            'Jashore' => [],
//            'Saidpur' => [],
        ];

        foreach ($scheduleData as $data){
            // device route name for find from and to place name
            $fromTo = explode('-',$data->name);

            if($data->name=='DAC-CGP'){
                $domesticFligts['Chattogram'][]=[
                    'flight' => $data->flight,
                    'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                    'to' => $destinationFullName[trim($fromTo[$toIndex])],
                    'route' => $data->name,
                    'dep_time' => $data->dep_time,
                    'arr_time' => $data->arr_time,
                    'day' => $data->day,
                    'via' => $data->via,

                ];
            }
            else if($data->name=='CGP-DAC'){
                $domesticFligts['Dhaka'][]=[
                    'flight' => $data->flight,
                    'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                    'to' => $destinationFullName[trim($fromTo[$toIndex])],
                    'route' => $data->name,
                    'dep_time' => $data->dep_time,
                    'arr_time' => $data->arr_time,
                    'day' => $data->day,
                    'via' => $data->via,

                ];
            }else if($data->name=='DAC-CXB' || $data->name == 'CXB-DAC'){
                $domesticFligts['Cox\'s Bazar'][]=[
                    'flight' => $data->flight,
                    'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                    'to' => $destinationFullName[trim($fromTo[$toIndex])],
                    'route' => $data->name,
                    'dep_time' => $data->dep_time,
                    'arr_time' => $data->arr_time,
                    'day' => $data->day,
                    'via' => $data->via,

                ];
            }else if($data->name=='DAC-JSR' || $data->name == 'JSR-DAC'){
                $domesticFligts['Jashore'][]=[
                    'flight' => $data->flight,
                    'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                    'to' => $destinationFullName[trim($fromTo[$toIndex])],
                    'route' => $data->name,
                    'dep_time' => $data->dep_time,
                    'arr_time' => $data->arr_time,
                    'day' => $data->day,
                    'via' => $data->via,

                ];
            }else if($data->name=='DAC-SPD' || $data->name == 'SPD-DAC'){
                $domesticFligts['Saidpur'][]=[
                    'flight' => $data->flight,
                    'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                    'to' => $destinationFullName[trim($fromTo[$toIndex])],
                    'route' => $data->name,
                    'dep_time' => $data->dep_time,
                    'arr_time' => $data->arr_time,
                    'day' => $data->day,
                    'via' => $data->via,

                ];
            }


        }

        return $domesticFligts;
    }
    private static function internationalFligtDataFormater($scheduleData,$excludePlaces){
        //destination full name with code name
        $destinationFullName = [
            'BKK' => 'Bangkok',
            'DMM' => 'Dammam',
            'DOH' => 'Doha',
            'KTM' => 'Katmandu',
            'CCU' => 'Kolkata',
            'KUL' => 'Kualalumpur',
            'MCT' => 'Muscat',
            'SIN' => 'Singapore',
            'DAC' => 'Dhaka',
            'CGP' => 'Chattogram',
            'CXB' => 'Cox\'s Bazar',
            'JSR' => 'Jashore',
            'SPD' => 'Saidpur'
        ];
        $flightsData = [];
        //these place has been remove from re-arrange the data
        $fromIndex = 0;
        $toIndex = 1;

        foreach ($scheduleData as $data){
            // device route name for find from and to place name
            $fromTo = explode('-',$data->name);
            //get to place name as a group name
            $groupName = trim($fromTo[$toIndex]);

            //if group name is find in exclude list then group name will be other one
            if(in_array($groupName,$excludePlaces)){
                $groupName = trim($fromTo[$fromIndex]);
            }

            $flightsData[$destinationFullName[$groupName]][]=[
                'flight' => $data->flight,
                'from' => $destinationFullName[trim($fromTo[$fromIndex])],
                'to' => $destinationFullName[trim($fromTo[$toIndex])],
                'route' => $data->name,
                'dep_time' => $data->dep_time,
                'arr_time' => $data->arr_time,
                'day' => $data->day,
                'via' => $data->via,

            ];
        }

        return $flightsData;
    }

    public function getFlightScheduleByFlight(Request $request, $flightNo){
        $flight_id = $flightNo;
        $ret = '';

        $flights = DB::table('flight_schedule')
            ->where('flight', '=', $flight_id)
            ->where('flight_status', '=', 1)
            ->groupBy('route_id')
            ->get(['route_id']);

        $flightSchedule = [];

        if ($flights) {
            foreach ($flights as $value) {

                $route_id = $value->route_id;
                $route_info = DB::table('route')
                    ->where('id', '=', $route_id)
                    ->where('status', '=', 1)
                    ->get(['name']);

                $palces = explode('-',$route_info[0]->name);
                $route = \Helper::getKeyOrValueOfPlace($palces[0],'key') . '-' . \Helper::getKeyOrValueOfPlace($palces[1],'key');;

                $flightSchedule['route'] = $route;

                $flight_data = \Helper::get_schedule_by_route_flight($route_id, $flight_id);

                if (!is_null($flight_data)) {
                    foreach ($flight_data as $fvalue) {

                        $status = \Helper::get_flight_status($fvalue->flight);
                        $fstatus = 'In Time';
                        if ($status) {
                            $fstatus = $status[0]->flight_status;
                        }

                        $flightSchedule['flights'][] = [
                            'flight_no' => $fvalue->flight,
                            'day' => $fvalue->day,
                            'departure_time' => $fvalue->dep_time,
                            'arrival_time' => $fvalue->arr_time,
                            'status' => $fstatus
                        ];

                    }
                }
            }
        }

        //allow cors
        header('Access-Control-Allow-Origin: *');
        return response()->json($flightSchedule);
    }
    public function getFlightScheduleByRoute(Request $request, $from, $to){
        $address1 = $from;
        $address2 = $to;

        $ret = '';
        $name = \Helper::getKeyOrValueOfPlace($address1) . '-' . \Helper::getKeyOrValueOfPlace($address2);


        $route = DB::table('route')
            ->where('name', '=', $name)
            ->where('status', '=', 1)
            ->get();

        $flightSchedule = [];

        if (!is_null($route)) {

            foreach ($route as $value) {

                $route_id = $value->id;
                $flight_data = \Helper::get_schedule_by_route($route_id);


                $route = $address1.' - '.$address2;
                $flightSchedule['route'] = $route;

                if (!is_null($flight_data)) {

                    foreach ($flight_data as $fvalue) {

                        $status = \Helper::get_flight_status($fvalue->flight);
                        $fstatus = 'In Time';
                        if ($status) {
                            $fstatus = $status[0]->flight_status;
                        }

                        $flightSchedule['flights'][] = [
                            'flight_no' => $fvalue->flight,
                            'day' => $fvalue->day,
                            'departure_time' => $fvalue->dep_time,
                            'arrival_time' => $fvalue->arr_time,
                            'status' => $fstatus
                        ];

                    }
                }
            }
        }
        //allow cors
        header('Access-Control-Allow-Origin: *');
        return response()->json($flightSchedule);
    }
    public function getOfficeAddress(Request $request){

        $add_data = DB::table('blog')
            ->where('type', '=', 'address')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $data = array(
            'title' => 'SALES OFFICE ADDRESS',
            'resource_url' => \Helper::getImageBaseUrl().'/public/upload/blog/',
            'address' => $add_data,
        );

        //allow cors
        header('Access-Control-Allow-Origin: *');
        return response()->json($data);
    }

    /**
     * Holiday Package Manage code goes below
     */

    public function packageBooking(Request $request) {

        $package_details = HolidayPackageDetail::where('id', $request->get('detail_id',''))
            ->where('holiday_package_id',  $request->get('package_id',''))->with(['package'=> function($query){
                $query->select('id','title','country','place');
            }])->first();


        if(!$package_details) {
            abort(404);
        }

        $packages = json_decode($package_details->packages);

        $package_info = [];
        $package_type = $request->get('type', '');
        foreach ($packages as $package) {
            if($package->type == $request->get('type', '')){
                $package_info[] = $package;

            }

            if (preg_match('/additional/i',$package->type)) {
                $package_info[] = $package;
            }

        }

        $title = "New Booking";


        return view('frontend.contents.package-booking', compact('package_info', 'package_details', 'package_type', 'title'));
    }
    public function makeBooking(Request $request) {

        $package_details = HolidayPackageDetail::where('id', $request->get('details_id',''))
            ->where('holiday_package_id',  $request->get('package_id',''))->with(['package'=> function($query){
                $query->select('id','title','country','place');
            }])->first();


        if(!$package_details) {
            abort(404);
        }

        //if input has files then proccess it first then go ahead
        $imgStorePath = "/public/upload/booking-docs/";
        //if adult file has
        $aDocs = [];
        if($request->hasFile('a_pdoc')){
            foreach ($request->file('a_pdoc') as $file) {
                $storagepath = $file->store($imgStorePath);
                $aDocs[] = basename($storagepath);
            }
        }
        $cDocs = [];
        //if child file has
        if($request->hasFile('c_pdoc')){
            foreach ($request->file('c_pdoc') as $file) {
                $storagepath = $file->store($imgStorePath);
                $cDocs[] = basename($storagepath);
            }
        }
        $iDocs = [];
        //if infant file has
        if($request->hasFile('i_pdoc')){
            foreach ($request->file('i_pdoc') as $file) {
                $storagepath = $file->store($imgStorePath);
                $iDocs[] = basename($storagepath);
            }
        }

        $adult_data = array(
            'first_name' => $request->a_firstname,
            'last_name' => $request->a_lastName,
            'date_of_birth' => $request->a_date_of_birth,
            'gender' => $request->a_gender,
            'country' => $request->a_country,
            'passport' => $request->a_passport_no,
            'docs'  => $aDocs

        );

        $child_data = array(
            'first_name' => $request->c_firstname,
            'last_name' => $request->c_lastName,
            'date_of_birth' => $request->c_date_of_birth,
            'gender' => $request->c_gender,
            'country' => $request->c_country,
            'passport' => $request->c_passport_no,
            'docs'  => $cDocs
        );


        $infant_data = array(
            'first_name' => $request->i_firstname,
            'last_name' => $request->i_lastName,
            'date_of_birth' => $request->i_date_of_birth,
            'gender' => $request->i_gender,
            'country' => $request->i_country,
            'passport' => $request->i_passport_no,
            'docs'  => $iDocs
        );



        $inputs = array(
            'place' => $package_details->package->country .'-'. $package_details->package->place,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'hotel_name' => $package_details->hotel,
            'title' => $package_details->package->title,
            'package_type' => $request->package_type,
            'days' => $request->totalDays,
            'nights' => $request->totalNights,
            'adult_total_price' => $request->adult,
            'child_total_price' => $request->child,
            'infant_total_price' => $request->infant,
            'grand_total_price' => $request->total,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'adult_no' => $request->adult_no,
            'child_no' => $request->child_no ?? 0,
            'infant_no' => $request->infant_no ?? 0,
            'adult_info_json' => json_encode($adult_data),
            'child_info_json' => json_encode($child_data),
            'infant_info_json' => json_encode($infant_data),
            'status' => 1 // 0 = delete, 1 = pending, 2 = approved, 3 = payment submitted, 4 = rejected, 5 = confirm
        );

        //db insert
        DB::table('booking_customers')->insert($inputs);

        return  redirect()->route('booking_success');

    }

    public function bookingSuccess(Request $request)
    {
        $title = "Booking Success";
        $message = "Your request has been taken. A mail will be sent to your e-mail address after approving your request.";
        $messageType = "success";
        return view('frontend.contents.message', compact('message', 'messageType', 'title'));
    }

    public function bookingConfirmation(Request $request, $hash_string)
    {
        $id = Crypt::decrypt($hash_string);

        $bookingData = DB::table('booking_customers')->where('id',$id)->where('status','!=',0)->first();

        if(!$bookingData){
            abort(404);
        }

        if($bookingData->status != 2){
            $message = "Your requested booking confirmation link is expired! ";
            $messageType = "danger";
            $title = "Booking Status";
            return view('frontend.contents.message', compact('message', 'messageType', 'title'));
        }

        //now for for payment with ssl commerz
        Session::put('booking_request_id', $id);
        $transId = 'REGENT_WEBSITE_'.uniqid(true);
        Session::put('trans_id', $transId);

        $totalAmount = $bookingData->grand_total_price;

        $response = $this->callSSLCommerzGateway($transId, $totalAmount);


        if($response['success']){
            return redirect()->to($response['gateWayUrl']);
        }

        $message = $response['message'];
        $messageType = "danger";
        $title = "Booking Payment";
        return view('frontend.contents.message', compact('message', 'messageType', 'title'));




    }

    private function callSSLCommerzGateway($transId, $amount) {
        $response = [
            'success' => false,
            'message' => 'going for payment.',
            'gateWayUrl' => ''

        ];

        // now call the payment gateway api and get redirect url
        $paymentUrl = env('SSL_COMMERZ_URL', '');
        $storeId = env('SSL_COMMERZ_STORE_ID', '');
        $storePassword = env('SSL_COMMERZ_STORE_PASSWORD', '');
        $appUrl = env('APP_URL', '');

        if(strlen($paymentUrl) && strlen($storeId) && strlen($storePassword) && strlen($appUrl)){
            try {
                $client = new Client(); //GuzzleHttp\Client
                $apiResponse = $client->request('POST', $paymentUrl, [
                    'form_params' => [
                        'store_id' => $storeId,
                        'store_passwd' => $storePassword,
                        'total_amount' => $amount,
                        'currency' => 'BDT',
                        'tran_id' => $transId,
                        'success_url' => route('booking-payment.success'),
                        'fail_url' => route('booking-payment.failed'),
                        'cancel_url' => route('booking-payment.cancel'),
                    ]
                ]);

                $res = json_decode($apiResponse->getBody(), true);

                if($res['status'] == 'SUCCESS'){
                    $response['gateWayUrl'] = $res['GatewayPageURL'];
                    $response['success'] = true;
                }
                else{
                    $response['message'] = 'Payment gateway error! Contact support.';
                }

            }
            catch (\Exception $e) {
                $response['message'] = 'Couldn\'t connect with payment gateway';
            }

        }
        else {
            $response['message'] = "Payment gateway information missing! Contact support. ";
        }


        return $response;
    }

    public function bookingPaymentSuccess(Request $request){

        //check if it is hit by our user or not
        if(Session::get('trans_id') != $request->get('tran_id')){
            $message = "Your request not send by out site";
            $messageType = "danger";
            $title = "Booking Payment Failed";
            return view('frontend.contents.message', compact('message', 'messageType', 'title'));
        }

        $data = array(
            'booking_request_id' => Session::get('booking_request_id'),
            'payment_transaction_id' => Session::get('trans_id'),
            'amount'=> $request->get('amount',''),
            'card_type' => $request->get('card_type',''),
            'card_issuer' => $request->get('card_issuer',''),
            'card_issuer_country' => $request->get('card_issuer_country',''),
            'bank_tran_id' => $request->get('bank_tran_id',''),
            'transaction_date' => $request->get('tran_date',null),
            'status' => $request->get('status','')
        );

        DB::beginTransaction();
        try {

            //db insert
            DB::table('booking_transactions')->insert($data);

            //update request booking
            DB::table('booking_customers')->where('id',Session::get('booking_request_id'))->update(['status' => 3]);

            //now commit the transaction
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
//            $message = str_replace(array("\r", "\n","'","`"), ' ', $e->getMessage());
            $message = "Server errror! Contact support. Your transaction id is: ".Session::get('trans_id');
            $messageType = "danger";
            $title = "Booking Payment Faild";
            return view('frontend.contents.message', compact('message', 'messageType', 'title'));
        }


        //clear session data
        Session::forget('booking_request_id');
        Session::forget('trans_id');


        $message = "Your payment for booking is successfull.";
        $messageType = "success";
        $title = "Booking Payment Success";
        return view('frontend.contents.message', compact('message', 'messageType', 'title'));


    }

    public function bookingPaymentFailed(Request $request){

        $message = $request->get('error','Payment Failed. Contact Support.');
        $messageType = "danger";
        $title = "Booking Payment Failed";
        return view('frontend.contents.message', compact('message', 'messageType', 'title'));

    }

    public function bookingPaymentCancel(Request $request){
        $message = $request->get('error','Payment Failed. Contact Support.');
        $messageType = "danger";
        $title = "Booking Payment Canceled";
        return view('frontend.contents.message', compact('message', 'messageType', 'title'));

    }





}


