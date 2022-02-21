<div class="content" id="createPOView">
    <form action="create_po" action="create_po" method="POST" id="createPOForm" class="listing__form">
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
                <div class="custom-col">
                    <a href="/car_start" class="btn btn-danger" onclick="return confirm('Are you sure?');"><?php echo $_SESSION['lang']['car_start_page_4'] ?></a>
                </div>

                <?php if (isset($_GET['car_id'])) : ?>
                    <div class="custom-col">
                        <button type="submit" name="update_car" class="btn btn-info"><?php echo $_SESSION['lang']['car_start_page_5'] ?></button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" class="btn btn-primary"><?php echo $_SESSION['lang']['car_start_page_6'] ?></button>
                    </div>

                    <div class="custom-col">
                        <button type="submit" name="duplicate_car" class="btn btn-primary"><?php echo $_SESSION['lang']['car_start_page_9'] ?></button>
                    </div>
                <?php endif ?>

                <div class="custom-col">
                    <button type="submit" name="create_car" class="btn btn-primary"><?php echo $_SESSION['lang']['car_start_page_8'] ?></button>
                </div>

                <div class="custom-col">
                    <button type="submit" class="btn btn-primary"><?php echo $_SESSION['lang']['car_start_page_3'] ?></button>
                </div>

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
                            <input class="form-control" type="text" name="purch_order_number" value="<?php echo (isset($_POST['purch_order_number']) ? $_POST['purch_order_number'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Date*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="purch_date" value="<?php echo (isset($_POST['purch_date']) ? $_POST['purch_date'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>(Intermediary) supplier*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="intermediary_supplier" value="<?php echo (isset($_POST['intermediary_supplier']) ? $_POST['intermediary_supplier'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person supplier*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="contact_person_supplier" value="<?php echo (isset($_POST['contact_person_supplier']) ? $_POST['contact_person_supplier'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Source supplier</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="source_supplier" value="<?php echo (isset($_POST['source_supplier']) ? $_POST['source_supplier'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person source supplier</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="contact_person_source_supplier" value="<?php echo (isset($_POST['contact_person_source_supplier']) ? $_POST['contact_person_source_supplier'] : ''); ?>" />
                        </div>
                    </div>
                    <!-- ./ ROWS  -->
                </div>
                <!-- ./ Left col  -->

                <!-- Rigth col  -->
                <div class="col-12 col-md-7">
                    <div class="row mt-3"></div>
                    <div class="row mt-4"></div>

                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Purchasing entity*</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="purch_entity" value="<?php echo (isset($_POST['purch_entity']) ? $_POST['purch_entity'] : ''); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Buyer*</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="purch_buyer" value="<?php echo (isset($_POST['purch_buyer']) ? $_POST['purch_buyer'] : ''); ?>" />
                        </div>
                    </div>

                    <?php if (!isset($_POST['show_all_purch_lines'])) : ?>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Internal reference (custom)</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control" type="text" name="internal_ref_custom" value="<?php echo (isset($_POST['internal_ref_custom']) ? $_POST['internal_ref_custom'] : ''); ?>" />
                            </div>
                        </div>

                    <?php endif ?>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>External order number</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="external_order_number" value="<?php echo (isset($_POST['external_order_number']) ? $_POST['external_order_number'] : ''); ?>" />
                        </div>
                    </div>

                    <?php if (isset($_POST['show_all_purch_lines'])) : ?>

                        <div class="row mt-3"></div>
                        <div class="row mt-3"></div>

                    <?php endif ?>

                    <div class="row mt-3"></div>
                    <div class="row mt-4"></div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Status</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <span>New</span>
                        </div>
                    </div>
                </div>
            </div> <!-- Rigth col -->
            <!-- ./ Main row 1 -->

            <!-- .ROW  -->
            <hr />

            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Purchase order lines*</span>
                        </div>
                        <div class="col-12 col-md-4">
                            <?php if (isset($_POST['show_all_purch_lines'])) : ?>

                                <button type="submit" name="hide_all_purch_lines" class="btn btn-primary">Back to standart view</button>

                            <?php else : ?>

                                <button type="submit" name="show_all_purch_lines" class="btn btn-primary">Show all Purchase Order Lines</button>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row mt-3"></div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Number of vehicles</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <span>3</span>
                        </div>
                    </div>
                    <?php if (isset($_POST['show_all_purch_lines'])) {
                        echo "<span  class='btn btn-primary my-4'  data-toggle='modal' data-target='#poLines'>Add Purchase Order Lines </span>";
                    } ?>
                    <!-- ./ ROWS  -->
                </div>
                <!-- ./ Left col  -->

                <!-- Rigth col  -->
                <div class="col-12 col-md-7">
                    <div class="row mt-3"></div>
                    <div class="row mt-3"></div>
                    <div class="row mt-4"></div>

                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Total purchase value (excl. VAT)</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <span>€ 342325325,00</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 mt-3">
                            <span>Total purchase value (incl. VAT)</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <span>€ 543535,00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4"></div>

        </div><!-- ./ ROW  -->

        <hr />
        <!-- Main row 2 -->

        <?php if (!isset($_POST['show_all_purch_lines'])) : ?>

            <div class="row d-flex align-items-stretch">

                <div class="col col-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Payment terms</span>
                        </div>
                    </div>

                    <div class="row mt-3"></div>
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Payment terms*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select name="payment_terms" id="paymentTerms" class="form-control">
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
                            <input class="form-control" type="text" name="date" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Expected invoice date</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="date" value="" />
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6">
                    <p class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_90'] ?></p>
                    <div class="form-control show-documents uploaded-documents-col" name="uploaded_files" id="uploadedFiles">
                        <?php
                        if (!is_null($data['single_car_documents'][0])) {
                            foreach ($data['single_car_documents'][0] as $key => $doc) {
                                echo "<a href='{$doc['cd_path']}'>{$doc['cd_filename']}</a></br>";
                            }
                        }
                        ?></div>
                </div>
            </div>
            <!-- ./ ROW  -->

            <!-- .ROW  -->
            <hr />


            <div class="row d-flex align-items-stretch">

                <div class="col col-12 col-md-5">
                    <p class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_89'] ?></p>
                    <textarea placeholder="" rows="7" class="form-control remarks" name="notes" id="notes"><?php echo (isset($data['single_car']['cd_notes']) ? $data['single_car']['cd_notes']  : "") ?></textarea>
                </div>
                <div class="col col-12 col-md-7">
                    <p class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_96'] ?></p>
                    <div class="row d-flex flex-nowrap">
                        <div class="col-5 show-documents text-muted" style="white-space: nowrap; overflow: hidden;">
                            <div class="row ml-1 mt-2">Created by</div>
                            <div class="row ml-1 mt-2">Created on</div>
                            <div class="row ml-1 mt-2">Last edited by</div>
                            <div class="row ml-1 mt-2">Last edited on</div>
                            <div class="row ml-1 mt-2">Approved by</div>
                            <div class="row ml-1 mt-2">Approved on</div>
                        </div>
                        <div class="col-5 show-documents internal-information" style="white-space: nowrap; background-color: white; overflow: hidden; border-radius: 3px; border: 1px solid #DCDCDC;">
                            <div class="row ml-1 mt-2">Joël Pinna</div>
                            <div class="row ml-1 mt-2">5.02.22 0:00</div>
                            <div class="row ml-1 mt-2">Marnix Benink</div>
                            <div class="row ml-1 mt-2">22.1.2022 16:05:00</div>
                            <div class="row ml-1 mt-2">Marnix Benink</div>
                            <div class="row ml-1 mt-2">12.2.2022 0:00:00</div>
                        </div>
                    </div>
                </div>
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
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

</form>

</div>
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