@extends('layouts.app')

@section('content')

<main class="container">
    @php
        // echo "<pre>";
        //     echo var_dump();
        // echo "</pre>";
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
        
        <?php 
        if(1 > 0){ ?>
            <a href="#?id={{$event->Id_acto}}" class="btn btn-danger">Desuscribirse</a>
        <?php }else{ ?>
            <a href="#?id={{$event->Id_acto}}" class="btn btn-success">Inscribirse</a>
        <?php }

        ?>
    </section>

</main>

@endsection