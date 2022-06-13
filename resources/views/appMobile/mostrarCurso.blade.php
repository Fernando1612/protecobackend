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
                        <td>Fecha</td>
                        <td>Link de imagen</td>
                        <td class="text-center">Action</td>
                      </tr>
                  </thead>
            <tbody>
            @foreach ($cursos as $curso)
                <!-- Post preview-->
                <div class="post-preview">
                      <tr>
                        <td>{{ $curso->title }}</td>
                        <td>{{ $curso->description }}</td>
                        <td>{{ $curso->date }}</td>
                        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
                        <td><a href="{{ $curso->link }}"> Link </a></td>
                        <td class="text-center">
                            <a  href="{{ route('cursosApp.edit', $curso->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('cursosApp.destroy', $curso->id)}}" method="post" style="display: inline-block">
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
                <a class="btn btn-success" href="{{ route('cursosApp.create')}}"> Crear Nuevo Cursos</a>
                </tbody>
            </table>
@endsection