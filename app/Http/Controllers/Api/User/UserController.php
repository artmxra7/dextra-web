<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


class UserController extends ApiController
{

    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        $validator = $this->userRepository->getValidationProfileUpdate($request);

        // dd($validator);

        if ($validator->fails())
            return $this->sendError(1, 'Params not complete', validationMessage($validator->errors()));

        $update = $this->userRepository->updateProfile($request, Auth::user()->users_code);

        if ($update == "ALREADY_EXISTS") {

            return $this->sendError(2, 'Email sudah terdaftar');
        }
        else if ($update) {

            return $this->sendResponse(0, 'Sukses Update Profile');
        } else {

            return $this->sendError(2, 'Error');
        }
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

    public function ViewUserLastLogin(Request $request)
    {
        $result = true;
        if ($result) {
            $result = $this->sendResponse(0, 31);
        } else {
            $result = $this->sendError(2, 32);
        }
    }



    public function details()
    {
        $result = $this->userRepository->getDetail(Auth::user()->users_code);

        if (!empty($result)) {
            $result = $this->sendResponse(0, 'Sukses', $result);

        } elseif ($result === false) {
            $result = $this->sendError(2, 4);
        } else {
            $result = $this->sendError(2, 4);
        }

        return $result;
    }

    public function UpdateFCM(Request $request)
    {
        $users_code = Auth::user()->users_code;
        $result = $this->userRepository->updateFCM($users_code, $request);

        if ($result) {
            return $this->sendResponse(0,'Berhasil', (object) array());
        }else {
            return $this->sendError(2, 'Gagal', (object) array());
        }
    }

    public function viewUserExist()
    {
        $result = \App\User::select('users_status')
            ->where('users_status', 1)
            ->where('users_code', Auth::user()->users_code);

        if ($result->exists()) {
            $result = $this->sendResponse(0, "Sukses");
        } else {
            $result = $this->sendError(2, 4);
        }

        return $result;
    }

    public function viewUserStatus()
    {
        $result = \App\User::select('users_status')
        ->where('users_status',1)
        ->where('users_code', Auth::user()->users_code);
        $data = $result->first();



        if ($result->exists()) {
            $result = $this->sendResponse(0, "Sukses", $data);
        } else {
            $result = $this->sendError(2, 4);
        }

        return $result;
    }

    public function updateEmail(Request $request)
    {
        // dd($request);
        $validator = $this->userRepository->getValidationEmailUpdate($request);

        if ($validator->fails())
            return $this->sendError(1, 'Params not complete', validationMessage($validator->errors()));

        $update = $this->userRepository->updateEmail($request, Auth::user()->users_code);

        if ($update == 'EMAIL_EXIST_NOT_FOUND') {
            return $this->sendError(2, 'Email lama tidak ditemukan');
        } elseif ($update == 'EMAIL_ALREADY_USED') {
            return $this->sendError(2, 'Email Baru sudah digunakan');
        } elseif ($update == 'WRONG_PASSWORD') {
            return $this->sendError(2, 'Password Salah');
        } elseif ($update == 'SUCCESS') {
            return $this->sendResponse(0, 'Sukses Update Email');
        } else {
            return $this->sendError(2, 'Error');
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = $this->userRepository->getValidationPasswordUpdate($request);

        if ($validator->fails())
            return $this->sendError(1, 'Params not complete', validationMessage($validator->errors()));

        $update = $this->userRepository->updatePassword($request, Auth::user()->users_code);

        if ($update == 'WRONG_PASSWORD') {
            return $this->sendError(2, 'Password Salah');
        } elseif ($update == 'NEW_PASSWORD_UNMATCH') {
            return $this->sendError(2, 'Konfirmasi password tidak sesuai');
        } elseif ($update == 'SAME_LAST_PASSWORD') {
            return $this->sendError(2, 'Password lama dan baru harus berbeda');
        } elseif ($update == 'SUCCESS') {
            return $this->sendResponse(0, 'Sukses Update Password');
        } else {
            return $this->sendError(2, 'Error');
        }
    }


}
