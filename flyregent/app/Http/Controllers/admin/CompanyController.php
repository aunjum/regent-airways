<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Storage;


class CompanyController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('company')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->name;
                $data[$i][2] = $val->email;
                $data[$i][3] = $val->phone;
                $data[$i][4] = $val->image;
                $i++;
            }
        }

        return view('admin.company.index')
                        ->with('title', 'Company')
                        ->with('data', $data);
    }

//    public function add() {
//        $userId = Session::get('userId');
//        if (!isset($userId)) {
//            return view('admin.dashboard.login');
//        }
//
//
//        return view('admin.slider.add')
//                        ->with('title', 'Add');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
//    public function insert() {
//        $userId = Session::get('userId');
//        if (!isset($userId)) {
//            return view('admin.dashboard.login');
//        }
//
//
//        if (Input::file('image')) {
//            $upload_file = Input::file('image');
//
//            $file_name = $upload_file->getClientOriginalName();
//            $upload_success = $upload_file->move(getcwd() . '/public/upload/slider/', $file_name);
////todo:stsbd change
//$relativePath = "/public/upload/slider/";
//$fileLink = Storage::put($relativePath,$upload_file);
//$file_name = basename($fileLink);
//        }else{
//            $file_name = '';
//        }
//
//
//        $id = DB::table('slider')->insertGetId(
//                array(
//                    'image' => $file_name,
//                    'createdate' => date("Y-m-d H:i:s"),
//                )
//        );
//
//
//
//
//
//
//        if ($id) {
//            Session::flash('message', 'Data has been added successfully');
//            Session::flash('message_type', 'success');
//            return Redirect::to('admin/slider');
//        }
//    }

    public function edit($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_row = DB::table('company')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.company.edit')
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
        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');

        $upload_file = Input::file('image');

        if ($upload_file) {
//            $file_name = $upload_file->getClientOriginalName();
//            $upload_success = $upload_file->move(getcwd() . '/public/upload/blog/', $file_name);

            //todo:stsbd change
            $relativePath = "/public/upload/blog/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);

        } else {
            $file_name = $old_image;
        }

        DB::table('company')
                ->where('id', $id)
                ->update(
                        array(
                            'name' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'image' => $file_name,
                        )
        );


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/company');
    }

//    public function delete($id) {
//        $userId = Session::get('userId');
//        if (!isset($userId)) {
//            return view('admin.dashboard.login');
//        }
//
//        DB::table('slider')
//                ->where('id', $id)
//                ->update(
//                        array(
//                            'status' => 0,
//                        )
//        );
//
//
//        Session::flash('message', 'Data has been deleted successfully');
//        Session::flash('message_type', 'success');
//
//        return Redirect::to('admin/slider');
//    }


}
