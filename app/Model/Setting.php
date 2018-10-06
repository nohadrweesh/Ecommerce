<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model {
	//
	protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'sitename_en',
		'logo',
		'icon',
		'email',
		'description',
		'keywords',
		'status',
		'message_maintenance',
		'main_lang',
	];
}


/*'sitename_ar'=>'متجر الكتروني','sitename_en'=>'Ecommerce Website','logo'=>'logo.png','icon'=>'icon.png','email'=>'ecommerce@info.com','description'=>'Ecommerce website for buying/selling products','keywords'=>'ecommerce,products,company,vendor','status'=>'running',
'message_maintenance'=>'Website is in maintenance',	'main_lang'=>'en'*/