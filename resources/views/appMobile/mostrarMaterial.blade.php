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
                            <a href = "{{ route('temas.show', $material->id) }}"class="btn btn-info" >Temas</a>
                            <a href = "{{ route('videos.show', $material->id) }}" class="btn btn-secondary" >Videos</a>
                            <a  href="{{ route('materiales.edit', $material->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('materiales.destroy', $material->id)}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit" hidden>Delete</button>
                            </form>
                        </td>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                </td>
                </tr>
                @endforeach
                <a class="btn btn-success" href="{{ route('materiales.create')}}"> Crear Nuevo Material</a>
                </tbody>
            </table>
@endsection