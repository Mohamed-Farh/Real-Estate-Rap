<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Property extends Model
{

    use SearchableTrait;

    protected $table = 'properties';
    protected $primaryKey = 'id';


    protected $fillable = [
        'title_ar',    'title_en', 'used', 'photo',
        'price',        'discount',     'new_price',   'size',  'files',
        'purpose',  'images',      'status',     'video',
        'floornumber',     'no_of_floor',     'bedroom',      'bathroom',
        'city_ar',     'city_en',    'address_ar',     'address_en',
        'nearby_ar',   'nearby_en',   'description_ar',     'description_en',
        'location_latitude',        'location_longitude',   'category_id',  'feature_id',

    ];

    protected $searchable = [
        'columns'   => [
            'properties.title_ar'       => 10,
            'properties.title_en'       => 10,
            'properties.city_ar'        => 10,
            'properties.city_en'        => 10,
            'properties.address_ar'     => 10,
            'properties.address_en'     => 10,
            'properties.size'           => 10,
            'properties.price'          => 10,
            'properties.bedroom'        => 10,
            'properties.category_id'    => 10,
        ],
    ];



   //Every Property Belongs To One Category
    public function category(){
        return $this->belongsTo('App\Models\Category');
     }


     public function features(){

        return $this->belongsToMany('App\Models\Feature');
    }
}
