@extends('layouts.app')

@section('content')
<main class="container">
    <div class="d-flex align-items-center my-5">
        <div class="mx-auto" style="width: 450px;">
            <h1 class="mb-4">Mi perfil: {{ $user[0]->Username }}</h1>

            @if(session()->has('message'))
                <div class="alert alert-success mt-4">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('submitProfile') }}" method="post">
                <div class="mb-3">
                    <label class="form-label"><h5>Correo electrónico</h5></label>
                    <input required type="email" class="form-control" id="email" name="email" value="{{ $user[0]->email }}" placeholder="Introduce tu nuevo email">
                </div>

                <div class="mb-3">
                    <label class="form-label"><h5>Nombre de usuario</h5></label>
                    <input required type="nombre" class="form-control" id="username" name="username" value="{{ $user[0]->Username }}" placeholder="Introduce tu nuevo nombre">
                </div>

                <div class="mb-3">
                    <label class="form-label"><h5>Contraseña</h5></label>
                    <input required type="contraseña" class="form-control" id="password" name="password" placeholder="Introduce tu nueva contraseña">
                </div>

                @csrf

                <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
            </form>
            </form>
        </div>
    </div>
</main>

@endsection