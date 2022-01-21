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
                    // if (data[10] == 0 || data[11] == 0) {
                    //     $(row).addClass('redClass');
                    // }
                },
                initComplete: function() {
                    const addMerkButton = document.querySelector(".js-add-merk");
                    addMerkButton.addEventListener("click", addMerk);

                    this.api().columns('.select-filter').every(function() {
                        var column = this;

                        if (column.header().innerText == "Make" || column.header().innerText == "Model" || column.header().innerText == "Motor" || column.header().innerText == "Versie") {
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

                                const url = `${location.origin}/create_make?model_name_versie=${getQueryVal}`;

                                fetch(url)
                                    .then(function(response) {
                                        // When the page is loaded convert it to text
                                        return response.json();
                                    })
                                    .then(function(response) {
                                        fillSelect(response, 4);
                                    })
                                    .catch((error) => {
                                        console.log(error);
                                        return;
                                    });                                    
                        
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

                    function fillGeneration(getQueryVal) {

                        const url = `${location.origin}/create_make?fill_generation=${getQueryVal}`;
                        fetch(url)
                            .then(function(response) {
                                // When the page is loaded convert it to text
                                return response.json();
                            })
                            .then(function(response) {
                                console.log(response);
                                fillSelect(response, triggerIndex);
                            })
                            .catch((error) => {
                                console.log(error);
                                return;
                            });

                    }

                    function fillSelect(jsonData, triggerIndex) {

                        const allSelects = document.querySelectorAll(".js-brand-model-generate");
                        let placeHolder = "";
                        if (!allSelects[triggerIndex]) {
                            return;
                        }

                        allSelects[triggerIndex].innerHTML = "";

                        switch(triggerIndex) {
                            case 1:
                                placeHolder = "Model"
                                break;
                            case 4:
                                placeHolder = "Versie"
                                break;
                            default:
                                placeHolder = "Select.."
                        }

                        let emptyOption = Object.assign(
                            document.createElement("option"), {
                                "text": placeHolder,
                                "value": ""
                            });

                        allSelects[triggerIndex].appendChild(emptyOption);

                        for (let key in jsonData) {
                            if (!jsonData.hasOwnProperty(key)) {
                                continue;
                            }

                            let option = Object.assign(
                                document.createElement("option"), {
                                    "text": jsonData[key].name,
                                    "value": jsonData[key].name,
                                });
                            
                            if(typeof jsonData[key].id_car_make !== "undefined") {
                                option.setAttribute("data-car-brand-id", jsonData[key].id_car_make);
                            }else if(typeof jsonData[key].id_car_model !== "undefined") {
                                option.setAttribute("data-car-model-id",jsonData[key].id_car_model);
                            }else if(typeof jsonData[key].id_car_generation !== "undefined"){
                                option.setAttribute("data-car-generation-id", jsonData[key].id_car_generation);
                            }else if(typeof jsonData[key].id_car_trim !== "undefined") {
                                option.setAttribute("data-car-trim-id", jsonData[key].id_car_trim);
                            }
                            if(triggerIndex == 1) { // ADD MODEL ID ON CHANGE BRAND
                                option.setAttribute("data-car-model-id",jsonData[key].id_car_model);
                            }

                            allSelects[triggerIndex].appendChild(option);

                        }

                        allSelects[triggerIndex].dispatchEvent(new Event('change'));


                        allSelects[triggerIndex].insertBefore(emptyOption, allSelects[triggerIndex].firstChild);

                    }

                }

                function addMerk(e) {

                    const allSelects = document.querySelectorAll(".js-brand-model-generate");
                    for(let select of allSelects) {
                        if(select.value == "") {
                            alert("All selects are required");
                            return;
                        }
                    }

                    const modelSelect = document.querySelector("#Model");
                    const motorSelect = document.querySelector("#Motor");
                    const fuelSelect = document.querySelector("#Fuel");
                    const versieSelect = document.querySelector("#Versie");                    
                    const brandNameSelect = document.querySelector("#Make");


                    const modelID = modelSelect.options[modelSelect.selectedIndex].getAttribute("data-car-brand-id");
                    const brandID = modelSelect.options[modelSelect.selectedIndex].getAttribute("data-car-model-id");
                    const trimID = motorSelect.options[motorSelect.selectedIndex].getAttribute("data-car-trim-id");
                    const fuelID =  fuelSelect.options[fuelSelect.selectedIndex].getAttribute("data-car-fuel-id");
                    const generationID = versieSelect.options[versieSelect.selectedIndex].getAttribute("data-car-generation-id");
                    const generationName = versieSelect.options[versieSelect.selectedIndex].innerText;
                    const fuelName = fuelSelect.options[fuelSelect.selectedIndex].innerText;

                    const dataPost = {
                        'addMotor': trimID,
                        'addFuel': fuelID,
                        'fuelName':fuelName,
                        'brandId': brandID,
                        'modelId': modelID,
                        'versie': generationID,
                        'generationName': generationName
                    }

                    $.ajax({
                        type: "POST",
                        url: `${location.origin}/create_make`,
                        data: dataPost,
                        success: function(data) {
                            console.log(data);
                            // location.reload();

                        },
                        error: function(request, status, error) {
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

        document.getElementById('mark_old_name').value = (oTable366.row(this).data()[1]);
        document.getElementById('edit_mark').value = (oTable366.row(this).data()[9]);
        document.getElementById('model_name_old').value = (oTable366.row(this).data()[2]);
        document.getElementById('edit_model').value = (oTable366.row(this).data()[8]);
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