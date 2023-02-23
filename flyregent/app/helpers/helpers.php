<?php
//namespace App\Helpers;

//use Illuminate\Support\Str;
//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailable;

class Helper {

    public static $holidayBookingStatus = [
                '0' => "Deleted",
                '1' => "Pending",
                '2' => "Approved",
                '3' => "Payment Submitted",
                '4' => "Rejected",
                '5' => "Payment Confirm",
        ];

    public static function send_password_reset_email($email, $first_name, $password) {

        $data = array(
            'email' => $email,
            'name' => $first_name,
            'password' => $password,
        );

        Session::set('email', $email);
        Session::set('first_name', $first_name);

        Mail::send('emails.password_reset', $data, function($message) use($data) {
            $email = Session::get('email');
            $first_name = Session::get('first_name');
            $message->to($email, $first_name)->subject('Password Reset');

        });

    }

    public static function get_feedback_title($val) {
        if (!$val) {
            return NULL;
        } else {
            if ($val == 1) {
                return 'Excellent';
            } elseif ($val == 2) {
                return 'Good';
            } elseif ($val == 3) {
                return 'Average';
            } elseif ($val == 4) {
                return 'Below Average';
            } else {
                return 'Poor';
            }
        }
    }

    public static function get_company() {

        $company_data = DB::table('company')
            ->where('status', '=', 1)
            ->get();

        if(!$company_data){
            $company_data = NULL;
        }


        return $company_data;
    }

    public static function get_news() {

        $news_data = DB::table('blog')
            ->where('type', '=', 'news')
            ->where('status', '=', 1)
            ->first();
        return $news_data;
    }

    public static function get_popup() {

        $data = DB::table('blog')
            ->where('type', '=', 'popup')
            ->where('status', '=', 1)
            ->first();
        $image = null;
        if($data){
            $image = $data->image;
        }

        return $image;
    }

    public static function get_content_slider() {

        $slider_data = DB::table('slider')
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        if(!$slider_data){
            $slider_data = NULL;
        }

        return $slider_data;
    }

    public static function get_not_count() {

        $count = DB::table('chat')
            ->where('is_seen', '=', 0)
            ->where('status', '=', 1)
            ->count('id');

        if ($count) {
            return $count;
        } else {
            return null;
        }
    }

    public static function get_book_flight_ins() {

        $data = DB::table('blog')
            ->where('id', '=', 167)
            ->where('status', '=', 1)
            ->get();

        if (count($data)) {
            return $data;
        } else {
            return null;
        }
    }


    public static function get_manage_booking_ins() {

        $data = DB::table('blog')
            ->where('id', '=', 168)
            ->where('status', '=', 1)
            ->get();

        if (count($data)) {
            return $data;
        } else {
            return null;
        }
    }

    public static function get_all_route() {

        $data = DB::table('route')
            ->where('status', '=', 1)
            ->get();

        if ($data) {
            return $data;
        } else {
            return null;
        }
    }

    public static function get_schedule_by_route($route) {

        $data = DB::table('flight_schedule')
            ->where('route_id', '=', $route)
            ->where('flight_status', '=', 1)
            ->orderBy('dep_time', 'asc')
            ->get();

        if ($data) {
            return $data;
        } else {
            return null;
        }
    }

    public static function get_schedule_by_route_flight($route, $flight) {

        $data = DB::table('flight_schedule')
            ->where('route_id', '=', $route)
            ->where('flight', '=', $flight)
            ->where('flight_status', '=', 1)
            ->get();

        if ($data) {
            return $data;
        } else {
            return null;
        }
    }

    public static function get_flight_status($flight) {

        //$current_date = date('Y-m-d');
        $data = DB::table('display_flight_schedule')
            ->where('flight_no', '=', $flight)
            ->orderBy('updatedate', 'desc')
            ->where('status', '=', 1)
            ->take(1)
            ->get();

        if (count($data)) {
            return $data;
        } else {
            return null;
        }
    }

    public static function getImageBaseUrl(){
        if(env('FILESYSTEM_DRIVER','local')=="s3"){
            return "https://s3.amazonaws.com/".env('AWS_BUCKET','bucket_name');
        }

        return URL::to('/');

    }

    public static function getKeyOrValueOfPlace($search,$type="value"){
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
            'CXB' => 'Coxs Bazar',
            'JSR' => 'Jashore',
            'SPD' => 'Saidpur'
        ];

        if($type=="value"){
            return array_search($search,$destinationFullName);
        }else{
            return $destinationFullName[$search];
        }

    }

    public static function sendEmail(array $to, array $cc, array $bcc, $email) {
       return Mail::to($to)
            ->cc($cc)
            ->bcc($bcc)
            ->queue($email);
    }

}

?>