<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class BowelCancerController extends Controller
{
    function viewbowelcancer()
    {
        return view('forms.BowelCancer');
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
