<?php
namespace App\Http\Controllers;

//todo: sts changes
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;


class UsersController extends Controller {

/*=====================================User Functions=================================================================*/

    public function index()
    {
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }
        $usersList = DB::table('users')
                        ->leftJoin('role', 'users.user_role', '=', 'role.id')
                        ->orderBy('users.created_at', 'desc')
                        ->where('users.is_delete', 0)
                        ->select('users.user_id', 'users.user_name', 'users.user_email', 'users.status', 'users.created_at', 'role.name')
                        ->get();

        return view('admin.users.index')
            ->with('usersList', $usersList);

    }

    public function addUsersForm(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $usersRoles = DB::table('role')->where('status', 1)->get();

        return view('admin.users.add')
            ->with('usersRoles', $usersRoles);
    }

    public function addUsers(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }
        $rules = array(
            'userName' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required|alphaNum|min:5',
            'confirmPassword' => 'required|alphaNum|min:5',
            'email' => 'required|email',
        );
        $messages = array(
            'userName.required' => 'First Name Field Is Required.',
            'password.required' => 'Password Field Is Required.',
            'confirmPassword.required' => 'Confirm Password Field Is Required.',
            'email.required' => 'E-Mail Field Is Required.',
            'email.email' => 'Need to Provide Valid E-mail Address.',
            'role.required' => 'Have to Select User Role',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            //todo: sts changes
            return Redirect::to('admin/add-users-form')
                ->withErrors($validator)
                ->withInput();
        }else {
            $userName = Input::get('userName');
            $userEmail = Input::get('email');
            $userPassword = Hash::make(Input::get('password'));
            $userStatus = Input::get('status');
            $userRole = Input::get('role');

            $insertDataArray = array(
                'user_name' => $userName,
                'user_email' => $userEmail,
                'user_password' => $userPassword,
                'user_role' => $userRole,
                'status' => $userStatus,
                'created_at' => date('Y-m-d H:i:s'),
            );

            $createUser = DB::table('users')->insert($insertDataArray);

            $usersList = DB::table('users')
                ->leftJoin('role', 'users.user_role', '=', 'role.id')
                ->orderBy('users.created_at', 'desc')
                ->where('users.is_delete', 0)
                ->select('users.user_id', 'users.user_name', 'users.user_email', 'users.status', 'users.created_at', 'role.name')
                ->get();

            if($createUser == 1){
                return view('admin.users.index')
                    ->with('messages', 'User has been create successfully!')
                    ->with('usersList',$usersList);
            }else{
                return view('admin.users.index')
                    ->with('errorMessages', 'Error has been occurred while insertion!')
                    ->with('usersList',$usersList);
            }

        }
    }

    public function editUsersForm($id){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $usersRoles = DB::table('role')->where('status', 1)->get();
        $viewEditData = DB::table('users')->where('user_id', $id)->get();

        return view('admin.users.edit')
                ->with('usersRoles', $usersRoles)
                ->with('viewEditData', $viewEditData);
    }

    public function editUser(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $userId = Input::get('userId');
        $userName = Input::get('userName');
        $userEmail = Input::get('email');
        $userStatus = Input::get('status');
        $userRole = Input::get('role');

        $updateUser = DB::table('users')
            ->where('user_id', $userId)
            ->update(
                array(
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'status' => $userStatus,
                    'user_role' => $userRole,
                )
            );

        $usersList = DB::table('users')
            ->leftJoin('role', 'users.user_role', '=', 'role.id')
            ->orderBy('users.created_at', 'desc')
            ->where('users.is_delete', 0)
            ->select('users.user_id', 'users.user_name', 'users.user_email', 'users.status', 'users.created_at', 'role.name')
            ->get();

        if($updateUser == 1){

            return view('admin.users.index')
                ->with('messages', 'User has been updated successfully!')
                ->with('usersList',$usersList);

        }else{
            return view('admin.users.index')
                ->with('errorMessages', 'Error has been occurred while update!')
                ->with('usersList',$usersList);
        }

    }

    public function deleteUser($id){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $deleteUser = DB::table('users')
            ->where('user_id', $id)
            ->update(
                array(
                    'is_delete' => 1,
                )
            );

        $usersList = DB::table('users')
            ->leftJoin('role', 'users.user_role', '=', 'role.id')
            ->orderBy('users.created_at', 'desc')
            ->where('users.is_delete', 0)
            ->select('users.user_id', 'users.user_name', 'users.user_email', 'users.status', 'users.created_at', 'role.name')
            ->get();

        if($deleteUser == 1){

            return view('admin.users.index')
                ->with('messages', 'User has been updated successfully!')
                ->with('usersList',$usersList);

        }else{
            return view('admin.users.index')
                ->with('errorMessages', 'Error has been occurred while update!')
                ->with('usersList',$usersList);
        }

    }

    public function changePasswordFrom(){

        return view('admin.users.change-password');
    }

    public function changePassword(){



        $userId = Input::get('userId');
        $password = Hash::make(Input::get('password'));

        $updatePassword = DB::table('users')
            ->where('user_id', $userId)
            ->update(
                array(
                    'user_password' => $password,
                )
            );

        if($updatePassword){
            return view('admin.users.change-password')
                ->with('userId', $userId)
                ->with('messages', 'Password has been updated successfully!');
        }else{
            return view('admin.users.change-password')
                ->with('userId', $userId)
                ->with('errorMessages', 'Error occurred while password going to update!');
        }

    }
    
/*=====================================End User Functions=============================================================*/
/*=====================================Role Functions=================================================================*/

    public function createRoleForm(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $roles = DB::table('role')->where('status', '=', 1)->get();

        return view('admin.role.index')
            ->with('roles', $roles);
    }

    public function addRoleForm(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $privileges = DB::table('privileges')->get();

        return view('admin.role.add')
            ->with('privileges', $privileges);
    }

    public function addRole(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $rules = array(
            'roleName' => 'required',
        );
        $messages = array(
            'roleName.required' => 'Role Name Field Is Required.',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('add-users-form')
                ->withErrors($validator)
                ->withInput();
        }else {
            $roleName = Input::get('roleName');
            $privileges = Input::get('privileges');
            $privileges = implode(',', $privileges);
            if(!$privileges){
                $privileges = '';
            }

            $id = DB::table('role')->insertGetId(
                array(
                    'name' => $roleName,
                    'privileges' => $privileges,
                    'created_at' => date("Y-m-d H:i:s"),
                    'status' => 1
                )
            );

            if($id){
                $roles = DB::table('role')->where('status', '=', 1)->get();

                return view('admin.role.index')
                    ->with('roles', $roles)
                    ->with('messages', 'Role has been create successfully!');
            }
        }
    }

    public function editRoleForm($id){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $roleData = DB::table('role')->where('status', '=', 1)->where('id', '=', $id)->get();

        $privileges = DB::table('privileges')->get();

        $assign_priv = explode(',', $roleData[0]->privileges);


        return view('admin.role.edit')
            ->with('roleData', $roleData)
            ->with('privileges', $privileges)
            ->with('assign_priv', $assign_priv)
            ->with('title', 'Edit Role');
    }

    public function editRole(){
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        $roleId = Input::get('roleId');
        $roleName = Input::get('roleName');

        $privileges = Input::get('privileges');
        $privileges = implode(',', $privileges);
        if(!$privileges){
            $privileges = '';
        }

        DB::table('role')
            ->where('id', $roleId)
            ->update(
                array(
                    'name' => $roleName,
                    'privileges' => $privileges
                )
            );
        $roles = DB::table('role')->where('status', '=', 1)->get();

        return view('admin.role.index')
            ->with('roles', $roles)
            ->with('messages', 'Role has been updated successfully!');
    }

    public function deleteRole($id) {
        $userId = Session::get('userId');
        if(!isset($userId)) {
            return view('admin.dashboard.login');
        }

        DB::table('role')
            ->where('id', $id)
            ->update(
                array(
                    'status' => 0,
                )
            );

        $roles = DB::table('role')->where('status', '=', 1)->get();

        return view('admin.role.index')
            ->with('roles', $roles)
            ->with('messages', 'Role has been deleted successfully!');
    }

/*=====================================End Role Functions=============================================================*/
}