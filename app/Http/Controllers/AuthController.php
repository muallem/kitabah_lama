<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $result = AuthHelper::login($request->user_email, $request->password);
        return $result;
    }

    public function logout(Request $request)
    {
        AuthHelper::logout($request->ip());
        return redirect()->route('login');
    }

    public function validate_ip_address(Request $request)
    {
        $result = AuthHelper::validate_ip_address($request->ip() );
        return $result;
    }
}
