@extends('layouts.applog')

@section('content')
<div class="container mt-5">
    <h1>Crear nuevo tipo de documento</h1>
    <br>
    <form action="{{route('docs.store_type')}}" method="POST">
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
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>

@endsection