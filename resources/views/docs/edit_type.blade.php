@extends('layouts.applog')

@section('content')
<div class="container mt-5">
    <h1>Editar tipo de documento</h1>
    <br>
    <form action="{{route('update_type',$tipo->id)}}" method="post">
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
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

@endsection