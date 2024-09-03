@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chat</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Enviar Mensaje</h2>
                <form action="{{ route('send.message') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">Seleccionar Usuario:</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <option value="todos">todos</option>
                            @endif

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Notificaciones</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr>
                                <td>{{ $notification->sender->name }}</td>
                                <td>{{ $notification->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
