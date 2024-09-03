<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->where('id', '!=', auth()->id())->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.novedad');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8', // Asegúrate de validar la contraseña
            // Puedes agregar más validaciones aquí
        ]);

        $userData = $request->only(['name', 'email', 'password']); // Obtén solo los datos necesarios

        // Cifra la contraseña antes de guardarla en la base de datos
        $userData['password'] = Hash::make($request->password);

        // Crea el nuevo usuario
        User::create($userData);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Puedes agregar más validaciones aquí
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }
    public function showProfile()
    {
        return view('profile');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
    public function chat()
    {
        $notifications = Notification::where('receiver_id', auth()->id())->with('sender')->get();
        //$users = User::where('id', '!=', auth()->id())->get(); // Obtener todos los usuarios excepto el usuario autenticado
        $users = User::where('role', '!=', 'admin')->where('id', '!=', auth()->id())->get();
        return view('chat', compact('users', 'notifications'));
    }

    public function sendMessage(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Si el valor del campo user_id es "todos"
        if ($request->user_id == 'todos') {
            // Obtener todos los usuarios que su role es user
            $users = User::where('role', 'user')->get();

            // Crear y guardar una notificación para cada usuario
            foreach ($users as $user) {
                $notification = new Notification();
                $notification->sender_id = auth()->id(); // El remitente es el usuario autenticado
                $notification->receiver_id = $user->id;
                $notification->message = $request->message;
                $notification->save();
            }
        } else {
            // Validar que el usuario seleccionado existe en la base de datos
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            // Crear una nueva notificación en la base de datos
            $notification = new Notification();
            $notification->sender_id = auth()->id(); // El remitente es el usuario autenticado
            $notification->receiver_id = $request->user_id;
            $notification->message = $request->message;
            $notification->save();
        }

        // Redirigir de vuelta al chat con un mensaje de éxito
        return redirect()->route('chat')->with('success', 'Mensaje enviado correctamente');
    }


}
