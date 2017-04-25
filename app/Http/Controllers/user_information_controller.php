<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;
use Decision_Aid\user_information;
use Decision_Aid\User;
use Illuminate\Database\Eloquent\Model;

class user_information_controller extends Controller
{
    public function postwelcome(Request $request)
    {
        $dob=$request['dob'];
        $gender=$request['gender'];
        $height=$request['height'];
        $weight=$request['weight'];

        $user_information= new user_information;
        $user_information->dob=$dob;
        $user_information->gender=$gender;
        $user_information->height=$height;
        $user_information->weight=$weight;

        $user_information->save();

       // $request->user()->user_informations()->save($user_information);  //many isto one


        return view('forms.FormIntroduction');
    }

    public function redirecttoform()
    {
        return view('forms.FormIntroduction');
    }
}
