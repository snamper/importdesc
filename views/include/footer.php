

<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/yadcf.js"></script>
<script src="assets/plugins/cookie/js/js.cookie.js"></script>
<script src="assets/plugins/tooltip/popper/popper.min.js"></script>
<script src="assets/plugins/bootstrap/bootstrap4/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/bootstrap4/js/bootstrap-select.min.js"></script>
<script src="assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->


<script src="assets/plugins/table/DataTables/JSZip-3.1.3/jszip.min.js"></script>
<script src="assets/plugins/table/DataTables/pdfmake-0.1.27/build/pdfmake.js"></script>
<script src="assets/plugins/table/DataTables/pdfmake-0.1.27/build/vfs_fonts.js"></script>
<script src="assets/plugins/table/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/table/DataTables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/table/DataTables/AutoFill-2.2.0/js/dataTables.autoFill.min.js"></script>
<script src="assets/plugins/table/DataTables/AutoFill-2.2.0/js/autoFill.bootstrap.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/buttons.colVis.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/buttons.flash.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/buttons.html5.min.js"></script>
<script src="assets/plugins/table/DataTables/Buttons-1.3.1/js/buttons.print.min.js"></script>
<script src="assets/plugins/table/DataTables/ColReorder-1.3.3/js/dataTables.colReorder.min.js"></script>
<script src="assets/plugins/table/DataTables/FixedColumns-3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="assets/plugins/table/DataTables/FixedHeader-3.1.2/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/table/DataTables/KeyTable-2.2.1/js/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/table/DataTables/Responsive-2.1.1/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/table/DataTables/Responsive-2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/table/DataTables/RowGroup-1.0.0/js/dataTables.rowGroup.min.js"></script>
<script src="assets/plugins/table/DataTables/RowReorder-1.2.0/js/dataTables.rowReorder.min.js"></script>
<script src="assets/plugins/table/DataTables/Scroller-1.4.2/js/dataTables.scroller.min.js"></script>
<script src="assets/plugins/table/DataTables/Select-1.2.2/js/dataTables.select.min.js"></script>
<script src="assets/js/page/table-data.demo.min.js"></script>
<script src="assets/js/apps.min.js"></script>



<script src="assets/plugins/form/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/form/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/form/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/form/bootstrap-typeahead/js/bootstrap-typeahead.min.js"></script>
<script src="assets/plugins/form/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="assets/plugins/form/bootstrap-slider/js/bootstrap-slider.min.js"></script>
<script src="assets/plugins/form/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="assets/plugins/form/masked-input/js/masked-input.min.js"></script>
<script src="assets/plugins/form/pwstrength/js/pwstrength.js"></script>
<script src="assets/js/page/form-plugins.demo.min.js"></script>
<script src="assets/js/apps.min.js"></script>


<script src="assets/plugins/chart/chart-js/Chart.min.js"></script>
	<script src="assets/js/page/dashboard.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<script src="assets/js/apps.js"></script>


<!-- ================== BEGIN BASE JS ================== -->



<!-- ================== END BASE JS ================== -->







<!-- <script src="assets/js/apps.min.js"></script> -->
<script src="assets/js/main.js"></script>

  <script>
            
    var oTable366 = $('#datatables-makemodel')
    .DataTable({
        "bprocessing": true,
        "bserverSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "./data/data-makemodel.php",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [
		    { "width": "5%", "targets": 4 },
		    { "width": "5%", "targets": 3 }
		  ],
        select: true,
        dom: 'Blfrtip',
        // 'order': [[1, 'asc']],
         initComplete: function () {
            this.api().columns('.select-filter').every( function () {
                var column = this;
                var select = $('<select class="selecter" id="'+ column.header().innerText+'"><option value="">'+column.header().innerText+'</option></select>')
                    .appendTo( '.dataTables_length' )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                
                column.data().unique().sort().each( function ( d, j ) {
                    if (d != null) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );

                    }
                } );
           }  );
        },   
       
            // select: true,
    });


	$('#datatables-makemodel').on( 'click','tr', function () {
		console.log(oTable366.row( this ).data());
	} );
        </script>




