<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Storage;


class SliderController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('slider')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->image;
                $data[$i][2] = $val->sort;
                $i++;
            }
        }

        return view('admin.slider.index')
                        ->with('title', 'All Images')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }


        return view('admin.slider.add')
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


        if (Input::file('image')) {
            $upload_file = Input::file('image');

            //todo:stsbd change
            $relativePath = "/public/upload/slider/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);

        }else{
            $file_name = '';
        }

        $sort = Input::get('sort');
        $id = DB::table('slider')->insertGetId(
                array(
                    'image' => $file_name,
                    'sort' => $sort,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/slider');
        }
    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_row = DB::table('slider')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.slider.edit')
                        ->with('data_row', $data_row)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $id = Input::get('id');
        $old_image = Input::get('old_image');
        $sort = Input::get('sort');

        $upload_file = Input::file('image');

        if ($upload_file) {
            //todo:stsbd change
            $relativePath = "/public/upload/slider/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);
        } else {
            $file_name = $old_image;
        }

        DB::table('slider')
                ->where('id', $id)
                ->update(
                        array(
                            'image' => $file_name,
                            'sort' => $sort,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/slider');
    }

    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('slider')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/slider');
    }


}
