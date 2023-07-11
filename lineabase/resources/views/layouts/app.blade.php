<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta Linea Base</title>

    @include('layouts.stylesheet')

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            @include('layouts.sidebar')
        </div>
        <div id="main">
            @include('layouts.navigation')
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>@yield('page-title')</h3>
                    <p class="text-subtitle text-muted">
                        @yield('subtitle')
                    </p>
                </div>
                <!-- Page Content -->
                @yield('content')
            </div>

            <footer>
                @yield('footer')
            </footer>
        </div>
    </div>
    @include('layouts.scripts')

</body>

</html>
