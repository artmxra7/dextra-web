<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public $table = 'job_categories';

    public $timestamps = false;

    protected $attributes = [
        // 'is_dashboard' => 1,

        'job_status' => 1,



    ];

}
