<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::resource('categories','CategoriesController');
Route::resource('cars','CarController');
Route::resource('clcar','ClientCarsController');
Route::resource('reserved-cars','ReservedCarsController');
Route::resource('bookcars','BookCarController');
Route::resource('/','HomeCarsController');
Route::resource('carsinfo','ReservedInfoController');
Route::resource('invoice','InvoiceController');
Route::resource('invoiceinfo', 'InvocieInfoController');
Route::resource('users', 'UserController');
Route::get('contact-form', 'ContactController@create');
Route::post('contact-form', 'ContactController@store');
Route::resource('contact', 'ContactVController');
Route::resource('users', 'Contact');
Route::resource('authors', 'AuthorController');
