<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Repositories\JobRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends ApiController
{

    protected $jobRepo;

    public function __construct( JobRepository $JobRepo)
    {
        $this->jobRepo = $JobRepo;
    }

    public function index()
    {

    }

    public function create(Request $request)
    {
        $users_code = Auth::user()->users_code;
        $thisData = [
            'job_category_id' => $request->job_category_id,
            'job_name' => $request->job_name,
            'job_model' => $request->job_model,
            'job_code' => generateFiledCode('JOBORDER'),
            'brand' => $request->brand,
            'serialNumber' => $request->serialNumber,
            'description'  => $request->description,
            'location_name'  => $request->location_name,
            'latitude'  => $request->latitude,
            'longtitude'  => $request->longtitude,
            'location_description'  => $request->location_description,
        ];


        $save_jobs = $this->jobRepo->createJobs($users_code, $thisData);

        if ($save_jobs) {
            return $this->sendResponse(0, "Berhasil", $thisData);
        } else {
            return $this->sendError(2, 'Error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllJob(Request $request)
    {
        $users_code = Auth::user()->users_code;
        $limit = $request->limit;
        $offset = $request->offset;

        $job_list = $this->jobRepo->listAllJob($limit, $offset);

        if ($job_list->count() > 0) {
            $result = $this->sendResponse(0, 'Sukses', $job_list);
        } elseif ($job_list->count() == 0) {
            $result = $this->sendResponse(0, 'Data kosong');
        } else {
            $result = $this->sendError(2, 'Error');
        }

        return $result;
    }

    public function getJobUser(Request $request)
    {
        $users_code = Auth::user()->users_code;
        $limit = $request->limit;
        $offset = $request->offset;

        $job_list = $this->jobRepo->listAllJobUser($users_code, $limit, $offset);

        if ($job_list->count() > 0) {
            $result = $this->sendResponse(0, 'Sukses', $job_list);
        } elseif ($job_list->count() == 0) {

            $result = $this->sendResponse(0, 'Data kosong');
        } else {
            $result = $this->sendError(2, 'Error');
        }

        return $result;
    }
}
