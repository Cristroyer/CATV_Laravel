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
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-6 col-lg-3">
                <div class="thumbnail text-center photo_view_postion_b" >
                    <img src="../uploads/avatar/{{$userData->avatar}}" class="img" >

                    @if (Session::has('success'))
                        <div class="alert alert-success">Archivo cargado correctamente{{-- Session::get('message') --}}</div>
                    @elseif (Session::has('warnning'))
                        <div class="alert alert-warning">No se selecciono ningun archivo{{-- Session::get('message') --}}</div>
                    @endif
                    @can('userDatas.edit')
                    <form enctype="multipart/form-data" action="{{ route('userDatas.update_avatar',  $userData->user_rut)}}" method="POST">
                        <label>Cambiar foto de perfil</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-primary" >
                    @endcan
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9">
                <div class="" style="border-bottom:1px solid black">
                    <h2>Datos Personales {{ $userData->first_name}} {{ $userData->last_pat_name}}</h2>
                </div>
                <hr>
                <div class="col-md-12">  
                    <ul class=" details">
                        <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Nombre: {{ $userData->first_name}} {{ $userData->middle_name}} {{ $userData->last_pat_name}} {{ $userData->last_mat_name}}</p></li>
                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Rut: {{$userData->user_rut}} </p></li>
                        <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Fecha de nacimiento: <?php $originalDate = $userData->born;
                        $newDate = date("d-m-Y", strtotime($originalDate));?>{{ $newDate}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Dirección: {{ $userData->address}} {{ $userData->city}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Región: {{ $userData->region}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Estado Civil: {{ $userData->civil_state}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Licencia de conducir: {{ $userData->lic}}</p></li>
                        @if( $userData->lic  <> 'No tiene')
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Fecha de expiración: <?php $originalDate = $userData->lic_exp;
                        $newDate = date("d-m-Y", strtotime($originalDate));?>{{ $newDate}}</p></li>
                        @endif
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Mail corporativo: <?php $user = DB::table('users')->where('rut', $userData->user_rut)->first(); ?>{{ $user->email }}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Mail particular: {{ $userData->particular_email}}</p></li>
                        @if($userData->phone_fij)
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Telefono fijo: {{ $userData->phone_fij}}</p></li>
                        @endif
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Telefono movil: {{ $userData->phone_movil}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Previsión de salud: {{ $userData->prev_sal}}</p></li>
                        <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Previsión de pensión: {{ $userData->prev_pen}}</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-group" style="border-bottom:1px solid black">
                        <h2>Datos Familiares</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-4">
                <div class="col-sm-6 col-xs-6 tital " >
                   Height(feet):
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                    Weight(lbs):
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                    Hair Color:
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                    Hair Length:
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                    Suit/Dress:
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-6 col-xs-6 tital " >
                    Shirt Size:
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                    Shoe Size:
                </div>
                <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                <div class="col-sm-6 col-xs-6 tital " >
                Bust:
            </div>
            <div class="col-sm-6 col-xs-6 contant_i">
            Prasad
        </div>
                <div class="col-sm-6 col-xs-6 tital " >
                Waist:
            </div>
            <div class="col-sm-6 col-xs-6 contant_i">
            Prasad
        </div>
                <div class="col-sm-6 col-xs-6 tital " >
                Inseam:
            </div>
            <div class="col-sm-6 col-xs-6 contant_i">
            Prasad
        </div>
            </div>
            <div class="col-md-4">
                        <div class="col-sm-6 col-xs-6 tital " >
                        Hips:
                    </div>
                    <div class="col-sm-6 col-xs-6 contant_i">
                    Prasad
                </div>
                        
                        <div class="col-sm-6 col-xs-6 tital " >
                            Glove:
                    </div>
                        <div class="col-sm-6 col-xs-6 contant_i">
                            Prasad
                    </div>
                        
                        <div class="col-sm-6 col-xs-6 tital " >
                            Hat:
                    </div>
                        <div class="col-sm-6 col-xs-6 contant_i">
                            Prasad
                    </div>
                        
                     </div>
                    </div>
                                        <div class="row">
                      <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-group" style="border-bottom:1px solid black">
                                <h2>Datos Profesionales</h2>
                            </div>  
                            
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-left">        
                @can('roles.edit')
                    <a href="{{ url('/users') }}" class="btn btn-primary">Atras</a>
                @endcan

                                @can('userPoints.show')
                                
                                    <a class="btn btn-primary" href="{{ route('userPoints.show', $userData->user_rut)}}" title='Pregunta'>Ver mi producción</a>
                                
                                @endcan
                    @can('userDatas.edit')
                    <a href="{{ url('/home') }}" class="btn btn-primary">Editar Datos</a>
                    @endcan
            </div>
</div>
</div>                 
                    
                    
                    
                    
                    
               


@endsection


