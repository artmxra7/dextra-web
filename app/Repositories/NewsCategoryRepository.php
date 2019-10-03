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
        ->where('news_category_status', 1)
        ->get();



        return $data;
    }

    public function getDetail($id)
    {


        $data = DB::table('news_categories')
        ->select(
            'news_categories.news_category_name',
            'news_categories.news_category_code',
        )

        ->where('news_categories.news_category_code', $id)
        ->limit(1)
        ->first();

        return $data;
    }


}
