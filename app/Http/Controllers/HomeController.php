<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function coba(){
        return Session::get('token');
    }
    public function get_session(){
        // Retrieve all session data
        $allData = Session::all();

        $data = array();
        // Loop through the session data
        foreach ($allData as $key => $value) {
            // Access individual session items
            array_push($data, "Key: $key, Value: $value");
        }
        return $data;
    }
}
