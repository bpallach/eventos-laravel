@extends('layouts.app')

@section('content')

<main class="container">
    <section class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin') }}"><i class="bi bi-arrow-left"></i> Volver al panel</a>
    </section>
    <section class="users-table mt-4">
        <h2 class="text-primary mb-3">Añadir acto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('submitAddEvent') }}" method="post">

            <div class="form-group my-3">
                <label for="Titulo">Titulo:</label>
                <input required class="form-control" type="text" id="Titulo" name="Titulo">
            </div>

            <div class="form-group my-3">
                <label for="fecha">Fecha:</label>
                <input required type="date" class="form-control" required id="fecha" name="fecha" min="2022-11-22" max="2023-12-31">
            </div>

            <div class="form-group my-3">
                <label for="hora">Hora:</label>
                <input required type="time" step="1" class="form-control" required id="hora" name="hora">
            </div>

            <div class="form-group my-3">
                <label for="Descripcion_corta">Descripción corta:</label>
                <input required class="form-control" type="text" id="Descripcion_corta" name="Descripcion_corta">
            </div>

            <div class="form-group my-3">
                <label for="Descripcion_larga">Descripción larga:</label>
                <textarea required class="form-control" id="Descripcion_larga" name="Descripcion_larga" rows="3"></textarea>
            </div>

            <div class="form-group my-3">
                <label for="asistentes">Número de asistentes:</label>
                <input required type="number" class="form-control" id="asistentes" name="asistentes">
            </div>

            <div class="form-group my-3">
                <label for="Id_tipo_acto" id="Id_tipo_acto">Tipo de acto:</label>
                <select name="Id_tipo_acto" required class="form-control">
                    <option value="">Tipo de acto</option>
                    <?php 
                    if(!empty($type_events)){
                        foreach($type_events as $type_event){ ?>
                            <option value="{{ $type_event->Id_tipo_acto }}">{{ $type_event->Descripcion }}</option>
                        <?php } 
                    }else{ ?>
                        <option value="0">No hay tipos de actos disponibles</option>
                    <?php } ?>
                </select>
            </div>

            @csrf

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </section>
</main>

@endsection