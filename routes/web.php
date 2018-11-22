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


//Routes

Route::middleware(['auth'])->group(function() {
	//Permisos especiales



	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
			->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
			->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
			->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
			->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
			->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
			->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
			->middleware('permission:roles.edit');

	//UserDatas
	Route::post('userDatas/store', 'UserDataController@store')->name('userDatas.store')
			->middleware('permission:userDatas.create');

	Route::get('userDatas', 'UserDataController@index')->name('userDatas.index')
			->middleware('permission:userDatas.index');

	Route::get('userDatas/create', 'UserDataController@create')->name('userDatas.create')
			->middleware('permission:userDatas.create');

	Route::put('userDatas/{role}', 'UserDataController@update')->name('userDatas.update')
			->middleware('permission:userDatas.edit');

	Route::post('userDatas/{role}', 'UserDataController@update_avatar')->name('userDatas.update_avatar')
			->middleware('permission:userDatas.edit');

	Route::get('userDatas/{role}', 'UserDataController@show')->name('userDatas.show')
			->middleware('permission:userDatas.show');

	Route::delete('userDatas/{role}', 'UserDataController@destroy')->name('userDatas.destroy')
			->middleware('permission:userDatas.destroy');

	Route::get('userDatas/{role}/edit', 'UserDataController@edit')->name('userDatas.edit')
			->middleware('permission:userDatas.edit');

	Route::get('/userDatasImport', 'UserDataController@list')->name('excel.userDatas')
			->middleware('permission:excel.userDatas');
			
	//UserPoints
	Route::post('userPoints/store', 'UserPointController@store')->name('userPoints.store')
			->middleware('permission:userPoints.create');

	Route::get('userPoints', 'UserPointController@index')->name('userPoints.index')
			->middleware('permission:userPoints.index');

	Route::get('userPoints/create', 'UserPointController@create')->name('userPoints.create')
			->middleware('permission:userPoints.create');

	Route::put('userPoints/{role}', 'UserPointController@update')->name('userPoints.update')
			->middleware('permission:userPoints.edit');

	Route::get('userPoints/{role}', 'UserPointController@show')->name('userPoints.show')
			->middleware('permission:userPoints.show');

	Route::delete('userPoints/{role}', 'UserPointController@destroy')->name('userPoints.destroy')
			->middleware('permission:userPoints.destroy');

	Route::get('userPoints/{role}/edit', 'UserPointController@edit')->name('userPoints.edit')
			->middleware('permission:userPoints.edit');

	Route::get('/userPointsImport', 'UserPointController@list')->name('excel.userPoints')
			->middleware('permission:excel.userPoints');
			
	//Users
	Route::post('users/store', 'UserController@store')->name('users.store')
			->middleware('permission:users.create');

	Route::get('users/Actives', 'UserController@index')->name('users.index')
			->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
			->middleware('permission:users.create');

	Route::put('users/{role}', 'UserController@update')->name('users.update')
			->middleware('permission:users.edit');

	Route::get('users/{role}', 'UserController@show')->name('users.show')
			->middleware('permission:users.show');

	Route::get('users/{role}', 'UserController@desvincular')->name('users.desvincular')
			->middleware('permission:users.destroy');

	Route::get('users/Inactives', 'UserController@usersInactives')->name('users.usersInactives')->middleware('permission:users.destroy');

	Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
			->middleware('permission:users.edit');

	Route::get('/usersImport', 'UserController@list')->name('excel.users')
			->middleware('permission:excel.users');
});

//Importaciones
Route::post('userPoint-import', 'UserPointController@userPointsImport')->name('userPoints.import');
Route::post('userData-import', 'UserDataController@userDatasImport')->name('userDatas.import');
Route::post('user-import', 'UserController@usersImport')->name('users.import');

Route::get('userPoint-export/{type}', 'UserPointController@userPointsExport')->name('userPoint.export');



