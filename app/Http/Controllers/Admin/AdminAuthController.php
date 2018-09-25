<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    //
    public function login(){
    	return view('admin.login');
    }
    public  function doLogin(Request $request){
        $rememberme=$request->rememberme==1?true:false;
        //dd($rememberme);
  

        if(admin()->attempt(['email'=>$request['email'],'password'=>$request['password']/*,'remember'=>$rememberme*/])){
          //  dd('doLogin 1');
            return redirect('admin');
        }else{
            //dd('doLogin 2');
            session()->flash('error',trans('admin.incorrect_information_login'));
            return redirect('admin/login');
        }
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

    public function forgot_password(){
        return view('admin.forgot_password');
    }
}
