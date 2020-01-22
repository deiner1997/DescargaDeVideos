@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear una nueva descarga</div>

                <div class="panel-body">
         <form class="form-horizontal" method="POST" action="{{ url('/createDescarga') }}">
                        {{ csrf_field() }}
 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="link" class="col-md-4 control-label">Link del video:</label>

                            <div class="col-md-6">
                                 
 <input id="descripcion" type="text" class="form-control" name="descripcion" value="" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear descarga
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                    <h2>Instrucciones</h2>
<p align="left">1. Directamente pega el link del video que quieres descargar.
<br>
2. Click en el botón "Crear descarga" para iniciar el proceso.</p>
 <img src="{{ asset('Images/tip.jpg') }}" height="125" width="725"> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
