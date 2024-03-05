<!doctype html>
    <html lang="en">
    <head>
        <!-- Meta tags, CSS links, and anything common in the head -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
        <link rel="stylesheet" 
                href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
                crossorigin="anonymous">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('meta') <!-- Additional meta-tags can be pushed per page -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

        <title>@yield('title')</title>
    </head>

    <body>
        <x-nav></x-nav> <!-- My archlinux-like navbar component -->

        @yield('content') <!-- Main content will be injected here -->

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous">
        </script>

        <!-- script in public/js/mainlayout.js -->
        <script src="{{ asset('js/mainlayout.js') }}"></script>

        @stack('scripts') <!-- Additional scripts can be pushed per page -->
    </body>
</html>
