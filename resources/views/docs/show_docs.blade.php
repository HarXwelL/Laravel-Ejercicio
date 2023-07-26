@extends('layouts.applog')

@section('content')
<h1>Tipo de documento: {{ $nom }}</h1>
<br>
<div class="d-flex justify-content-start">
    <a class="btn btn-primary" href="{{route('create_doc')}}">Crear documento</a>
</div>
<br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">FECHA</th>
        <th scope="col" class="col-2">TITULO</th>
        <th scope="col" class="col-2">DESCRIPCION</th>
        <th scope="col" class="col-2">ARCHIVO</th>
        <th scope="col" class="col-2">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($documents as $a)
        <tr>
            <th scope="row">{{$a->created_at}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->description}}</td>
            <td><a href="{{url($a->archive)}}">{{$a->archive}}</a></td>
            <td>
                <a class="btn btn-primary" href="{{route('docs.edit_doc',$a->id)}}">Editar</a>
                <form action="{{route('docs.delete_doc',$a)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-primary" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="mx-auto pb-10 w-4/5">
  {{ $documents->links('pagination::bootstrap-5') }}
</div>
@endsection