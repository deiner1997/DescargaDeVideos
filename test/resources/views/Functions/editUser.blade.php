@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
      <form class="" action="/EditarUsuario/{{ $user->id }}"  method="post">
      {!! csrf_field() !!}
       <div class="form-group">
        <label for="exampleInputName">Nombre</label>
        <input type="text" value="{{$user->name}}" class="form-control" placeholder="Nombre" name="name">
      </div>
      <div class="form-group">
        <label for="examplePhone">Email</label>
        <input  type=text size="15" class="form-control" value="{{$user->email}}" placeholder="Email" name="email">
      </div>
      <button  type="submit" class="btn btn-info">
      Guardar
   </button>
    </form>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
      </div>
@endsection
