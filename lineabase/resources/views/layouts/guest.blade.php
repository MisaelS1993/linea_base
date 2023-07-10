<!DOCTYPE html>
<html lang="es">

<head>
    <title>Iniciar Sesión</title>
    @include('layouts.stylesheet')
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">

                            @yield('form')
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('layouts.scripts')
</body>

</html>
