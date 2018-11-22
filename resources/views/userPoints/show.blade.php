@extends('layouts.app')

@section('meta')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"> </script> 
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/tableindex.js') }}" defer></script>
{{-- <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script> 
<script>
    
</script> --}}


{{-- <script>
	tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</script> --}}

<script>
    
</script>

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Mis Puntos <br>
        @if($userData)
        {{ $userData->first_name }} {{ $userData->last_pat_name }}.
        @endif 
        Código: {{$userPointLastMonth->first()->cod}} 
        Rut: {{$userPointLastMonth->first()->user_rut}}
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered table-striped" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Mes</th>
                    <th>Año</th>
                    <th>Producción</th>
                    <th>Sin Producción</th>
                </tr>
            </thead>
            <tbody>
    	       @foreach($userPointLastMonth as $userp)
                <tr>
                    <td>{{$userp->day}}</td>
                    <td>{{$userp->month}}</td>
                    <td>{{$userp->year}}</td>
                    <td>
                        @if($userp->productive_day == 0)
                            <?php echo "-----"?>
                            @else
                                {{$userp->productive_day}}
                        @endif
                        
                            

                    </td>
                    <td>
                        @if($userp->special_productive == NULL)
                            <?php echo "-----"?>
                            @else
                                {{$userp->special_productive}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>Día</th>
                <th>Mes</th>
                <th>Año</th>
                <th>Sin Producción</th>
                <th>Producción</th>
{{--             <tr>
                <th colspan="5" style="text-align:right">Total:</th>
                <th></th>
            </tr> --}}
            </tfoot>
        </table>
        <div>
            <p>Total de puntos del mes: {{$userSumPoint}} </p>
            <br>
            <p>Promedio de puntos del mes: {{$userPromPoint}} </p>
            <br>
            <p>Días trabajados en el mes: {{$userCountDay}} </p>
            
        </div>
    </div> 
</div> 
@endsection


