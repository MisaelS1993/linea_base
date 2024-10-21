<div class="sidebar-wrapper active">
    <div class="sidebar-header mt-2 ml-2  mr-2 mb-2 text-center">
        <img src="assets/images/favicon.ico" class="h-100 d-inline-block mt-0 mb-0" style="width: 150px;">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">


            <li class='sidebar-title text-light text-center'><b>Menu</b></li>



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



            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="triangle" width="20"></i>
                    <span>Components</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="component-alert.html">Alert</a>
                    </li>

                    <li>
                        <a href="component-badge.html">Badge</a>
                    </li>

                    <li>
                        <a href="component-breadcrumb.html">Breadcrumb</a>
                    </li>

                    <li>
                        <a href="component-buttons.html">Buttons</a>
                    </li>

                    <li>
                        <a href="component-card.html">Card</a>
                    </li>

                    <li>
                        <a href="component-carousel.html">Carousel</a>
                    </li>

                    <li>
                        <a href="component-dropdowns.html">Dropdowns</a>
                    </li>

                    <li>
                        <a href="component-list-group.html">List Group</a>
                    </li>

                    <li>
                        <a href="component-modal.html">Modal</a>
                    </li>

                    <li>
                        <a href="component-navs.html">Navs</a>
                    </li>

                    <li>
                        <a href="component-pagination.html">Pagination</a>
                    </li>

                    <li>
                        <a href="component-progress.html">Progress</a>
                    </li>

                    <li>
                        <a href="component-spinners.html">Spinners</a>
                    </li>

                    <li>
                        <a href="component-tooltips.html">Tooltips</a>
                    </li>

                </ul>

            </li>




            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="briefcase" width="20"></i>
                    <span>Extra Components</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="component-extra-avatar.html">Avatar</a>
                    </li>

                    <li>
                        <a href="component-extra-divider.html">Divider</a>
                    </li>

                </ul>

            </li>




            <li class='sidebar-title'>Forms &amp; Tables</li>



            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="file-text" width="20"></i>
                    <span>Form Elements</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="form-element-input.html">Input</a>
                    </li>

                    <li>
                        <a href="form-element-input-group.html">Input Group</a>
                    </li>

                    <li>
                        <a href="form-element-select.html">Select</a>
                    </li>

                    <li>
                        <a href="form-element-radio.html">Radio</a>
                    </li>

                    <li>
                        <a href="form-element-checkbox.html">Checkbox</a>
                    </li>

                    <li>
                        <a href="form-element-textarea.html">Textarea</a>
                    </li>

                </ul>

            </li>




            <li class="sidebar-item  ">
                <a href="form-layout.html" class='sidebar-link'>
                    <i data-feather="layout" width="20"></i>
                    <span>Form Layout</span>
                </a>

            </li>




            <li class="sidebar-item  ">
                <a href="form-editor.html" class='sidebar-link'>
                    <i data-feather="layers" width="20"></i>
                    <span>Form Editor</span>
                </a>

            </li>




            <li class="sidebar-item  ">
                <a href="table.html" class='sidebar-link'>
                    <i data-feather="grid" width="20"></i>
                    <span>Table</span>
                </a>

            </li>




            <li class="sidebar-item  ">
                <a href="table-datatable.html" class='sidebar-link'>
                    <i data-feather="file-plus" width="20"></i>
                    <span>Datatable</span>
                </a>

            </li>




            <li class='sidebar-title'>Extra UI</li>



            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="user" width="20"></i>
                    <span>Widgets</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="ui-chatbox.html">Chatbox</a>
                    </li>

                    <li>
                        <a href="ui-pricing.html">Pricing</a>
                    </li>

                    <li>
                        <a href="ui-todolist.html">To-do List</a>
                    </li>

                </ul>

            </li>




            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="trending-up" width="20"></i>
                    <span>Charts</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="ui-chart-chartjs.html">ChartJS</a>
                    </li>

                    <li>
                        <a href="ui-chart-apexchart.html">Apexchart</a>
                    </li>

                </ul>

            </li>




            <li class='sidebar-title'>Pages</li>



            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="user" width="20"></i>
                    <span>Authentication</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="auth-login.html">Login</a>
                    </li>

                    <li>
                        <a href="auth-register.html">Register</a>
                    </li>

                    <li>
                        <a href="auth-forgot-password.html">Forgot Password</a>
                    </li>

                </ul>

            </li>




            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="alert-circle" width="20"></i>
                    <span>Errors</span>
                </a>

                <ul class="submenu ">

                    <li>
                        <a href="error-403.html">403</a>
                    </li>

                    <li>
                        <a href="error-404.html">404</a>
                    </li>

                    <li>
                        <a href="error-500.html">500</a>
                    </li>

                </ul>

            </li>




        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>