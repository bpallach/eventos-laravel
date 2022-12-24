@extends('layouts.app')

@section('content')

<main class="container">
    @php
        if (isset(Auth::user()->Id_Persona)) {
            $suscribed = getSuscribedEvent(Auth::user()->Id_Persona,$event->Id_acto);
            $speaker = isUserSpeakerOfThisEvent(Auth::user()->Id_Persona,$event->Id_acto);
        }

    @endphp 

    <section class="my-4 events d-flex flex-column align-items-start">

        <a href="{{ route('home') }}" class="btn btn-primary mt-5"> <i class="bi bi-arrow-left"></i> Volver a eventos</a>

        <h1 class="text-primary mt-3">Evento: </strong> {{$event->Titulo}} </h1>

        <p><strong>Descripción Corta:</strong> {{$event->Descripcion_corta}}</p>

        <p><strong>Fecha: </strong>{{$event->Fecha}}</p>

        <p><strong>Hora: </strong>{{$event->Hora}}</p>

        <p><strong>Asistentes: </strong>{{$event->Num_asistentes}}</p>

        <p><strong>Tipo acto: </strong>{{$eventType[0]->Descripcion}}</p>

        <p><strong>Descripción Larga: </strong>{{$event->Descripcion_larga}}</p>

        @if (isset(Auth::user()->Id_Persona))
            <?php 
            if($suscribed > 0){ ?>
                <a href="{{ route('destroyInscribe', ['id' => $event->Id_acto, 'idPersona' => Auth::user()->Id_Persona]) }}" class="btn btn-danger">Desuscribirse</a>
            <?php }else{ ?>
                <a href="{{ route('submitInscribe', [$event->Id_acto]) }}" class="btn btn-success">Inscribirse</a>
            <?php } ?>
        @else
            <small class="opacity-50"><i><a href="{{ route('login') }}">Inicia sesión</a> para inscribirte</i></small>
        @endif

        @php $today = getToday(); @endphp  

        @if (isset(Auth::user()->Id_Persona))
            <?php if ($speaker > 0 || isAdmin()) { ?>
                @if ($today > $event->Fecha) 
                    <div class="mt-4 p-3 border rounded border-primary">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('uploadDocument') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="file"><strong>Documento del evento</strong></label><br><br>
                                <input type="file" class="form-control-file" id="file" name="file">  
                            </div>

                            <div class="form-group my-3">
                                <label for="orden" id="orden">Orden:</label>
                                <select name="orden" required class="form-control">
                                    <option value="">Seleccionar orden</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <input type="hidden" name="Id_acto" value="{{$event->Id_acto}}">
                                <button type="submit" class="btn btn-primary">Subir documento</button>
                            </div>
                            @csrf
                        </form>

                    </div> 
                @else
                    <span class="text-danger mt-4">Como ponente podras subir documentos una vez el evento haya finalizado.</span>
                @endif
            <?php } ?>
        @endif

        @if ($documents->all())
            @if(session()->has('message'))
                <div class="alert alert-success mt-4">
                    {{ session()->get('message') }}
                </div>
             @endif

            <strong class="mt-4">Descargar presentación:</strong>
            @foreach ($documents as $document)
            <div>
                <a href="{{ asset($document->Localizacion_documentacion) }}" download="{{ $document->Titulo_documento }}"> {{ $document->Titulo_documento }}</a> 
                @if (isset(Auth::user()->Id_Persona))
                    @if ($speaker > 0 || isAdmin())
                        <a class="text-danger" href="{{ route('destroyDocument', ['id' => $document->Id_presentacion]) }}"><i class="bi bi-trash3"></i></a>
                    @endif
                @endif                
            </div>
            @endforeach
        @endif

        

    </section>

</main>

@endsection