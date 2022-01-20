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





<script>
    var oTable362 = $('#table_show_car')
        .DataTable({
            "bprocessing": true,
            "bserverSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "./data/data-showcar.php",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'Blfrtip',
        });
</script>
<!-- <script src="assets/js/apps.min.js"></script> -->
<script src="assets/js/main.js"></script>

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
            // 'order': [[1, 'asc']],
            'createdRow': function(row, data, dataIndex) {
                // if (data[7] == 0 || data[8] == 0) {
                //     $(row).addClass('redClass');
                // }
            },
            initComplete: function() {
                const addMotorButton = document.querySelector(".js-add-motor");
                addMotorButton.addEventListener("click", addMotorFuel);

                this.api().columns('.select-filter').every(function() {
                    var column = this;

                    if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor" ) {
                        createSelect();
                    }

                    if(column.header().innerText == "Fuel") {
                        var select = $(`<select class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option value="77">Benzine</option>
                        <option value="78">Diesel</option>
                        <option value="394">Hybride</option>
                        <option value="396">Electrisch</option>
                        <option value="397">LPG</option>
                        <option value="398">Aardgas</option>
                        <option value="399">Alcohol</option>
                        <option value="400">Cryogeen</option>
                        <option value="401">Waterstof</option>
                        </select>`)
                            .appendTo('.dataTables_length')
                    }

                    if(column.header().innerText == "Fuel") {
                        var select = $(`<select class="selecter js-brand-model-generate" id="${column.header().innerText}">
                        <option value="77">Benzine</option>
                        <option value="78">Diesel</option>
                        <option value="394">Hybride</option>
                        <option value="396">Electrisch</option>
                        <option value="397">LPG</option>
                        <option value="398">Aardgas</option>
                        <option value="399">Alcohol</option>
                        <option value="400">Cryogeen</option>
                        <option value="401">Waterstof</option>
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

                const dataGenerators = document.querySelectorAll(".js-brand-model-generate");
                for (let select of dataGenerators) {
                    select.addEventListener("change", changeData);
                }

                function changeData(e) {
                    const trigger = e.currentTarget;
                    const triggerIndex = [...trigger.parentElement.children].indexOf(trigger);
                    let getQueryName = "";
                    let getQueryVal = "";


                    const brandSelect = document.querySelector("#Make");
                    const modelSelect = document.querySelector("#Model");

                    switch (triggerIndex) {
                        case 1:
                            getQueryName = "get_models";
                            getQueryVal = trigger.value;
                            fetchSelectsData(getQueryName, getQueryVal, triggerIndex);
                            break;

                        case 2:
                            getQueryName = "model_name";
                            getQueryVal = trigger.value;
                            fetchSelectsData(getQueryName, getQueryVal, triggerIndex);
                            break;

                        default:
                            // something if anything not match
                    }

                    function fetchSelectsData(getQueryName, getQueryVal, triggerIndex) {

                        if (getQueryVal == "") {
                            return;
                        }

                        const url = `${location.origin}/create_make?${getQueryName}=${getQueryVal}`;
                        fetch(url)
                            .then(function(response) {
                                // When the page is loaded convert it to text
                                return response.json();
                            })
                            .then(function(response) {
                                fillSelect(response, triggerIndex);
                            })
                            .catch((error) => {
                                console.log(error);
                                return;
                            });
                    }

                    function fillSelect(jsonData, triggerIndex) {

                        const allSelects = document.querySelectorAll(".js-brand-model-generate");

                        if (!allSelects[triggerIndex]) {
                            return;
                        }

                        allSelects[triggerIndex].innerHTML = "";

                        for (let key in jsonData) {
                            if (!jsonData.hasOwnProperty(key)) {
                                continue;
                            }

                            let option = Object.assign(
                                document.createElement("option"), {
                                    "text": jsonData[key].name,
                                    "value": jsonData[key].name,
                                });
                                option.setAttribute("data-car-brand-id",jsonData[key].id_car_make);
                                option.setAttribute("data-car-model-id",jsonData[key].id_car_model);

                            allSelects[triggerIndex].appendChild(option);
                            allSelects[triggerIndex].dispatchEvent(new Event('change'));
                        }

                        let emptyOption = Object.assign(
                            document.createElement("option"), {
                                "text": "Model",
                                "value": ""
                            });

                        allSelects[triggerIndex].insertBefore(emptyOption, allSelects[triggerIndex].firstChild);

                    }

                }

                function addMotorFuel(e) {
                    const motorInput = document.querySelector("[name='Motor']");
                    const fuelInput = document.querySelector("[name='Fuel']");
                    const versie = document.querySelector("[name='Versie']");
                    const modelSelect = document.querySelector("#Model");
                    const selectedOption = modelSelect.options[modelSelect.selectedIndex];
                    const brandId = selectedOption.getAttribute("data-car-brand-id");
                    const modelId = selectedOption.getAttribute("data-car-model-id");
                    const brandNameSelect = document.querySelector("#Make");
                    const selectedBrandOption = brandNameSelect.options[brandNameSelect.selectedIndex];

                   if(motorInput.value == "" || fuelInput.value == "" || selectedBrandOption.innerText == "" || versie.value == "") {
                       alert("All inputs are required");
                       return;
                   }
                   
                    const dataPost = {
                            'addMotor': motorInput.value,
                            'addFuel': fuelInput.value,
                            'brandId': brandId,
                            'modelId':modelId,
                            'brandName': selectedBrandOption.innerText,
                            'versie': versie.value
                    }

                    $.ajax({
                            type: "POST",
                            url: `${location.origin}/create_make`,
                            data: dataPost,
                            success: function (data) {
                            location.reload();

                        },
                        error: function (request, status, error) {
                            console.log(error);
                        }
                    });
                }
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
        // HERE 
        // document.getElementById('mark_old_name').value = (oTable366.row(this).data()[1]);
        // document.getElementById('edit_mark').value = (oTable366.row(this).data()[6]);
        // document.getElementById('model_name_old').value = (oTable366.row(this).data()[2]);
        // document.getElementById('edit_model').value = (oTable366.row(this).data()[5]);
        // console.log(oTable366.row(this).data());
    });

    $('#datatable-calculations').on('click', 'tr', function() {
        var selectedcountry = oTable36.row(this).data()[17];
        $('#car_id_to_connect').val(selectedcountry).change();
        document.getElementById('connect_car').value = (oTable36.row(this).data()[0]);
        // console.log(oTable36.row(this).data());
    });




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