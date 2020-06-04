<?php

namespace App\Http\Controllers\Admin;

use App\Bulong\News\News;
use App\Bulong\Users\User;
use Illuminate\Http\Request;
use App\Bulong\Categories\Category;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $userList = User::orderBy('username','asc')->get();
        if(isset($request->addUser)){
            return view('UserManagementController.list')->with('susscessMessage', 'User registered successfully')->with('userList', $userList);
        }
        return view('UserManagementController.list')->with('userList', $userList);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find($request->id);
            $name = $user->username;
            $user->username = $request->username;
            if($request->password != null && $request->password != ''){
                $user->password = bcrypt($request->password);
            }
            $user->is_admin = $request->is_admin;
            $user->save();

            $userList = User::orderBy('username','asc')->get();
            return view('UserManagementController.list')->with('susscessMessage','username "' . $name . '" edit successfully')->with('userList', $userList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $user = User::find($request->id);
            return view('UserManagementController.edit')->with('user', $user);
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $name = $user->username;
        $user->delete();
        $userList = User::orderBy('username','asc')->get();
        return view('UserManagementController.list')->with('susscessMessage', 'username "' . $name . '" deleted successfully')->with('userList', $userList);
    }

}
