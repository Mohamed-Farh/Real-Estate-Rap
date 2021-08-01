<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Job_Seeker extends Model
{
    protected $table = 'job_seekers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'job_title',
        'file',
        'message',
        'status',

    ];
}
