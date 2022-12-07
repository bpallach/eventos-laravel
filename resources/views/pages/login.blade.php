@extends('layouts.app')

@section('content')
<main class="container">
    <div class="d-flex align-items-center my-5">
        <div class="mx-auto" style="width: 450px;">
            <h1>Iniciar Sesión</h1>

            @if(session()->has('success'))
                <div class="alert alert-success mt-4">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('submitLogin') }}">
                <div class="mb-3">
                    <label class="form-label" for="username"><h5>E-mail</h5></label>
                    <input required type="text" class="form-control" name="email" id="email" placeholder="Correo electrónico">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password"><h5>Contraseña</h5></label>
                    <input required type="password" class="form-control" name="password" id="password" placeholder="contraseña">
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-danger mt-4">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
                <a href="{{ route('register') }}" class="btn btn-danger">Registrarse</a>
                @csrf
            </form>
        </div>
    </div>
</main>

@endsection