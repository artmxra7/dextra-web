<?php

namespace App\Http\Repositories;

use App\Http\Resources\daftarJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JobRepository
{
    public function listAllJob($limit = '5', $offset = '0')
    {

        $job_list = DB::table('jobs')
            ->select(

                'jobs.users_code',
                'jobs.job_category_id',
                'jobs.job_categories_code',
                'jobs.job_name',
                'jobs.job_code',
                'jobs.model',
                'jobs.brand',
                'jobs.job_serial_number',
                'jobs.description',
                'jobs.location_name',
                'jobs.latitude',
                'jobs.longtitude',
                'jobs.location_description',
                'jobs.created_at',
                'jobs.status',
                'users.users_code',
                'users.users_name',
                'users.email',
                'users.users_hp',
            )

            ->leftJoin('users as users', DB::raw('BINARY jobs.users_code'), '=', DB::raw('BINARY users.users_code'));

        if ($limit == null) {
            $resource = $job_list->get();
        } else {
            $resource = $job_list->limit($limit)
                ->offset($offset)
                ->get();
        }
        $job = daftarJob::collection($resource);
        return $job;
    }

    public function listAllJobUser($users_code, $limit = '5', $offset = '0')
    {

        $job_list = DB::table('jobs')
            ->select(

                'jobs.users_code',
                'jobs.job_category_id',
                'jobs.job_categories_code',
                'jobs.job_name',
                'jobs.job_code',
                'jobs.model',
                'jobs.brand',
                'jobs.job_serial_number',
                'jobs.description',
                'jobs.location_name',
                'jobs.latitude',
                'jobs.longtitude',
                'jobs.location_description',
                'jobs.created_at',
                'jobs.status',
                'users.users_code',
                'users.users_name',
                'users.email',
                'users.users_hp',
            )

            ->leftJoin('users as users', DB::raw('BINARY jobs.users_code'), '=', DB::raw('BINARY users.users_code'));

        if ($limit == null) {
            $resource = $job_list->get();
        } else {
            $resource = $job_list->limit($limit)
                ->offset($offset)
                ->toSql();
        }
        $job = daftarJob::collection($resource);
        return $job;
    }


    public function createJobs($user_code, $thisData)
    {

        $create_job = DB::table('jobs')
            ->insert(
                [
                    'users_code' => $user_code,
                    'job_category_id' => $thisData['job_category_id'],
                    'job_name' => $thisData['job_name'],
                    'job_code' => $thisData['job_code'],
                    'model' => $thisData['job_model'],
                    'brand' => $thisData['brand'],
                    'job_serial_number' => $thisData['serialNumber'],
                    'description' => $thisData['description'],
                    'location_name' => $thisData['location_name'],
                    'latitude' => $thisData['latitude'],
                    'longtitude' => $thisData['longtitude'],
                    'location_description' => $thisData['location_description'],
                    'created_at' => Carbon::now(),
                    'status' => 0,
                ]
            );


        return $create_job;
    }
}
