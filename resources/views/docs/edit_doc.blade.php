@extends('layouts.applog')

@section('content')
<div class="container mt-5">
    <h1>Editar documento</h1>
    <br>
    <form action="{{route('update_doc',$tipo->id)}}" method="post">
        @csrf
        @method('put');

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control"  value="{{old('name', $tipo->name)}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <input type="text" class="form-control"  value="{{old('description', $tipo->description)}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">
            @error('description')
              <br>
              <small>*{{$message}}</small>
              <br>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Archivo</label>
            <input type="text" class="form-control"  value="{{old('archive', $tipo->archive)}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="archive">
            @error('archive')
              <br>
              <small>*{{$message}}</small>
              <br>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

@endsection