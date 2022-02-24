<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/yadcf.js"></script>
<script src="assets/plugins/cookie/js/js.cookie.js"></script>
<script src="assets/plugins/tooltip/popper/popper.min.js"></script>
<script src="assets/plugins/bootstrap/bootstrap4/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/bootstrap4/js/bootstrap-select.min.js"></script>
<script src="assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
<script src="assets/js/apps.js"></script>



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

<script src="assets/js/main.js"></script>

<!-- ================== END BASE JS ================== -->





<script>
    var oTable362 = $('#table_show_car')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-showcar.php",
            stateSave: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'Blfrtip',
            lengthChange: true,
            buttons: [{
                    extend: 'colvis',
                    text: "Grid View"

                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    text: 'PDF/Print',
                    action: function(e, dt, node, config) {
                        const content = document.querySelector("#table_show_car").parentElement.innerHTML;
                        const cssURL = document.querySelector("#styleMinCss").getAttribute("href");
                        const cssURL2 = document.querySelector("#styleBoostrap").getAttribute("href");
                        const popupWin = window.open('', '_blank', 'width=1100,height=600');
                        popupWin.document.open();
                        popupWin.document.write(`
                            <html> 
                            <head>
                                <link rel="stylesheet" href="${cssURL}" media="all">
                                <link rel="stylesheet" href="${cssURL2}" media="all">
                                <style type="text/css">                             
                                    table {
                                    break-inside: avoid;
                                    }
                                    @page { size: landscape; }
                                    .dt-buttons,
                                    #table_show_car_length,
                                    #table_show_car_filter
                                     {
                                        display:none;
                                    }

                                    #table_show_car {
                                        max-width: 100%;
                                    }
                                </style>
                            </head>
                            <body onload="window.print()">
                                ${content}
                            </body>
                            </html>`);
                        popupWin.document.close();
                    }
                },
            ],
            /* initComplete: function () {
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
        }, */
        });


    // Purchase Orders 

    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    let pOrderId = parameters.get('order_id');

    if (!pOrderId) {
        pOrderIdEl = document.querySelector("[name='update_order']");
        if (pOrderIdEl) {
            pOrderId = pOrderIdEl.value;
        }
    }

    if (!pOrderId) {
        pOrderId = "";
    }


    var oTable401 = $('#poLinesTable')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": `./data/data-purchase-show-cars-lines.php`,
            stateSave: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],

            initComplete: function() {

                document.querySelector("[type='search']").style = "min-width:150px";

            }

        });

    var oTable402 = $('#tableShowPoLines')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": `./data/data-purchase-show-lines.php?order_id=${pOrderId}`,
            stateSave: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],

            initComplete: function() {
                document.querySelector("[type='search']").style = "min-width:150px";

                const elToGetIds = document.querySelectorAll("[data-line-id]");

                for (let el of elToGetIds) {
                    const elDataId = el.getAttribute("data-line-id");
                    document.querySelector(`[data-check-line='${elDataId}']`).closest("tr").remove();
                }

                editableTable();
            }
        });

</script>
<!-- <script src="assets/js/apps.min.js"></script> -->

<script>
    var oTable366 = $('#datatables-makemodel')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-makemodel.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            stateSave: true,
            select: false,
            dom: 'Blfrtip',
            "columnDefs": [{
                "width": "8px",
                "targets": 0
            }],
            // 'order': [[1, 'asc']],
            // 'createdRow': function(row, data, dataIndex) {
            //     if (data[0] == 0 || data[1] == 0) {
            //         $(row).addClass('redClass');
            //     }
            // },
            initComplete: function() {

                this.api().columns('.select-filter').every(function() {
                    var column = this;

                    if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor") {
                        createSelect();
                    }

                    if (column.header().innerText == "Fuel") {
                        var select = $(`<select name='Fuel' class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option data-car-fuel-id="77" value="Benzine">Benzine</option>
                        <option data-car-fuel-id="78" value="Diesel">Diesel</option>
                        <option data-car-fuel-id="394" value="Hybride">Hybride</option>
                        <option data-car-fuel-id="396" value="Electrisch">Electrisch</option>
                        <option data-car-fuel-id="397" value="LPG">LPG</option>
                        <option data-car-fuel-id="398" value="Aardgas">Aardgas</option>
                        <option data-car-fuel-id="399" value="Alcohol">Alcohol</option>
                        <option data-car-fuel-id="400" value="Cryogeen">Cryogeen</option>
                        <option data-car-fuel-id="401" value="Waterstof">Waterstof</option>
                        </select>`)
                            .appendTo('.dataTables_length')
                    }


                    function createSelect() {
                        var select = $('<select class="selecter js-brand-model-generate" id="' + column.header().innerText + '"><option value="">' + column.header().innerText + '</option></select>')
                            .appendTo('.dataTables_length')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            if (d != null) {
                                select.append('<option value="' + d + '">' + d + '</option>');

                            }
                        });
                    }

                });
            },

            // select: true,
        });

    var oTable367 = $('#datatables-makemodel-models')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-makemodel-models.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            select: false,
            stateSave: true,
            dom: 'Blfrtip',
            "columnDefs": [{
                "width": "8px",
                "targets": 0
            }],
            initComplete: function() {
                this.api().columns('.select-filter').every(function() {
                    var column = this;

                    if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor") {
                        createSelect();
                    }

                    if (column.header().innerText == "Fuel") {
                        var select = $(`<select name='Fuel' class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option data-car-fuel-id="77" value="Benzine">Benzine</option>
                        <option data-car-fuel-id="78" value="Diesel">Diesel</option>
                        <option data-car-fuel-id="394" value="Hybride">Hybride</option>
                        <option data-car-fuel-id="396" value="Electrisch">Electrisch</option>
                        <option data-car-fuel-id="397" value="LPG">LPG</option>
                        <option data-car-fuel-id="398" value="Aardgas">Aardgas</option>
                        <option data-car-fuel-id="399" value="Alcohol">Alcohol</option>
                        <option data-car-fuel-id="400" value="Cryogeen">Cryogeen</option>
                        <option data-car-fuel-id="401" value="Waterstof">Waterstof</option>
                        </select>`)
                            .appendTo('.dataTables_length')
                    }


                    function createSelect() {
                        var select = $('<select class="selecter js-brand-model-generate" id="' + column.header().innerText + '"><option value="">' + column.header().innerText + '</option></select>')
                            .appendTo('.dataTables_length')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            if (d != null) {
                                select.append('<option value="' + d + '">' + d + '</option>');

                            }
                        });
                    }

                });
            },

            // select: true,
        });


    var oTable368 = $('#datatables-makemodel-motors')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-makemodel-motors.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            select: false,
            dom: 'Blfrtip',
            stateSave: true,
            "columnDefs": [{
                "width": "8px",
                "targets": 0
            }],
            // 'order': [[1, 'asc']],
            // 'createdRow': function(row, data, dataIndex) {
            //     if (data[0] == 0 || data[1] == 0) {
            //         $(row).addClass('redClass');
            //     }
            // },
            initComplete: function() {
                // const addMerkButton = document.querySelector(".js-add-merk");
                // addMerkButton.addEventListener("click", addMerk);

                this.api().columns('.select-filter').every(function() {
                    var column = this;

                    if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor") {
                        // createSelect();
                    }

                    if (column.header().innerText == "Fuel") {
                        var select = $(`<select name='Fuel' class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option data-car-fuel-id="77" value="Benzine">Benzine</option>
                        <option data-car-fuel-id="78" value="Diesel">Diesel</option>
                        <option data-car-fuel-id="394" value="Hybride">Hybride</option>
                        <option data-car-fuel-id="396" value="Electrisch">Electrisch</option>
                        <option data-car-fuel-id="397" value="LPG">LPG</option>
                        <option data-car-fuel-id="398" value="Aardgas">Aardgas</option>
                        <option data-car-fuel-id="399" value="Alcohol">Alcohol</option>
                        <option data-car-fuel-id="400" value="Cryogeen">Cryogeen</option>
                        <option data-car-fuel-id="401" value="Waterstof">Waterstof</option>
                        </select>`)
                            .appendTo('.dataTables_length')
                    }


                    function createSelect() {
                        var select = $('<select class="selecter js-brand-model-generate" id="' + column.header().innerText + '"><option value="">' + column.header().innerText + '</option></select>')
                            .appendTo('.dataTables_length')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            if (d != null) {
                                select.append('<option value="' + d + '">' + d + '</option>');

                            }
                        });
                    }

                });
            },

            // select: true,
        });


    var oTable369 = $('#datatables-makemodel-uitvoering')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-makemodel-uitvoering.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            select: false,
            dom: 'Blfrtip',
            stateSave: true,
            "columnDefs": [{
                "width": "8px",
                "targets": 0
            }],
            // 'order': [[1, 'asc']],
            // 'createdRow': function(row, data, dataIndex) {
            //     if (data[0] == 0 || data[1] == 0) {
            //         $(row).addClass('redClass');
            //     }
            // },
            initComplete: function() {
                // const addMerkButton = document.querySelector(".js-add-merk");
                // addMerkButton.addEventListener("click", addMerk);

                this.api().columns('.select-filter').every(function() {
                    var column = this;

                    if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor") {
                        // createSelect();
                    }

                    if (column.header().innerText == "Fuel") {
                        var select = $(`<select name='Fuel' class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option data-car-fuel-id="77" value="Benzine">Benzine</option>
                        <option data-car-fuel-id="78" value="Diesel">Diesel</option>
                        <option data-car-fuel-id="394" value="Hybride">Hybride</option>
                        <option data-car-fuel-id="396" value="Electrisch">Electrisch</option>
                        <option data-car-fuel-id="397" value="LPG">LPG</option>
                        <option data-car-fuel-id="398" value="Aardgas">Aardgas</option>
                        <option data-car-fuel-id="399" value="Alcohol">Alcohol</option>
                        <option data-car-fuel-id="400" value="Cryogeen">Cryogeen</option>
                        <option data-car-fuel-id="401" value="Waterstof">Waterstof</option>
                        </select>`)
                            .appendTo('.dataTables_length')
                    }


                    function createSelect() {
                        var select = $('<select class="selecter js-brand-model-generate" id="' + column.header().innerText + '"><option value="">' + column.header().innerText + '</option></select>')
                            .appendTo('.dataTables_length')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            if (d != null) {
                                select.append('<option value="' + d + '">' + d + '</option>');

                            }
                        });
                    }

                });
            },

            // select: true,
        });



    var oTable36 = $('#datatable-calculations')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-calculations.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                    "width": "5%",
                    "targets": 4
                },
                {
                    "width": "5%",
                    "targets": 3
                }
            ],
            select: false,
            dom: 'Blfrtip',
            'createdRow': function(row, data, dataIndex) {
                if (data[18] == 0) {
                    $(row).addClass('redClass');
                }
            },
            // 'order': [[1, 'asc']],
        });


    var oTable3 = $('#datatable-inside')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-insidecar.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                    "width": "5%",
                    "targets": 4
                },
                {
                    "width": "5%",
                    "targets": 3
                }
            ],
            select: false,
            dom: 'Blfrtip',
            'createdRow': function(row, data, dataIndex) {
                if (data[18] == 0) {
                    $(row).addClass('redClass');
                }
            },
            // 'order': [[1, 'asc']],
        });


    $('#datatables-makemodel').on('click', 'tr', function() {

        document.getElementById('mark_old_name').value = (oTable366.row(this).data()[1]);
        document.getElementById('editMake').value = (oTable366.row(this).data()[3]);
        console.log(oTable366.row(this).data());
    });

    $('#datatables-makemodel-models').on('click', 'tr', function() {

        document.getElementById('model_name_old').value = (oTable367.row(this).data()[2]);
        document.getElementById('edit_model').value = (oTable367.row(this).data()[4]);
        console.log(oTable367.row(this).data());
    });

    $('#datatable-calculations').on('click', 'tr', function() {
        var selectedcountry = oTable36.row(this).data()[17];
        $('#car_id_to_connect').val(selectedcountry).change();
        document.getElementById('connect_car').value = (oTable36.row(this).data()[0]);
        // console.log(oTable36.row(this).data());
    });
    $('.selectpicker').selectpicker();



    $('#car_id_to_connect').select2({
        allowClear: false,
        maximumSelectionLength: 999,
        closeOnSelect: false,
        placeholder: "Изберете",
        allowClear: true,
        width: '100%',
        templateResult: function(data, container) {
            if (data.element) {
                $(container).addClass($(data.element).attr("select2class"));
            }
            return data.text;
        }
    });



    setTimeout(() => {
        if ($(".dataTables_empty").length) {
            $("#datatable-inside_wrapper").addClass("hidden");
        }
    }, 600);
</script>