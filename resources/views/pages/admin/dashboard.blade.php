@extends('layouts.app')

@section('content')

<main class="container">
    @php
        echo "<pre>";
            echo var_dump($events);
            echo var_dump($eventTypes);
        echo "</pre>";
    @endphp
</main>

@endsection