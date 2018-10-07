<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Storage;

class UploadController extends Controller
{
    //$fie,$path,$upload_type='single',$delete_file=null,$new_name=null,$crud_type=[]
    public  static function upload($data=[])
    {
    	if(in_array('new_name', $data))
    		$new_name=$data['new_name']===null?time():$data['new_name'];
    	if(request()->hasFile($data['file']) && $data['upload_type']=='single'){

    		if(!empty($data['delete_file'])&&	Storage::has($data['delete_file'])){
    				Storage::delete($data['delete_file']);

    		}
    		return request()->file($data['file'])->store($data['path']);

    	}

    	
    }
}
