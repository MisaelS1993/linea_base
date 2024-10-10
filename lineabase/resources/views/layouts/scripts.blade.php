    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('modals')
    @livewireScripts

    <!-- Our project just needs Font Awesome Solid + Brands -->
    <script defer src="{{asset('assets/fontawesome/js/brands.js')}}"></script>
    <script defer src="{{asset('assets/fontawesome/js/solid.js')}}"></script>
    <script defer src="{{asset('assets/fontawesome/js/fontawesome.js')}}"></script>

    <!-- Mask para los controles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>