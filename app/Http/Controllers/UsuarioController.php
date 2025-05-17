<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return Inertia::render('Usuarios/Index', [
            'users' => $users,
        ]);
    }
}
