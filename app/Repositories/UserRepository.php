<?php

namespace App\Http\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Users;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getDetail($users_code)
    {
        if (empty($users_code)) {
            return false;
        }

        $users = DB::table('users')->select('*')
            ->where('users.id', '!=', 2)
            ->where('users_status', 1)
            ->where('users.users_code', $users_code)
            ->limit(1)
            ->first();

        $user = (collect($users)->count()) ? new UserResource($users) : false;

        return $user;
    }



    public function updateFCM($user_code, $request)
    {
        $exist = DB::table('user_device')->where('user_code', $user_code)->exists();

        if ($exist) {
            $result = DB::table('user_device')
                ->where('user_code', $user_code)
                ->update([
                    'cloud_messaging_token' => $request->token_fcm,
                    'date_updated' => now()
                ]);
        } else {
            $result = DB::table('user_device')
                ->insert([
                    'user_code' => $user_code,
                    'user_device_code' => generateFiledCode('UDC'),
                    'cloud_messaging_token' => $request->token_fcm
                ]);
        }

        return (boolean) $result;
    }

    public function updateProfile($request, $user_code)
    {
        if (empty($user_code)) {
            return false;
        }

        // $email = DB::table('users')->select('email')->where('users_status', 1)->where('email', $request->users_email)->get();
        // $code = DB::table('users')->select('email')->where('users_status', 1)->where('users_code', $user_code)->first();

        $data = [
            'users_name' => $request->name,
            'users_hp' => $request->users_hp,
            'users_company' => $request->users_company,
            'users_date_updated' => now()
        ];

        // if ($request->users_email) {

        //         if (count($email) > 0) {
        //             if ($request->users_email != $code->email) {
        //                 return 'ALREADY_EXISTS';
        //             }
        //         }else{
        //             $data['email'] = $request->users_email;
        //         }

        // }

        $update = User::where('users_status', 1)
            ->where('users_code', $user_code)
            ->update($data);
        return $update;
    }

    public function updateEmail($request, $user_code)
    {
        $validateEmail = User::where('users_status', 1)
            ->where('users_code', $user_code)
            ->where('email', $request->old_email)
            ->exists();
            // dd($validateEmail);

        $emailUsedInUsers = User::where('email', $request->email)->exists();
        // dd($emailUsedInUsers);
        // $emailUsedInPartners = Partner::where('email', $request->email)->exists();

        if (!$validateEmail)
            return 'EMAIL_EXIST_NOT_FOUND';

        // if ($emailUsedInUsers OR $emailUsedInPartners)
        if ($emailUsedInUsers)

            return 'EMAIL_ALREADY_USED';

        $comparePassword = $this->comparePassword($request->password, $user_code);

        if ($comparePassword == 'UNMATCH')
            return 'WRONG_PASSWORD';

        try {
            $update = DB::table('users')
                ->where('users_code', $user_code)
                ->update([
                    'email' => $request->email,
                    'users_date_updated' => now()
                ]);
        } catch (\Exception $ex) {
            logger('updateEmail(): catch ->', ['user' => $user_code, 'Exception' => $ex->getMessage()]);
            return 'FAILED';
        }
        return 'SUCCESS';
    }

    public function updatePassword($request, $user_code)
    {
        $comparePassword = $this->comparePassword($request->old_password, $user_code);
        $compareWithLastPassword = $this->comparePassword($request->new_password, $user_code);

        if ($comparePassword == 'UNMATCH')
            return 'WRONG_PASSWORD';

        if ($compareWithLastPassword == 'MATCH')
            return 'SAME_LAST_PASSWORD';

        if ($request->new_password != $request->new_password_confirmation)
            return 'NEW_PASSWORD_UNMATCH';

        try {
            $update = DB::table('users')
                ->where('users_code', $user_code)
                ->update([
                    'password' => Hash::make($request->new_password),
                    'users_date_updated' => now()
                ]);
        } catch (\Exception $ex) {
            logger('updatePassword(): catch ->', ['user' => $user_code, 'Exception' => $ex->getMessage()]);
            return 'FAILED';
        }

        return 'SUCCESS';
    }

    public function comparePassword($pass_text, $user_code)
    {
        $hashedPassword = DB::table('users')
            ->where('users_code', $user_code)
            ->first('password');

        if (Hash::check($pass_text, $hashedPassword->password))
            return 'MATCH';
        return 'UNMATCH';
    }

    public function validateThis($request, $rules = array())
    {
        return Validator::make($request->all(), $rules);
    }

    public function getValidationProfileUpdate($request)
    {
        $rules = array(
            'name' => 'required',
            'users_hp' => 'required',
        );


        return $this->validateThis($request, $rules);
    }

    public function getValidationEmailUpdate($request)
    {
        $rules = array(
            'email' => 'required'
        );

        return $this->validateThis($request, $rules);
    }

    public function getValidationPasswordUpdate($request)
    {
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required|min:8'
        );

        return $this->validateThis($request, $rules);
    }




}
