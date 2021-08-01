<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gallery extends Model
{
    use Notifiable;

    protected $table = 'galleries';

    protected $primaryKey = 'id';

    protected $fillable =[

         'name',
         'type',
         'path',
         'status',
   ];

}
