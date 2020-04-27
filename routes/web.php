<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('persons', 'Persons\PersonsController');
Route::post('/persons/search', 'Persons\PersonsController@search')->name('persons.search');