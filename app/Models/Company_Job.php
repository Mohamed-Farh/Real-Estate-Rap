<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_Job extends Model
{
    protected $table = 'company_jobs';

    protected $primaryKey = 'id';

    protected $fillable =[

         'title_ar',
         'title_en',
         'type',
         'status',
   ];
}
