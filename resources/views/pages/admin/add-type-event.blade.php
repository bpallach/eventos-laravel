@extends('layouts.app')

@section('content')

<main class="container">
    <section class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin') }}"><i class="bi bi-arrow-left"></i> Volver al panel</a>
    </section>
    <section class="users-table mt-4">
        <h2 class="text-primary mb-3">Añadir tipo de acto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('submitAddTypeEvent') }}" method="post">

            <div class="form-group my-3">
                <label for="Titulo">Titulo:</label>
                <input required class="form-control" type="text" id="Titulo" name="Titulo">
            </div>

            @csrf

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </section>
</main>

@endsection