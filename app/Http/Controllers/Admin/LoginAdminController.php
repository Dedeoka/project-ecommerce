<?php

namespace App\Http\Controllers\Admin;

use AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginAdminController extends Controller
{
    public function loginadmin(){

        return view('admin.login');
    }

    public function action(Request $request){
        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            // Alert::success('Congrats', 'Login Successfully ');
            return redirect()->route('admin.dashboard');
            //return dd(Auth::guard('admin'));
            //return dd(request()->all());
        }else{

            // Alert::error('Username atau Password anda salah', '');
            return redirect()->back();
        }

    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('loginadmin');
    }
}
