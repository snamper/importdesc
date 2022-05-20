<?php
$pol_data = $data['pol_data'][0];

// echo '<pre>';
// var_dump($pol_data);
// echo '<pre>';
// exit;
?>


<div class="content" id="createPOView">
    <form action="" method="POST" id="createPOLForm" class="listing__form">
        <input type="hidden" id="poCurrency" value="<?php echo $data['po_data'][0]['po_currency']; ?>" disabled>


        <div class="col-xs-12 table-list">
            <div class="row my-4 align-items-start">
                <div class="col-12 col-md-6" style="padding-right: 2%;">
                    <div class="upload-file"><?php echo $_SESSION['lang']['car_start_page_2'] ?>
                        <input type="file" name="upload_document[]" multiple data-for="line" data-type="doc" data-target="<?php echo $pol_data['pl_id']; ?>" id="uploadFiles">
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
                            <button type="button" name="" class="btn btn-primary">Add Purchase Order Line</button>
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
                            <a href="<?php echo "create_pol?po={$pol_data['pl_purchase_id']}&line={$data['prev_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
                                <
                            </a>
                            <?php endif; ?>
                            
                            <?php if($data['next_pol_id'][0] === null): ?>
                            <a href="" class="btn btn-secondary mr-2 disabled">
                                >
                            </a>
                            <?php else: ?>
                            <a href="<?php echo "create_pol?po={$pol_data['pl_purchase_id']}&line={$data['next_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
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
                            <button type="button" id="togglePolExtraInfo" class="btn btn-primary">Expand / Hide Additional Information</button>
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
                                <input class="form-control" autocomplete="off" type="text" name="pl_expected_prod_date" id="expectedProdDate" value="<?php echo $pol_data['pl_expected_prod_date'] ? date('d-m-Y', strtotime($pol_data['pl_expected_prod_date'])) : date('d-m-Y'); ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected lead time first registration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="number" name="pl_expected_lead_time" value="<?php echo $pol_data['pl_expected_lead_time']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected registered duration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" type="number" name="pl_expected_reg_duration" value="<?php echo $pol_data['pl_expected_reg_duration']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected delivery date*</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input class="form-control" autocomplete="off" type="text" name="pl_expected_delivery" id="expectedDeliveryDate" value="<?php echo $pol_data['pl_expected_delivery'] ? date('d-m-Y', strtotime($pol_data['pl_expected_delivery'])) : date('d-m-Y'); ?>" required />
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
                                <select name="pl_repaired_damage" class="form-control">
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
                                <input class="form-control" type="text" name="pl_repaired_damage_amount" value="<?php echo $pol_data['pl_repaired_damage_amount']; ?>" />
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
                                <input class="form-control" type="text" name="pl_expected_damage_amount" value="<?php echo $pol_data['pl_expected_damage_amount']; ?>" />
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
                            <?php
                            if(count($data['documents'][0]) > 0) {
                                foreach($data['documents'][0] as $doc) {
                                    echo "<p data-doc-id='{$doc['doc_id']}'><a href='{$doc['doc_path']}'>{$doc['doc_filename']}</a><span class='ti-trash'></span></p>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4" style="background: #fff; border: 1px solid #C8C7CC; min-height: 100px; border-radius: 0.25rem;">
                            <p>Internal Notes (POL)</p>
                            <p>Car has damage to rear bumper. In addition, defective window control at the rear right. Damage is calculated on 5-2-2022 at 5,000 euros (Toni).</p>
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
                            <input class="form-control" type="text" name="pl_purchase_price_excl_vat" id="purchasePriceExclVat" value="0" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            -
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_vat_margin" id="vatMargin" value="<?php echo $pol_data['pl_vat_margin'] ?? 0; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            -
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase price incl. VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" name="pl_purchase_price_incl_vat" id="purchasePriceInclVat" value="<?php echo $pol_data['pl_purchase_price_incl_vat'] ?? 0; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            -
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Vehicle tax/BPM</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" name="" value="<?php echo 0; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            -
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase value incl VAT/tax</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" name="pl_purchase_incl_vat_tax" value="<?php echo $pol_data['pl_purchase_incl_vat_tax'] ?? 0; ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            -
                        </div>
                    </div>

                </div>
            </div> <!-- Rigth col -->
        </div><!-- ./ Main row 1 -->



    </form>

</div>
<script>
    function toggle(source) {
        checkboxes = document.getElementsByClassName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>