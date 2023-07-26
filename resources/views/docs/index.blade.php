@extends('layouts.applog')

@section('content')
<div class="d-flex justify-content-start">
    <a class="btn btn-primary" href="{{route('createtype')}}">Crear tipo de documento</a>
</div>
<br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col" class="col-6">Nombre</th>
        <th scope="col" class="col-2">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($types as $a)
        <tr>
            <th scope="row">{{$a->id}}</th>
            <td>{{$a->name}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('docs.edit_type',$a->id)}}">Editar</a>
                <form action="{{route('docs.delete_type',$a)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-primary" type="submit">Borrar</button>
                </form>
                <a class="btn btn-primary" href="{{route('document',$a->id)}}">documentos</a>
            </td>
        </tr>
    @endforeach
        
    </tbody>
  </table>

@endsection