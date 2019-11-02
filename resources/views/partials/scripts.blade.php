<script src="{{ asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js')}}"></script>
<script src="{{ asset('js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js')}}"></script>

<script src="{{ asset('vendors/moments/moment.min.js')}}"></script>
<script src="{{ asset('vendors/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('vendors/daterangepicker/datetimepicker.js')}}"></script>
<script src="{{ asset('vendors/highchart/highcharts.js')}}"></script>
<script src="{{ asset('vendors/highchart/no-data-to-display.js')}}"></script>
<script src="{{ asset('vendors/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#mydatatable1').DataTable();
    } );
    $(document).ready( function () {
    $('#mydatatable2').DataTable();
    } );
    $(document).ready( function () {
    $('#mydatatable3').DataTable();
    } );

</script>
