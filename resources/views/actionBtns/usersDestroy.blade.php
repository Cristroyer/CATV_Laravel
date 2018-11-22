{{-- {!! Form::open(['route' => ['users.destroy', $rut],
    'method'=>'DELETE']) !!}
    <button class="btn btn-sm btn-danger">
        Desvincular
    </button>
{!! Form::close() !!} --}}

<a href="{{ route('users.desvincular', $id) }}" class="btn btn-sm btn-primary"> Desvincular </a>