@extends('layouts.becarios')

@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Editar & Actualizar
  </div>
  <div class="card-body">
     @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('talleres.update', $taller->id) }}">
          <div class="form-group" >
              @csrf
              @method('PUT')
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" value="{{ $taller->title }}"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" name="descripcion" value="{{ $taller->description }}"/>
          </div>
          <div class="form-group">
              <label for="fecha">Fecha</label>
              <input type="text" class="form-control" name="fecha" value="{{ $taller->date }}"/>
          </div>
          <div class="form-group">
              <label for="link">Link</label>
              <input type="text" class="form-control" name="link" value="{{ $taller->liga }}"/>
          </div>
          <button type="submit" class="btn btn-success">Actualizar Taller</button>
      </form>
      <a class="btn btn-primary" href="{{ route('talleres.index') }}"> Regresar</a>
  </div>
</div>
@endsection