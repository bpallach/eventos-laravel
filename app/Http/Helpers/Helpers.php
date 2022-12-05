<?php

use App\Models\Inscrito;
use Illuminate\Support\Facades\Auth;

if(!function_exists('getSuscribedEvent')){
    function getSuscribedEvent($idPersona, $IdActo)
    {
        return Inscrito::where('Id_persona', $idPersona)->where('id_acto',$IdActo)->count();
    }
}

if(!function_exists('isAdmin')){
    function isAdmin()
    {
        if(Auth::user()->Id_tipo_usuario == 1){
            return true;
        }

        return false;
    }
}