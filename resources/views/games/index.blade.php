@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Juegos</h1>
        @if (auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Crear Juego</a>
        @endif
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ $game->cover_image ? asset('img/' . $game->cover_image) : asset('img/OIP.jpg') }}"
                                class="card-img-top mx-auto d-block" alt="{{ $game->title }}"
                                style="max-width:200px; height: auto;">
                            <h5 class="card-title mt-3">{{ $game->title }}</h5>
                            <p class="card-text"><strong>Precio:</strong> {{ $game->price }}</p>
                            <p class="card-text"><strong>Género:</strong> {{ $game->genre }}</p>
                            <p class="card-text"><strong>Número de Jugadores:</strong> {{ $game->players }}</p>
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-primary">Comprar</a>
                            @endguest
                            @auth
                                <a href="{{ route('biblioteca.add', $game->id) }}" class="btn btn-primary">Comprar</a>
                            @endauth
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-secondary">Editar</a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
