@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
        <h3 class="mb-0">Nuevo médico</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('doctors')}}" class="btn btn-sm btn-danger">
            Cancelar y volver
        </a>
        </div>
    </div>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger" alert="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action="{{ url('/doctors') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Nombre del médico</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            </div> 
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
            </div> 
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" class="form-control" value="{{old('dni')}}">
            </div> 
            <div class="form-group">
                <label for="email">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
            </div> 
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
            </div> 
            <div class="form-group">
                <label for="phone">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{str_random(6)}}">
            </div> 
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection