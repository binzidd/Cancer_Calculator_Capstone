<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class GeneralCancerController extends Controller
{
    function viewgeneralcancer(){
        return view('forms.GeneralCancer');
    }
}
