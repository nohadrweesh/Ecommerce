<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
	Config::set('auth.defines','admin');
	Route::get('login','AdminAuthController@login');
	Route::post('login','AdminAuthController@doLogin');
	Route::get('forgot/password','AdminAuthController@forgot_password');
	Route::get('reset/password/{token}','AdminAuthController@reset_password');
	Route::post('reset/password/{token}','AdminAuthController@reset_password_post');
	Route::post('forgot/password','AdminAuthController@forgot_password_post');
	Route::group(['middleware'=>'admin:admin'],function(){
		//dd("here");
		Route::delete('admin/destroy/all','AdminController@multi_delete');
		Route::resource('admin','AdminController');
		Route::get('/',function(){

			return view('admin.home');
		});

		Route::any('logout','AdminAuthController@logout');
	});
	Route::get('lang/{lang}',function($lang){
		if(session()->has('lang'))
			session()->forget('lang');
		if($lang=='ar'){
			session()->put('lang','ar');
		}else{
			session()->put('lang','en');
		}
		return back();
	});
    
});
