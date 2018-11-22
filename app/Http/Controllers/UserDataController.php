<?php

namespace Catv\Http\Controllers;

use Catv\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \Catv\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function show($rut)
    {
        $userData = DB::table('user_datas')->where('user_rut', $rut)->first();
        //echo count((array)$userData);
        //echo "-----------";
        //echo "-----------";
        //return var_dump($userData);
        if(count((array)$userData) > 0){
            return view('userDatas.show', compact('userData'));
        }else{
            return view('userDatas.showEmpty')->with('user_rut', $rut);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Catv\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function edit(UserData $userData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Catv\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserData $userData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Catv\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserData $userData)
    {
        //
    }

        //Load Archives
    
    /**
     * get view file
     * @return [type] [description]
     */
    public function list()
    {
        return view('imports.userDatas');
    }


    /**
     * Post Excel file to save into database
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function userDatasImport(Request $request)
    {
        if($request->hasFile('userDatas')){
            $path = $request->file('userDatas')->getRealPath();
            $data = Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $userData_list[] = [
                                'user_rut'                  => $value->rutuser,
                                'first_name'                => $value->primernombre,
                                'middle_name'               => $value->segundonombre,
                                'last_pat_name'             => $value->primerapellido,
                                'last_mat_name'             => $value->segundoapellido,
                                'born'                      => $value->fechanacimiento,
                                'region'                    => $value->region,
                                'city'                      => $value->ciudad,
                                'address'                   => $value->direccion,
                                'civil_state'               => $value->estadocivil,
                                'lic'                       => $value->licenciaconducir,
                                'lic_exp'                   => $value->licenciaexpira,
                                'particular_email'          => $value->mailparticular,
                                'phone_fij'                 => $value->telefonofijo,
                                'phone_movil'               => $value->telefonomovil,
                                'prev_sal'                  => $value->previsionsalud,
                                'prev_pen'                  => $value->previsionpension,
                                'created_at'                => DB::raw('NOW()'),
                                'updated_at'                => DB::raw('NOW()'),
                                'slug'                      => $value->slug,
                            ];
                }
                if( !empty($userData_list)){
                    DB::table('user_datas')->insert($userData_list);
                    Session::flash('success','Archivo cargado correctamente.');
                }
            }
        }else{
            Session::flash('warnning','Archivo no encontrado.');
        }
        return back();//->with(['userPoint_list' => $userPoint_list]);
    }

    public function update_avatar(Request $request, $rut){

        if ($request->hasFile('avatar')) {
            $userName = DB::table('user_datas')->where('user_rut', $rut)->first();
            $avatar = $request->file('avatar');
            $filename = $userName->first_name.$userName->last_pat_name.'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('uploads/avatar/'.$filename));
            DB::table('user_datas')->where('user_rut', $rut)->update(['avatar'=> $filename]);
            $userData = DB::table('user_datas')->where('user_rut', $rut)->first();
            Session::flash('success','Archivo cargado correctamente.');
        }else{
            Session::flash('warnning','Archivo no encontrado.');
            return back();
        }

        return view('userDatas.show', compact('userData'));

    }
}
