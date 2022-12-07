@extends('layouts.app')

@section('content')

<main class="container">
    <section class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin') }}"><i class="bi bi-arrow-left"></i> Volver al panel</a>
    </section>
    <section class="users-table mt-4">
        <h2 class="text-primary mb-3">Añadir inscrito</h2>
        <form action="{{ route('storeFromAdmin') }}" method="post">
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
            

            <input type="hidden" class="form-control" value="<?php echo $date = date('Y-m-d') . " " . date('h:i:s'); ?>" id="Fecha_inscripcion" name="Fecha_inscripcion">

            <button type="submit" class="btn btn-primary">Guardar</button>

            @csrf
        </form>
    </section>
</main>

@endsection