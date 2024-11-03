<!DOCTYPE html>
<html lang="es">

<head>

    @include('layouts.stylesheet')

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            @include('layouts.sidebar')
        </div>
        <div id="main">
            @include('layouts.navigation')
            <div class="">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            <footer class="text-muted">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <p class="mb-0">2023 &copy; Linea Base</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="mb-0">Creado por <a href="#" class="text-primary">Misael Sanchez</a></p>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    @include('layouts.scripts')

</body>

</html>