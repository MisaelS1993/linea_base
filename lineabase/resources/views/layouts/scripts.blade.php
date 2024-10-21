    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    @stack('modals')
    @livewireScripts
    <script>
        // Evento para abrir el modal
        window.addEventListener('open-modal', event => {
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                backdrop: 'static',
                keyboard: false
            });
            myModal.show();
        });

        // Evento para cerrar el modal desde el backend de Livewire
        window.addEventListener('close-modal', event => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
            if (myModal) {
                myModal.hide(); // Oculta el modal
            }

            // Asegurarse de que el fondo (backdrop) se elimine
            var backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.remove(); // Elimina el fondo (backdrop) del modal
            }

            // Restablecer el estado del body si quedó bloqueado
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('padding-right');
        });
    </script>