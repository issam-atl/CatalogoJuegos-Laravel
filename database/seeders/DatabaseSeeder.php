<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Otros seeders

        $this->crearUsuarioAdmin();
    }

    public function crearUsuarioAdmin()
    {
        // Datos del usuario administrador
        $datosUsuarioAdmin = [
            'name' => 'Amin',
            'email' => 'admin@eadmin.com',
            'password' => Hash::make('admin'), // Hasheamos la contraseña utilizando bcrypt
        ];

        // Crear el usuario administrador
        User::create($datosUsuarioAdmin);

        $this->command->info('Usuario administrador creado correctamente.');
    }
}
