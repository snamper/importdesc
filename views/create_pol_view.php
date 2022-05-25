<?php
$pol_data = $data['pol_data'][0];
$rest_bpm_float = floatval(str_replace(' ', '', str_replace(',', '', str_replace('€ ', '', $pol_data['rest_bpm']))));

// echo '<pre>';
// var_dump($pol_data);
// echo '<pre>';
// exit;
?>


<div class="content" id="createPOView">
    <form id="fileUploadForm"></form>
    <form action="" method="POST" id="createPOLForm" class="listing__form">

        <!-- po_exchange == 1 => get fixed rate from table -->
        <?php if($data['po_data'][0]['po_exchange'] == 1): ?>
        <input type="hidden" id="poCurrencyRate" value="<?php echo $data['po_data'][0]['po_currency_rate']; ?>" disabled>
        <?php else: ?>
        <input type="hidden" id="poCurrency" value="<?php echo $data['po_data'][0]['po_currency']; ?>" disabled>
        <?php endif; ?>
        <input type="hidden" id="poVatPercentage" value="<?php echo $data['po_data'][0]['po_vat_percentage']; ?>" disabled>

        <input type="hidden" id="carVehicleType" value="<?php echo $pol_data['car_vehicle_type']; ?>" disabled>
        <input type="hidden" id="carFuel" value="<?php echo $pol_data['car_fuel']; ?>" disabled>
        <input type="hidden" id="firstRegistrationDate" value="<?php echo $pol_data['cd_first_registration_date']; ?>" disabled>
        <input type="hidden" id="firstNameNLRegistration" value="<?php echo $pol_data['cd_first_name_nl_registration']; ?>" disabled>
        <input type="hidden" id="co2WLTP" value="<?php echo $pol_data['cd_co_wltp']; ?>" disabled>
        <input type="hidden" id="bpmPercentage" value="<?php echo $pol_data['percentage']; ?>" disabled>
        <input type="hidden" id="datumBPM" value="<?php echo $pol_data['huidigedatumbpm']; ?>" disabled>


        <div class="col-xs-12 table-list">
            <div class="row my-4 align-items-start">
                <div class="col-12 col-md-6" style="padding-right: 2%;">
                    <div class="upload-file"><?php echo $_SESSION['lang']['car_start_page_2'] ?>
                        <input form="fileUploadForm" type="file" name="upload_document[]" multiple data-for="line" data-type="doc" data-target="<?php echo $pol_data['pl_id']; ?>" id="uploadFiles">
                    </div>
                </div>
            </div>

            <span class="ti-plus additional-options" id="toggle_nav"></span>

            <div class="custom-row" id="create_nav">

                <div class="custom-col">
                    <button type="submit" name="save_pol" value="<?php echo $pol_data['pl_id']; ?>" class="btn btn-info"><?php echo $_SESSION['lang']['car_start_page_5'] ?></button>
                </div>

            </div>

            <hr />

            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-6">
                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-5">
                            <span class="font-weight-bold">Purchase Order Line - Details</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <button type="button" data-toggle='modal' data-target='#poLines' class="btn btn-primary" style="cursor: pointer;">Add Purchase Order Line</button>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Basing Information</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <?php if($data['prev_pol_id'][0] === null): ?>
                            <a href="" class="btn btn-secondary mr-2 disabled">
                                <
                            </a>
                            <?php else: ?>
                            <a href="<?php echo "create_pol?order_id={$pol_data['pl_purchase_id']}&line={$data['prev_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
                                <
                            </a>
                            <?php endif; ?>
                            
                            <?php if($data['next_pol_id'][0] === null): ?>
                            <a href="" class="btn btn-secondary mr-2 disabled">
                                >
                            </a>
                            <?php else: ?>
                            <a href="<?php echo "create_pol?order_id={$pol_data['pl_purchase_id']}&line={$data['next_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
                                >
                            </a>
                            <?php endif; ?>

                            <?php echo "{$data['current_pol_num'][0]} of {$data['count_pol'][0]}"; ?>
                        </div>
                    </div>

                    <div class="row mt-2"></div>
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>PL ID</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo sprintf("PL%'.07d\n", $pol_data['pl_id']); ?>
                        </div>
                    </div>
                    <div class="row mt-2"></div>

                    <div class="row mt-2"></div>
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Make/Model/Type</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo "{$pol_data['cmake_name']} {$pol_data['cmodel_name']} {$pol_data['cmotor_name']}" ?>
                        </div>
                    </div>
                    <div class="row mt-2"></div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Vehicle ID</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input class="form-control" required type="text" name="po_contact_person" value="<?php echo sprintf("A%'.07d\n", $pol_data['pl_vehicle_id']); ?>" disabled />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>COC</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input class="form-control" type="text" name="po_source_supplier" value="<?php echo $pol_data['cd_coc']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>KM at delivery*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input class="form-control" type="text" name="pl_km_delivery" value="<?php echo $pol_data['pl_km_delivery']; ?>" required />
                        </div>
                    </div>

                    <div class="row" style="height: 20px;">
                        <div class="col-12 col-md-12">
                            <span> </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Additional Information</span>
                        </div>
                        <div class="col-12 col-md-7 text-center">
                            <button type="button" id="togglePolExtraInfo" class="btn btn-primary" style="cursor: pointer;">Expand / Hide Additional Information</button>
                        </div>
                    </div>

                    <div id="polExtraInfo" class="mt-2">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Transport by supplier*</span>
                            </div>
                            <div class="col-12 col-md-7">
                            <select name="pl_transport_by_supplier" class="form-control">
                                    <option value="1" <?php echo ($pol_data['pl_transport_by_supplier'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_transport_by_supplier'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Pick up point</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="text" name="pl_pickup_point" value="<?php echo $pol_data['pl_pickup_point']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected production date</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" style="cursor: pointer;" type="text" name="pl_expected_prod_date" id="expectedProdDate" value="<?php echo $pol_data['pl_expected_prod_date'] ? date('d-m-Y', strtotime($pol_data['pl_expected_prod_date'])) : date('d-m-Y'); ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected lead time first registration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="number" name="pl_expected_lead_time" id="expectedLeadTimeFirstReg" value="<?php echo $pol_data['pl_expected_lead_time']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected registered duration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="number" name="pl_expected_reg_duration" id="expectedRegDuration" value="<?php echo $pol_data['pl_expected_reg_duration']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected delivery date*</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" autocomplete="off" type="text" name="pl_expected_delivery" id="expectedDeliveryDate" value="<?php echo $pol_data['pl_expected_delivery'] ? date('d-m-Y', strtotime($pol_data['pl_expected_delivery'])) : date('d-m-Y'); ?>" readonly />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Accident free</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_accident_free" class="form-control">
                                    <option value="1" <?php echo ($pol_data['pl_accident_free'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_accident_free'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Repaired damage</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_repaired_damage" id="repairedDamage" class="form-control">
                                    <option value="1" <?php echo ($pol_data['pl_repaired_damage'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_repaired_damage'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Repaired damage amount</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="text" name="pl_repaired_damage_amount" id="repairedDamageAmount" data-toggle-currency="true" value="<?php echo $pol_data['pl_repaired_damage_amount']; ?>" <?php echo ($pol_data['pl_repaired_damage'] == 0 ? "readonly" : ""); ?>/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Technical state</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="text" name="pl_technical_state" value="<?php echo $pol_data['pl_technical_state']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Currently damaged</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_currently_damaged" class="form-control">
                                    <option value="1" <?php echo ($pol_data['pl_currently_damaged'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_currently_damaged'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected damage amount</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="text" name="pl_expected_damage_amount" data-toggle-currency="true" value="<?php echo $pol_data['pl_expected_damage_amount']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Extra set of wheels</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_extra_set_of_wheels" class="form-control">
                                    <option value="1" <?php echo ($pol_data['pl_extra_set_of_wheels'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_extra_set_of_wheels'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 documents_container" id="documentsContainer">
                            <p class="container_header">Uploaded documents (POL):</p>
                            <?php
                            $doc_count = count($data['documents'][0]);
                            if($doc_count > 0) {
                                for($i = $doc_count - 1; $i >= 0; $i--) {
                                    echo "<p data-doc-id='{$data['documents'][0][$i]['doc_id']}'><a href='{$data['documents'][0][$i]['doc_path']}'>{$data['documents'][0][$i]['doc_filename']}</a><span class='ti-trash'></span></p>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 notes_container">
                            <p class="container_header">Internal Notes (POL):</p>
                            <textarea><?php echo $pol_data['pl_internal_notes']; ?></textarea>
                        </div>
                    </div>

                    <!-- ./ ROWS  -->
                </div>
                <!-- ./ Left col  -->

                <!-- Rigth col  -->
                <div class="col-12 col-md-6">

                    <!-- Rows  -->
                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <span class="font-weight-bold">Purchase Order Line - Price Calculation</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">

                        </div>
                        <div class="col-12 col-md-2 text-center">
                            EUR
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <?php echo $data['po_data'][0]['po_currency']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase value</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="purchaseValueEur" value="<?php echo $data['converted_values'][0]['purchase_value_eur']; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_purchase_value" id="purchaseValue" data-target="purchaseValueEur" value="<?php echo ($pol_data['pl_purchase_value'] ? str_replace('€ ', '', $pol_data['pl_purchase_value']) : 0); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Fee intermediate supplier</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="feeIntermediateSupplierEur" value="<?php echo $data['converted_values'][0]['fee_intermediate_supplier_eur']; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_fee_intermediate_supplier" id="feeIntermediateSupplier" data-target="feeIntermediateSupplierEur" value="<?php echo ($pol_data['pl_fee_intermediate_supplier'] ? str_replace('€ ', '', $pol_data['pl_fee_intermediate_supplier']) : 0); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Transport costs</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="transportCostEur" value="<?php echo $data['converted_values'][0]['transport_cost_eur']; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_transport_cost" id="transportCost" data-target="transportCostEur" value="<?php echo ($pol_data['pl_transport_cost'] ? str_replace('€ ', '', $pol_data['pl_transport_cost']) : 0); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase price excl. VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="purchasePriceExclVatEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="purchasePriceExclVat" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="vatMarginEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="vatMargin" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase price incl. VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="purchasePriceInclVatEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="purchasePriceInclVat" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Vehicle tax/BPM</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="vehicleTaxBPMEur" value="<?php echo $rest_bpm_float ? $rest_bpm_float : '0.00'; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="vehicleTaxBPM" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase value incl VAT/tax</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="purchaseValueInclVatTaxEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="purchaseValueInclVatTax" value="0.00" readonly>
                        </div>
                    </div>

                </div>
            </div> <!-- Rigth col -->
        </div><!-- ./ Main row 1 -->



    </form>
    <br/>

    <div class="container-fluid">
            <div class="row">
                <div class="table-responsive">
                    <table id="<?php echo "tableShowPoLines" ?>" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
                        <thead>
                            <th class="text-center">PL ID</th>
                            <th class="text-center">Pre-order</th>
                            <th style="white-space: nowrap">Vehicle ID</th>
                            <th style="white-space: nowrap">Make</th>
                            <th style="white-space: nowrap">Model</th>
                            <th style="white-space: nowrap">Variant</th>
                            <th style="white-space: nowrap">Engine</th>
                            <th style="white-space: nowrap">VAT/Margin</th>
                            <th style="white-space: nowrap">Expected delivery date*</th>
                            <th style="white-space: nowrap">VAT deposit</th>
                            <th class="text-center">KM at delivery*</th>
                            <th style="white-space: nowrap">Transport by supplier</th>
                            <th style="white-space: nowrap">Purchase value</th>
                            <th style="white-space: nowrap">Fee int. Supplier</th>
                            <th style="white-space: nowrap">Transport Costs</th>
                            <th style="white-space: nowrap">VAT</th>
                            <th style="white-space: nowrap">Vehicle tax/bpm</th>
                            <th style="white-space: nowrap">Down payment amount</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

</div>

<div class="modal fade" id="poLines" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle">Add Purchase Order Lines</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">

                        <table id="poLinesTable" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
                            <thead>
                                <th class="text-center">Choice</th>
                                <th class="text-center">#</th>
                                <th class="text-center">Vehicle ID*</th>
                                <th style="white-space: nowrap">Car reference (custom)</th>
                                <th style="white-space: nowrap">Duplication Batch ID</th>
                                <th style="white-space: nowrap">Pre-order</th>
                                <th style="white-space: nowrap">VIN</th>
                                <th style="white-space: nowrap">Configuration Number</th>
                                <th style="white-space: nowrap">NL Registration Number</th>
                                <th class="select-filter" style="white-space: nowrap">Make</th>
                                <th class="select-filter" style="white-space: nowrap">Model</th>
                                <th style="white-space: nowrap">Variant</th>
                                <th class="select-filter" style="white-space: nowrap">Engine</th>
                                <th style="white-space: nowrap">Body Style</th>
                                <th class="select-filter" style="white-space: nowrap">Created By</th>
                                <th class="select-filter" class="text-center">Created On</th>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="add_order_lines" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function toggle(source) {
        checkboxes = document.getElementsByClassName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>