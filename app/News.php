<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    protected $primaryKey = 'news_code';

}
