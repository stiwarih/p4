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

Route::get('/rest-api',             'HomeController@restControl');
Route::get('/home',                 'HomeController@goHome');
Route::get('/',                     'HomeController@goHome');
Route::get('/lorem-ipsum',          'HomeController@goIpsumDef');
Route::post('/lorem-ipsum',         'HomeController@goIpsumPost');
Route::get('/user-generator',       'HomeController@goUserDef');
Route::post('/user-generator',      'HomeController@goUserPost');
Route::get('/password-generator',   'HomeController@goPassDef');
Route::post('/password-generator',  'HomeController@goPassPost');
//DATA BASE check - debug
Route::get('/debug',                'HomeController@debug');

//auth routes
# Show login form
Route::get('/login-test',           function()
{
    return View::make('login');
});
Route::get('/login',                'Auth\AuthController@getLogin');
# Process login form
Route::post('/login',               'Auth\AuthController@postLogin');
# Process logout
Route::get('/logout',               'Auth\AuthController@getLogout');
# Show registration form
Route::get('/register',             'Auth\AuthController@getRegister');
# Process registration form
Route::post('/register',            'Auth\AuthController@postRegister');


?>
