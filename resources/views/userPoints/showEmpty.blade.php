@extends('layouts.app')



@section('content')
<div class="card">
    <div class="card-header">
        Mis Puntos 
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h2>No hay puntos actualmente, solicite actualización con supervisor</h2>
       	</div>
       	</div>
@endsection