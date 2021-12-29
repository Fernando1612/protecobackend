@extends('layouts.admin')

@section('content')
<main>
  <section class="container mt-5">
      <h1 class="text-rosa">Cursos</h1><br>
      <div class="d-flex justify-content-end">
        <a class="btn btn-rosa d-inline-block" href="{{route('cursos.create')}}">Crear curso</a>
      </div>
      <div class="row">
          <div class="col">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('cursos.index')}}">Intersemestrales</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('semestrales')}}">Semestrales</a>
                  </li>
              </ul>
          </div>
      </div>
  </section>
  <section class="home-cursos container my-5">
      <section class="container show-curso_lista">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Semestre</th>
                <th scope="col">Fecha</th>
                <th scope="col">No. Asistentes</th>
                <th scope="col">Publicado</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cursos as $curso)
              <tr>
                <th scope="row">{{$curso->id}}</th>
                <td>{{$curso->nombre}}</td>
                <td>{{$curso->semestre}}</td>
                <td>{{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} - {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }}</td>
                <td>{{$curso->inscritos}}</td>
                <td>
                  @if($curso->publicado == 1)
                    Sí
                  @else
                    No
                  @endif
                </td>
                <td>
                  <form method="POST" action="{{ route('cursos.destroy', $curso->id) }}" >
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('cursos.show', $curso->id) }}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                    <a href="{{ route('cursos.edit', $curso->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    <button type="submit" class="border-0"><span class="tag-category badge rounded-pill bg-dark ">Eliminar</span></a>
                  </form>
                  
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
      </section>
  </section>
</main>
@endsection