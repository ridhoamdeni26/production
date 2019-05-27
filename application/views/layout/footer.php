        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a>Copyright 2018 PT Sentra Usahatama Jaya</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart2.min.js"></script>
    <!-- MorisJS -->
    <!-- morris.js -->
    <script src="<?php echo base_url() ?>assets/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/morris.js/morris.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Date Time Picker Master -->
    <!-- <script src="<?php echo base_url() ?>assets/vendors/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datetimepicker-master/build/jquery.datetimepicker.full.js"> --></script>
    <script src="<?php echo base_url() ?>assets/vendors/datepicker/datetimepicker.js"></script>
    <!-- sweetalert -->
<!--     <script src="<?php echo base_url() ?>assets/vendors/animate.css/sweetalert.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/animate.css/sweetalertjq.js"></script> -->
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>
    <script type="text/javascript">
     $(document).ready(function() {
                var t = $('#myTable').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": true,
                "targets": 0,
                "scrollX": true
            } ],
            "order": [[ 1, 'asc' ]]
        } );
                
                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );
     $(document).ready(function() {
                var t = $('#myTable1').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": true,
                "targets": 0,
                "scrollX": true
            } ],
            "order": [[ 1, 'asc' ]]
        } );
                
                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );

// DatePicker
$('#TRANSACTION_DATE').datetimepicker({
        format: 'YYYY-MM-DD'
    });

$('#DATE').datetimepicker({
        format: 'YYYY-MM-DD'
    });

$(function() {

    var startDate = moment().subtract(29, 'days');
    var endDate = moment();

    function cb(start, end) {
        $('#coba span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#coba').daterangepicker({
        startDate: startDate,
        endDate: endDate,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(startDate, endDate);

    });
    </script>

    <!-- <script type="text/javascript">
        $(function() {

    // Set the default dates, uses sugarjs' methods
    var startDate   = Date.create().addDays(-6),    // 6 days ago
        endDate     = Date.create();                // today

    var range = $('#date');

    // Show the dates in the range input
    range.val(startDate.format('{MM}/{dd}/{yyyy}') + '-' + endDate.format('{MM}/{dd}/{yyyy}'));

    // Load chart
    ajaxLoadChart(startDate,endDate);

    $('#date').daterangepicker({

        startDate: startDate,
        endDate: endDate,

        ranges: {
            'Today': ['today', 'today'],
            'Yesterday': ['yesterday', 'yesterday'],
            'Last 7 Days': [Date.create().addDays(-6), 'today'],
            'Last 30 Days': [Date.create().addDays(-29), 'today']
            // You can add more entries here
        }
    },function(start, end){

        ajaxLoadChart(start, end);

    });
    </script>
 -->