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
Route::group(['middleware' => ['web']], function() {
  Route::resource('blog','crudcontroller');
  Route::post ( '/editItem', 'crudcontroller@editItem' );
  Route::post ( '/addItem', 'crudcontroller@addItem' );
  Route::post ( '/deleteItem', 'crudcontroller@deleteItem' );
});
Route::group(array('prefix'=>'api'),function(){
	Route::resource('crud','crudcontroller',array('except'=>array('create','edit')));
});
