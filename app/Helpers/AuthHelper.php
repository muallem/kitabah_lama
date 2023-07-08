<?php

namespace App\Helpers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Helpers\Encoder;
use Illuminate\Support\Facades\Session;
/*
| Last Update : 2022/12/12
| Update: getAccessFromRequest should not str_contains to all name
|         ex: access 'user_other' will be readed as access 'user'
 */

class AuthHelper
{
    public static function login($user_email, $password)
    {
        // Include the necessary parts of the pluggable.php file
        require_once '/home/n1488259/public_html/wp-includes/class-phpass.php';

        try {
            // Your login logic here
            $user = User::where("user_email", $user_email)->first();
            $hasher = new \PasswordHash(8, true);

            if ($hasher->CheckPassword($password, $user->user_pass)) {
                $expired_time = Carbon::now()->format('Y-m-d').' 23:59:00';
                $token = Encoder::encode($user->user_email.';'.$expired_time, env('APP_SECRET_KEY'));

                Session::flush();
                Session::put('token', $token);
                $data['message'] = "success";
                return $data;
            }
            $data['message'] = "failed";
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }
    public static function isSessionToken()
    {
        try{
            if (Session::has('token')) {
                $token = session('token');
                $token = Encoder::decode($token, env('APP_SECRET_KEY'));
                $token = explode(';', $token);
                $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $token[1]);
                $currentDate = Carbon::now();
    
                if ($currentDate > $expirationDate) {
                    Session::forget('token');
                    return false;
                } 
                return true;
            }
            Session::forget('token');
            return false;
        }catch(Exception $e){
            Session::forget('token');
            return false;
        }

    }
}
