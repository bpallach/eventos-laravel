@extends('layouts.app')

@section('content')

<main class="container">
    @php
        if (isset(Auth::user()->Id_Persona)) {
            $suscribed = getSuscribedEvent(Auth::user()->Id_Persona,$event->Id_acto);
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
        
    </section>

</main>

@endsection