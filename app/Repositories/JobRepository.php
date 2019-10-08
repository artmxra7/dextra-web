<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JobRepository
{


    public function createJobs($user_code, $thisData)
    {

        $create_job = DB::table('jobs')
            ->insert(
                [
                    'users_code' => $user_code,
                    'job_categories_code' => $thisData['job_category_id'],
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
