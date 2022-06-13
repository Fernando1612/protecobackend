@extends('layouts.becarios')

@section('content')
<style>

{{-- For action buttons colors go to public>css>bootstrap.css --}}

.table-container{
margin: 4%;
}

table {
width: 100%;

table-layout: fixed;
}

td {
width:100%;
border:1px solid black;
text-align: center;
vertical-align: middle;
}

.container {
max-width: 450px;
}

.push-top {
margin-top: 50px;
}

{{-- Color de fondo de los titlos TH de la tabla  Hacerlos transparente--}}
.table-warning{
--bs-table-bg: white ;
}

{{-- Btn Crear Nuevo Material --}}
.btn-success{
margin: 1%;
}

{{-- Alineando botones de Action --}}
.btn-info, .btn-secondary, .btn-primary{
margin-top: 1%;
margin-bottom: 1%;
margin-left: auto;
margin-right: auto;
display: inline-block;
width: 80%;
max-width: 80px;
}


</style>
<div class="table-container">
  <table class="table table-striped">
    <thead>
      <tr class="table-warning">
        <td>Titulo</td>
        <td>Link de la imagen</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($materiales as $material)
      <!-- Post preview-->
      <div class="post-preview">
        <tr>
          <td>{{ $material->title }}</td>
          <td><a href="{{ $material->url }}"> Link de la imagen</a></td>
          <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
          <td class="text-center">
            <a href="{{ route('temas.show', $material->id) }}" class="btn btn-info">Temas</a>
            <a href="{{ route('videos.show', $material->id) }}" class="btn btn-secondary">Videos</a>
            <a href="{{ route('materiales.edit', $material->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('materiales.destroy', $material->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit" hidden>Delete</button>
            </form>
          </td>
      </div>
      <!-- Divider-->
      <!-- <hr class="my-4" />
      </td> ERA LO QUE ORIGINABA LAS LINEAS LOCAS -->
        </tr>
      @endforeach
      <!-- Divider-->
      <!-- <hr class="my-4" />
      </td>  -->
      <a class="btn btn-success" href="{{ route('materiales.create')}}"> Crear Nuevo Material</a>
    </tbody>
  </table>
</div>
@endsection