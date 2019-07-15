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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// show login
Route::get('user/login', ['as' => 'user.login','uses' => 'UserController@showLogin']);

// do login
Route::post('user/login', array('uses' => 'UserController@doLogin'));

// create user
Route::get('user/create', ['as' => 'user.create','uses' => 'UserController@create']);

// store user
Route::post('user/store', ['as' => 'user.store','uses' => 'UserController@store']);


// create contact
Route::get('contact/create', ['as' => 'contact.create','uses' => 'ContactsController@create']);

// store contact
Route::post('contact/store', ['as' => 'contact.store','uses' => 'ContactsController@store']);

// list contacts
Route::get('contacts', ['as' => 'contacts','uses' => 'ContactsController@index']);

// edit contact
Route::get('contact/edit/{id}', ['as' => 'contact.edit','uses' => 'ContactsController@edit']);

// update contact
Route::PATCH('contact/update/{id}', ['as' => 'contact.update','uses' => 'ContactsController@update']);

// delete contact
Route::get('contact/delete/{id}', ['as' => 'contact.delete','uses' => 'ContactsController@destroy']);

// search contact
Route::get('contact/search}', ['as' => 'contact.search','uses' => 'ContactsController@search']);

