<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class  NewsRepository
{

    function __construct()
    {

    }

    public function getNews ()
    {
        $data = DB::table('news')
        ->select('news.news_category_id',
        'news.news_category_id',
        'news.news_title',
        'news.news_media',
        'news.id as nonews',
        'news.news_content',
         'nc.id',
         'nc.name')
        ->leftJoin('news_categories as nc', DB::raw('BINARY news.news_category_id'), '=', DB::raw('BINARY nc.id'))
        ->where('news_delete', 0)
        ->orderBy('news_date_create', 'DESC')
        ->get();



        return $data;
    }


}
