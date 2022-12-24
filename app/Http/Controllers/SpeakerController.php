<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Persona;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $events = Event::all();
        return view('pages.admin.add-speaker', ['personas' => $personas, 'events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Id_persona' => 'required|int',
            'Id_acto' => 'required|int',
        ]);

        $speaker = new Speaker;
        $speaker->Id_persona = $request->Id_persona;
        $speaker->Id_acto = $request->Id_acto;
        $speaker->orden = $request->orden;
        $speaker->save();
        
        return redirect()->route('admin')->with('message', 'Ponente Inscrito correctamente');

    }

    public function destroy($id)
    {
        $speaker = Speaker::find($id);
        $speaker->delete();
        return redirect()->route('admin')->with('message', 'Ponente eliminado correctamente');
    }
}
