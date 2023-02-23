<?php
namespace App\Http\Controllers;

//todo: sts changes
use App\Mail\evilEventCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;


class DashboardController extends Controller {

    public function index()
    {
        $userId = Session::get('userId');
        if(isset($userId)){
            return Redirect::to('/admin/dashboard');
        }
        return view('admin.dashboard.login');
    }

    public function doLogin()
    {
        
        $rules = array(
            'userName'    => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('/admin')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            $userName = Input::get('userName');
            $userPassword =Input::get('password');

            $loginData = DB::table('users')->where('user_name', '=', $userName)->get();

            if(isset($loginData[0]->user_password)){
                if(password_verify($userPassword, $loginData[0]->user_password)){

                    $permissionArray = DB::table('role')->where('id', $loginData[0]->user_role)->get();

                    if(isset($permissionArray)){
                        $permission = explode(',', $permissionArray[0]->privileges);
                    }

                    Session::put('userId', $loginData[0]->user_id);
                    Session::put('userName', $loginData[0]->user_name);
                    Session::put('userEmail', $loginData[0]->user_email);
                    Session::put('permission', $permission);


                    //evil event catcher email
                    $email = new evilEventCatch(Session::get('userName'),request()->getUri(), request()->getClientIp());
                    \Helper::sendEmail(explode(',', env('ADMIN_NOTIFICATION_EMAILS',[])),[],[],$email);


                    return Redirect::to('/admin/dashboard');
                }else{
                    return view('admin.dashboard.login')->with('errorMessages', 'Invalid password! Please try again!');
                }
            }else{
                return view('admin.dashboard.login')->with('errorMessages', 'Invalid username! Please try again!');
            }
        }
    }

    public function dashBoard(){
        $userId = Session::get('userId');
        if(isset($userId)) {
            return view('admin.dashboard.index');
        }
        return view('admin.dashboard.login');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/admin');
        //todo: sts changes
//        return view('admin.dashboard.login');
    }
}
