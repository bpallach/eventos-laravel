@extends('layouts.app')

@section('content')
<main class="container">
    <h1 class="text-primary mt-5">Eventos disponibles</h1>
    <section class="my-4 events row">
        @foreach ($events as $event)
            @php
            if (isset(Auth::user()->Id_Persona)) {
                $suscribed = getSuscribedEvent(Auth::user()->Id_Persona,$event->Id_acto);
            }
            @endphp 
            <div class="card col-sm-3 col-md-6 col-lg-4">
                <div class="card-body">
                    <a href="{{ route('event', [$event->Id_acto]) }}">
                        <h5 class="card-title">{{ $event->Titulo}} </h5>
                    </a>
                    <p class="card-text"><strong> {{ $event->Descripcion_corta}} </strong></p>
                    <p class="card-text"><strong>Asistentes:</strong> {{ $event->Num_asistentes}} </p> 
                
                    @if (isset(Auth::user()->Id_Persona))
                        <?php if($suscribed > 0){ ?>
                            <a href="{{ route('destroyInscribe', ['id' => $event->Id_acto, 'idPersona' => Auth::user()->Id_Persona]) }}" class="btn btn-danger">Desuscribirse</a>
                        <?php }else{ ?>
                            <a href="{{ route('submitInscribe', [$event->Id_acto]) }}" class="btn btn-success">Inscribirse</a>
                        <?php } ?>
                    @else
                        <small class="opacity-50"><i><a href="{{ route('login') }}">Inicia sesión</a> para inscribirte</i></small>
                    @endif
                    
                </div>
            </div>
        @endforeach

    </section>
</main>

@endsection