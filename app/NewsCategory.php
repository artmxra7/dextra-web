<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public $table = 'news_categories';

    public $timestamps = false;

    protected $attributes = [
        // 'is_dashboard' => 1,

        'news_category_status' => 1,



    ];
}
