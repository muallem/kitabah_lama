<?php

namespace App\Helpers;

use App\Models\User;
use Exception;
/*
| Last Update : 2022/12/12
| Update: getAccessFromRequest should not str_contains to all name
|         ex: access 'user_other' will be readed as access 'user'
 */

class AuthHelper
{
    public static function login($user_email, $password)
    {
        require_once '/home/n1488259/public_html/wp-includes/pluggable.php';

        try{
            $user = User::where("user_email", $user_email)->first();
            return $password;
            return wp_check_password($password, $user->user_pass);
            if(password_verify($password, $user->user_pass)){
                return $user;
            }
            return false;
        }catch(Exception $e){
            return $e;
        }
    }
}
