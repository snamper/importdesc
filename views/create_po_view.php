<?php
$data['purch_order'] = $data['purch_order'][0];
$data['poSums'] = $data['poSums'][0];
?>


<div class="content" id="createPOView">
    <form action="create_po" action="create_po" method="POST" id="createPOForm" class="listing__form">
        <?php if (isset($_GET['order_id'])) {
            echo "<input type='hidden' name='update_order' value='{$_GET['order_id']}' />";
        } elseif (isset($_POST['update_order'])) {
            echo "<input type='hidden' name='update_order' value='{$_POST['update_order']}' />";
        } ?>
        <?php if (!empty($data['purchase_lines'])) {
            foreach ($data['purchase_lines'][0] as $line) {
                echo "<input name='purchase_lines[]' type='hidden' value='$line' />";
            }
        }
        ?>
        <div class="col-xs-12 table-list">
            <div class="row my-4 align-items-start">
                <div class="col-12 col-md-6" style="padding-right: 2%;">
                    <div class="upload-file js-upload"><?php echo $_SESSION['lang']['car_start_page_2'] ?>
                        <input type="file" name="upload_document[]" multiple id="uploadCarDocument">
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET['order_id'])) {
                echo "<input type='hidden' name='order_id' value='{$_GET['order_id']}'>";
            }
            ?>

            <span class="ti-plus additional-options" id="toggle_nav"></span>

            <div class="custom-row" id="create_nav">

                <?php if (!isset($_GET['order_id']) && !isset($_POST['update_order']) && $data['purch_order']['po_status'] < 2) : ?>
                    <div class="custom-col">
                        <a href="/create_po" class="btn btn-danger" onclick="return confirm('Are you sure?');"><?php echo $_SESSION['lang']['car_start_page_4'] ?></a>
                    </div>
                <?php endif ?>


                <?php if ($data['purch_order']['po_status'] < 2) : ?>
                    <div class="custom-col">
                        <button type="submit" name="save_order" class="btn btn-info" value="<?php echo isset($_REQUEST['show_all_purch_lines']) ? '1' : '0'; ?>"><?php echo $_SESSION['lang']['car_start_page_5'] ?></button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="update_order_close" class="btn btn-primary">Save and Close</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="update_order_submit" value="2" class="btn btn-primary">Save and Submit</button>
                    </div>
                <?php else : ?>
                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_order_submit" value="1">Set status new</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary" name="update_order_submit" value="3">Approve</button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-danger" name="update_order_submit" value="4">Reject</button>
                    </div>

                <?php endif ?>

            </div>

            <hr />

            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Summary Information</span>
                        </div>
                    </div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Purchase order number</span>
                        </div>
                        <div class="col-12 col-md-8">

                            <input disabled class="form-control" type="text" name="po_number" value="<?php echo (empty($data['purch_order']['po_number']) ? 0 : $data['purch_order']['po_number']); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Custom PO Reference</span>
                        </div>
                        <div class="col-12 col-md-8">

                            <input class="form-control" type="text" name="po_reference" value="<?php echo $data['purch_order']['po_reference']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Date Final Contract</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" id="datepicker2" autocomplete="false" required type="text" name="po_date" value="<?php echo (empty($data['purch_order']['po_date']) ? date('d-m-Y') : date('d-m-Y', strtotime($data['purch_order']['po_date']))); ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Supplier</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_supplier" value="<?php echo $data['purch_order']['po_supplier']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person supplier*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_contact_person" value="<?php echo $data['purch_order']['po_contact_person']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Intermediary</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_intermediary_supplier" value="<?php echo $data['purch_order']['po_intermediary_supplier']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person Intermediary*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_contact_person" value="<?php echo $data['purch_order']['po_contact_person']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Purchasing entity*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_purchasing_entity" value="<?php echo $data['purch_order']['po_purchasing_entity']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Buyer*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required type="text" name="po_buyer" value="<?php echo $data['purch_order']['po_buyer']; ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>External order number</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="number" name="po_external_order_number" value="<?php echo (empty($data['purch_order']['po_external_order_number']) ? 0 : $data['purch_order']['po_external_order_number']); ?>" />
                        </div>
                    </div>

                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Internal Information</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row ml-1 mt-2">Created by</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row ml-1 mt-2">Joël Pinna (10-3-2022 11:55)</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row ml-1 mt-2">Last edited by</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row ml-1 mt-2">Joël Pinna (10-3-2022 11:55)</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row ml-1 mt-2">Last Submitted by</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row ml-1 mt-2">-</div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row ml-1 mt-2">Approved by</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row ml-1 mt-2">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row ml-1 mt-2">Rejected By</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row ml-1 mt-2">-</div>
                        </div>
                    </div>


                    <br/>

                    <div class="row">
                    <div class="col col-12 col-md-12">
                    <p class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_90'] ?></p>
                    <div class="form-control show-documents uploaded-documents-col" name="uploaded_files" id="uploadedFiles">
                        <?php
                        if (!is_null($data['po_documents'][0])) {
                            foreach ($data['po_documents'][0] as $key => $doc) {
                                echo "<div class='document' data-doc-id='{$doc['pod_id']}'>
                                    <a href='{$doc['pod_path']}' about='_blank'>{$doc['pod_filename']}</a><span class='ti-trash'></span>
                                </div>";
                            }
                        }
                        ?></div>
                </div>
                </div>


                <div class="row">
                <div class="col col-12 col-md-12">
                    <p class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_89'] ?></p>
                    <textarea placeholder="" rows="7" class="form-control remarks" name="po_remarks" id="notes"><?php echo (isset($data['purch_order']['po_remarks']) ? $data['purch_order']['po_remarks']  : "") ?></textarea>
                </div>
                </div>

                </div>

                <!-- ./ Left col  -->

                <!-- Rigth col  -->
                
 <div class="col-12 col-md-7">
                    <div class="col-12 col-md-8">
                        <div class="row" style="height: 50px;">
                            <div class="col-12 col-md-4">
                                <span class="font-weight-bold">Payment Terms</span>
                            </div>
                        </div>
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Invoice, from (suppl. - interm.)</span>
                            </div>
                            <div class="col-12 col-md-8">

                            <select class="form-control" name="po_invoice" id="po_invoice" class="col-12 col-md-12">
                                <option value="1" <?php echo $data['purch_order']['po_invoice'] == 1 ? 'selected' : '' ?>>Supplier</option>
                                <option value="2" <?php echo $data['purch_order']['po_invoice'] == 2 ? 'selected' : '' ?>>Intermediary</option>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Payment in Currency*</span>
                            </div>
                            <div class="col-12 col-md-8">

                                <input class="form-control" type="text" name="po_currency" value="<?php echo $data['purch_order']['po_currency']; ?>" />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Purchase Type*</span>
                            </div>
                            <div class="col-12 col-md-8">
                            <select class="form-control" name="po_purchase_type" id="po_purchase_type" class="col-12 col-md-12">
                                <option value="1" <?php echo $data['purch_order']['po_purchase_type'] == 1 ? 'selected' : '' ?>>EU</option>
                                <option value="2" <?php echo $data['purch_order']['po_purchase_type'] == 2 ? 'selected' : '' ?>>DOM</option>
                                <option value="3" <?php echo $data['purch_order']['po_purchase_type'] == 3 ? 'selected' : '' ?>>ROW</option>
                            </select>
                            </div>
                        </div>


                        <div class="row" style="height: 50px;">
                            <div class="col-12 col-md-4">
                                <span class="font-weight-bold">VAT Deposit</span>
                            </div>
                        </div>
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>VAT Deposit</span>
                            </div>
                            <div class="col-12 col-md-8">                                
                            <select class="form-control" name="po_vat_deposit" id="vat_deposit" class="col-12 col-md-12">
                                <option value="1" <?php echo $data['purch_order']['po_vat_deposit'] == 1 ? 'selected' : '' ?>>Yes</option>
                                <option value="2" <?php echo $data['purch_order']['po_vat_deposit'] == 2 ? 'selected' : '' ?>>No</option>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>VAT Percentage</span>
                            </div>
                            <div class="col-12 col-md-8">
                            <select class="form-control" name="po_vat_percentage" id="disable" class="col-12 col-md-12">
                                <?php
                                    $percentage = isset($data['purch_order']['po_vat_percentage']) ? $data['purch_order']['po_vat_percentage'] : 21;

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
                            <div class="col-12 col-md-4">
                                <span class="font-weight-bold">Downpayment</span>
                            </div>
                        </div>
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Down payment</span>
                            </div>
                            <div class="col-12 col-md-8">

                            <select class="form-control" name="po_down_payment" id="down_payment" class="col-12 col-md-12">
                                <option value="1" <?php echo $data['purch_order']['po_down_payment'] == 1 ? 'selected' : '' ?>>Yes</option>
                                <option value="2" <?php echo $data['purch_order']['po_down_payment'] == 1 ? 'selected' : '' ?>>No</option>
                            </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Down payment amount</span>
                            </div>
                            <div class="col-12 col-md-8">
                            <input class="form-control" type="text" id="disable_down" name="po_down_payment_amount" value="<?php echo $data['purch_order']['po_down_payment_amount']; ?>" />
                            </div>
                        </div>

                    

                        <div class="row" style="height: 50px;">
                            <div class="col-12 col-md-4">
                                <span class="font-weight-bold">PO Financial</span>
                            </div>
                        </div>
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Fixed / Live Exchange</span>
                            </div>
                            <div class="col-12 col-md-8">

                                
                            <select class="form-control" name="po_exchange" id="po_exchange" class="col-12 col-md-12">
                                <option value="1" <?php echo  $data['purch_order']['po_exchange'] == 1 ? 'selected' : '' ?>>Fixed</option>
                                <option value="2" <?php echo  $data['purch_order']['po_exchange'] == 2 ? 'selected' : '' ?>>Live</option>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Currency Rate</span>
                            </div>
                            <div class="col-12 col-md-8">

                                <input class="form-control" type="text" id="disable_exchange" name="po_currency_rate" value="<?php echo $data['purch_order']['po_currency_rate']; ?>" />
                            </div>
                        </div>
                        </br>

                        <div class="row">
                        <div class="col-12 col-md-8">
                        <table style="width: 100%;">
                        <style>
                            td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                            }
                        </style>
                            <tr>
                                <th></th>
                                <th>EUR</th>
                                <th>USD</th>
                            </tr>
                            <tr>
                                <th>Total Purchase Amount</th>
                                <td>123</td>
                                <td>1223</td>
                            </tr>
                            <tr>
                                <th>Total Fee Intermediate Supplier</th>
                                <td>5666</td>
                                <td>232321</td>
                            </tr>
                            <tr>
                                <th>Total Transport Costs</th>
                                <td>55543l</td>
                                <td>77776</td>
                            </tr>
                            <tr>
                                <th>Total Purchase Price excl. VAT</th>
                                <td>75757</td>
                                <td>767</td>
                            </tr>
                            <tr>
                                <th>Total VAT</th>
                                <td>12332</td>
                                <td>434324</td>
                            </tr>
                            <tr>
                                <th>Total Purchase Price incl. VAT</th>
                                <td>453455</td>
                                <td>4324</td>
                            </tr>
                            <tr>
                                <th>Total Downpayment amount</th>
                                <td>6456</td>
                                <td>343243</td>
                            </tr>
                            <tr>
                                <th>Total VAT Deposit</th>
                                <td>4343243</td>
                                <td>65654</td>
                            </tr>
                            </table>
                </div>

                        </div>

                    </div>
                </div>
            </div> <!-- Rigth col -->
            <!-- ./ Main row 1 -->

            <!-- .ROW  -->

           <!-- <div class="row justify-content-center align-items-start">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Purchase order lines*</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <?php if (isset($_REQUEST['show_all_purch_lines'])) : ?>
                                <input type="hidden" name="hide_all_purch_lines" value="" />
                                <span class="btn btn-primary js-submit-form">Back to standart view</span>
                            <?php else : ?>
                                <input type="hidden" name="show_all_purch_lines" value="" />
                                <span class="btn btn-primary js-submit-form">Show all Purchase Order Lines</span>

                            <?php endif ?>
                        </div>
                    </div>
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
                    <?php if (isset($_REQUEST['show_all_purch_lines'])) {
                        echo "<span  class='btn btn-primary my-4'  data-toggle='modal' data-target='#poLines'>Add Purchase Order Lines </span>";
                    } ?>
                </div>


                <div class="col-12 col-md-7">
                    <div class="row mt-3"></div>
                    <div class="row mt-3"></div>
                    <div class="row mt-4"></div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Total purchase value (excl. VAT)</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <span><?php echo "€ " . number_format($data['poSums']['total_purchase_price_excl_vat'], 2) ?></span>
                            <input type="hidden" name="po_total_purchase_excl_vat" value="<?php echo (!empty($data['poSums']['total_purchase_price_excl_vat']) ? $data['poSums']['total_purchase_price_excl_vat'] : 0)  ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 mt-3">
                            <span>Total purchase value (incl. VAT)</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <span id="totalPOInclVatSpan"><?php echo "€ " . number_format($data['poSums']['total_purchase_price_incl_vat'], 2) ?></span>
                            <input id="totalPOInclVatHidden" type="hidden" name="po_total_purchase_incl_vat" value="<?php echo (!empty($data['poSums']['total_purchase_price_incl_vat']) ? $data['poSums']['total_purchase_price_incl_vat'] : 0) ?>">
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row mt-4"></div>

        </div><!-- ./ ROW  -->

        <!-- Main row 2 -->
        

       <!-- <?php if (!isset($_REQUEST['show_all_purch_lines'])) : ?>

            <div class="row d-flex align-items-stretch">

                <div class="col col-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Payment terms</span>
                        </div>
                    </div>

                    <div class="row mt-3"></div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Payment terms*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select name="po_payment_terms" id="paymentTerms" class="form-control">
                                <option value="0">Payment before delivery</option>
                                <option value="1">Payment after delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Prepayment amount</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="number" step="0.01" name="po_prepayment_amount" value="<?php echo (empty($data['purch_order']['po_prepayment_amount']) ? 0 : $data['purch_order']['po_prepayment_amount']); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Expected invoice date</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" id="datepicker3" type="text" name="po_expected_invoice_date" value="<?php echo (empty($data['purch_order']['po_expected_invoice_date']) ? date('d-m-Y') : date('d-m-Y', strtotime($data['purch_order']['po_expected_invoice_date']))); ?>" />
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- ./ ROW  -->

            <!-- .ROW  -->
            <hr />


            <div class="row d-flex align-items-stretch">

            </div>

            <div class="row mt-4"></div>

</div><!-- ./ ROW  -->

<!-- ./ Main row 3 -->
<?php else : ?>

    <!-- Modal -->
    <input type="hidden" name="show_all_purch_lines" value="" />
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

    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table id="<?php echo (isset($_GET['order_id']) || isset($_POST['update_order']) ? "tableShowPoLines" : "") ?>" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
                    <thead>
                        <th class="text-center">PL ID</th>
                        <th class="text-center">Pre-order</th>
                        <th style="white-space: nowrap">Type</th>
                        <th style="white-space: nowrap">Vehicle ID</th>
                        <th style="white-space: nowrap">VAT/Margin</th>
                        <th style="white-space: nowrap">Make</th>
                        <th style="white-space: nowrap">Model</th>
                        <th style="white-space: nowrap">Variant</th>
                        <th style="white-space: nowrap">Engine</th>
                        <th style="white-space: nowrap">Purchase price excl. VAT</th>
                        <th style="white-space: nowrap"></th>
                        <th class="text-center">KM at delivery*</th>
                        <th style="white-space: nowrap">Expected delivery date*</th>
                        <th style="white-space: nowrap">Purchase price incl. VAT*</th>
                        <th style="white-space: nowrap">Accident free</th>
                        <th style="white-space: nowrap">Expected damage amount</th>
                        <th style="white-space: nowrap">Extra set of wheels</th>
                        <th style="white-space: nowrap">VAT deposit</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- END table -->
        </div>
    </div>
    </div>




<?php endif ?>

</form>

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
