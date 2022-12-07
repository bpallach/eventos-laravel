<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'Username' => 'required|max:255',
            'Nombre' => 'required|max:255',
            'Apellido' => 'required|max:255',
            'Apellido2' => 'required|max:255',
            'password' => 'required|max:255',
        ]);


        $persona = new Persona();
        $persona->Nombre = $request->Nombre;
        $persona->Apellido1 = $request->Apellido;
        $persona->Apellido2 = $request->Apellido2;
        $persona->save();

        $user = new User();
        $user->email = $request->email;
        $user->Username = $request->Username;
        $user->Password = bcrypt($request->password);
        $user->Id_Persona = $persona->Id_persona;
        $user->Id_tipo_usuario = 2;
        $user->save();

        return redirect()->route('login')->with('success', 'Registrado correctamente');
    }
}
