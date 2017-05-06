<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public static function postroute(Request $request)
    {
        return view('forms.GettingStarted');
    }

}
