<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class FareController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('fare')
                        ->where('status', 1)
                        ->get();
       

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->type;
                $data[$i][3] = $val->from;
                $data[$i][4] = $val->to;
                $data[$i][5] = $val->one_way;
                $data[$i][6] = $val->return;
                $data[$i][7] = $val->sort;
                $i++;
            }
        }

        return view('admin.fare.index')
                        ->with('title', 'Fare')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('fare')
                        ->where('status', 1)
                        ->get();
        
        
        return view('admin.fare.add')
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

        $type = Input::get('type');
        $from = Input::get('from');
        $to = Input::get('to');
        $one_way = Input::get('one_way');
        $return = Input::get('return');
        $from_bn = Input::get('from_bn');
        $to_bn = Input::get('to_bn');
        $one_way_bn = Input::get('one_way_bn');
        $return_bn = Input::get('return_bn');
        $sort = Input::get('sort');

        $id = DB::table('fare')->insertGetId(
                array(
                    'type' => $type,
                    'from' => $from,
                    'to' => $to,
                    'one_way' => $one_way,
                    'return' => $return,
                    'from_bn' => $from_bn,
                    'to_bn' => $to_bn,
                    'one_way_bn' => $one_way_bn,
                    'return_bn' => $return_bn,
                    'sort' => $sort,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/fare');
        }
    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        
        $data_row = DB::table('fare')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.fare.edit')
                        ->with('data_row', $data_row)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $id = Input::get('id');
        $type = Input::get('type');
        $from = Input::get('from');
        $to = Input::get('to');
        $one_way = Input::get('one_way');
        $return = Input::get('return');
        $from_bn = Input::get('from_bn');
        $to_bn = Input::get('to_bn');
        $one_way_bn = Input::get('one_way_bn');
        $return_bn = Input::get('return_bn');
        $sort = Input::get('sort');


        DB::table('fare')
                ->where('id', $id)
                ->update(
                        array(
                            'type' => $type,
                            'from' => $from,
                            'to' => $to,
                            'one_way' => $one_way,
                            'return' => $return,
                            'from_bn' => $from_bn,
                            'to_bn' => $to_bn,
                            'one_way_bn' => $one_way_bn,
                            'return_bn' => $return_bn,
                            'sort' => $sort,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/fare');
    }

    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('fare')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/fare');
    }


}
