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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/t',function (){
   dd(app_path());
})->name('home');

Route::get('/oauth/github', 'Auth\LoginController@redirectToProvider')->name('github-login');
Route::get('/oauth/github/callback', 'Auth\LoginController@handleProviderCallback')->name('github-callback');

