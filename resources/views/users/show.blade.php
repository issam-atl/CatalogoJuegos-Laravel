@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
        <!-- Agrega aquí cualquier otra información que desees mostrar -->
    </div>
@endsection
