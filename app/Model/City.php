<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table='cities';
    protected $fillable=['city_name_ar','city_name_en','country_id'];
}
