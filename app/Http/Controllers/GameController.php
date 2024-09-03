<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {

        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'genre' => 'required',
            'players' => 'required|integer',
            'description' => 'required',
        ]);

        Game::create($request->all());

        return redirect()->route('games.index')
            ->with('success', 'Juego creado correctamente.');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'genre' => 'required',
            'players' => 'required|integer',
            'description' => 'required',
        ]);

        $game->update($request->all());

        return redirect()->route('games.index')
            ->with('success', 'Juego actualizado correctamente.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')
            ->with('success', 'Juego eliminado correctamente.');
    }
}
