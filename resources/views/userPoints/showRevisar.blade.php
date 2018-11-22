{{--@extends('layouts.app')
@section('meta')
 <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js')}}"> </script> 

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script>
    
      $(document).ready(function() { 
    $('#userpoints').DataTable({
      "serverSide": true,
/*     "ajax":({
        url: "api/userPoints",
      }),*/
      "ajax":"{{ url('api/userPoints') }}",
      "columns": [
          {data:'cod'},
          {data:'day'},
          {data:'month'},
          {data:'year'},
          {data:'productive_day'},
          {data:'special_productive'},

      ]
  });
});  
</script> 
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Mi Producción 
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
<table id="userpoints" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <th>ID</th> 
    <th>Código</th>
    <th>Día</th>
    <th>Mes</th>
    <th>Año</th>
    <th>Producción</th>
    <th>Sin Producción</th>
  </tr>
</thead>

</table>



    </div>

</div>



{{$userPoint->user_id}}





 

@endsection 

@extends('layouts.app')

@section('meta')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js')}}"> </script> 

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
// Basic example
$(document).ready(function () {
  $('#tBasicExample').DataTable({
    "pagingType": "simple", // "simple" option for 'Previous' and 'Next' buttons only
      "serverSide": true,
      "ajax": "{{ url('api/userPoints') }}",
      "columns": [
          {data:'user_id'},
          {data:'cod'},
          {data:'day'},
          {data:'month'},
          {data:'year'},
          {data:'productive_day'},
          {data:'special_productive'},
      ]
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection

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
        <table id="tBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">User ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Código
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Día
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Mes
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Año
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Producción
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Sin Producción
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>hola</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>

  </tbody> 
</table>

@foreach($userPoint as $userp)
{{$userPoint->user_id}}
@endforeach
</div> 
</div> 

@endsection--}} 