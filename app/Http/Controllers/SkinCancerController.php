<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class SkinCancerController extends Controller
{
    function viewskincancer(){
        return view('forms.SkinCancer');
    }
}
