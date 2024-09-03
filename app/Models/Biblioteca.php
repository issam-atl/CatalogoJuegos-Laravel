<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;

    protected $table = 'biblioteca';

    protected $fillable = [
        'user_id',
        'game_id',
        // Aquí puedes agregar más campos si es necesario
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el juego
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
