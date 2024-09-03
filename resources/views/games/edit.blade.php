@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Juego</h1>
        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $game->title }}">
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $game->price }}">
            </div>
            <div class="form-group">
                <label for="genre">Género:</label>
                <input type="text" name="genre" id="genre" class="form-control" value="{{ $game->genre }}">
            </div>
            <div class="form-group">
                <label for="players">Número de Jugadores:</label>
                <input type="number" name="players" id="players" class="form-control" value="{{ $game->players }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $game->description }}</textarea>
            </div>
            <!-- Puedes agregar más campos aquí según sea necesario -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
