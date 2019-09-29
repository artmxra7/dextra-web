<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCategory as AppJobCategory;
use App\JobCategory;

class JobCategoryController extends ApiController
{
    public function index()
    {
        $jobs = JobCategory::where('job_status', 1)
        ->where('job_delete', 0)
        ->orderBy('created_at', 'DESC')->get();

        $jobs = AppJobCategory::collection($jobs);



        if (collect($jobs)->count()) {
            return $this->sendResponse(0, 'Sukses', $jobs);
        } else {
            return $this->sendError(2, 4);
        }


    }
}
