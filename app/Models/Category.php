<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar', 'name_en','Notes',
    ];


    public $timestamps = true;

    public function properties(){
        return $this->hasMany('App\Models\Property');
     }
}
