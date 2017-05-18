<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Decision_Aid\user_information;
use Decision_Aid\User;
use Illuminate\Database\Eloquent\Model;
use Auth;

class user_information_controller extends Controller
{

    public function postwelcome(Request $request)
    {

        $dob=$request['dob'];
        $gender=$request['gender'];
        $height=$request['height'];
        $weight=$request['weight'];
        $age = $this->age($request);

        $user_information= new user_information;
        $user_information->dob=$dob;
        $user_information->gender=$gender;
        $user_information->height=$height;
        $user_information->weight=$weight;
        $user_information->age = $age;
        $user_information->user_id = Auth::user()->id;

        $user_information->save();

        return view('forms.Disclaimer');
    }


    public static function age(Request $request)
    {
        $birthDate = $request->input("dob");
        $age = date_diff(date_create($birthDate), date_create('now'))->y;
        return $age;
    }

    public function redirecttoform()
    {
        return view('forms.FormIntroduction');
    }
}
