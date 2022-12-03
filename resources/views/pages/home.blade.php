@extends('layouts.app')

@section('content')

<main class="container">
    <h1 class="text-primary mt-5">Eventos disponibles</h1>
    <section class="my-4 events row">

        @php
            // echo "<pre>";
            // echo var_dump($events);
            // echo "</pre>";
        @endphp

        @foreach ($events as $event)
            <div class="card col-sm-3 col-md-6 col-lg-4">
                <div class="card-body">
                    <a href="{{ route('event', [$event->Id_acto]) }}">
                        <h5 class="card-title">{{ $event->Titulo}} </h5>
                    </a>
                    <p class="card-text"><strong> {{ $event->Descripcion_corta}} </strong></p>
                    <p class="card-text"><strong>Asistentes:</strong> {{ $event->Num_asistentes}} </p>
                    <?php 
                    
                    if(1>0){ ?>
                        <a href="./controllers/submit_unsuscribe_event_controller.php?id={{ $event->Id_acto}} " class="btn btn-danger">Desuscribirse</a>
                    <?php }else{ ?>
                        <a href="#?id={{ $event->Id_acto;}} " class="btn btn-success">Inscribirse</a>
                    <?php }

                    ?>
                    
                </div>
            </div>
        @endforeach

    </section>
</main>

@endsection