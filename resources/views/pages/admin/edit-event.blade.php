@extends('layouts.app')

@section('content')

<main class="container">
    <h1 class="text-primary mt-5">Eventos disponibles</h1>
    <section class="events-table my-5 shadow p-3 mb-5 bg-white rounded">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-primary">Editar evento: {{ $event->Titulo }}</h2>
        <form action="{{ route('submitEditEvent', ['id' => $event->Id_acto]) }}" method="POST">
            @method('patch')
            <div class="form-group my-3">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $event->Titulo }}">
            </div>
    
            <div class="form-group my-3">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $event->Fecha }}">
            </div>
    
            <div class="form-group my-3">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" value="{{ $event->Hora }}">
            </div>
    
            <div class="form-group my-3">
                <label for="descripcion_corta">Descripcion Corta:</label>
                <input type="textarea" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ $event->Descripcion_corta }}">
            </div>
    
            <div class="form-group my-3">
                <label for="descripcion_larga">Descripcion Larga:</label>
                <textarea required class="form-control" id="descripcion_larga" name="descripcion_larga" rows="3">{{ $event->Descripcion_larga }}</textarea>
            </div>
    
            <div class="form-group my-3">
                <label for="asistentes">Asistentes:</label>
                <input type="number" class="form-control" id="asistentes" name="asistentes" value="{{ $event->Num_asistentes }}">
            </div>

            @csrf
 
            <button type="submit" class="btn btn-primary my-3">Confirmar</button>

        </form>
    </section>
</main>

@endsection