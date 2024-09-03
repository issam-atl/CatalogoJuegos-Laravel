@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Enviar Mensaje a Todos los Usuarios</h1>
        <form action="{{ route('novedad') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
    </div>
@endsection
