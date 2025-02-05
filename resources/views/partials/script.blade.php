<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- DATATABLES -->
<script src="{{ asset('assets/vendor/libs/datatables/bs5/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/bs5/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/bs5/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/bs5/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/bs5/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatablesRowGroup/dataTables.rowGroup.min.js') }}"></script>

<!-- SELECT2 -->
<script src="{{ asset('assets/vendor/libs/select2/js/select2.full.min.js') }}"></script>

<!-- FLATPICKR -->
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.min.js') }}"></script>

{{-- SWEET ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    function toggleButton(buttonId, disable, buttonText) {
        var button = $(buttonId);
        var spinner = button.find('.spinner-border');

        if (disable) {
            button.prop('disabled', true);
            spinner.removeClass('d-none');
            button.text(buttonText);
        } else {
            button.prop('disabled', false);
            spinner.addClass('d-none');
            button.text(buttonText);
        }
    }
</script>
