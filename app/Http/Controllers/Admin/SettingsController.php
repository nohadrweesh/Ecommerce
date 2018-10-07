<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Storage;
use Up;


class SettingsController extends Controller{
    public function settings(){
        return view('admin.settings',['title'=>'Settings']);
    }
     public function settings_save(){

     	$data=$this->validate(request(),[
     			'logo'=>validate_image(),
     			'icon'=>validate_image(),

     	],[],['Logo','Icon']);
        //dd($data);
         $data=request()->except(['_token','method']);
     	if(request()->has('logo')){
     		/*if(!empty(setting()->logo)){
     			Storage::delete(setting()->logo);
     		}*/
     		//$data['logo']=request()->file('logo')->store('settings');
     		$data['logo']=Up::upload([
     				//'new_name'=>'',
     				'file'=>'logo',
     				'delete_file'=>setting()->logo,
     				'path'=>'settings',
     				'upload_type'=>'single',


     		]);
     	}

     	if(request()->has('icon')){
     		/*if(!empty(setting()->icon)){
     			Storage::delete(setting()->icon);
     		}*/
     		//$data['icon']=request()->file('icon')->store('settings');
     		$data['icon']=Up::upload([
     				//'new_name'=>'',
     				'file'=>'icon',
     				'delete_file'=>setting()->icon,
     				'path'=>'settings',
     				'upload_type'=>'single',


     		]);
     	}
         Setting::orderBy('id','desc')->update($data);

         session()->flash('success','Settings updated successfully');
         return redirect(admin_url('settings'));
     }
    
    
}