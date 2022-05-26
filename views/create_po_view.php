<?php
$po_data = $data['purch_order'][0];
$data['poSums'] = $data['poSums'][0];
$pol_data = $data['pol_data'][0];
$rest_bpm_float = floatval(str_replace(' ', '', str_replace(',', '', str_replace('€ ', '', $pol_data['rest_bpm']))));
$has_pol = count($pol_data) > 0;
$disable_po = ($po_data['po_status'] == 2) ? 'disabled' : '';
$disable_pl = ($po_data['po_status'] == 2 || !$has_pol) ? 'disabled' : '';
?>

<div class="content" id="createPOView">
    <form id="fileUploadForm"></form>
    <form action="<?php echo "create_po?order_id={$_REQUEST['order_id']}&line=" . ($_REQUEST['line'] ?? 0); ?>" action="create_po" method="POST" id="createPOForm" class="listing__form">
        <?php
        if (!empty($data['purchase_lines'])) {
            foreach ($data['purchase_lines'][0] as $line) {
                echo "<input name='purchase_lines[]' type='hidden' value='$line' />";
            }
        }
        ?>

        <div class="col-xs-12 table-list">
            <div class="row my-4 align-items-start">
                <div class="col-12 col-md-6" style="padding-right: 2%;">
                    <div class="upload-file"><?php echo $_SESSION['lang']['car_start_page_2'] ?>
                        <input <?php echo $disable_po; ?> form="fileUploadForm" type="file" name="upload_document[]" multiple data-for="order" data-type="doc" data-target="<?php echo $po_data['po_id']; ?>" id="uploadFiles">
                    </div>
                </div>
                <div class="col-12 col-md-4 text-right">
                    <?php echo "Status: " . (empty($po_data['status_label']) ? "New" : $_SESSION['lang'][$po_data['status_label']]); ?>
                </div>
            </div>

            <?php
            if (isset($_GET['order_id'])) {
                echo "<input type='hidden' name='order_id' value='{$_GET['order_id']}'>";
            }
            ?>

            <span class="ti-plus additional-options" id="toggle_nav"></span>

            <div class="custom-row" id="create_nav">

                <?php if (!isset($_GET['order_id']) || empty($_GET['order_id']) || !$_GET['order_id']) : ?>
                    <div class="custom-col">
                        <a href="/create_po" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" class="btn btn-primary" value="1">Save</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" value="3" class="btn btn-primary">Save and Submit</button>
                    </div>
                <?php endif; ?>

                <?php if ($po_data['po_status'] == 1) : ?>
                    <div class="custom-col">
                        <button type="submit" name="delete_order" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" class="btn btn-primary" value="1">Save</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" class="btn btn-primary" value="2">Save as Concept</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" value="3" class="btn btn-primary">Save and Submit</button>
                    </div>
                <?php elseif ($po_data['po_status'] == 2) : ?>
                    <div class="custom-col">
                        <button type="submit" name="delete_order" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="save_order">Save</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="save_order" value="3" class="btn btn-primary">Save and Submit</button>
                    </div>
                <?php elseif ($po_data['po_status'] == 3) : ?>
                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_status" value="5">Reject</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_status" value="4">Approve</button>
                    </div>
                <?php elseif ($po_data['po_status'] == 5) : ?>
                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_status" value="2">Store as Concept</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-warning" name="update_status" value="6">Archive</button>
                    </div>
                <?php elseif ($po_data['po_status'] == 6) : ?>
                    <div class="custom-col">
                        <button type="submit" name="delete_order" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_status" value="2">Store as Concept</button>
                    </div>
                <?php endif; ?>

            </div>

            <hr />

            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-6">
                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-5">
                            <span class="font-weight-bold">Summary Information</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Purchase order number</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input disabled class="form-control" type="text" name="po_number" value="<?php echo (empty($po_data['po_number']) ? 0 : $po_data['po_number']); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Custom PO Reference</span>
                        </div>
                        <div class="col-12 col-md-7">

                            <input <?php echo $disable_po; ?> class="form-control" type="text" name="po_reference" value="<?php echo $po_data['po_reference']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Date Final Contract</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> class="form-control" id="datepicker2" autocomplete="false" required type="text" name="po_date" value="<?php echo (empty($po_data['po_date']) ? date('d-m-Y') : date('d-m-Y', strtotime($po_data['po_date']))); ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Supplier*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <select class="form-control" name="po_supplier" <?php echo $disable_po; ?>>
                                <?php
                                foreach ($data['suppliers_list'][0] as $supplier) {
                                    echo "<option value='{$supplier['organisatie_afas_table_ID']}' " . ($po_data['po_supplier'] == $supplier['organisatie_afas_table_ID'] ? "selected" : "") . ">{$supplier['Name_afas']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Contact person supplier*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> class="form-control" required type="text" name="po_contact_person" value="<?php echo $po_data['po_contact_person']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Intermediary</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> class="form-control" required type="text" name="po_intermediary_supplier" value="<?php echo $po_data['po_intermediary_supplier']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Contact person Intermediary*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> class="form-control" required type="text" name="po_contact_person" value="<?php echo $po_data['po_contact_person']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Purchasing entity*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> required class="form-control" required type="text" name="po_purchasing_entity" value="<?php echo $po_data['po_purchasing_entity']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>Buyer*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> required class="form-control" required type="text" name="po_buyer" value="<?php echo $po_data['po_buyer']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>External order number</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_po; ?> class="form-control" type="number" name="po_external_order_number" value="<?php echo (empty($po_data['po_external_order_number']) ? 0 : $po_data['po_external_order_number']); ?>" />
                        </div>
                    </div>

                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-5">
                            <span class="font-weight-bold">Internal Information</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            Created by
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo empty($po_data['created_by_name']) ? '-' : "{$po_data['created_by_name']} ({$po_data['po_created_at']})"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            Last edited by
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo empty($po_data['updated_by_username']) ? '-' : "{$po_data['updated_by_username']} ({$po_data['po_updated_at']})"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            Last Submitted by
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo empty($po_data['last_submitted_by']) ? '-' : "{$po_data['last_submitted_by']} ({$po_data['po_submitted_at']})"; ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-5">
                            Approved by
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo empty($po_data['approved_by']) ? '-' : "{$po_data['approved_by']} ({$po_data['po_approved_at']})"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            Rejected By
                        </div>
                        <div class="col-12 col-md-7">
                            <?php echo empty($po_data['rejected_by']) ? '-' : "{$po_data['rejected_by']} ({$po_data['po_rejected_at']})"; ?>
                        </div>
                    </div>


                    <br />

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 documents_container" data-documents-container data-sort="order">
                            <p class="container_header">Uploaded documents (PO):</p>
                            <?php
                            $doc_count = count($data['po_documents'][0]);
                            if ($doc_count > 0) {
                                for ($i = $doc_count - 1; $i >= 0; $i--) {
                                    echo "<p data-doc-id='{$data['po_documents'][0][$i]['doc_id']}'><a href='{$data['po_documents'][0][$i]['doc_path']}'>{$data['po_documents'][0][$i]['doc_filename']}</a><span class='ti-trash'></span></p>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 notes_container">
                            <p class="container_header"><?php echo $_SESSION['lang']['car_start_page_89']; ?>:</p>
                            <textarea name="po_remarks" <?php echo $disable_po; ?>><?php echo $po_data['po_remarks'] ?? ""; ?></textarea>
                        </div>
                    </div>

                    <br />
                    <div class="row">
                        <div class="col-12 col-md-5">

                            <div class="row mt-3"></div>


                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Number of vehicles</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <span><?php echo (isset($_REQUEST['order_id']) ? $data['poSums']['total_lines'] : count($data['purchase_lines'][0])) ?></span>
                                    <input type="hidden" name="po_number_vehicles" value="<?php echo (isset($_REQUEST['order_id']) ? $data['poSums']['total_lines'] : count($data['purchase_lines'][0])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ./ Left col  -->

                <!-- Rigth col  -->

                <div class="col-12 col-md-6">
                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-6">
                            <span class="font-weight-bold">Payment Terms</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Invoice, from (suppl. - interm.)</span>
                        </div>
                        <div class="col-12 col-md-4">

                            <select class="form-control" name="po_invoice" id="po_invoice" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <option value="1" <?php echo $po_data['po_invoice'] == 1 ? 'selected' : '' ?>>Supplier
                                </option>
                                <option value="2" <?php echo $po_data['po_invoice'] == 2 ? 'selected' : '' ?>>Intermediary</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Payment in Currency*</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <select required class="form-control" name="po_currency" id="poCurrency" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <?php foreach ($data['all_currencies'][0] as $curr) : ?>
                                    <option value="<?php echo $curr['code']; ?>" <?php echo $po_data['po_currency'] == $curr['code'] ? 'selected' : '' ?>><?php echo $curr['code']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase Type*</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <select required class="form-control" name="po_purchase_type" id="poPurchaseType" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <option value="1" <?php echo $po_data['po_purchase_type'] == 1 ? 'selected' : '' ?>>EU
                                </option>
                                <option value="2" <?php echo $po_data['po_purchase_type'] == 2 ? 'selected' : '' ?>>
                                    DOM</option>
                                <option value="3" <?php echo $po_data['po_purchase_type'] == 3 ? 'selected' : '' ?>>
                                    ROW</option>
                            </select>
                        </div>
                    </div>


                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-6">
                            <span class="font-weight-bold">VAT Deposit</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>VAT Deposit</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <select class="form-control" name="po_vat_deposit" id="poVatDeposit" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <option value="1" <?php echo $po_data['po_vat_deposit'] == 1 ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="2" <?php echo $po_data['po_vat_deposit'] == 2 ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>VAT Percentage</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <select class="form-control" name="po_vat_percentage" id="poVatPercentage" class="col-12 col-md-12" <?php echo ($po_data['po_vat_deposit'] == 2) ? "disabled" : $disable_po; ?>>
                                <?php
                                $percentage = isset($po_data['po_vat_percentage']) ? $po_data['po_vat_percentage'] : 21;

                                for ($i = 17; $i <= 27; $i++) {
                                    if ($percentage == $i) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }

                                    echo "<option $selected value='$i'>$i%</option>";
                                }
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-6">
                            <span class="font-weight-bold">Downpayment</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Down payment</span>
                        </div>
                        <div class="col-12 col-md-4">

                            <select class="form-control" name="po_down_payment" id="poDownPayment" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <option value="1" <?php echo $po_data['po_down_payment'] == 1 ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="2" <?php echo $po_data['po_down_payment'] == 2 ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Down payment amount</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <input class="form-control" <?php echo($po_data['po_down_payment'] == 2) ? "disabled" : $disable_po; ?> type="text" id="poDownPaymentAmount" name="po_down_payment_amount" value="<?php echo $po_data['po_down_payment_amount']; ?>" />
                        </div>
                    </div>



                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-6">
                            <span class="font-weight-bold">PO Financial</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Fixed / Live Exchange</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <select class="form-control" name="po_exchange" id="poCurrenyRate" class="col-12 col-md-12" <?php echo $disable_po; ?>>
                                <option value="1" <?php echo  $po_data['po_exchange'] == 1 ? 'selected' : '' ?>>Fixed</option>
                                <option value="2" <?php echo  $po_data['po_exchange'] == 2 ? 'selected' : '' ?>>Live</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Currency Rate</span>
                        </div>
                        <div class="col-12 col-md-4">

                            <input class="form-control" <?php echo ($po_data['po_exchange'] == 2) ? "disabled" : $disable_po; ?> type="text" id="poCurrencyRate" name="po_currency_rate" value="<?php echo $po_data['po_currency_rate']; ?>" />
                        </div>
                    </div>
                    </br>
                    <br />


                    <div class="row">
                        <div class="col-12 col-md-6">

                        </div>
                        <div class="col-12 col-md-2 text-center">
                            EUR
                        </div>
                        <div class="col-12 col-md-2 text-center" data-currency-text>
                            <?php echo (empty($po_data['po_currency']) ? "AED" : $po_data['po_currency']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total Purchase Amount</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="totalPurchaseValueEur" value="<?php echo number_format($data['po_converted_values'][0]['total_purchase_value_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="total_purchase_value" id="totalPurchaseValue" data-target="totalPurchaseValueEur" value="<?php echo ($data['poSums']['total_purchase_value'] ? str_replace('€ ', '', $data['poSums']['total_purchase_value']) : '0.00'); ?>" readonly>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total fee intermediate supplier</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="totalFeeIntermediateSupplierEur" value="<?php echo number_format($data['po_converted_values'][0]['total_fee_intermediate_supplier_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="total_fee_intermediate_supplier" id="totalFeeIntermediateSupplier" data-target="totalFeeIntermediateSupplierEur" value="<?php echo ($data['poSums']['total_fee_intermediate_supplier'] ? str_replace('€ ', '', $data['poSums']['total_fee_intermediate_supplier']) : '0.00'); ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total transport costs</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="totaltransportCostEur" value="<?php echo number_format($data['po_converted_values'][0]['total_transport_cost_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="total_transport_cost" id="totalTransportCost" data-target="totaltransportCostEur" value="<?php echo ($data['poSums']['total_transport_cost'] ? str_replace('€ ', '', $data['poSums']['total_transport_cost']) : '0.00'); ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total purchase price excl. VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_purchase_price_excl_vat" id="totalPurchasePriceExclVatEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_purchase_price_excl_vat" id="totalPurchasePriceExclVat" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_vat_margin" id="totalVatEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" name="pl_vat_margin" id="totalVat" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total Purchase price incl. VAT</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" name="pl_purchase_price_incl_vat" id="totalPurchasePriceInclVatEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" name="pl_purchase_price_incl_vat" id="totalPurchasePriceInclVat" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total Vehicle tax/BPM</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="totalVehicleTaxBPM" value="<?php echo number_format($data['poSums']['total_vehicle_bpm'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="totalVehicleTaxBPM" value="<?php echo number_format($data['po_converted_values'][0]['total_vehicle_bpm_converted'], 2); ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total Purchase value incl VAT/tax</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalPurchaseValueInclVatTaxEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalPurchaseValueInclVatTax" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total Down Payment Amount</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalDownPaymentAmountEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalDownPaymentAmount" value="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Total VAT Deposit</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalVatDepositEur" value="0.00" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="number" id="totalVatDeposit" value="0.00" readonly>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row mt-4"></div>

        </div><!-- ./ ROW  -->

        <hr />

        <!-- Start POLine Form -->
        <input type="hidden" id="poLineId" name="save_pol" value="<?php echo $pol_data['pl_id']; ?>" disabled>
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
                        <input <?php echo $disable_pl; ?> form="fileUploadForm" type="file" name="upload_document[]" multiple data-for="line" data-type="doc" data-target="<?php echo $pol_data['pl_id']; ?>" id="uploadFiles">
                    </div>
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
                            <?php if ($data['prev_pol_id'][0] === null) : ?>
                                <button type="submit" name="save_order" class="btn btn-secondary mr-2 disabled" onclick="event.preventDefault()">
                                    <
                                </button>
                                <?php else : ?>
                                <button type="submit" name="save_order" formaction="<?php echo "create_po?order_id={$pol_data['pl_purchase_id']}&line={$data['prev_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
                                    <
                                </button>
                                <?php endif; ?>

                                <?php if ($data['next_pol_id'][0] === null) : ?>
                                    <button type="submit" name="save_order" class="btn btn-secondary mr-2 disabled" onclick="event.preventDefault()">
                                        >
                                    </button>
                                <?php else : ?>
                                    <button type="submit" name="save_order" formaction="<?php echo "create_po?order_id={$pol_data['pl_purchase_id']}&line={$data['next_pol_id'][0]}"; ?>" class="btn btn-primary mr-2">
                                        >
                                    </button>
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
                            <input class="form-control" <?php echo $has_pol ? 'required' : ''; ?> type="text" name="po_contact_person" value="<?php echo sprintf("A%'.07d\n", $pol_data['pl_vehicle_id']); ?>" disabled />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>COC</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_pl; ?> class="form-control" type="text" name="po_source_supplier" value="<?php echo $pol_data['cd_coc']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <span>KM at delivery*</span>
                        </div>
                        <div class="col-12 col-md-7">
                            <input <?php echo $disable_pl; ?> class="form-control" <?php echo $has_pol ? 'required' : ''; ?> type="text" name="pl_km_delivery" value="<?php echo $pol_data['pl_km_delivery']; ?>" />
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
                                <select name="pl_transport_by_supplier" class="form-control" <?php echo $disable_pl; ?>>
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
                                <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_pickup_point" value="<?php echo $pol_data['pl_pickup_point']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected production date</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input <?php echo $disable_pl; ?> class="form-control" style="cursor: pointer;" type="text" name="pl_expected_prod_date" id="expectedProdDate" value="<?php echo $pol_data['pl_expected_prod_date'] ? date('d-m-Y', strtotime($pol_data['pl_expected_prod_date'])) : date('d-m-Y'); ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected lead time first registration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input <?php echo $disable_pl; ?> class="form-control" type="number" name="pl_expected_lead_time" id="expectedLeadTimeFirstReg" value="<?php echo $pol_data['pl_expected_lead_time']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Expected registered duration in weeks</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input <?php echo $disable_pl; ?> class="form-control" type="number" name="pl_expected_reg_duration" id="expectedRegDuration" value="<?php echo $pol_data['pl_expected_reg_duration']; ?>" />
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
                                <select name="pl_accident_free" class="form-control" <?php echo $disable_pl; ?>>
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
                                <select name="pl_repaired_damage" id="repairedDamage" class="form-control" <?php echo $disable_pl; ?>>
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
                                <input class="form-control" type="text" name="pl_repaired_damage_amount" id="repairedDamageAmount" data-toggle-currency="true" value="<?php echo $pol_data['pl_repaired_damage_amount']; ?>" <?php echo ($pol_data['pl_repaired_damage'] == 0 ? "readonly" : $disable_pl); ?> />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Technical state</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_technical_state" value="<?php echo $pol_data['pl_technical_state']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Currently damaged</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_currently_damaged" class="form-control" <?php echo $disable_pl; ?>>
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
                                <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_expected_damage_amount" data-toggle-currency="true" value="<?php echo $pol_data['pl_expected_damage_amount']; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <span>Extra set of wheels</span>
                            </div>
                            <div class="col-12 col-md-7">
                                <select name="pl_extra_set_of_wheels" class="form-control" <?php echo $disable_pl; ?>>
                                    <option value="1" <?php echo ($pol_data['pl_extra_set_of_wheels'] == 1) ? "selected" : ""; ?>>Yes</option>
                                    <option value="0" <?php echo ($pol_data['pl_extra_set_of_wheels'] == 0) ? "selected" : ""; ?>>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 documents_container" data-documents-container data-sort="line">
                            <p class="container_header">Uploaded documents (POL):</p>
                            <?php
                            $doc_count = count($data['line_documents'][0]);
                            if ($doc_count > 0) {
                                for ($i = $doc_count - 1; $i >= 0; $i--) {
                                    echo "<p data-doc-id='{$data['line_documents'][0][$i]['doc_id']}'><a href='{$data['line_documents'][0][$i]['doc_path']}'>{$data['line_documents'][0][$i]['doc_filename']}</a><span class='ti-trash'></span></p>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row" style="padding: 0 0.35rem;">
                        <div class="col-12 col-md-12 mt-4 notes_container">
                            <p class="container_header">Internal Notes (POL):</p>
                            <textarea <?php echo $disable_pl; ?> name="pl_internal_notes"><?php echo $pol_data['pl_internal_notes']; ?></textarea>
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
                        <div class="col-12 col-md-2 text-center" data-currency-text>
                            <?php echo (empty($po_data['po_currency']) ? "AED" : $po_data['po_currency']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Purchase value</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="purchaseValueEur" value="<?php echo number_format($data['pl_converted_values'][0]['purchase_value_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_purchase_value" id="purchaseValue" data-target="purchaseValueEur" old-value="<?php echo ($pol_data['pl_purchase_value'] ? str_replace('€ ', '', $pol_data['pl_purchase_value']) : 0); ?>" value="<?php echo ($pol_data['pl_purchase_value'] ? number_format(str_replace('€ ', '', $pol_data['pl_purchase_value']), 2) : '0.00'); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Fee intermediate supplier</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="feeIntermediateSupplierEur" value="<?php echo number_format($data['pl_converted_values'][0]['fee_intermediate_supplier_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_fee_intermediate_supplier" id="feeIntermediateSupplier" old-value="<?php echo ($pol_data['pl_fee_intermediate_supplier'] ? str_replace('€ ', '', $pol_data['pl_fee_intermediate_supplier']) : 0); ?>" data-target="feeIntermediateSupplierEur" value="<?php echo ($pol_data['pl_fee_intermediate_supplier'] ? number_format(str_replace('€ ', '', $pol_data['pl_fee_intermediate_supplier']), 2) : '0.00'); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span>Transport costs</span>
                        </div>
                        <div class="col-12 col-md-2">
                            <input class="form-control" type="text" id="transportCostEur" value="<?php echo number_format($data['pl_converted_values'][0]['transport_cost_eur'], 2); ?>" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <input <?php echo $disable_pl; ?> class="form-control" type="text" name="pl_transport_cost" id="transportCost" data-target="transportCostEur" old-value="<?php echo ($pol_data['pl_transport_cost'] ? str_replace('€ ', '', $pol_data['pl_transport_cost']) : 0); ?>" value="<?php echo ($pol_data['pl_transport_cost'] ? number_format(str_replace('€ ', '', $pol_data['pl_transport_cost']), 2) : '0.00'); ?>">
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


        <!-- Modal -->
        <div class="modal fade" id="poLines" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
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
                        <button name="save_changes_line" type="submit" class="btn btn-primary js-submit-form">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Main row 2 -->

    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table id="<?php echo ($has_pol ? "tableShowPoLines" : ""); ?>" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
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



<!-- Script -->




<script>
    function toggle(source) {
        checkboxes = document.getElementsByClassName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>