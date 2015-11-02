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
