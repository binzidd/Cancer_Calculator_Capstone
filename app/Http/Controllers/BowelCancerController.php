<?php

namespace Decision_Aid\Http\Controllers;

use Decision_Aid\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;

class BowelCancerController extends Controller
{
    function viewbowelcancer()
    {
        $default_array = [
            "crc_ms_parent" => 0,
            "crc_ms_halfsib" => 0,
            "crc_ms_parsib" => 0,
            "crc_ms_gpar" => 0,
            "crc_fs_parent" => 0,
            "crc_fs_halfsib" => 0,
            "crc_fs_parsib" => 0,
            "crc_fs_gpar" => 0,
            "crc_bs_sibling" => 0,
            "crc_bs_children" => 0,
            "crc_bs_nieneph" => 0
        ];

        $default_array = json_encode($default_array);

        return view('forms.BowelCancer')->with('default_array', $default_array);
    }

    function onpost_Default_Value(Request $request)
    {
        $inititalpostvalue = json_decode($request->get('default_values_set'), true);

        //Capture the post values
        $crc_ms_parent = $request->get('crc_ms_parent');
        $crc_ms_halfsib = $request->get('crc_ms_halfsib');
        $crc_ms_parsib = $request->get('crc_ms_parsib');
        $crc_ms_gpar = $request->get('crc_ms_gpar');
        $crc_fs_parent = $request->get('crc_fs_parent');
        $crc_fs_halfsib = $request->get('crc_fs_halfsib');
        $crc_fs_parsib = $request->get('crc_fs_parsib');
        $crc_fs_gpar = $request->get('crc_fs_gpar');
        $crc_bs_sibling = $request->get('crc_bs_sibling');
        $crc_bs_children = $request->get('crc_bs_children');
        $crc_bs_nieneph = $request->get('crc_bs_nieneph');

        //create a new post array for calculation
        $responsearray = [
            "crc_ms_parent" => $crc_ms_parent,
            "crc_ms_halfsib" => $crc_ms_halfsib,
            "crc_ms_parsib" => $crc_ms_parsib,
            "crc_ms_gpar" => $crc_ms_gpar,
            "crc_fs_parent" => $crc_fs_parent,
            "crc_fs_halfsib" => $crc_fs_halfsib,
            "crc_fs_parsib" => $crc_fs_parsib,
            "crc_fs_gpar" => $crc_fs_gpar,
            "crc_bs_sibling" => $crc_bs_sibling,
            "crc_bs_children" => $crc_bs_children,
            "crc_bs_nieneph" => $crc_bs_nieneph
        ];


        $arraycompare = array_diff_assoc($responsearray, $inititalpostvalue);


    }


//    public static function age(Request $request)
//    {
//        //date in mm/dd/yyyy format; or it can be in other formats as well
//        $birthDate = $request->input("dob");        //explode the date to get month, day and year
//        $birthDate = explode("-", $birthDate);
//        //get age from date or birthdate
//        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
//            ? ((date("Y") - $birthDate[2]) - 1)
//            : (date("Y") - $birthDate[2]));
//        return view('forms.inspection', $age);
//    }
}
