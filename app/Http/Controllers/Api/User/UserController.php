<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

use App\Http\Repositories\AuthRepository;

class UserController extends ApiController
{

    protected $userRepository;
    protected $authRepository;

    public function __construct(AuthRepository $authRepository, UserRepository $userRepository)
    {
        $this->authRepository = $authRepository;
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

    public function registerAsUserStepOne(Request $request)
    {
        $validator = $this->authRepository->getValidationRegisterAsUserStepOne($request);


        if ($validator->fails()) {
            $validate = validationMessage($validator->errors());
            return $this->sendError(1, 1, $validate);
        }

        $name = $request->name;
        $users_hp = $request->users_hp;

       return $this->sendResponse(0, "Success");
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


    public function registerAsUserFinish(Request $request)
    {
        $request_id = $request->request_id;
        $code = $request->code;
        $users_verification_type = "email";
        $email = $request->email;

        if ($users_verification_type == "sms") {
            $result = SMSverifyCheck($request_id, $code);

            if ($result->getData()->data->status == 16) {
                return $this->sendError(2, "Kode Tidak cocok", (object) array());
            }
            if ($result->getData()->data->status == 3) {
                return $this->sendError(2, "Invalid value request id", (object) array());
            }

            if ($result->getData()->data->status == 6) {
                return $this->sendError(2, "Permintaan sudah diverifikasi", (object) array());
            }

        }else {
            $checkVerificationEmail = checkVerificationEmail($request_id, $code, $email);

            if ($checkVerificationEmail === "TOKEN_EXPIRED") {
                return $this->sendError(2, 'Token sudah kadaluarsa', (object) array());
            }

            if ($checkVerificationEmail === "CODE_NOT_MATCH") {
                return $this->sendError(0, 'Kode yg dimasukkan tidak sesuai', (object) array());
            }
        }


        $thisData = [
            'users_code' => generateFiledCode('USERS'),
            'name' => $request->name,
            'users_hp' => $request->users_hp,
            'users_company' => $request->users_company,
            'users_referral_code' => $request->users_referral_code,
            'users_npwp' => $request->users_npwp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'users_verification_type' => ($request->users_verification_type == 'email' ? 1 : 0),
        ];



        try {

            $insertRegis = DB::table('users')->insert($thisData);

        } catch (\Exception $e) {

            return $this->sendError(2, "Gagal Registrasi", (object) array());

        }

        return $this->sendResponse(0, "Berhasil Registrasi");
    }
}
