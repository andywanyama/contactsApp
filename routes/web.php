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

Route::get('/', 'ContactController@index')->name('home');
Route::resource('contacts', 'ContactController');
Route::resource('contact-groups', 'ContactGroupController');
Route::get('contacts/sendmail/{email}', 'ContactController@sendmail')->name('sendmailview');
Route::post('contacts/sendmail', 'ContactController@postmail')->name('sendmail');
