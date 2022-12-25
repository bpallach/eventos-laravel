<?php

use App\Models\Event;
use App\Models\Inscrito;
use App\Models\Persona;
use App\Models\Speaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

if(!function_exists('isUserSpeakerOfThisEvent')){
    function isUserSpeakerOfThisEvent($idPersona, $IdActo)
    {
        return Speaker::where('Id_persona', $idPersona)->where('Id_acto',$IdActo)->count();
    }
}

if(!function_exists('getToday')){
    function getToday()
    {
        $today = Carbon::now();
        return $today->toDateString();
    }
}

if(!function_exists('eventHasPlaces')){
    function eventHasPlaces($id)
    {
        $evento = DB::table('actos')
                            ->where('Id_acto', $id)
                            ->get()
                            ->first();

        $asistentes= DB::table('inscritos')
                            ->where('id_acto', $id)
                            ->count();

        if($asistentes >= $evento->Num_asistentes){
            return false;
        }

        return true;
    }
}

