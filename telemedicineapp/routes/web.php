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
    return view('Auth.login');
});

Route::get('/myfile', function () {
    return view('admin.pages.myfile');
})->name('myfile');

Route::get('/chat', function () {
    return view('admin.pages.chat');
})->name('chat');


Route::get('/video-call', function () {
    return view('admin.pages.video-call');
})->name('video-call');

Route::get('/myaccount', function () {
    return view('admin.pages.myaccount');
})->name('myaccount');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
