<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Laravel Blog</title>
 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Laravel Blog</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
 
            </ul>
          </div>
      </nav>
        <div class="container">
 
            @yield('content')
 
        </div>
 
    </body>
</html>
</h3>
After this, lets create our view for uploading and downloading file. I will name this <code>excel.bade.php</code> in <code>resources/views/</code>. After uploading our data from file to database, it will <code>display list of data inserted to database below form</code>.
<pre class="lang:php decode:true " >
@extends('layouts.default')
 
@section('content')
 
    <div class="container">
        <a href="{{ URL::to('download-excel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
        <a href="{{ URL::to('download-excel/xlsx') }}"><button class="btn btn-info">Download Excel xlsx</button></a>
        <a href="{{ URL::to('download-excel/csv') }}"><button class="btn btn-warning">Download CSV</button></a>
 
        <form method="post" action="{{ URL::to('import-export-excel') }}" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;"  class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="import_file" />
            <br>
            <button class="btn btn-primary">Import File</button>
        </form>
        <br>
        @if(session()->has('arr'))
            <table class="table table-striped table-hover table-reflow">
            <?php $arr = session('arr'); ?>
            @foreach($arr as $key => $value)
                <tr>
                    <th ><strong> {{ $value['country_code'] }}: </strong></th>
                    <td>{{ $value['country'] }} <td>
                </tr>
            @endforeach
            </table>
        @endif
    </div>
 
@endsection



 {{--  <div class="container">
       
 
        <form method="post" action="{{ URL::to('imports/excel') }}" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;"  class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="import_file" />
            <br>
            <button class="btn btn-primary">Subir Archivo</button>
        </form>
        <br>
        @if(session()->has('arr'))
            <table class="table table-striped table-hover table-reflow">
            <?php $arr = session('arr'); ?>
            @foreach($arr as $key => $value)
                <tr>
                    <th ><strong> {{ $value['user_id'] }}: </strong></th>
                    <td>{{ $value['cod'] }} <td>
                    <td>{{ $value['day'] }} <td>
                    <td>{{ $value['month'] }} <td>
                    <td>{{ $value['year'] }} <td>
                    <td>{{ $value['productive_day'] }} <td>
                    <td>{{ $value['special_productive'] }} <td>
                </tr>
            @endforeach
            </table>
        @endif
    </div> --}}