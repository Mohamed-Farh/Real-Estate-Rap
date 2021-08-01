<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Social extends Model
{
    use Notifiable;

    protected $table = 'social';

    protected $primaryKey = 'id';

    protected $fillable =[

         'name',
         'type',
         'status',
         'contact',
   ];
}
