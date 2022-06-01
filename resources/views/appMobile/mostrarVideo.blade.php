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
                        <td>Código del video</td>
                        <td class="text-center">Action</td>
                      </tr>
                  </thead>
            <tbody>
            @foreach ($videos as $video)
                <!-- Post preview-->
                <div class="post-preview">
                      <tr>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->code  }}</td>
                        <td class="text-center">
                            <a  href="{{ route('videos.edit', $video->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('videos.destroy', $video->id)}}" method="post" style="display: inline-block">
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
                <a class="btn btn-success" href="{{ route('videos.create', $id)}}"> Crear Nuevo Video</a>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Regresar</a>
@endsection