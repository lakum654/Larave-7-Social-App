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

 
Route::get('/', function(){
	return view('login');
});
Route::get('register',function(){

	return view('register');
});
Route::any('submitData','HelloController@submitData');

Route::any('login','HelloController@login');

Route::get('logout','HelloController@destroy');

Route::get('home','MainController@home');

Route::any('send-password',function(){
	return view('send-password');
});

Route::any('sendPassword','MailController@sendPassword');
Route::any('mail',function(){
	return view('mail');
});

Route::get('profile',"MainController@userProfile");

Route::get('edit/{id}','MainController@viewEdited');

Route::get('profile/{id}','MainController@profile');

Route::any('update','MainController@update');

Route::any('addPost','MainController@addPost');

Route::any('peoples','MainController@following');

Route::any('addfollowing/{id}','MainController@addfollowing');

