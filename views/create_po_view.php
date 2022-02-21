<div class="content" id="createPOView">
    <form action="create_po" action="create_po" method="POST" id="createPOForm" class="listing__form">
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

                <?php if(isset($_GET['car_id'])): ?>
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
                            <input class="form-control" type="text" name="purch_order_number" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Date*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="date" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>(Intermediary) supplier*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="intermediary_supplier" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person supplier*</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="contact_person_supplier" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Source supplier</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="source_supplier" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Contact person source supplier</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="contact_person_source_supplier" value="" />
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
                            <input class="form-control" type="text" name="purch_entity" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Buyer*</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="buyer" value="" />
                        </div>
                    </div>

                    <?php if(!isset($_GET['lines'])): ?>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Internal reference (custom)</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="internal_ref_custom" value="" />
                        </div>
                    </div>

                    <?php endif ?>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>External order number</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="external_order_number" value="" />
                        </div>
                    </div>
                    
                    <?php if(isset($_GET['lines'])): ?>

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
                            <a href="<?php echo (isset($_GET['lines']) ? '/create_po' : '/create_po?lines'); ?>" class="btn btn-primary">Show all Purchase Order Lines</a>
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
                    <?php if(isset($_GET['lines'])) {
                        echo "<span  class='btn btn-primary' </span>";
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
            
            <?php if(!isset($_GET['lines'])): ?>

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
                        <div class="row ml-1 mt-2">22.1.2022  16:05:00</div>
                        <div class="row ml-1 mt-2">Marnix Benink</div>
                        <div class="row ml-1 mt-2">12.2.2022  0:00:00</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4"></div>

    </div><!-- ./ ROW  -->

    <!-- ./ Main row 3 -->
    <?php else: ?>

        asdasdasd

        <div class="list-pl-modal">

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