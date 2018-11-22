<?php

namespace Catv\Http\Controllers;

use Catv\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class UserPointController extends Controller
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
     * @param  \Catv\UserPoint  $userPoint
     * @return \Illuminate\Http\Response
     */
    public function show($rut)
    {
        $userPoint = DB::table('user_points')->where('user_rut', $rut)->get();
        //echo($userPoint);
        //echo "-----------";
        //$arr2 = (string)$arr;
        //echo($arr2);
        //echo "-----------";
        //var_dump(sizeof($userPoint));
        //echo "-----------";
        //return 1;//var_dump($userPoint);
        if(sizeof($userPoint) > 0){
            $userPointLastMonth = DB::table('user_points')->where('user_rut', $rut)->where('month', $userPoint->last()->month)->where('year', $userPoint->last()->year)->get();
            $userData = DB::table('user_datas')->where('user_rut', $rut)->first();
            $userSumPoint = DB::table('user_points')->where('month', $userPoint->last()->month)->where('year', $userPoint->last()->year)->where('user_rut', $userPoint->first()->user_rut)->sum('productive_day');
            $userPromPoint = (int)DB::table('user_points')->where('month', $userPoint->last()->month)->where('year', $userPoint->last()->year)->where('user_rut', $userPoint->first()->user_rut)->where('special_productive', NULL)->avg('productive_day');
            $userCountDay = DB::table('user_points')->where('month', $userPoint->last()->month)->where('year', $userPoint->last()->year)->where('user_rut', $userPoint->first()->user_rut)->where('special_productive', NULL)->count('productive_day');
        return view('userPoints.show', compact('userPointLastMonth','userSumPoint','userData','userPromPoint','userCountDay'));
        }else{
            return view('userPoints.showEmpty')->with('user_rut', $rut);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Catv\UserPoint  $userPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPoint $userPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Catv\UserPoint  $userPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPoint $userPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Catv\UserPoint  $userPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPoint $userPoint)
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
        return view('imports.userPoints');
    }


    /**
     * Post Excel file to save into database
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function userPointsImport(Request $request)
    {
        if($request->hasFile('userPoints')){
            $path = $request->file('userPoints')->getRealPath();
            $data = Excel::load($path)->get()->toArray();
            $headers = array_keys($data[0]);
            if(count($data) > 0){
                foreach ($data as $key => $value) {
                    for($i=2; $i<count($value)-2;$i++){
                        $arrDay[$i-2] = $value{$headers[$i]};
                    }
                    for($i=0;$i<count($arrDay);$i++){
                        if(is_float($value{$headers[$i+2]})){
                            $userPoint_list[$i] = [
                                'user_rut'              => $value{$headers[0]},
                                'cod'                   => $value{$headers[1]},
                                'day'                   => $headers[$i+2],
                                'month'                 => $value{$headers[count($arrDay)+2]},
                                'year'                  => $value{$headers[count($arrDay)+3]},
                                'productive_day'        => $value{$headers[$i+2]},
                                'special_productive'    => NULL,
                                'created_at'            => DB::raw('NOW()'),
                                'updated_at'            => DB::raw('NOW()'),
                                //'slug'                  => $value{$headers[35]},
                            ];
                        }else
                            $userPoint_list[$i] = [
                                'user_rut'              => $value{$headers[0]},
                                'cod'                   => $value{$headers[1]},
                                'day'                   => $headers[$i+2],
                                'month'                 => $value{$headers[count($arrDay)+2]},
                                'year'                  => $value{$headers[count($arrDay)+3]},
                                'productive_day'        => NULL,
                                'special_productive'    => $value{$headers[$i+2]},
                                'created_at'            => DB::raw('NOW()'),
                                'updated_at'            => DB::raw('NOW()'),
                                //'slug'                  => $value{$headers[35]},
                            ]; 
                    }
                    if( !empty($userPoint_list)){
                        $noEmpty = DB::table('user_points')->where('user_rut', $value{$headers[0]})->where('month',$value{$headers[count($arrDay)+2]})->where('year', $value{$headers[count($arrDay)+3]})->first();
                            if($noEmpty){
                                DB::table('user_points')->where('user_rut', $value{$headers[0]})->where('month',$value{$headers[count($arrDay)+2]})->where('year', $value{$headers[count($arrDay)+3]})->delete();
                                DB::table('user_points')->insert($userPoint_list);
                            }else{
                                DB::table('user_points')->insert($userPoint_list);
                            }

                        //DB::table('user_points')->insert($userPoint_list);
                        //return var_dump($noEmpty);
                   } 
                }
            }
        }if( !empty($userPoint_list)){
            Session::flash('success','Archivo cargado correctamente.');
        }else{
            Session::flash('warnning','Archivo no encontrado.');
        }
        //return var_dump($userPoint_list);
        return back();
    }
}
