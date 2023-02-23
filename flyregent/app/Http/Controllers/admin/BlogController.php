<?php
namespace App\Http\Controllers;

//todo: sts changes
use App\Mail\evilEventCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'pages')
                ->where('status', '=', 1)
                ->orderBy('title', 'asc')
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $i++;
            }
        }

        return view('admin.pages.index')
                        ->with('title', 'All Pages')
                        ->with('data', $data);
    }

    public function add($type) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }


        return view('admin.pages.add')
                        ->with('type', $type)
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
        $title = Input::get('title');
        $title_bn = Input::get('title_bn');
        
        $short_desc = Input::get('short_desc');
        if (!$short_desc) { $short_desc = ''; }
        $longitude_latitude = Input::get('l_n_l');
        if(!$longitude_latitude) {$longitude_latitude = '';}
        
        $short_desc_bn = Input::get('short_desc_bn');
        if (!$short_desc_bn) { $short_desc_bn = ''; }
        
        $description = Input::get('description');
        $description_bn = Input::get('description_bn');
        $country = Input::get('country');
        if (!$country) {
            $country = '';
        }
        $field1 = Input::get('field1');
        if (!$field1) {
            $field1 = '';
        }

        $sort = Input::get('sort');
        
        
        if (Input::file('image')) {
            $upload_file = Input::file('image');
            //todo:stsbd change
            $relativePath = "/public/upload/blog/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);

        }else{
            $file_name = '';
        }
        
        if (Input::file('image_bn')) {
            $upload_file = Input::file('image_bn');
            //todo:stsbd change
            $relativePath = "/public/upload/blog/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name_bn = basename($fileLink);
        }else{
            $file_name_bn = '';
        }


        $id = DB::table('blog')->insertGetId(
                array(
                    'title' => $title,
                    'title_bn' => $title_bn,
                    'type' => $type,
                    'short_desc' => $short_desc,
                    'longitude_latitude' => $longitude_latitude,
                    'short_desc_bn' => $short_desc_bn,
                    'description' => $description,
                    'description_bn' => $description_bn,
                    'country' => $country,
                    'field1' => $field1,
                    'image' => $file_name,
                    'image_bn' => $file_name_bn,
                    'sort' => $sort,
                    'createdate' => date("Y-m-d H:i:s"),
                )
        );






        if ($id) {
            Session::flash('message', 'Data has been added successfully');
            Session::flash('message_type', 'success');
            return Redirect::to('admin/' . $type);
        }
    }

    public function edit($id, $type) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_row = DB::table('blog')->where('status', '=', 1)->where('id', '=', $id)->get();

        if (!count($data_row)) {
            abort(404);
        }

        return view('admin.pages.edit-page')
                        ->with('data_row', $data_row)
                        ->with('type', $type)
                        ->with('title', 'Edit');
    }

    public function update() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }



        $id = Input::get('id');
        $type = Input::get('type');
        $old_image = Input::get('old_image');
        $old_image_bn = Input::get('old_image_bn');

        $title = Input::get('title');
        $title_bn = Input::get('title_bn');
        
        $short_desc = Input::get('short_desc');
        if (!$short_desc) { $short_desc = '';}
        
        $short_desc_bn = Input::get('short_desc_bn');
        if (!$short_desc_bn) { $short_desc_bn = '';}
        $longitude_latitude = Input::get('l_n_l');
        if (!$longitude_latitude) { $longitude_latitude = '';}
        
        $description = Input::get('description');
        $description_bn = Input::get('description_bn');
        $country = Input::get('country');
        if (!$country) {
            $country = '';
        }
        $field1 = Input::get('field1');
        if (!$field1) {
            $field1 = '';
        }
        
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
        
        $upload_file_bn = Input::file('image_bn');

        if ($upload_file_bn) {
//            $file_name_bn = $upload_file_bn->getClientOriginalName();
//            $upload_success = $upload_file_bn->move(getcwd() . '/public/upload/blog/', $file_name_bn);

            //todo:stsbd change
            $relativePath = "/public/upload/blog/";
            $fileLink = Storage::put($relativePath,$upload_file_bn);
            $file_name_bn = basename($fileLink);

        } else {
            $file_name_bn = $old_image_bn;
        }

        $sort = Input::get('sort');
        
        DB::table('blog')
                ->where('id', $id)
                ->update(
                        array(
                            'title' => $title,
                            'title_bn' => $title_bn,
                            'short_desc' => $short_desc,
                            'short_desc_bn' => $short_desc_bn,
                            'longitude_latitude' => $longitude_latitude,
                            'description' => $description,
                            'description_bn' => $description_bn,
                            'country' => $country,
                            'field1' => $field1,
                            'image' => $file_name,
                            'image_bn' => $file_name_bn,
                            'sort' => $sort,
                            'createdate' => date('Y-m-d H:i:s'),
                        )
        );


        //evil event catcher email
        $email = new evilEventCatch(Session::get('userName'),request()->getUri(), request()->getClientIp());
        \Helper::sendEmail(explode(',', env('ADMIN_NOTIFICATION_EMAILS',[])),[],[],$email);


        Session::flash('message', 'Data has been updated successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/' . $type);
    }

    public function packages() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'packages')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->short_desc;
                $data[$i][3] = $val->country;
                $data[$i][4] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.packages')
                        ->with('title', 'Packages')
                        ->with('data', $data);
    }

    public function fair() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'fair')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.fair')
                        ->with('title', 'Fare Scroll')
                        ->with('data', $data);
    }

    public function news() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'news')
//                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->status;
                $i++;
            }
        }

        return view('admin.pages.news')
                        ->with('title', 'News')
                        ->with('data', $data);
    }
    public function newsShowHide($id, $status) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }


        $data_temp = DB::table('blog')
            ->where('type', '=', 'news')
            ->where('id','=',$id)
            ->update(
                array(
                    'status' => trim($status),

                )
            );


        //evil event catcher email
        $email = new evilEventCatch(Session::get('userName'),request()->getUri(), request()->getClientIp());
        \Helper::sendEmail(explode(',', env('ADMIN_NOTIFICATION_EMAILS',[])),[],[],$email);

        Session::flash('message', 'News has been updated successfully');
        Session::flash('message_type', 'success');
        return Redirect::to('admin/news');
    }

    public function address() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'address')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $data[$i][4] = $val->country;
                $i++;
            }
        }

        return view('admin.pages.address')
                        ->with('title', 'Office Address')
                        ->with('data', $data);
    }

    public function offers() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'offers')
                ->where('status', '=', 1)
                ->get();
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->field1;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.offers')
                        ->with('title', 'Offers')
                        ->with('data', $data);
    }

    public function popup() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'popup')
//                ->where('status', '=', 1)
                ->get();
        $data = [];
        if ($data_temp){
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->image;
                $data[$i][2] = $val->status;
                $i++;
            }
        }

        return view('admin.pages.popup')
                        ->with('title', 'Popup')
                        ->with('data', $data);
    }

    public function popupShowHide($id, $status) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'popup')
                ->where('id','=',$id)
                ->update(
                    array(
                        'status' => trim($status),

                    )
                );

        //evil event catcher email
        $email = new evilEventCatch(Session::get('userName'),request()->getUri(), request()->getClientIp());
        \Helper::sendEmail(explode(',', env('ADMIN_NOTIFICATION_EMAILS',[])),[],[],$email);

        Session::flash('message', 'Popup has been updated successfully');
        Session::flash('message_type', 'success');
        return Redirect::to('admin/popup');
    }
    

    public function essential() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'essential')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.essential')
                        ->with('title', 'Essential Information')
                        ->with('data', $data);
    }

    public function destination() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'destination')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $data[$i][4] = $val->country;
                $i++;
            }
        }

        return view('admin.pages.destination')
                        ->with('title', 'Destination Information')
                        ->with('data', $data);
    }

    public function baggage() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'baggage')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.baggage')
                        ->with('title', 'Baggage Information')
                        ->with('data', $data);
    }

    public function in_flight() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'in-flight')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.in-flight')
                        ->with('title', 'In-Flight Seating')
                        ->with('data', $data);
    }
    
    public function travel() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'travel')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.travel')
                        ->with('title', 'Travel Requirements')
                        ->with('data', $data);
    }
    
    public function flight_service() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'flight-service')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.flight-service')
                        ->with('title', 'In-flight Service')
                        ->with('data', $data);
    }
    
    public function package_details() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'package-details')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.package-details')
                        ->with('title', 'Package Details')
                        ->with('data', $data);
    }
    
    public function tc() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'tc')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.tc')
                        ->with('title', 'Terms & Conditions')
                        ->with('data', $data);
    }
    
    public function circular() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'circular')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.circular')
                        ->with('title', 'Job Circular')
                        ->with('data', $data);
    }
    
    public function press() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'press')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->field1;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.press')
                        ->with('title', 'Press')
                        ->with('data', $data);
    }
    
    public function display_image() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'display_image')
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

        return view('admin.pages.display-image')
                        ->with('title', 'Display Image')
                        ->with('data', $data);
    }
    
    public function display_scroll() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'display_scroll')
                ->where('status', '=', 1)
                ->get();

        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->description;
                $i++;
            }
        }

        return view('admin.pages.display-scroll')
                        ->with('title', 'Display Scroll')
                        ->with('data', $data);
    }
    
    public function instructions() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'instructions')
                ->where('status', '=', 1)
                ->get();


        //      todo: sts changes
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.instructions')
                        ->with('title', 'Instructions')
                        ->with('data', $data);
    }

    
    public function delete($id, $type) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('blog')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );

        //evil event catcher email
        $email = new evilEventCatch(Session::get('userName'),request()->getUri(), request()->getClientIp());
        \Helper::sendEmail(explode(',', env('ADMIN_NOTIFICATION_EMAILS',[])),[],[],$email);


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/'.$type);
    }
	
	    public function rewards() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'rewards')
                ->where('status', '=', 1)
                ->get();

//      todo: sts changes
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.rewards')
                        ->with('title', 'Rewards')
                        ->with('data', $data);
    }

    public function benefits() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('blog')
                ->where('type', '=', 'benefits')
                ->where('status', '=', 1)
                ->get();

        //      todo: sts changes
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->title;
                $data[$i][2] = $val->description;
                $data[$i][3] = $val->sort;
                $i++;
            }
        }

        return view('admin.pages.benefits')
                        ->with('title', 'Benefits')
                        ->with('data', $data);
    }
}
