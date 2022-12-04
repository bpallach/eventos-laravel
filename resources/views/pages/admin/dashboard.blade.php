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

</main>

@endsection