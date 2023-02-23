<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Mail;


class ChatController extends Controller {

    public function index() {

        $userId = Session::get('userId');

        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $data_temp = DB::table('chat')
                        ->where('status', 1)
                        ->orderBy('id', 'desc')
                        ->get();
       
        $data = [];
        if (!$data_temp) {
            $data = NULL;
        } else {
            $i = 0;
            foreach ($data_temp as $val) {
                $data[$i][0] = $val->id;
                $data[$i][1] = $val->name;
                $data[$i][2] = $val->email;
                $data[$i][3] = $val->contact;
                $data[$i][4] = $val->message;
                $data[$i][5] = $val->createdate;
                $data[$i][6] = $val->is_seen;
                $i++;
            }
        }

        return view('admin.chat.index')
                        ->with('title', 'Chat')
                        ->with('data', $data);
    }


    public function view($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('chat')
                ->where('id', $id)
                ->update(
                        array(
                            'is_seen' => 1,
                        )
        );
        
        $data_row = DB::table('chat')
                ->where('status', '=', 1)
                ->where('id', '=', $id)
                ->get();

        if (!$data_row) {
            $data = NULL;
        }

        return view('admin.chat.view')
                        ->with('data_row', $data_row)
                        ->with('title', 'View Chat');
    }

    public function reply() {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $name = Input::get('name');
        $email = Input::get('email');
        $message = Input::get('description');

        
        $data = array(
            'name' => $name,
            'message_body' => $message,
        );
        
        Session::put('to', $email);
        Session::put('name', $name);
        
        Mail::send('emails.reply', $data, function($message) use($data) {
                $to = Session::get('to');
                $name = Session::get('name');
                $message->to($to, $name)->subject('Message Reply');

        });
        
        Session::flash('message', 'Reply has been sent successfully');
        Session::flash('message_type', 'success');
        return Redirect::to('admin/chat');
    }


    public function delete($id) {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('chat')
                ->where('id', $id)
                ->update(
                        array(
                            'status' => 0,
                        )
        );


        Session::flash('message', 'Data has been deleted successfully');
        Session::flash('message_type', 'success');

        return Redirect::to('admin/chat');
    }

}
