<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JobCategoryRepository
{
    function __construct()
    {

    }

    public function getJob()
    {
        $data = DB::table('job_categories')
        ->where('job_status', 1)
        ->where('job_delete', 0)
        ->orderBy('created_at', 'DESC')
        ->get();

        // dd($data);

        return $data;

    }


}
