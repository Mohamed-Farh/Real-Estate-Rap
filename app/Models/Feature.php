<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Feature extends Model
{
    use Notifiable;

    protected $table = 'features';

    protected $primaryKey = 'id';

    protected $fillable =[

         'name_ar',
         'name_en',
         'Notes',
   ];


   public function properties(){

        return $this->belongsToMany('App\Models\Property');
    }
}
