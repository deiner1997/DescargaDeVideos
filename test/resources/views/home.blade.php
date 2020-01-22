@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Página Principal</div>
                <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Tu lista de descargas</h4>
<div class="col-md-8 col-md-offset-4">
<p>Crear una descarga nueva :
        <a class="btn btn-primary"  href="{{ url('/descarga') }}">+</a>
  </p>
   </div>
  <hr>
  <p class="mb-0">Lista</p>
  @foreach ($descargas as $d)
  <table class="table">
  <thead>
    <tr>

      <th scope="col">#</th>
      <th scope="col">Usuario ID</th>
      <th scope="col">Descripción</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
@for ($i=0; $i < count($d); $i++)
    <tr>
      <th scope="row"> {{ $d[$i]->id }} </th>
      <td> {{ $d[$i]->usuario_id }} </td>
      <td> {{ $d[$i]->descripcion }} </td>
      <td> {{ $d[$i]->estado }} </td>
    </tr>
    @endfor
  </tbody>
  @endforeach
</table>
</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
