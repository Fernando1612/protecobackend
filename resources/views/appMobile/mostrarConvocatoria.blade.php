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
                        <td>Link de la convocatoria</td>
                        <td class="text-center">Action</td>
                      </tr>
                  </thead>
            <tbody>
            @foreach ($convocatorias as $convocatoria)
                <!-- Post preview-->
                <div class="post-preview">
                      <tr>
                        <td><a href="{{ $convocatoria->url_announcement }}"> Link convocatoria</a></td>
                        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
                        <td class="text-center">
                            <a  href="{{ route('convocatorias.edit', $convocatoria->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
@endsection