<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Decision_Aid\user_information;
use Decision_Aid\User;
use Illuminate\Database\Eloquent;
use Decision_Aid\Role;
use Decision_Aid\Http\Controllers;
use Decision_Aid\SkinCancer;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*conditions here :
1. If the user is new, we go ahead and create his new details to be stored in DB (Getting Started)
2. Else, we pass him to the declaration phase. (Declaration) */



//Post calls for capturing Values from forms.

Route::post('/home', [
    'uses'=>'user_information_controller@postwelcome',
    'as'=>'basicinfo'
]);

//Route::post('/generalcancer', [
//    'uses' => 'GeneralCancerController@postsubmit',
//    'as' => 'general_cancer_calculator'
//]);

Route::post('/skincancer', [
    'uses' => 'SkinCancerController@postsubmit',
    'as' => 'skin_cancer_calculator'
]);

Route::post('/disclaimer', [
    'uses' => 'FormController@postroute',
    'as' => 'disclaimer_accepted'
]);

Route::post('/bowelcancer', [
    'uses' => 'BowelCancerController@onpost_Default_Value',
    'as' => 'bowel_onpost'
]);
// Get Calls for rendering pages.

Route::get('/disclaimer', function () {
    return view('forms.Disclaimer');
});

Route::get('/formintro', [
    'uses'=>'user_information_controller@redirecttoform',
    'as'=>'form_landing'
]);

Route::get('/skincancer',[
    'uses'=>'SkinCancerController@viewskincancer',
    'as'=>'skin_cancer_renderer'
]);

Route::get('/bowelcancer',[
    'uses' => 'BowelCancerController@getview',
    'as'=>'bowel_cancer_renderer'
]);

//step-1
Route::any('/generalcancer', [
    'uses'=>'GeneralCancerController@viewgeneralcancer',
    'as' => 'general_cancer_renderer'
]);

//          Post Calls for Calculations

// step-3
Route::get('/generalcancer1', [
    'uses' => 'GeneralCancerController@calculate_all_male_cancer',
    'as' => 'compute_cancer']);

//step-2
//Debugging Center
Route::post('/generalcancer2', [
    'uses' => 'GeneralCancerController@calculate_all_male_cancer',
    'as' => 'inspect'
]);


Route::get('/inspection', [
    'uses' => 'ResultsController@getvalueCancer',
    'as' => 'Results'
]);




//Route::get('/finddata',function (){
//
//  $value=user_information::find(1);
//
//  return $value->dob;
//
//});

//basic insert with eloquent

//Route::get('/insert',function (){
//
//    $newdata=new user_information;
//
//    //$newdata->id='2';
//    $newdata->dob='1991-03-30';
//    $newdata->gender='Male';
//    $newdata->height='182';
//    $newdata->weight='92';
//    $newdata->user_id='2';
//    $newdata->timestamps=time();
//
//    $newdata->save();
//
//});

//Laravel Relations

//Route::get('/user_information/{id}/user', function($id){
//
//   return user_information::find($id)->User;
//});

Route::resource('questions', 'FormController');    //resourceful controller is being invoked