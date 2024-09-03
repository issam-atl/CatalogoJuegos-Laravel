<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use App\Models\Biblioteca;

class LibraryController extends Controller
{
    public function index()
    {
        $biblioteca = Biblioteca::where('user_id', auth()->id())->get();

        return view('library.index', compact('biblioteca'));
    }


    public function addToLibrary(Game $game)
    {
        // Verifica si el usuario ya tiene el juego en su biblioteca
        $existsInLibrary = Biblioteca::where('user_id', auth()->id())->where('game_id', $game->id)->exists();

        if ($existsInLibrary) {
            return redirect()->route('games.index')->with('warning', 'El juego ya está en tu biblioteca.');
        }

        // Crea una nueva entrada en la biblioteca del usuario
        $biblioteca = new Biblioteca();
        $biblioteca->user_id = auth()->id();
        $biblioteca->game_id = $game->id;
        $biblioteca->save();

        return redirect()->route('games.index')->with('success', 'Juego añadido a tu biblioteca.');
    }

    public function destroy($id)
    {
        $juego = Biblioteca::findOrFail($id);
        $juego->delete();

        return redirect()->route('biblioteca')->with('success', 'Juego eliminado de la biblioteca');
    }
}

