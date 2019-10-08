<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderJobRepository
{


    public function getJobOrder()
    {


        $data = DB::table('jobs')
        ->select(
            'jobs.job_code',
            'jobs.users_code',
            'jobs.job_name',
            'jobs.brand',
            'jobs.model',
            'jobs.job_serial_number',
            'jobs.latitude',
            'jobs.longtitude',
            'jobs.job_categories_code',
            'jobs.description',
            'jobs.location_name',
            'jobs.location_description',
            'jobs.status',
            'jobs.created_at',
            'u.users_code',
            'u.users_name',
            'u.users_hp',
            'jobcat.job_categories_code',
            'jobcat.name'
        )
        ->leftJoin('users as u', DB::raw('BINARY jobs.users_code'), '=', DB::raw('BINARY u.users_code'))
        ->leftJoin('job_categories as jobcat', DB::raw('BINARY jobs.job_categories_code'), '=', DB::raw('BINARY jobcat.job_categories_code'))
        ->get();

        return $data;
    }

    public function getDetail($id)
    {


        $data = DB::table('jobs')
        ->select(
            'jobs.job_code',
            'jobs.users_code',
            'jobs.job_name',
            'jobs.brand',
            'jobs.model',
            'jobs.job_serial_number',
            'jobs.latitude',
            'jobs.longtitude',
            'jobs.job_categories_code',
            'jobs.description',
            'jobs.location_name',
            'jobs.location_description',
            'jobs.status',
            'jobs.created_at',
            'u.users_code',
            'u.users_name',
            'u.users_hp',
            'jobcat.job_categories_code',
            'jobcat.name'
        )
        ->leftJoin('users as u', DB::raw('BINARY jobs.users_code'), '=', DB::raw('BINARY u.users_code'))
        ->leftJoin('job_categories as jobcat', DB::raw('BINARY jobs.job_categories_code'), '=', DB::raw('BINARY jobcat.job_categories_code'))
        ->where('jobs.job_code', $id)
        ->limit(1)
        ->first();

        return $data;
    }
}
