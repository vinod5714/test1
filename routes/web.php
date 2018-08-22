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





Route::group(['middleware'=>'admin'],function()
{	
	Route::get('userdel/{id}','Usercontroller@destroy');
	Route::get('userstat/{id}','Usercontroller@userstatus');
	Route::get('docdel/{id}','Usercontroller@documentdelete');
	Route::get('propertydel/{id}','Usercontroller@propertydelete');
	Route::get('assigndelete/{id}','Usercontroller@assigndelete');
	
	Route::post('downloads','Usercontroller@downloads');
	Route::post('properties','Usercontroller@properties');
	Route::post('propertyassign/{id}','Usercontroller@propertyassign');
	

	
	Route::get('propertyassign/{id}', function ($id) {
      return view('propertyassign',['id'=>$id]);
       });
	
	
});



Route::group(['middleware'=>'auth'],function()
{	



	Route::get('downloads',function()
	{
		return view('downloads');
	});
	
	
	Route::get('properties',function()
	{
		return view('properties');
	});
	
	

	
	Route::get('myproperties',function()
	{
		return view('myproperties');
	});
	








});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
