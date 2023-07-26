@extends('layouts.applog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>ESTAS EN EL DASHBOARD!</h1>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-primary" href="{{route('type')}}">Inspeccionar tipos de documento</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<h1>Ultimos documentos</h1>
<br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">tipo de documento</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($documents as $a)
        <tr>
            <th scope="row">{{$a->id}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->description}}</td>
            <td>{{$a->type}}</td>
        </tr>
    @endforeach
        
    </tbody>
  </table>
  <div class="mx-auto pb-10 w-4/5">
    {{ $documents->links('pagination::bootstrap-5') }}
  </div>
@endsection
