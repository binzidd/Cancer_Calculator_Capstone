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

//Post calls for capturing Values from forms.

Route::post('/home', [
    'uses'=>'user_information_controller@postwelcome',
    'as'=>'basicinfo'
]);

Route::post('/generalcancer', [
    'uses' => 'GeneralCancerController@postsubmit',
    'as' => 'general_cancer_calculator'
]);

Route::post('/skincancer', [
    'uses' => 'SkinCancerController@postsubmit',
    'as' => 'skin_cancer_calculator'
]);

// Get Calls for rendering pages.

Route::get('/formintro', [
    'uses'=>'user_information_controller@redirecttoform',
    'as'=>'form_landing'
]);

Route::get('/skincancer',[
    'uses'=>'SkinCancerController@viewskincancer',
    'as'=>'skin_cancer_renderer'
]);

Route::get('/bowelcancer',[
    'uses'=>'BowelCancerController@viewbowelcancer',
    'as'=>'bowel_cancer_renderer'
]);

Route::get('/generalcancer',[
    'uses'=>'GeneralCancerController@viewgeneralcancer',
    'as'=>'genrel_cancer_renderer'
]);



//          Responses




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