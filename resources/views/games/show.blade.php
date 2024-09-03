@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $game->title }}</h1>
        <p><strong>Precio:</strong> {{ $game->price }}</p>
        <p><strong>Género:</strong> {{ $game->genre }}</p>
        <p><strong>Número de Jugadores:</strong> {{ $game->players }}</p>
        <p><strong>Descripción:</strong> {{ $game->description }}</p>
        <!-- Agrega aquí cualquier otra información que desees mostrar -->
    </div>
@endsection
