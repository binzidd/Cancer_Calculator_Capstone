<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Decision_Aid\Http\Controllers\GeneralCancerController;
use Decision_Aid\Http\Controllers\SkinCancerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{


    public function getValuesGeneralCancer()
    {
        $value = session()->get('Generalcancer');
        return ($value);
    }

    public function getvalueCancer(Request $request)
    {
        $userId = Auth::user()->id;
        $skincancer_value = DB::table('skin_cancers')->where('user_id', Auth::User()->id)->value('skin_cancer_score');

        if ($skincancer_value == 0 || $skincancer_value == 1) {
            $option = "In General skin cnacer is not common";

        } else if ($skincancer_value <= 2 || $skincancer_value <= 3) {
            $option = 'You are at average risk of skin cancer and need to be careful in sun ';
        } else if ($skincancer_value >= 4) {
            $option = 'You are at above average risk of skin cancer and need to be careful in sun ';
        }

        $generalcancer = self::getValuesGeneralCancer();

        return view('forms.Inspection')->with(['Skin_Cancer_Results' => $option, 'GeneralCancer' => $generalcancer]);
    }


}
