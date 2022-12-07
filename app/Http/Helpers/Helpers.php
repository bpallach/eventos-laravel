<?php

use App\Models\Event;
use App\Models\Inscrito;
use App\Models\Persona;
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

if(!function_exists('getPersona')){
    function getPersona($id)
    {
        $persona = Persona::find($id);
        return $persona->Nombre . " " . $persona->Apellido1;
    }
}

if(!function_exists('getEventName')){
    function getEventName($id)
    {
        $event = Event::find($id);
        return $event->Titulo;
    }
}

