<?php

use App\Models\Inscrito;

if(!function_exists('getSuscribedEvent')){
    function getSuscribedEvent($idPersona, $IdActo)
    {
        return Inscrito::where('Id_persona', $idPersona)->where('id_acto',$IdActo)->count();
    }
}