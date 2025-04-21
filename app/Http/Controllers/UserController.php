<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request){
        
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => [
            'required',
            'string',
            'min:8',              // Mínimo 8 caracteres
            'confirmed',          // Debe coincidir con password_confirmation
            'regex:/[a-z]/',      // Al menos una letra minúscula
            'regex:/[A-Z]/',      // Al menos una letra mayúscula
            'regex:/[0-9]/',      // Al menos un número
            'regex:/[@$!%*#?&]/', // Al menos un carácter especial
        ],
        'role' => 'required|in:admin,consultor'
    ], [
        'password.min' => 'La contrasenya ha de tenir almenys 8 caràcters',
        'password.confirmed' => 'Les contrasenyes no coincideixen',
        'password.regex' => 'La contrasenya ha de contenir almenys: una lletra majúscula, una minúscula, un número i un caràcter especial (@$!%*#?&)'
    ]);

    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.index')
               ->with('success', 'Usuari creat correctament!');
    } catch (\Exception $e) {
        return back()->withInput()
               ->with('error', 'Error en crear usuari: '.$e->getMessage());
    }
}

    public function destroy(User $user)
    {
        // Evitar que el admin se borre a sí mismo
        if ($user->id === auth()->id()) {
            return back()->with('error', 'No pots esborrar-te a tu mateix!');
        }

        $user->delete();
        return back()->with('success', 'Usuari esborrat!');
    }
}