<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'title' => 'Nombre del juego',
            'price' => 59.99,
            'genre' => 'Género del juego',
            'players' => 1,
            'description' => 'Descripción del juego...',
            'cover_image' => 'ruta/a/la/imagen.jpg',
        ]);

        // Agrega más registros según sea necesario
    }
}
