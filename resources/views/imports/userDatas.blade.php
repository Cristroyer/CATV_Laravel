@extends('layouts.app')
 
@section('content')
 <div class="card">
    <div class="card-header">
        Subir Excel de Datos de Usuarios: <br>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
       
        <div>
         {!! Form::open(array('route' => 'userDatas.import', 'method' => 'POST', 'files' => 'true')) !!}
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10">
                    @if (Session::has('success'))
                        <div class="alert alert-success">Archivo cargado correctamente{{-- Session::get('message') --}}</div>
                    @elseif (Session::has('warnning'))
                        <div class="alert alert-warning">No se selecciono ningun archivo{{-- Session::get('message') --}}</div>
                    @endif
                        <div class="form-group">
                            {!! Form::label('sample_file', 'Selecciona archivo:', ['class'=>'col-md-3']) !!}
                            <div class="col-md-9">
                            {!! Form::file('userDatas', array('class' => 'form-control')) !!}
                            {!! $errors->first('userDatas', '<p class="alert alert-danger"> :message</p>') !!}
                            </div>
                        </div>
                </div>
                <div class="col-xs2 col-sm-2 col-md-2 text-center">
                {!! Form::submit('Cargar', ['class'=>'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}{{-- 
         <a href="{{ URL::to('download-excel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
        <a href="{{ URL::to('download-excel/xlsx') }}"><button class="btn btn-info">Descargar Excel xlsx</button></a>
        <a href="{{ URL::to('download-excel/csv') }}"><button class="btn btn-warning">Descargar CSV</button></a> --}}
        </div>
       
@endsection