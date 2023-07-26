@extends('layouts.applog')

@section('content')
<div class="container mt-5">
    <h1>Crear nuevo documento</h1>
    <br>
    <form action="{{route('docs.store_doc')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control"  value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <input type="text" class="form-control"  value="{{old('description')}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">
            @error('description')
              <br>
              <small>*{{$message}}</small>
              <br>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Archivo</label>
            <input type="text" class="form-control"  value="{{old('archive')}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="archive">
            @error('archive')
              <br>
              <small>*{{$message}}</small>
              <br>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo</label>
            <select class="form-select" aria-label="Default select example" name="type">
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              </select>
            @error('type')
              <br>
              <small>*{{$message}}</small>
              <br>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>

@endsection