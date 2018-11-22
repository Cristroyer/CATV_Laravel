@extends('layouts.app')
@section('meta')
{{-- <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

{{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
<script src="{{ asset('js/jquery.dataTables.min.js')}}"> </script> 

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
      $(document).ready(function() {
    $('#usersInactives').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "{{ url('api/usersInactives') }}",
      "columns": [
          {data:'id', name:'id'},
          {data:'name', name:'name'},
          {data:'email', name:'email'},
          {data:'rut', name:'rut'},
      ]
  });
});   
</script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        Usuarios Inactivos
        @can('users.create')
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right">
          Crear Usuario
        </a>
        @endcan
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
<table id="usersInactives" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Rut</th>
  </tr>
</thead>
{{--   <tbody>
      @foreach($users as $user)
  <tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>

  </tr>
  @endforeach
</tbody> --}}
</table>

    </div>

</div> 




@endsection