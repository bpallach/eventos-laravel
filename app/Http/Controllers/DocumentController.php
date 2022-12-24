<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'Id_acto' => 'required|min:1',
            'orden' => 'required|min:1|max:2',
            'file' => 'required|file',
        ]);

        $document = new Document;

        if($request->hasFile('file')){
            $file = $request->file('file'); //take the file
            $destPath = 'documents/events/'; //set destination path without public folder
            $filename = time() . '-' . $file->getClientOriginalName(); //take the file name
            $uploadSuccess = $request->file('file')->move($destPath, $filename); //move the file to the destionation path
            $document->Localizacion_documentacion = $destPath . $filename;
        }

        $document->Id_acto = $request->Id_acto;
        $document->Orden = $request->orden;
        $document->Id_persona = Auth::user()->Id_Persona;
        $document->Titulo_documento = $filename;
        $document->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('message', 'Documento eliminado correctamente');
    }
}
