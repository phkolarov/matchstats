<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_COOKIE['token'])) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('Token name')->accessToken;
            $_SESSION['token'] = $token;
            setcookie('token',$token,time()+60*60*24*7);
        }else{
            $token = $_COOKIE['token'];
        }

        return view('home', compact('token'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function matchstats()
    {
        return view('matchstats');
    }
}
