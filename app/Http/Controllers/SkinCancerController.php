<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Decision_Aid\SkinCancer;
use Auth;

//$GLOBALS= integerValue('totalValues_skin');

class SkinCancerController extends Controller
{

    function viewskincancer()
    {
        return view('forms.SkinCancer');
    }

// public static method($params)
    function postsubmit(Request $request)
    {
        $value = SkinCancerController::computeskincancer($request);

        //TODO: Push the value into DB using this SCRIPT
        $user = Auth::user();   //user object

        $skin_option = $request['var_mf_skin_options'];
        $skin_body_option = $request['var_mf_skin_body_options'];
        $skin_body_moles_options = $request['var_mf_skin_body_moles_options'];
        $skin_body_cancer_options = $request['var_mf_skin_body_cancer_options'];

        $SkinCancer = new SkinCancer;
        $SkinCancer->skin_option = $skin_option;
        $SkinCancer->skin_body_option = $skin_body_option;
        $SkinCancer->skin_body_moles_options = $skin_body_moles_options;
        $SkinCancer->skin_body_cancer_options = $skin_body_cancer_options;
        $SkinCancer->skin_cancer_score = $value;
        $SkinCancer->user_id = $user->id;  // for user

        $SkinCancer->save();

        $errorMessage = "You have completed Skin Cancer Questions";

        return view('forms.Inspection', ['yourMessage' => $errorMessage]);
    }


    function computeskincancer(Request $request)
    {

        $inputData = $request->all();
        //   print_r($inputData);
        $totalValues_skin = $request->input('var_mf_skin_options') + $request->input('var_mf_skin_body_options') +
            $request->input('var_mf_skin_body_burnt_options') +
            $request->input('var_mf_skin_body_moles_options') +
            $request->input('var_mf_skin_body_cancer_options');
//    print_r($totalValues);
//    Conditions to check the level
        return $totalValues_skin;
    }

    //TODO:Check this display_result functioning

    function display_results(Request $request)
    {
        $totalValues_skin = $this->computeskincancer();
        if ($totalValues_skin == 0 || $totalValues_skin == 1) {
            $errorMessage = "In General skin cnacer is not common";

        } else if ($totalValues_skin <= 2 || $totalValues_skin <= 3) {
            $errorMessage = 'You are at average risk of skin cancer and need to be careful in sun ';
        } else if ($totalValues_skin >= 4) {
            $errorMessage = 'You are at above average risk of skin cancer and need to be careful in sun ';

        }

        return view('forms.Inspection', ['yourMessage' => $errorMessage]);
    }

}
