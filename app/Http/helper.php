<?php
if(!function_exists('admin_url')){
	function admin_url($url=null){
		return url('admin/'.$url);
	}
}

if(!function_exists('admin')){
	function admin(){
		return  auth()->guard('admin');
	}
}