<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller {


    public function api(Request $request){

        $action = $request->get('action');

        switch ($action) {
          
          case 'prevfeeback':
            $this->experience_submit($action);
            break;

          case 'feedback':
            $this->saveFeedback($action);
            break;
         
          case 'routes':
            $this->getRoutes($action);
            break; 
         
          case 'flight_schedules':
            $this->getFlightSchedule($action);
            break; 

           case 'feedback_offline':
            $this->feedback_offline($action);
            break;
         
         
         default:
          //do nothing
          break;
        }

          
    }


    public function experience_submit($action) {

      $email = Request::input('email');  
      $contactNo = Request::input('contactNo');

      $temp = DB::table('user_experience')
                ->where('email', '=', $email)
                ->where('status', '=', 1)
                ->get();
        if($temp){
            $response = array($action => 0, "data" => "You already registered as promotional user"); 
            //You already registered as promotional user.
        }else{
           $id = DB::table('user_experience')->insertGetId(
                array(
                    'email' => $email,
                    'contact' => $contactNo,
                    'createdate' => date("Y-m-d H:i:s"),
                )
           );

            $response = array($action => 1, "data" => $id); //return user id
        }       
       
      
       echo json_encode($response);
       
    }

    public function saveFeedback($action) {

        $userId = Request::input('userId');
        $email = Request::input('email');
        $contactNo = Request::input('contactNo');

        $val1 = Request::input('val1');
        $val2 = Request::input('val2');
        $val3 = Request::input('val3');
        $val4 = Request::input('val4');
        $val5 = Request::input('val5');
        $val6 = Request::input('val6');
        $val7 = Request::input('val7');
        $val25 = Request::input('val25');
        $val8 = Request::input('val8');
        $val9 = Request::input('val9');
        $val10 = Request::input('val10');
        $val11 = Request::input('val11');
        $val12 = Request::input('val12');
        $val13 = Request::input('val13');


        DB::table('user_experience')
                ->where('id', $userId)
                ->update(
                        array(
                            'first_name' => $val1,
                            'middle_name' => $val2,
                            'sure_name' => $val3,
                            'gender' => $val4,
                            'date_of_birth' => $val5,
                            'document_type' => $val6,
                            'document_number' => $val7,
                            'issuing_country' => $val8,
                            'expire_date' => $val9,
                            'residence_city' => $val10,
                            'residence_state' => $val11,
                            'resident_country' => $val12,
                            'nationality' => $val13,
                        )
        );


        if ($userId) {
            $response = array($action => 1, "data" => 1); //Save
        } else {
            $response = array($action => 0, "data" => 0); //failed
        }

        echo json_encode($response);
    }

    public function feedback_offline($action) {

        //$name = Request::input('name');
        $email = Request::input('email');
        $contactNo = Request::input('contactNo');

        $temp = DB::table('user_experience')
                ->where('email', '=', $email)
                ->where('status', '=', 1)
                ->get();

        if ($temp) {
            //data already exist, so exit here  
            $response = array($action => 0, "data" => 0);
        } else {
            //Save record

            $val1 = Request::input('val1');
            $val2 = Request::input('val2');
            $val3 = Request::input('val3');
            $val4 = Request::input('val4');
            $val5 = Request::input('val5');
            $val6 = Request::input('val6');
            $val7 = Request::input('val7');
            $val25 = Request::input('val25');
            $val8 = Request::input('val8');
            $val9 = Request::input('val9');
            $val10 = Request::input('val10');
            $val11 = Request::input('val11');
            $val12 = Request::input('val12');
            $val13 = Request::input('val13');

            $id = DB::table('user_experience')->insertGetId(
                    array(
                        'email' => $email,
                        'contact' => $contactNo,
                        'first_name' => $val1,
                        'middle_name' => $val2,
                        'sure_name' => $val3,
                        'gender' => $val4,
                        'date_of_birth' => $val5,
                        'document_type' => $val6,
                        'document_number' => $val7,
                        'issuing_country' => $val8,
                        'expire_date' => $val9,
                        'residence_city' => $val10,
                        'residence_state' => $val11,
                        'resident_country' => $val12,
                        'nationality' => $val13,
                        'createdate' => date("Y-m-d H:i:s"),
                    )
            );

            if ($id) {
                $response = array($action => 1, "data" => 1); //Save
            } else {
                $response = array($action => 0, "data" => 0); //failed
            }
        }


        echo json_encode($response);
    }
	/*
    public function experience_submit($action) {

      $name = Request::input('name');
      $email = Request::input('email');  
      $contactNo = Request::input('contactNo');

      $temp = DB::table('promotional_user')
                ->where('email', '=', $email)
                ->where('status', '=', 1)
                ->get();
        if($temp){
            $response = array($action => 0, "data" => "You already registered as promotional user"); 
            //You already registered as promotional user.
        }else{
           $id = DB::table('promotional_user')->insertGetId(
                array(
                    'name' => $name,
                    'email' => $email,
                    'contact' => $contactNo,
                    'createdate' => date("Y-m-d H:i:s"),
                )
           );

            $response = array($action => 1, "data" => $id); //return user id
        }       
       
      
       echo json_encode($response);
        
    }

     public function saveFeedback($action){

      $userId = Request::input('userId');
      $name = Request::input('name');
      $email = Request::input('email');  
      $contactNo = Request::input('contactNo');   
      $strSuggesions = Request::input('strSuggesions');

      $val1 = Request::input('val1')+1;
      $val2 = Request::input('val2')+1;   
      $val3 = Request::input('val3')+1;
      $val4 = Request::input('val4')+1;
      $val5 = Request::input('val5')+1;   
      $val6 = Request::input('val6')+1;
      $val7 = Request::input('val7')+1;
      $val25 = Request::input('val25')+1;
      $val8 = Request::input('val8')+1;   
      $val9 = Request::input('val9')+1;
      $val10 = Request::input('val10')+1;
      $val11 = Request::input('val11')+1;   
      $val12 = Request::input('val12')+1;
      $val13 = Request::input('val13')+1;
      $val14 = Request::input('val14')+1;
      $val15 = Request::input('val15')+1;  
      $val16 = Request::input('val16')+1;  
      $val17 = Request::input('val17')+1;  
      $val18 = Request::input('val18')+1;  
      $val19 = Request::input('val19')+1;  
      $val20 = Request::input('val20')+1;  
      $val21 = Request::input('val21')+1;  
      $val22 = Request::input('val22')+1;
      $val23 = Request::input('val23')+1;  
      $val24 = Request::input('val24')+1; 

      $id = DB::table('feedback')->insertGetId(
                array(
                    'puserid' => $userId,
                    'counter_eff' => $val1,
                    'info_counter_staff' => $val2,
                    'time_pur_tick' => $val3,
                    'counter_satis' => $val4,
                    'eff_chk_staff' => $val5,
                    'time_chk_in' => $val6,
                    'bag_hand' => $val7,
                    'air_svc_satis' => $val8,
                    'fl_att_ser' => $val9,
                    'eff_fl_att' => $val10,
                    'app_fl_att' => $val11,
                    'sel_nesws_mag' => $val12,
                    'fl_att_ann_cl' => $val13,
                    'fl_att_ann_con' => $val14,
                    'cok_ann_cl' => $val15,
                    'cok_ann_con' => $val16,
                    'in_fl_ser_sat' => $val17,
                    'snck_qua' => $val25,
                    'snck_quan' => $val18,
                    'snck_pre' => $val19,
                    'snck_sat' => $val20,
                    'seat_com' => $val21,
                    'cab_temp' => $val22,
                    'cab_clean' => $val23,
                    'air_int_sat' => $val24,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $contactNo,
                    'comments' => $strSuggesions,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );

        if ($id) {
            $response = array($action => 1, "data" => 1); //Save
        }else{
            $response = array($action => 0, "data" => 0); //failed
        } 

        echo json_encode($response);
            

     }
    
    public function feedback_offline($action){
    
      $name = Request::input('name');
      $email = Request::input('email');  
      $contactNo = Request::input('contactNo'); 
      
      $temp = DB::table('promotional_user')
                ->where('email', '=', $email)
                ->where('status', '=', 1)
                ->get();
    
     if($temp){
         //data already exist, so exit here  
           $response = array($action => 0, "data" => 0);
      }else{                
           //Save record
          $userId = DB::table('promotional_user')->insertGetId(
                array(
                    'name' => $name,
                    'email' => $email,
                    'contact' => $contactNo,
                    'createdate' => date("Y-m-d H:i:s"),
                )
           );
        
             $strSuggesions = Request::input('strSuggesions');
        $val1 = Request::input('val1')+1;
        $val2 = Request::input('val2')+1;   
        $val3 = Request::input('val3')+1;
        $val4 = Request::input('val4')+1;
        $val5 = Request::input('val5')+1;   
        $val6 = Request::input('val6')+1;
        $val7 = Request::input('val7')+1;
        $val25 = Request::input('val25')+1;
        $val8 = Request::input('val8')+1;   
        $val9 = Request::input('val9')+1;
        $val10 = Request::input('val10')+1;
        $val11 = Request::input('val11')+1;   
        $val12 = Request::input('val12')+1;
        $val13 = Request::input('val13')+1;
        $val14 = Request::input('val14')+1;
        $val15 = Request::input('val15')+1;  
        $val16 = Request::input('val16')+1;  
        $val17 = Request::input('val17')+1;  
        $val18 = Request::input('val18')+1;  
        $val19 = Request::input('val19')+1;  
        $val20 = Request::input('val20')+1;  
        $val21 = Request::input('val21')+1;  
        $val22 = Request::input('val22')+1;
        $val23 = Request::input('val23')+1;  
        $val24 = Request::input('val24')+1; 

        $id = DB::table('feedback')->insertGetId(
            array(
                'puserid' => $userId,
                'counter_eff' => $val1,
                'info_counter_staff' => $val2,
                'time_pur_tick' => $val3,
                'counter_satis' => $val4,
                'eff_chk_staff' => $val5,
                'time_chk_in' => $val6,
                'bag_hand' => $val7,
                'air_svc_satis' => $val8,
                'fl_att_ser' => $val9,
                'eff_fl_att' => $val10,
                'app_fl_att' => $val11,
                'sel_nesws_mag' => $val12,
                'fl_att_ann_cl' => $val13,
                'fl_att_ann_con' => $val14,
                'cok_ann_cl' => $val15,
                'cok_ann_con' => $val16,
                'in_fl_ser_sat' => $val17,
                'snck_qua' => $val25,
                'snck_quan' => $val18,
                'snck_pre' => $val19,
                'snck_sat' => $val20,
                'seat_com' => $val21,
                'cab_temp' => $val22,
                'cab_clean' => $val23,
                'air_int_sat' => $val24,
                'name' => $name,
                'email' => $email,
                'phone' => $contactNo,
                'comments' => $strSuggesions,
                'createdate' => date("Y-m-d H:i:s"),
            )
    );

    if ($id) {
        $response = array($action => 1, "data" => 1); //Save
    }else{
        $response = array($action => 0, "data" => 0); //failed
    } 

        } 
  
     
        echo json_encode($response);

    }
	*/
   
    public function getRoutes($action){
             
        $data_row = DB::table('route')
                   ->where('status', '=', 1)
                   ->orderBy('sort', 'asc')
                   ->get();

       if ($data_row) {
           $response = array($action => 1 ,"data" => array('routes' => $data_row));
        }else{
           $response = array($action => 0 ,"data" => 111);
        } 

        echo json_encode($response);

  } 

   public function getFlightSchedule($action){
       
       $routeId = Request::input('routeId');
        
       $flight_schedules = DB::table('flight_schedule')
                        ->where('route_id', '=', $routeId)
                        ->orderBy('sort', 'asc')
                        ->get();

       if ($flight_schedules) {
            $response = array($action => 1 ,"data" => array('flight_schedules' => $flight_schedules));           
         }else{
           $response = array($action => 0 ,"data" => 111);
        } 

        echo json_encode($response);

  } 
    


 
     

}


