<!-- Jquery -->
<script src="{{ url('/assets/libraries/jquery/jquery-3.4.1.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ url('/assets/libraries/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/4cbab81093.js" crossorigin="anonymous"></script>

<!-- Xzoom -->
<script src="{{ url('/assets/libraries/xzoom/dist/xzoom.min.js') }}"></script>

<!-- Gijgo -->
<script src="{{ url('/assets/libraries/gijgo/js/gijgo.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('/assets/icon/ic_doe.png') }}">'
            }
        })
    });
</script>