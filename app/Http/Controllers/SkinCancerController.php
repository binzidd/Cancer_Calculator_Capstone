<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class SkinCancerController extends Controller
{
    function viewskincancer()
    {
        return view('forms.SkinCancer');
    }


    function computeskincancer(Request $request)
    {

     //TODO: Push the value into DB using this SCRIPT
//        $dob=$request['dob'];
//        $gender=$request['gender'];
//        $height=$request['height'];
//        $weight=$request['weight'];
//
//        $user_information= new user_information;
//        $user_information->dob=$dob;
//        $user_information->gender=$gender;
//        $user_information->height=$height;
//        $user_information->weight=$weight;
//
//        $user_information->save();

        $inputData = $request->all();
//    print_r($inputData);
        $totalValues_skin = $request->input('var_mf_skin_options') + $request->input('var_mf_skin_body_options') +
            $request->input('var_mf_skin_body_burnt_options') +
            $request->input('var_mf_skin_body_moles_options') +
            $request->input('var_mf_skin_body_cancer_options');
//    print_r($totalValues);
//    Conditions to check the level
        if ($totalValues_skin == 0 || $totalValues_skin == 1) {
            $errorMessage = "In General skin cnacer is not common";

        } else if ($totalValues_skin <= 2 || $totalValues_skin <= 3) {
            $errorMessage = 'You are at average risk of skin cancer and need to be careful in sun ';
        } else if ($totalValues_skin >= 4) {
            $errorMessage = 'You are at above average risk of skin cancer and need to be careful in sun ';

        }
//print_r($errorMessage);
//        die;
        return view('SkinCancerCalculator', ['yourMessage' => $errorMessage]);
    }

}
