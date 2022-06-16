@extends('layouts.becarios')

@section('content')

<div class="container">
  <section class="container mt-5">
    <table class="table table-striped" aria-label>
      <thead>
        <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Descripción</th>
          <th scope="col">Fecha</th>
          <th scope="col">Link de imagen</th>
          <th scope="col">Acción</th>
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
              <div class="container-sm">
                <a href="{{ route('cursosApp.edit', $curso->id)}}" class="btn btn-primary btn-sm">Editar</a>
              </div>
              
              <br>
              <div class="container-sm">
                <form action="{{ route('cursosApp.destroy', $curso->id)}}" method="post" style="display: inline-block">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
                </form>
              </div>
            </td>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        </td>
        </tr>
        @endforeach
        <br>
        <div class="container-sm">
          <a class="btn btn-success" href="{{ route('cursosApp.create')}}"> Crear nuevo curso</a>
        </div>
      </tbody>
    </table>
  </section>
</div>
@endsection