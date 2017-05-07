<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Decision_Aid\user_information;

class FormController extends Controller
{
    public static function getroute()
    {

    }

    public static function postroute(Request $request)
    {
        $userId = Auth::User()->id;
        $userInfo = user_information::where('user_id', $userId)->first();
        if (!empty($userInfo->age)) {
            return view('forms.FormIntroduction');
        } else {
            return view('home');
        }
    }

}
