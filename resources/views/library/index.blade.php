@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mi Biblioteca</h1>
        <div class="row">
            @foreach ($biblioteca as $juego)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="{{ $juego->game->cover_image ? asset('img/' . $juego->game->cover_image) : asset('img/OIP.jpg') }}"
                                class="card-img-top mx-auto d-block" alt="{{ $juego->game->title }}"
                                style="max-width:200px; height: auto;">
                            <h5 class="card-title">{{ $juego->game->title }}</h5>
                            <p class="card-text">Género: {{ $juego->game->genre }}</p>
                            <p class="card-text">Precio: {{ $juego->game->price }}</p>
                            <form action="{{ route('biblioteca.destroy', $juego->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
