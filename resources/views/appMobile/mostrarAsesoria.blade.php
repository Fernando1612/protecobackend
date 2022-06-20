<!-- Vista principal asesorías -->
@extends('layouts.becarios')

@section('content')
<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <th scope="col">Link de las asesorías</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($asesorias as $asesoria)
      <!-- Post preview-->
      <tr>
        <td><a href="{{ $asesoria->url_consultancies }}"> Link asesorías</a></td>
        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
        <td class="text-center">
          <a href="{{ route('asesorias.edit', $asesoria->id)}}" class="btn btn-primary btn-sm">Editar</a>
        </td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection