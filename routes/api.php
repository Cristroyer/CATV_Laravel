<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('usersActives', function(){
	//return User::all();
	return datatables()
		->query(DB::table('users')->where('active',1))
		//->setRowClass(function($user) {	return $user->id % 2 == 0 ? 'alert-success' : 'alert-danger'; })
		//->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-danger" }}')
		->setRowId('{{ $id }}')
		->addColumn('btnPointAndUserDataShows', 'actionBtns\userDataShows')
		->addColumn('btnUserAndUserDataEdits', 'actionBtns\userAndUserDataEdits')
		->addColumn('btnUsersDestroy', 'actionBtns\usersDestroy')
		->rawColumns(['btnPointAndUserDataShows', 'btnUserAndUserDataEdits', 'btnUsersDestroy'])
		->toJson();

});

Route::get('usersInactives', function(){
	//return User::all();
	return datatables()
		->query(DB::table('users')->where('active',0))
		//->setRowClass(function($user) {	return $user->id % 2 == 0 ? 'alert-success' : 'alert-danger'; })
		//->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-danger" }}')
		->setRowId('{{ $id }}')
		/*->addColumn('btnPointAndUserDataShows', 'actionBtns\userDataShows')
		->addColumn('btnUserAndUserDataEdits', 'actionBtns\userAndUserDataEdits')
		->addColumn('btnUsersDestroy', 'actionBtns\usersDestroy')
		->rawColumns(['btnPointAndUserDataShows', 'btnUserAndUserDataEdits', 'btnUsersDestroy'])*/
		->toJson();

});

/*Route::get('userPoints', function(){

	return datatables()
		->eloquent(Catv\UserPoint::query())
		->toJson();


});*/

/*Route::get('userPoints/{user_id}', function(){
	//return User::all();
	return datatables()
		->query(DB::table('user_points')->where('user_id',$user_id))
		->toJson();
});

Route::get('userPoints/{user_id}', function(){
	//return User::all();
	return datatables()
		->eloquent(Catv\UserPoint::query())
		->toJson();

		
		

});*/