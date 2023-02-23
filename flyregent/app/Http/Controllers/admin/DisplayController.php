<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

//todo: sts changes
class DisplayController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('display_flight_schedule')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->flight_no;
                $data[$i][2] = $val->flight_from;
                $data[$i][3] = $val->flight_to;
                $data[$i][4] = $val->time;
                $data[$i][5] = $val->flight_status;
                $data[$i][6] = $val->sort;
                $i++;
            }
        }

        return view('admin.display.index')
                        ->with('title', 'Display Regent Flight Schedule')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }


        return view('admin.display.add')
                        ->with('title', 'Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function insert() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }
        
        $flight_no = Input::get('flight_no');
        $flight_from = Input::get('flight_from');
        $flight_to = Input::get('flight_to');
        $time = Input::get('time');
        $flight_status = Input::get('flight_status');
        $sort = Input::get('sort');



        $id = DB::table('display_flight_schedule')->insertGetId(
                array(
                    'flight_no' => $flight_no,
                    'flight_from' => $flight_from,
                    'flight_to' => $flight_to,
                    'time' => $time,
                    'flight_status' => $flight_status,
                    'sort' => $sort,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/display');
        }
    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_row = DB::table('display_flight_schedule')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.display.edit')
                        ->with('data_row', $data_row)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $id = Input::get('id');
        $flight_no = Input::get('flight_no');
        $flight_from = Input::get('flight_from');
        $flight_to = Input::get('flight_to');
        $time = Input::get('time');
        $flight_status = Input::get('flight_status');
        $sort = Input::get('sort');


        DB::table('display_flight_schedule')
                ->where('id', $id)
                ->update(
                        array(
                            'flight_no' => $flight_no,
                            'flight_from' => $flight_from,
                            'flight_to' => $flight_to,
                            'time' => $time,
                            'flight_status' => $flight_status,
                            'sort' => $sort,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/display');
    }

    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('display_flight_schedule')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/display');
    }


}
