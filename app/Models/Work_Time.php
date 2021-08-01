<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work_Time extends Model
{
    protected $table = 'work_time';

    protected $primaryKey = 'id';

    protected $fillable =[

         'start_day',
         'end_day',
         'start_time',
         'end_time',
   ];
}
