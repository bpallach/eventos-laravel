<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('pages.home', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_events = DB::table('tipo_acto')
                            ->get();
        return view('pages.admin.add-event', ['type_events' => $type_events]);
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
            'Titulo' => 'required|max:255',
            'fecha' => 'date|required',
            'hora' => 'required',
            'Descripcion_corta' => 'required|max:255',
            'Descripcion_larga' => 'required|max:255',
            'asistentes' => 'required|numeric|max:99999999',
            'Id_tipo_acto' => 'required',
        ]);

        $event = new Event;
        $event->Titulo = $request->Titulo;
        $event->Fecha = $request->fecha;
        $event->Hora = $request->hora;
        $event->Descripcion_corta = $request->Descripcion_corta;
        $event->Descripcion_larga = $request->Descripcion_larga;
        $event->Num_asistentes = $request->asistentes;
        $event->Id_tipo_acto = $request->Id_tipo_acto;
        $event->save();

        return redirect()->route('admin')->with('message', 'Añadido correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $eventType = DB::table('tipo_acto')
                            ->where('Id_tipo_acto', $event->Id_tipo_acto)
                            ->get();
        $documents = Document::where('Id_acto', $id)->orderBy('Orden', 'ASC')->get();

        return view('pages.event', ['event' => $event, 'eventType' => $eventType, 'documents' => $documents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $type_events = DB::table('tipo_acto')
                            ->get();
        return view('pages.admin.edit-event', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'titulo' => 'required|max:255',
            'fecha' => 'date|required',
            'hora' => 'required',
            'descripcion_corta' => 'required|max:255',
            'descripcion_larga' => 'required|max:255',
            'asistentes' => 'required|numeric|max:99999999',
        ]);

        $event = Event::find($id);
        $event->Titulo = $request->titulo;
        $event->Fecha = $request->fecha;
        $event->Hora = $request->hora;
        $event->Descripcion_corta = $request->descripcion_corta;
        $event->Descripcion_larga = $request->descripcion_larga;
        $event->Num_asistentes = $request->asistentes;
        $event->save();

        return redirect()->route('admin')->with('message', 'Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('inscritos')->where('id_acto',$id)->delete(); //primero elimino los usuarios inscritos en el evento

        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin')->with('message', 'Eliminado correctamente');
    }
}
