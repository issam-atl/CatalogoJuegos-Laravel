@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Juego</h1>
        <form action="{{ route('games.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="genre">Género:</label>
                <input type="text" name="genre" id="genre" class="form-control">
            </div>
            <div class="form-group">
                <label for="players">Número de Jugadores:</label>
                <input type="number" name="players" id="players" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">{{ __('cover_image') }}</label>
                <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror"
                    name="cover_image" accept="image/*">
            </div>
            <!-- Puedes agregar más campos aquí según sea necesario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
