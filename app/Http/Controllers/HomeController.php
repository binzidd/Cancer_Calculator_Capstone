<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Decision_Aid\user_information;
use Auth;

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
        //$userInfo = user_information::where('user_id',Auth::user()->id);

        $userId = Auth::User()->id;
        $userInfo = user_information::where('user_id', $userId)->first();
        if (!empty($userInfo->id)) {
            return view('forms.Disclaimer');
        } else {
            return view('home');
        }


    }
}
