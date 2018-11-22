@extends('layouts.app')
 
@section('content')
 <div class="card">
    <div class="card-header">
        Subir Excel de Puntos de Usuario: <br>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
       
        <div>
         {!! Form::open(array('route' => 'userPoints.import', 'method' => 'POST', 'files' => 'true')) !!}
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
                            {!! Form::file('userPoints', array('class' => 'form-control')) !!}
                            {!! $errors->first('userPoints', '<p class="alert alert-danger"> :message</p>') !!}
                            </div>
                        </div>
                </div>
                <div class="col-xs2 col-sm-2 col-md-2 text-center">
                {!! Form::submit('Cargar', ['class'=>'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
       
@endsection