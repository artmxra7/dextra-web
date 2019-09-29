<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\UserService;

class RegisterController extends ApiController
{
    //

    protected $authRepository;
    protected $userService;

    public function __construct(AuthRepository $authRepository, UserService $userService)
    {
        $this->authRepository = $authRepository;
        $this->userService = $userService;
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
