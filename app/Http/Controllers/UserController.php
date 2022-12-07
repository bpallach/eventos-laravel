<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('pages.home', ['users' => $users]);
    }

    public function indexProfile()
    {
        $user = User::where('Id_Persona', Auth::user()->Id_Persona)->get();
        return view('pages.profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $user = User::find(Auth::user()->Id_usuario);

        $user->Username = $request->username;
        $user->Password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        return redirect('/perfil')->with('message', 'Datos actualizados correctamente');
    }

}
