/*      $(document).ready(function() {
    $('#users').DataTable({
      "serverSide": true,
      "ajax": "{{ url('api/users') }}",
      "columns": [
          {data:'name'},
          {data:'email'},
          @can('userDatas.show')
          {data:'btnPointAndUserDataShows'},
          @endcan
          @can('users.edit')
          @can('userDatas.edit')
          {data:'btnUserAndUserDataEdits'},
          @endcan
          @endcan
          @can('userDatas.edit')
          {data:'btnUsersDestroy'},
          @endcan
      ]
  });
});  */