<?php

namespace Catv\Http\Controllers;

use Catv\UserPoint;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * get view file
     * @return [type] [description]
     */
    public function getExcel()
    {
        return view('imports.excel');
    }
 
    /**
     * Post Excel file to save into database
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postExcel(Request $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path)->get();
 
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                                'user_id'      			=> $value->IdUser,
                                'cod' 		   			=> $value->Codigo,
                                'day' 		   			=> $value->Dia,
                                'month' 	   			=> $value->Mes,
                                'year' 		   			=> $value->Año,
                                'productive_day' 		=> $value->CantidadProduccion,
                                'special_productive' 	=> $value->ProduccionEspecial
                            ];
                }
 
                if( ! empty($arr)){
                    DB::table('user_points')->insert($arr);
                    Session::flash('success','Archivo cargado correctamente.');
                }
            }
        }else{
        	Session::flash('warning','Archivo no encontrado.');
        }
 
        return back()->with(['arr' => $arr]);
    }
 
    public function downloadExcel($type)
    {
        $data = UserPoint::get()->toArray();
 
        return Excel::create('puntos', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
