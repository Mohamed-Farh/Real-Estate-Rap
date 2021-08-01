<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_Location extends Model
{
    protected $table = 'location';

    protected $primaryKey = 'id';

    protected $fillable =[

         'country_ar',
         'country_en',
         'city_ar',
         'city_en',
         'address_ar',
         'address_en',
         'location_latitude',
         'location_longitude',
         'status',
   ];
}
