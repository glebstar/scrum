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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('register', 'HomeController@register');
Route::post('saveProject','HomeController@saveProject');
//Route::get('board/projectID/{projectID}/userID/{userID}','HomeController@display_board');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'proj'], function(){
	Route::get('board/{id}','HomeController@display_board');
	Route::post('addcard','HomeController@addCard');
	Route::post('changecolumn','HomeController@changeColumn');
	Route::post('changemembers','HomeController@changeMembers');
	Route::post('changedue','HomeController@changeDue');
});
