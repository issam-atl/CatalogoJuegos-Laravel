@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mi Perfil</h1>
        <div class="col-md-4 mb-4 card text-center card-body">
            <img src="{{ auth()->user()->avatar ? asset('img/' . auth()->user()->avatar) : asset('img/OIP.jpg') }}"
                class="card-img-top mx-auto d-block" alt="Avatar" style="max-width:200px; height: auto;">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ auth()->user()->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Correo Electrónico: {{ auth()->user()->email }}</h6>
            </div>
        </div>
    </div>
@endsection
