<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class ApplicationController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('applications')
                        ->where('status', 1)
                        ->get();
       

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->first_name;
                $data[$i][2] = $val->last_name;
                $data[$i][3] = $val->email;
                $data[$i][4] = $val->phone;
                $data[$i][5] = $val->createdate;
                $i++;
            }
        }

        return view('admin.applications.index')
                        ->with('title', 'Job Applications')
                        ->with('data', $data);
    }


    public function view($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        
        $data_row = DB::table('applications')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.applications.view')
                        ->with('data_row', $data_row)
                        ->with('title', 'View Application');
    }


    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('applications')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/applications');
    }

    public function subscribers() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('subscriber')
                        ->where('status', 1)
                        ->get();
       

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title.' '.$val->first_name.' '.$val->last_name;
                $data[$i][2] = $val->gender;
                $data[$i][3] = $val->email;
                $data[$i][4] = $val->phone;
                $data[$i][5] = $val->country;
                $data[$i][6] = $val->createdate;
                $i++;
            }
        }

        return view('admin.subscriber.index')
                        ->with('title', 'Newsletter Subscribers')
                        ->with('data', $data);
    }



    public function delete_subscriber($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('subscriber')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/subscribers');
    }

    public function feedback() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('feedback')
                        ->where('status', 1)
                        ->get();

//      todo: sts changes
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->name;
                $data[$i][2] = $val->email;
                $data[$i][3] = $val->phone;
                $data[$i][4] = $val->createdate;
                $i++;
            }
        }

        return view('admin.feedback.index')
                        ->with('title', 'Feedback')
                        ->with('data', $data);
    }


    public function view_feedback($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        
        $data_row = DB::table('feedback')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.feedback.view')
                        ->with('data_row', $data_row)
                        ->with('title', 'View Details');
    }

    public function delete_feedback($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('feedback')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/feedback');
    }


    public function ffp_registration() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data = DB::table('user_experience')
                        ->where('status', 1)
                        ->get();

        return view('admin.ffp_registration.index')
                        ->with('title', 'FFP Registration')
                        ->with('data', $data);
    }


    public function ffp_registration_view($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        
        $data_row = DB::table('user_experience')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.ffp_registration.view')
                        ->with('data_row', $data_row)
                        ->with('title', 'View Registration');
    }
        public function ffp_registration_delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('user_experience')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/ffp-registration');
    }
}
