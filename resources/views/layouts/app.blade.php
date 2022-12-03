<!DOCTYPE html>
<html>
@include('layouts.partials.head')

<body>
    <div id="app" class="app" v-cloack>
        @include('layouts.partials.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
</body>

</html>