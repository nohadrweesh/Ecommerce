<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
	Config::set('auth.defines','admin');
	Route::get('login','AdminAuthController@login');
	Route::post('login','AdminAuthController@doLogin');
	Route::get('forgot/password','AdminAuthController@forgot_password');
	Route::group(['middleware'=>'admin:admin'],function(){
		//dd("here");
		Route::get('/',function(){

			return view('admin.home');
		});

		Route::any('logout','AdminAuthController@logout');
	});
    
});
