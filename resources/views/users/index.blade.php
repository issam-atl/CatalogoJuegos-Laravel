@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card d-flex align-items-center">
                        <img src="{{ $user->avatar ? asset('img/' . $user->avatar) : asset('img/OIP.jpg') }}"
                            class="card-img-top" alt="Avatar" style="max-width: 200px; height: auto;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            @auth
                                <a href="{{ route('send.message') }}" class="btn btn-primary">Chat</a>
                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
