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

Route::get('/', function() {
    return view('pages.home');
});

Route::get('/resources', function() {
    return view('pages.learn');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::get('/history', function() {
    return view('pages.history');
});

Route::get('/calculate', function() {
    return view('pages.calculate');
});

Route::get('/calculate/multiplication', function() {
    return view('pages.multiply');
});
Route::get('/calculate/square', function() {
    return view('pages.square');
});
Route::get('/calculate/cube', function() {
    return view('pages.cube');
});

Route::get('/calculate/sqrt', function() {
    return view('pages.sqrt');
});

Route::get('calculate/cbrt', function() {
    return view('pages.cbrt');
});

Route::get('/calculate/division', function() {
    return view('pages.div');
});

Route::post('/calculate/multiplication', 'VedicController@multiplication');
Route::post('/calculate/square', 'VedicController@square');
Route::post('/calculate/cube', 'VedicController@cube');
Route::post('/calculate/sqrt', 'VedicController@sqrt');
Route::post('/calculate/cbrt', 'VedicController@cbrt');
Route::post('/calculate/division', 'VedicController@division');
Route::post('/contact', 'ContactController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
