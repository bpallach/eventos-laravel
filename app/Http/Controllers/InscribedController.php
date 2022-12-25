<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Inscrito;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InscribedController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $events = Event::all();
        return view('pages.admin.add-inscribe', ['personas' => $personas, 'events' => $events]);
    }
    
    public function store($id)
    {

        $evento = DB::table('actos')
                            ->where('Id_acto', $id)
                            ->get()
                            ->first();

        $asistentes= DB::table('inscritos')
                            ->where('id_acto', $id)
                            ->count();

        if($asistentes >= $evento->Num_asistentes){
            return redirect()->route('home')->with('error', 'No hay plazas disponibles');
        }
        $inscrito = new Inscrito();
        $inscrito->Id_persona = Auth::user()->Id_Persona;
        $inscrito->id_acto = $id;
        $inscrito->Fecha_inscripcion = Carbon::now();
        $inscrito->save();
        return redirect()->route('home');
    }

    public function destroy($id, $idPersona)
    {
        Inscrito::where('Id_persona', $idPersona)
        ->where('id_acto', $id)
        ->delete();
        return redirect()->back();
    }

    public function storeFromAdmin(Request $request)
    {
        $inscrito = new Inscrito();
        $inscrito->Id_persona = $request->Id_persona;
        $inscrito->id_acto = $request->Id_acto;
        $inscrito->Fecha_inscripcion = $request->Fecha_inscripcion;
        $inscrito->save();
        return redirect()->route('admin')->with('message', 'Inscrito correctamente');
    }

}
