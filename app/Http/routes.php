<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomePageController@index']);

Route::post('plans/calc', ['as' => 'plans-calc', 'uses' => 'PlansController@calc']);
Route::get('plans', ['as' => 'plans', 'uses' => 'PlansController@index']);
Route::get('applicants', ['as' => 'applicants', 'uses' => 'ApplicantsController@index']);
Route::get('saveform', ['as' => 'saveform', 'uses' => 'SaveformController@index']);
Route::post('plans/view', ['as' => 'plans-view', 'uses' => 'PlansController@view']);
Route::post('saveform/view', ['as' => 'saveform-view', 'uses' => 'SaveformController@view']);
Route::post('applicants/view', ['as' => 'applicants-view', 'uses' => 'ApplicantsController@view']);
Route::get('applicants/submitApplicant', ['as' => 'applicants-submitApplicant', 'uses' => 'ApplicantsController@submitApplicant']);
Route::get('Signup', ['as' => 'Signup', 'uses' => 'SignupController@index']);
Route::get('Signup/stepone', ['as' => 'stepone', 'uses' => 'SignupController@stepone']);

