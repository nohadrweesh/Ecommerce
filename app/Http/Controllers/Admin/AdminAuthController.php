<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

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

    public function forgot_password_post(Request $request){
        $admin=Admin::where('email',$request['email'])->first();
        if(!empty($admin)){
           $token= app('auth.password.broker')->createToken($admin);
          $data= DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now()

           ]);
          Mail::to($admin->email)->send( new AdminResetPassword(['data'=>$admin,'token'=>$token]));
          session()->flash('success','Reset link sent');
          return back();
         //  return new AdminResetPassword(['data'=>$admin,'token'=>$token]);
        }
        return back();
    }

    public function reset_password($token){
        $check_token=DB::table('password_resets')->where('token',$token)
        ->where('created_at','>',Carbon::now()->subhours(2))->first();
        if($check_token!=null){
            return view('admin.reset_password',['data'=>$check_token]);
        }else{
            return redirect(admin_url('forgot_password'));
        }
    }

    public function reset_password_post($token){
        $this->validate(request(),[
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ],[],[
            'password'=>'Password',
            'password_confirmation'=>'COnfirmation Password'
        ]);
        $check_token=DB::table('password_resets')->where('token',$token)
        ->where('created_at','>',Carbon::now()->subhours(2))->first();
        if($check_token!=null){

            $admin=Admin::where('email',$check_token->email)->update([/*'email'=>$check_token->email,*/'password'=>bcrypt(request('password'))]);

            DB::table('password_resets')->where('email',$check_token->email)->delete();
            //$admin=Admin::where('email',$check_token->email);
            //dd($admin);
            admin()->attempt(['email'=>request('email'),'password'=>request('password')]);
            //admin()->login($admin);
            return redirect(admin_url());


        }


    }
}
