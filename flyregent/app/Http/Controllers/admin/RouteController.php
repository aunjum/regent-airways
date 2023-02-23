<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class RouteController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('route')
                        ->where('status', 1)
                        ->get();
       
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->name;
                $data[$i][2] = $val->sort;
                $data[$i][3] = $val->type;
                $i++;
            }
        }

        return view('admin.route.index')
                        ->with('title', 'Route')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        
        
        return view('admin.route.add')
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

        $name = Input::get('name');
        $name_bn = Input::get('name_bn');
        $sort = Input::get('sort');
        $type = Input::get('type');


        $id = DB::table('route')->insertGetId(
                array(
                    'name' => $name,
                    'name_bn' => $name_bn,
                    'sort' => $sort,
                    'type' => $type,
                )
        );


        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/route');
        }
    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_row = DB::table('route')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.route.edit')
                        ->with('data_row', $data_row)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $id = Input::get('id');
        $name = Input::get('name');
        $name_bn = Input::get('name_bn');
        $sort = Input::get('sort');
        $type = Input::get('type');


        DB::table('route')
                ->where('id', $id)
                ->update(
                        array(
                            'name' => $name,
                            'name_bn' => $name_bn,
                            'sort' => $sort,
                            'type' => $type,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/route');
    }

    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('route')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/route');
    }


}
