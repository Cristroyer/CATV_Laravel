<?php

namespace Catv\Http\Controllers;

use Catv\User;
use Catv\UserData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = User::all();
        
        return view('users.index', compact('users'));*/
        return view('users.index');
        //return Datatables::of(User::query())->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersInactives()
    {
        //$users = User::all();
        
        //return view('users.index', compact('users'));
        return view('users.usersInactives');
        //return view('users.indexInactives');
        //return Datatables::of(User::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        return view('imports.users');//view('imports.excel');
    }


    /**
     * Post Excel file to save into database
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function usersImport(Request $request)
    {
        if($request->hasFile('users')){
            $path = $request->file('users')->getRealPath();
            $data = Excel::load($path)->get();
            //echo($data);
            if($data->count()){
                //echo($data->count());
                //return 1;
                foreach ($data as $key => $value) {
                    $users_list[] = [
                                'name'               => $value->nombre,
                                'email'              => $value->email,
                                'password'           => Hash::make($value->password),
                                'rut'                => $value->rut,
                                'created_at'         => DB::raw('NOW()'),
                                'updated_at'         => DB::raw('NOW()'),
                                'slug'               => $value->slug,
                            ];
                }
                if( !empty($users_list)){
                    DB::table('users')->insert($users_list);
                    //var_dump($users_list);
                    //return 1;
                    Session::flash('success','Archivo cargado correctamente.');
                }
            }
        }else{
            Session::flash('warnning','Archivo no encontrado.');
        }
        return back();//->with(['userPoint_list' => $userPoint_list]);
    }

    public function desvincular($id){
        DB::table('users')->where('id',$id)->update(['active'=>false]);
        return back();
    }
}
