<?php

namespace App\Http\Controllers\Admin;



use App\Payment;
use App\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends \App\Http\Controllers\Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    public function report()
    {
        $data['reportPayment'] = Payment::all();
        return view('admin.report.report',compact('data'));
    }

    public function login()
    {
        /*$user = new User();
		$user->email = 'admin@charge.ir';
		$user->password = Hash::make('1');
		$user->save();die();*/
        if(Request::isMethod('POST')){
            $rules = array(
                'userAdmin' => 'required',
                'passwordAdmin' => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return redirect("/admin/login");
            }
            $userData = array(
                'email' => Input::get('userAdmin'),
                'password' => Input::get('passwordAdmin')
            );
            if (Auth::attempt($userData)) {
                return redirect("/admin/dashboard");
            }else{
                return redirect("/admin/login");
            }
        }
        return view('admin.login.login');
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        Session::flush();
        return Redirect::to('admin/login'); // redirect the user to the login screen
    }

}