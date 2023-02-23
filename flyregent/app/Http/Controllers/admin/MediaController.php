<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Storage;


class MediaController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('images')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->image;
                $i++;
            }
        }

        return view('admin.media.index')
                        ->with('title', 'All Images')
                        ->with('data', $data);
    }

    public function add() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }


        return view('admin.media.add')
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

//            $file_name = $upload_file->getClientOriginalName();
//            $upload_success = $upload_file->move(getcwd() . '/public/upload/media/', $file_name);
            //todo:stsbd change
            $relativePath = "/public/upload/media/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);

        }else{
            $file_name = '';
        }


        $id = DB::table('images')->insertGetId(
                array(
                    'image' => $file_name,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/media');
        }
    }




    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('images')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/media');
    }


}
