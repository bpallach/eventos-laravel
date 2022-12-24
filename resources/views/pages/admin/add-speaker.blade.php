@extends('layouts.app')

@section('content')

<main class="container">

    <section class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin') }}"><i class="bi bi-arrow-left"></i> Volver al panel</a>
    </section>

    <section class="users-table mt-4">

        <h2 class="text-primary mb-3">Añadir Ponente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeSpeakerFromAdmin') }}" method="post">
            <div class="form-group my-3">
                <label for="Id_persona" id="Id_persona">Personas:</label>
                <select name="Id_persona" required class="form-control">
                    <option value="">Persona</option>
                    <?php 
                    if(!empty($personas)){
                        foreach($personas as $persona){ ?>
                            <option value="{{ $persona->Id_persona }}">{{ $persona->Nombre . " " . $persona->Apellido1 }}</option>
                        <?php } 
                    }else{ ?>
                        <option value="0">No hay personas</option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group my-3">
                <label for="Id_acto" id="Id_acto">Acto:</label>
                <select name="Id_acto" required class="form-control">
                    <option value="">Seleccionar acto</option>
                    <?php 
                    if(!empty($events)){
                        foreach($events as $event){ ?>
                            <option value="{{ $event->Id_acto }}">{{ $event->Titulo }}</option>
                        <?php } 
                    }else{ ?>
                        <option value="0">No hay actos disponibles</option>
                    <?php } ?>
                </select>
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

            <button type="submit" class="btn btn-primary">Guardar</button>

            @csrf
        </form>
    </section>
</main>

@endsection