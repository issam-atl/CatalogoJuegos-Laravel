<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'price', 'genre', 'players', 'description', 'cover_image'];

    // Relación con los usuarios que han comprado este juego
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_game');
    }
}
