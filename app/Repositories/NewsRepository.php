<?php

namespace App\Http\Repositories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class  NewsRepository
{

    function __construct()
    {

    }

    public function getNews ()
    {
        $data = DB::table('news')
        ->select('news.news_code',
        'news.news_category_id',
        'news.news_title',
        'news.news_media',
        'news.id as nonews',
        'news.news_content',
         'nc.id',
         'nc.news_category_name')
        ->leftJoin('news_categories as nc', DB::raw('BINARY news.news_category_id'), '=', DB::raw('BINARY nc.id'))
        ->where('news_delete', 0)
        ->orderBy('news_date_create', 'DESC')
        ->get();



        return $data;
    }


    public function createNews ($input)
    {


        $create_job = DB::table('news')
            ->insert(
                [
                    'news_code' => generateFiledCode('NEWS'),
                    'news_title' => $input['title'],
                    'news_slug' => $input['slug'],
                    'news_category_id' => $input['news_category_id'],
                    'news_media' => $input['photo'],
                    'news_content' => $input['content'],
                    'news_status' => 1,
                    'news_delete' => 0,
                    'news_publisher' => $input['news_publisher'],
                    'news_date_create' => Carbon::now(),
                ]
            );
        return $create_job;
    }


}
