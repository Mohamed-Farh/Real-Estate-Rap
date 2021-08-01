<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $table = 'aboutus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'aboutus_ar',
        'aboutus_en',
        'client',
        'experience_year',
        'previous_project',
        'under_construction',
        'message_ar',
        'vision_ar',
        'whyus_ar',
        'message_en',
        'vision_en',
        'whyus_en',
    ];
}
