<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class  NewsCategoryRepository
{

    function __construct()
    {

    }

    public function getNews ()
    {
        $data = DB::table('news_categories')
        ->orderBy('created_at', 'DESC')
        ->get();



        return $data;
    }


}
