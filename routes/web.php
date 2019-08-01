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

Route::get('/',['as'=>'user_login','uses'=>'User\UserController@user_login']);
Route::get('user-register',['as'=>'user_register','uses'=>'User\UserController@signup']);
Route::post('user-register-submit',['as'=>'user_register_submit','uses'=>'User\UserController@signup_submit']);
Route::get('user-login',['as'=>'user_login','uses'=>'User\UserController@user_login']);
Route::post('user-login-submit',['as'=>'user_login_submit','uses'=>'User\UserController@login_submit']);
Route::get('user-logout',['as'=>'user_logout','uses'=>'User\UserController@user_logout']);
Route::get('user-dashboard',['as'=>'user_dashboard','uses'=>'User\UserController@user_dashboard']);


Route::get('add-customer',['as'=>'add_customer','uses'=>'User\CustomerController@add_customer']);
Route::post('save-customer',['as'=>'save_customer','uses'=>'User\CustomerController@save_customer']);


Route::get('activities/{customer_id}',['as'=>'activities','uses'=>'User\CustomerController@activities']);
Route::get('add-activities/{customer_id}',['as'=>'add_activities','uses'=>'User\CustomerController@add_activities']);
Route::post('save-activities/{customer_id}',['as'=>'save_activities','uses'=>'User\CustomerController@save_activities']);