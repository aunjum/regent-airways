<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class ScheduleController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }
//      todo: sts changes
        $data_temp = DB::table('flight_schedule')
                        ->leftJoin('route', 'route.id', '=', 'flight_schedule.route_id')
                        ->orderBy('flight_schedule.sort', 'desc')
                        ->where('flight_schedule.flight_status', 1)
                        ->select('flight_schedule.*', 'route.name', 'route.sort as route_sort')
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
                $data[$i][3] = $val->flight;
                $data[$i][4] = $val->day;
                $data[$i][5] = $val->dep_time;
                $data[$i][6] = $val->arr_time;
                $data[$i][7] = $val->route_sort;
                $i++;
            }
        }

        return view('admin.schedule.index')
                        ->with('title', 'Flight Schedule')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('route')
                        ->where('status', 1)
                        ->get();
        
        
        return view('admin.schedule.add')
                        ->with('data_temp', $data_temp)
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

        $id = Input::get('id');
        $route_id = Input::get('route_id');
        $via = Input::get('via');
        $flight = Input::get('flight');
        $flight_bn = Input::get('flight_bn');
        $day = Input::get('day');
        $day_bn = Input::get('day_bn');
        $dep_time = Input::get('dep_time');
        $dep_time_bn = Input::get('dep_time_bn');
        $arr_time = Input::get('arr_time');
        $arr_time_bn = Input::get('arr_time_bn');
        $sort = Input::get('sort');
	$flight_status = Input::get('flight_status');
        $id = DB::table('flight_schedule')->insertGetId(
                array(
                    'route_id' => $route_id,
                    'via' => $via,
                    'flight' => $flight,
                    'flight_bn' => $flight_bn,
                    'day' => $day,
                    'day_bn' => $day_bn,
                    'dep_time' => $dep_time,
                    'dep_time_bn' => $dep_time_bn,
                    'arr_time' => $arr_time,
                    'arr_time_bn' => $arr_time_bn,
                    'sort' => $sort,
		    'flight_status' => $flight_status,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/flight');
        }
    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('route')
                        ->where('status', 1)
                        ->get();
        
        $data_row = DB::table('flight_schedule')
                ->where('flight_status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.schedule.edit')
                        ->with('data_row', $data_row)
                        ->with('data_temp', $data_temp)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $id = Input::get('id');
        $route_id = Input::get('route_id');
        $via = trim(Input::get('via'));
        $flight = Input::get('flight');
        $flight_bn = Input::get('flight_bn');
        $day = Input::get('day');
        $day_bn = Input::get('day_bn');
        $dep_time = Input::get('dep_time');
        $dep_time_bn = Input::get('dep_time_bn');
        $arr_time = Input::get('arr_time');
        $arr_time_bn = Input::get('arr_time_bn');
        $sort = Input::get('sort');
	$flight_status = Input::get('flight_status');

        DB::table('flight_schedule')
                ->where('id', $id)
                ->update(
                        array(
                            'route_id' => $route_id,
                            'via' => $via,
                            'flight' => $flight,
                            'flight_bn' => $flight_bn,
                            'day' => $day,
                            'day_bn' => $day_bn,
                            'dep_time' => $dep_time,
                            'dep_time_bn' => $dep_time_bn,
                            'arr_time' => $arr_time,
                            'arr_time_bn' => $arr_time_bn,
                            'sort' => $sort,
			    'flight_status' => $flight_status,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/flight');
    }

    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('flight_schedule')
                ->where('id', $id)
                ->update(
                        array(
                            'flight_status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/flight');
    }


}
