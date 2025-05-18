<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // lista de usuarios
    public function index()
    {
        $users = User::paginate(10);

        return Inertia::render('Usuarios/Index', [
            'users' => $users,
        ]);
    }

    // mostrar vista para crear usuario
    public function create()
    {
        return Inertia::render('Usuarios/Create', [
            'edit' => false,
            "user" => (object)[]
        ]);
    }

    // guardar usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user', // o 'admin' si lo deseas asignar manualmente
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }


}
