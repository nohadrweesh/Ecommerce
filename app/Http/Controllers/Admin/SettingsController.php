<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Setting;


class SettingsController extends Controller{
    public function settings(){
        return view('admin.settings',['title'=>'Settings']);
    }
     public function settings_save(){
         $data=request()->except(['_token','method']);
         Setting::orderBy('id','desc')->update($data);
         session()->flash('success','Settings updated successfully');
         return redirect(admin_url('settings'));
     }
    
    
}