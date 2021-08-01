<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties_Features extends Model
{
    protected $table = 'properties';

    protected $fillable =[

         'feature_id',
         'property_id',

   ];
}
