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
                        <td>Link del documento</td>
                        <td class="text-center">Action</td>
                      </tr>
                  </thead>
            <tbody>
            @foreach ($temas as $tema)
                <!-- Post preview-->
                <div class="post-preview">
                      <tr>
                        <td>{{ $tema->title }}</td>
                        <td><a href="{{ $tema->url_notes }}"> Link del documento</a></td>
                        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
                        <td class="text-center">
                            <a  href="{{ route('temas.edit', $tema->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('temas.destroy', $tema->id)}}" method="post" style="display: inline-block">
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
                <a class="btn btn-success" href="{{ route('temas.create', $tema->id_material)}}"> Crear Nuevo Tema</a>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Regresar</a>
@endsection