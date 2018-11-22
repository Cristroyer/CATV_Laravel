@extends('layouts.app')



@section('content')
<div class="card">
    <div class="card-header">
        Perfil
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>Actualmente no cuenta con datos en nuestros registros, favor solicitar evaluación o actualización de recursos humanos. </p>

                                @can('userPoints.show')

                                
                                    <a class="btn btn-primary" href="{{ route('userPoints.show', $user_rut)}}" title='Pregunta'>Ver mi producción</a> 
                                
                                
                                @endcan
       	</div>
       	</div>
@endsection