@extends('layouts.becarios')

@section('content')
<style>
    table {
  width: 100%;
  table-layout: fixed;
}

td {
  width:65%;
  border:1px solid black;
}
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
                <table class="table">
                  <thead>
                      <tr class="table-warning">
                        <td>Titulo</td>
                        <td>Descripción</td>
                        <td>Link de la imagen</td>
                        <td>Link de la página oficial</td>
                        <td class="text-center">Action</td>
                      </tr>
                  </thead>
            <tbody>
            @foreach ($herramientas as $herramienta)
                <!-- Post preview-->
                <div class="post-preview">
                      <tr>
                        <td>{{ $herramienta->title }}</td>
                        <td>{{ $herramienta->description }}</td>
                        <td><a href="{{ $herramienta->image }}"> Link de la imagen</a></td>
                        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
                        <td><a href="{{ $herramienta->link }}"> Link de la página </a></td>
                        <td class="text-center">
                            <a  href="{{ route('herramientas.edit', $herramienta->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('herramientas.destroy', $herramienta->id)}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                </td>
                </tr>
                @endforeach
                <a class="btn btn-success" href="{{ route('herramientas.create')}}"> Crear Nueva Herrmienta</a>
                </tbody>
            </table>
@endsection