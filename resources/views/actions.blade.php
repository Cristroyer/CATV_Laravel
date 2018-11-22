{{-- Pagina en desuso --}}





{{-- <a href="{{ route('userDatas.show', $id) }}" class="btn btn-sm btn-default"> Ver</a>

<a href="{{ route('users.edit', $id) }}" class="btn btn-sm btn-primary">  Editar</a>
{!! Form::open(['route' => ['users.destroy', $id],
        'method'=>'DELETE']) !!}
          <button class="btn btn-sm btn-danger">
            Eliminar
          </button>
        {!! Form::close() !!}

          @can('userDatas.show')
        <a href="{{ route('userDatas.show', $id) }}" class="btn btn-sm btn-default">
          Ver
        </a>
        @endcan

          @can('users.edit')
        <a href="{{ route('users.edit', $id) }}" class="btn btn-sm btn-primary">
          Editar
        </a>
        @endcan

          @can('users.destroy')
        {!! Form::open(['route' => ['users.destroy', $id],
        'method'=>'DELETE']) !!}
          <button class="btn btn-sm btn-danger">
            Eliminar
          </button>
        {!! Form::close() !!}
        @endcan --}}
