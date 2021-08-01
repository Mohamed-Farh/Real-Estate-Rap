<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contactus_messages';

    protected $guarded = [];

    protected $searchable = [
        'columns'   => [
            'contacts.name'     => 10,
            'contacts.email'    => 10,
            'contacts.mobile'   => 10,
            'contacts.subject'    => 10,
            'contacts.message'  => 10,
        ],
    ];

    public function status()
    {
        return $this->status == 1 ? 'Read' : 'New';
    }
}
