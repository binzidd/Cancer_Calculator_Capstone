<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class BowelCancerController extends Controller
{
    function viewskincancer()
    {
        return view('forms.BowelCancer');
    }
}
