<!DOCTYPE html>
<html lang="en">

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
            <div class="main-content container-fluid">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2023 &copy; Linea Base</p>
                    </div>
                    <div class="float-right">
                        <p>Creado por <a
                                href="">Misael Sanchez</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('layouts.scripts')

</body>

</html>
