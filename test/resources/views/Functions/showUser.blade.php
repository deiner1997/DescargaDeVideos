@extends('layouts.app')

@section('content')
<div class="container">
 <h1 class="text-center">Tus datos</h1>
   <br />
   <br />
  <div class="row">
    <div class="col-sm-2">
    </div>
      <div class="col-sm-8">
        <table class="table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td><h4>{{$user->name}}</h4></td>
          <td><h4>{{$user->email}}</h4></td>
          <td><a class="btn btn-info" href="/EditarUsuario/{{$user->id}}">Editar</a></td>
          <td><a class="btn btn-danger" href="/EliminarUsuario/{{$user->id}}">Eliminar</a></td>
        </tr>
      </tbody>
    </table>
      </div>
      <div class="col-sm-2">
      </div>
  </div>
</div>
@endsection
