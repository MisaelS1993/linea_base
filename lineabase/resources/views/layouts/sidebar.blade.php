<div class="sidebar-wrapper active">
    <div class="sidebar-header mt-2 ml-2  mr-2 mb-2 text-center">
        <img src="assets/images/favicon.ico" class="h-100 d-inline-block mt-0 mb-0" style="width: 150px;">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">


            <li class='sidebar-title'>MENU</li>



            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span class="">Dashboard</span>
                </a>

            </li>

            <li class="sidebar-item {{ Request::is('control') ? 'active' : '' }}">
                <a href="{{route('control.index')}}" class='sidebar-link text-ligth'>
                    <i data-feather="file-text" width="20"></i>
                    <span class="">Boleta</span>
                </a>

            </li>

            <li class="sidebar-item has-sub ">
                <a href="#" class='sidebar-link'>
                    <i data-feather="globe" width="20"></i>
                    <span class="">Jusdirección</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a class="text-light" href="{{route('departamentos.index')}}"><b>Departamentos</b></a>
                    </li>

                    <li>
                        <a class="text-light" href="{{route('municipios.index')}}"><b>Municipios</b></a>
                    </li>

                    <li>
                        <a class="text-light" href="{{route('aldeas.index')}}"><b>Aldeas</b></a>
                    </li>


                </ul>

            </li>




        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>