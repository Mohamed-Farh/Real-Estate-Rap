<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'head_ar',
        'head_en',
        'body_ar',
        'body_en',
        'photo',
        'status',
        'vision',
    ];
}
