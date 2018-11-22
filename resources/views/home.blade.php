@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Avisos y Novedades
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        Proximamente! :D
    </div>
</div> 
@endsection
