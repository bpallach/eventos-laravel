@extends('layouts.app')

@section('content')

<main class="container">
    @php
        // echo "<pre>";
        //     echo var_dump($events);
        //     echo var_dump($eventTypes);
        // echo "</pre>";
    @endphp

    @if(session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session()->get('message') }}
        </div>
    @endif

    <section class="admin-panel-table admin-type-events my-4">
        <div class="d-flex align-items-center gap-4">
            <h2 class="text-primary mb-3">Tipos de actos</h2>
            <a class="btn btn-primary" href="{{ route('addTypeEvent') }}">Añadir tipo de acto</a>
        </div>

        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($eventTypes as $eventType) : ?>
                    <tr>
                        <td>{{ $eventType->Id_tipo_acto }}</td>
                        <td>{{ $eventType->Descripcion }}</td>
                        <td>
                            <a class="text-danger" href="{{ route('deleteTypeEvent', ['id' => $eventType->Id_tipo_acto]) }}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="admin-panel-table admin-events my-4">

        <div class="d-flex align-items-center gap-4">
            <h2 class="text-primary mb-3">Tabla de Actos</h2>
            <a class="btn btn-primary" href="{{ route('addEvent') }}">Añadir acto</a>
        </div>

        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripción corta</th>
                    <th>Asistentes</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($events as $event) : ?>
                    <tr>
                        <td>{{ $event->Titulo }}</td>
                        <td>{{ $event->Descripcion_corta }}</td>
                        <td>{{ $event->Num_asistentes }}</td>
                        <td>{{ $event->Fecha }}</td>
                        <td>{{ $event->Hora }}</td>
                        <td>
                            <a href="{{ route('editEvent', [$event->Id_acto]) }}"><i class="bi bi-pencil-square"></i></a>
                            <a class="text-danger" href="{{ route('deleteEvent', [$event->Id_acto]) }}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="admin-panel-table admin-users my-4">
        <div class="d-flex align-items-center gap-4">
            <h2 class="text-primary mb-3">Tabla de usuarios</h2>
        </div>
        
        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th>Id_usuario</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Id_Persona</th>
                    <th>Id_tipo_usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($users as $user) : ?>
                    <tr>
                        <td>{{ $user->Id_usuario }}</td>
                        <td>{{ $user->Username }}</td>
                        <td>{{ $user->Password }}</td>
                        <td>{{ $user->Id_Persona }}</td>
                        <td>{{ $user->Id_tipo_usuario }}</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="admin-panel-table admin-type-events my-4">

        <div class="d-flex align-items-center gap-4">
            <h2 class="text-primary mb-3">Inscritos</h2>
            <a class="btn btn-primary" href="{{ route('inscribe') }}">Inscribir usuario</a>
        </div>

        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th>Id inscripción</th>
                    <th>Persona</th>
                    <th>Acto</th>
                    <th>Fecha Inscripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($inscribeds as $inscribed) : 
                    $personaName = getPersona($inscribed->Id_persona);
                    $eventName = getEventName($inscribed->id_acto);
                ?>
                    <tr>
                        <td>{{ $inscribed->Id_inscripcion }}</td>
                        <td>{{ $personaName }}</td>
                        <td>{{ $eventName }}</td>
                        <td>{{ $inscribed->Fecha_inscripcion }}</td>
                        <td>
                            <a class="text-danger" href="{{ route('destroyInscribe', ['id' => $inscribed->id_acto, 'idPersona' => $inscribed->Id_persona]) }}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="admin-panel-table admin-users my-4">

        <div class="d-flex align-items-center gap-4">
            <h2 class="text-primary mb-3">Tabla de Ponentes</h2>
            <a class="btn btn-primary" href="{{ route('addSpeaker') }}">Inscribir Ponente</a>
        </div>
        
        <table class="table table-striped-columns table-bordered">
            <thead>
                <tr>
                    <th>id_ponente</th>
                    <th>Persona</th>
                    <th>Acto</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($speakers as $speaker) : 
                
                    $personaName = getPersona($inscribed->Id_persona);
                    $eventName = getEventName($inscribed->id_acto);
                ?>
                    <tr>
                        <td>{{ $speaker->id_ponente }}</td>
                        <td>{{ $personaName }}</td>
                        <td>{{ $eventName }}</td>
                        <td>{{ $speaker->Orden }}</td>
                        <td>
                            <a class="text-danger" href="{{ route('deleteSpeaker', [$speaker->id_ponente]) }}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</main>

@endsection