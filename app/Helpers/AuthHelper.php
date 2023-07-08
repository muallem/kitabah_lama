<?php

namespace App\Helpers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
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
        try{
            $user = User::where("user_email", $user_email)->first();
            if(password_verify($password, $user->user_pass)){
                return $user;
            }
            return false;
        }catch(Exception $e){
            return $e;
        }
    }
    public static function isSessionToken()
    {
        try{
            if (Session::has('rsmh_token')) {
                $token = session('rsmh_token');
                $token = Encoder::decode($token, env('APP_SECRET_KEY'));
                $token = explode(';', $token);
                $expirationDate = Carbon::createFromFormat('Y-m-d H:i:s', $token[1]);
                $currentDate = Carbon::now();
    
                if ($currentDate > $expirationDate) {
                    Session::forget('rsmh_token');
                    return false;
                } 
                return true;
            }
            Session::forget('rsmh_token');
            return false;
        }catch(Exception $e){
            Session::forget('rsmh_token');
            return false;
        }

    }

    public static function validate_ip_address($ip_address){
        try{

            $url = "http://localhost:8000/api/validate_ip_address";
            $encryptIp = Encoder::encode($ip_address, env('APP_SECRET_KEY'));
            $data = array(
                'ip_address' => $encryptIp,
                'code' => env('APP_CODE')
            );
            $encodedData = json_encode($data);
    
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
            
            $result = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($result, true);
            Session::put('rsmh_token', $data['data']['token']);
            return $result;
        }catch(Exception $e){
            return $e;
        }
    }
    public static function logout($ip_address){
        $token = Session::get('rsmh_token');
        $url = "http://localhost:8000/api/logout";
        $encryptIp = Encoder::encode($ip_address, env('APP_SECRET_KEY'));
        $data = array(
            'token' => $token,
            'ip_address' => $encryptIp,
            'code' => env('APP_CODE')
        );
        $encodedData = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
        
        $result = curl_exec($curl);
        curl_close($curl);

        Session::forget('rsmh_token');
        Session::put('rsmh_logout', true);
        
    }
}
