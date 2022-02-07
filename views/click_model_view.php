<?php $data['single_car'] = $data['single_car'][0];?>
<div class="content" id="createEditCarPage">
    <div class="ref-container">
            <span data-ref="carMake"></span>
            <span data-ref="carModel"></span>
            <span data-ref="vin"></span>
            <span data-ref="sourceSupplier"></span>
    </div>
    <form action="car_start" action="car_start" method="POST" id="createEditCarForm" class="listing__form">
    <div class="col-xs-12 table-list">
        <div class="row my-4 align-items-start">
                <div class="col-12 col-md-5">
                    <div class="upload-file js-upload">Upload photo
                        <input type="file" name="upload_photo[]" multiple id="uploadCarImage">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="upload-file js-upload">Upload document
                        <input type="file" name="upload_document[]" multiple id="uploadCarDocument">
                    </div>
                </div>     
            <button type="submit" class="btn btn-primary">Create and open Offer</button>
        </div>
        
            <?php
            if (isset($_GET['car_id'])) {
                echo "<input type='hidden' name='car_id' value='{$_GET['car_id']}'>";
            }
            ?>

            <div class="dashboardPageTitle text-center">
                <h2 style="opacity: 0;">Placeholder</h2>
            </div>
            <span class="ti-plus additional-options"></span>

            <div class="custom-row">
                <div class="custom-row-close">X</div>
                <div class="custom-col">
                    <a href="/car_start" class="btn btn-danger">Delete all Data </a>
                </div>

                <div class="custom-col">
                    <button type="submit" name="update_car" class="btn btn-info">Save</button>
                </div>

                <div class="custom-col">
                    <button type="submit" class="btn btn-primary">Save and Close</button>
                </div>

                <div class="custom-col">
                    <button type="submit" name="duplicate_car" class="btn btn-primary">Duplicate</button>
                </div>

                <div class="custom-col">
                    <button type="submit" name="create_car" class="btn btn-primary">Create and go to PO</button>
                </div>

            </div>


            <hr />
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold">Basic Information</span>
                </div>
            </div>
            <!-- Main row 1 -->
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4 spacer"></div>
                        <div class="col-12 col-md-8">
                            <span>Preorder</span>
                        <input type="checkbox" name="preorder" id="preorder">
                    </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Current car status* </span>
                        </div>
                        <div class="col-12 col-md-8">
 
                            <?php
                            //                             echo '<pre>';
                            //                             var_dump($data['single_car']);
                            //                             echo '</pre>';
                            //                             exit;
                            ?>
 
                            <select required class="form-control" name="status">
                                <option value="0">-</option>
                                <?php foreach ($data['car_status'] as $opt_value) {
                                    if (isset($data['single_car']['cd_status']) && $data['single_car']['cd_status'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Car reference (custom)</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" id="customReference" type="text" name="car_ref_custom" value="<?php echo (isset($data['single_car']['cd_car_ref_custom']) ? $data['single_car']['cd_car_ref_custom']  : "") ?>" placeholder="" />
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>VIN</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control js-fill-refer" type="text" name="vin" id="vin" value="<?php echo (isset($data['single_car']['cd_vin']) ? $data['single_car']['cd_vin']  : "") ?>" placeholder="" />
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Komm. Number</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="komm_number" value="<?php echo (isset($data['single_car']['cd_komm_number']) ? $data['single_car']['cd_komm_number']  : "") ?>" />
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Link to Advert</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="advert_link" value="<?php echo (isset($data['single_car']['cd_advert_link']) ? $data['single_car']['cd_advert_link']  : "") ?>" />
                        </div>
                    </div>
                    <!-- ./ ROWS  -->
                </div>
                <!-- ./ Left col  -->
 
                <!-- Rigth col  -->
                <div class="col-12 col-md-7">
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Source Supplier </span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control js-fill-refer" type="text" name="source_supplier" id="sourceSupplier" value="<?php echo (isset($data['single_car']['cd_source_supplier']) ? $data['single_car']['cd_source_supplier']  : "") ?>" placeholder="" />
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Reference Number Supplier</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="supplier_ref" value="<?php echo (isset($data['single_car']['cd_supplier_ref']) ? $data['single_car']['cd_supplier_ref']  : "") ?>" />
                        </div>
                    </div>
 
 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Current Registration</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="current_registration" id="">
                                <?php foreach ($data['car_registration_country'] as $opt_value) {
                                    if (isset($data['single_car']['cd_current_registration']) && $data['single_car']['cd_current_registration'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>COC</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="coc" id="">
                                <?php foreach ($data['coc'] as $opt_value) {
                                    if (isset($data['single_car']['cd_coc']) && $data['single_car']['cd_coc'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
 
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Configuration number</span>
                        </div>
                        <div class="col-12 col-md-6">
                             <input class="form-control" type="text" name="supplier_ref" value="<?php echo (isset($data['single_car']['cd_supplier_ref']) ? $data['single_car']['cd_supplier_ref']  : "") ?>" />
                        </div>
                    </div>
                </div>
            </div> <!-- Rigth col -->
            <!-- ./ Main row 1 -->
            <hr />
            <!-- Main row 2 -->
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold">Vehicle and Calculation</span>
                </div>
            </div>
            <div class="row justify-content-center align-items-stretch">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Vehicle Type* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select name="car_vehicle_type" id="SoortVoertuig" class="form-control">
                                <option value="0">-</option>
                                <option <?php echo (!is_null($data['single_car']['car_vehicle_type']) && $data['single_car']['car_vehicle_type'] == 1  ? "selected" : 0) ?> value="1">Passenger car</option>
                                <option <?php echo (!is_null($data['single_car']['car_vehicle_type']) && $data['single_car']['car_vehicle_type'] == 2  ? "selected" : 0) ?> value="2">Company car max. 3500kg</option>
                                <option <?php echo (!is_null($data['single_car']['car_vehicle_type']) && $data['single_car']['car_vehicle_type'] == 3  ? "selected" : 0) ?> value="3">Camper</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Make* </span>
                        </div>

                        <div class="col-12 col-md-8">
                            <select required class="form-control js-fill-refer" id="carMake" name="car_make">
                                <option value="0">-</option>
                                <?php
                                if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['cmake_id']}'> {$data['single_car']['cmake_name']}</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Model* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <select required class="form-control js-fill-refer" name="car_model" id="carModel">
                                        <option value="0"> - </option>
                                        <?php
                                        if (isset($_GET['car_id'])) {
                                            echo "<option selected value='{$data['single_car']['car_model']}'> {$data['single_car']['cmodel_name']}</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" name="model_additional" type="text" placeholder="">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Variant</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">

                                    <select class="form-control" name="car_variant" id="carUitvoering">
                                        <option value="">-</option>
                                        <?php
                                        if (isset($_GET['car_id'])) {
                                            echo "<option selected value='{$data['single_car']['cmu_id']}'> {$data['single_car']['cmu_name']}</option>";
                                        } ?>

                                    </select>
                                </div>

                                <div class="col-6 pl-0">
                                    <input class="form-control" name="variant_additional" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Body Style</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select class="form-control" name="car_body_style" id="">
                                <?php foreach ($data['body_style'] as $opt_value) {
                                    if (isset($data['single_car']['car_body_style']) && $data['single_car']['car_body_style'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Fuel Type* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select required class="form-control js-car-fuel" name="car_fuel" id="BPMbrandstof">
                                <option value="">-</option>
                                <?php if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['fuel_id']}'> {$data['single_car']['fuel_name']}</option>";
                                } ?>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Engine* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">

                                    <select required class="form-control js-car-motor" name="motor" id="carMotor">
                                        <option value="">-</option>
                                        <?php if (isset($_GET['car_id'])) {
                                            echo "<option selected value='{$data['single_car']['cmotor_id']}'> {$data['single_car']['cmotor_name']}</option>";
                                        } ?>

                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="motor_additional" id="" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Transmission* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <select required class="form-control" name="transmission" id="">
                                        <?php foreach ($data['transmission'] as $opt_value) {
                                            if (isset($data['single_car']['transmission_name']) && $data['single_car']['transmission_name'] == $opt_value["conversion_id"]) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="transmission_additional" placeholder="" value="<?php echo (isset($data['single_car']['cd_transmission_additional']) ? $data['single_car']['cd_transmission_additional']  : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Power kW / Pk</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <input class="form-control" type="text" name="power_kpw" id="" value="<?php echo (isset($data['single_car']['cd_power_kpw']) ? $data['single_car']['cd_power_kpw']  : "") ?>" placeholder="">
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="cubic_capacity" id="" value="<?php echo (isset($data['single_car']['cd_cubic_capacity']) ? $data['single_car']['cd_cubic_capacity']  : "") ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Drive</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select class="form-control" name="wheel_drive">
                                <?php foreach ($data['wheel_drive'] as $opt_value) {
                                    if (isset($data['single_car']['wheel_drive']) && $data['single_car']['wheel_drive'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>CO² WLTP</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="text" class="form-control" id="BPMCO2WLTP" name="co_wltp" placeholder="" value="<?php echo (isset($data['single_car']['cd_co_wltp']) ? $data['single_car']['cd_co_wltp']  : "") ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>CO² NEDC</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="text" class="form-control" id="BPMCO2" name="co_nedc" placeholder="" value="<?php echo (isset($data['single_car']['cd_co_nedc']) ? $data['single_car']['cd_co_nedc']  : "") ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Kilometers </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="number" name="kilometers" placeholder="" value="<?php echo (isset($data['single_car']['cd_kilometers']) ? $data['single_car']['cd_kilometers']  : 0) ?>">
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-12 col-md-4">
                            Paint Type
                        </div>
                        <div class="col-12 col-md-8">
                            <select name="paint_type" class="form-control" id="paintType">
                                <option value="0">-</option>
                                <?php foreach ($data['paint_type'] as $opt_value) {
                                    if (isset($data['single_car']['cd_paint_type']) && $data['single_car']['cd_paint_type'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Colour | Colour name OEM </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <select class="form-control" name="color" id="">
                                        <?php foreach ($data['color'] as $opt_value) {
                                            if (isset($data['single_car']['color_name']) && $data['single_car']['color_name'] == $opt_value["conversion_id"]) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="color_additional" id="" placeholder="" value="<?php echo (isset($data['single_car']['cd_color_additional']) ? $data['single_car']['cd_color_additional']  : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Interior color | Interior name OEM </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <select class="form-control" name="interior_color" id="">
                                        <?php foreach ($data['interior_color'] as $opt_value) {
                                            if (isset($data['single_car']['cd_interior_color']) && $data['single_car']['cd_interior_color'] == $opt_value["conversion_id"]) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="interior_color_additional" id="" placeholder="" value="<?php echo (isset($data['single_car']['cd_interior_color_additional']) ? $data['single_car']['cd_interior_color_additional']  : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Interior material </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select class="form-control" name="interior_material" id="">
                                <?php foreach ($data['interior_material'] as $opt_value) {
                                    if (isset($data['single_car']['cd_interior_material']) && $data['single_car']['cd_interior_material'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- ./ ROWS  -->
                </div>
                <!-- ./ Left col  -->

               <!-- Rigth col  -->
               <div class="col-12 col-md-7">
                    <div class="container" id="calculationContainer">
                        <div class="row align-items-start">
                            <div class="col-12 col-md-8 calculation-col">
                                <div class="row align-items-start str">
                                    <!-- <div class="col-12 col-sm-2">
                                                    Purchase / Sale Price
                                                </div>
                                                <div class="col-sm-3 switcher" style="padding-bottom: 5px;">
                                                    <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                                                    <label for="switchPrice"></label>
                                                </div> -->
                                    <div class="col-9">
                                        VAT/Margin
                                    </div>
                                    <div class="col-3">
                                        <div     style="padding-bottom: 5px;">
                                            <input type="checkbox" name="switchBTW" id="switchBTW"/>
                                            <label for="switchBTW"></label>
                                        </div>
                                    </div>
                                </div>
 
                                <!-- Current date  -->
                                <input type="hidden" autocomplete="off"  class="form-control" name="huidigedatumbpm" id="datepicker2">
 
                                <div class="row str">
                                    <div class="col-12 col-md-6" id="priceNetoText">
                                        Purchase Price netto (ex/ex)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" id="inkoopprijs_ex_ex" value="<?php echo (isset($data['single_car']['purchase_price_netto']) ?  $data['single_car']['purchase_price_netto'] : "0") ?> " name="purchase_price_netto" placeholder="">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Fee Intermediate Supplier
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" id="addAfleverkosten" value="<?php echo (isset($data['single_car']['fee_intermediate_supplier']) ?  $data['single_car']['fee_intermediate_supplier'] : '0') ?> "  name="fee_intermediate_supplier" placeholder="">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold">
                                        Total Purchase Price netto
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input class="form-control js-calc-input" readonly type="text" value="<?php echo (isset($data['single_car']['total_purchase_price_netto']) ?  $data['single_car']['total_purchase_price_netto'] : '0') ?> " name="total_purchase_price_netto" id="totalPriceNettoSuppluier">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Costs of Damages and Repair
                                        </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['costs_damage_and_repair']) ?  $data['single_car']['costs_damage_and_repair'] : '0') ?> " id="addOpknapkosten" name="costs_damage_and_repair" placeholder="">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Transport International
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" id="addTransport_Buitenland" value="<?php echo (isset($data['single_car']['transport_international']) ?  $data['single_car']['transport_international'] : '0') ?> " name="transport_international" placeholder="">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Transport National
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['transport_national']) ?  $data['single_car']['transport_national'] : '0') ?> " id="addTransport_Binnenland" name="transport_national" placeholder="">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Costs of Taxation for BPM
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['costs_taxation_bpm']) ?  $data['single_car']['costs_taxation_bpm'] : '0') ?> " id="costTaxation" name="costs_taxation_bpm" placeholder="">
 
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Fee GWI
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" id="addFee" value="<?php echo (isset($data['single_car']['fee_gwi']) ?  $data['single_car']['fee_gwi'] : '0') ?> " name="fee_gwi" placeholder="">
 
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold">
                                        Totaal Costs and Fee
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input readonly class="form-control" type="text" value="<?php echo (isset($data['single_car']['total_costs_and_fee']) ?  $data['single_car']['total_costs_and_fee'] : '0') ?> " name="total_costs_fee" id="totalCostsFee">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold ">
                                        Sales Price netto (ex/ex)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input readonly class="form-control" type="text" value="<?php echo (isset($data['single_car']['sales_price_netto']) ?  $data['single_car']['sales_price_netto'] : '0') ?> "  name="sales_price_netto" id="totalPriceFee">
                                    </div>
                                </div>
 
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        VAT / BTW (21%)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input readonly type="text" class="form-control" id="addBTW_21" value="<?php echo (isset($data['single_car']['vat_btw']) ?  $data['single_car']['vat_btw'] : '0') ?> " name="vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Sales Price incl. VAT / BTW
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input readonly type="text" class="form-control" id="addVerkoopprijs_Marge_incl" value="<?php echo (isset($data['single_car']['sales_price_incl_vat_btw']) ?  $data['single_car']['sales_price_incl_vat_btw'] : '0') ?> " name="sales_price_incl_vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Rest BPM (indication)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['rest_bpm']) ?  $data['single_car']['rest_bpm'] : '0') ?> " id="addRest_BPM" name="rest_bpm" placeholder="Rest BPM Indicatief">
 
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Leges (VAT / BTW free)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['fees']) ?  $data['single_car']['fees'] : '0') ?> "  id="addLeges" name="fees" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold">
                                        Sales Price Total (in/in)
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input class="form-control js-calc-from-total" value="<?php echo (isset($data['single_car']['sales_price_total']) ?  $data['single_car']['sales_price_total'] : '0') ?> " type="text" name="sales_price_total" id="totalAll">
                                    </div>
                                </div>
                            </div>
                            <!-- Calculation  -->
 
                            <!-- Images  -->
                            <div class="col-12 col-md-2 recent-images-col">
 
                                <?php
                                if (empty($data['car_images'][0])) {
                                    for ($i = 0; $i < 5; $i++) {
                                        echo "<div class='row'>
                                            <div class='col-12 car-image-col'>
                                                <img src='/assets/images/no-image.gif' data-noimage='true' />
                                            </div>
                                        </div>";
                                    }
                                }
                                foreach ($data['car_images'][0] as $key => $img) {
 
                                    if ($key > 3) {
                                        break;
                                    }
                                    echo "<div class='row'>
                                            <div class='col-12 car-image-col'>
                                                <img src='/{$img['cp_path']}' />
                                            </div>
                                        </div>";
                                }
                                ?>
                            </div>
 
                        </div>
                    </div>
                </div> <!-- Rigth col -->
            </div> <!-- Subrow  -->
    </div>
    <!-- ./ Main row 2 -->
    <hr />

    <hr />


    <div class="row justify-content-center align-items-start">
        <!-- Left col  -->
        <div class="col-12 col-md-5">
            <!-- Rows  -->
            <div class="row">
                <div class="col-12 col-md-4">
                    <span> First reg. ever</span>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" autocomplete="off" class="form-control" name="first_registration_date" id="datepicker1" value="<?php echo (isset($data['single_car']['cd_first_registration_date']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_registration_date']))   : "") ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>First reg. in NL</span>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" autocomplete="off" class="form-control" name="first_nl_registration" id="datepicker3">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>First reg. on a name in NL</span>
                </div>
                <div class="col-12 col-md-8">
                    <input class="form-control" autocomplete="off" type="text" name="first_name_nl_registration" value="<?php echo (isset($data['single_car']['cd_first_name_nl_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_name_nl_registration']))  : "") ?>" id="datepicker10" placeholder="" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>Last reg. on a name</span>
                </div>
                <div class="col-12 col-md-8">
                    <input class="form-control" autocomplete="off" type="text" name="last_name_registration" id="datepicker11" value="<?php echo (isset($data['single_car']['cd_last_name_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_last_name_registration']))  : "") ?>" />
                </div>
            </div>
            <!-- ./ ROWS  -->
        </div>
        <!-- ./ Left col  -->

        <!-- Rigth col  -->
        <div class="col-12 col-md-7">
            <!-- Rows  -->
            <div class="row">
                <div class="col-12 col-md-4">
                    <span>NL Registration number</span>
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control" type="text" name="nl_registration_number" value="<?php echo (isset($data['single_car']['cd_nl_registration_number']) ? $data['single_car']['cd_nl_registration_number']  : "") ?>" placeholder="" />
                </div>
            </div>


            <div class="row my-1">
                <div class="col-12 col-md-4">
                    <span>Identification code (meldcode)</span>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" class="form-control" name="meldcode" id="melcode" value="<?php echo (isset($data['single_car']['cd_meldcode']) ? $data['single_car']['cd_meldcode']  : "") ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <span>APK / Check valid until</span>
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control" type="text" name="apk_valid" id="datepicker13" value="<?php echo (isset($data['single_car']['cd_apk_valid']) ? date("d-m-Y", strtotime($data['single_car']['cd_apk_valid']))  : "") ?>" />
                </div>
            </div>
        </div>
    </div> <!-- Rigth col -->
    <!-- ./ ROW  -->
    <!-- .ROW  -->
    <br />
    <hr />
    <p>Factory Options / Highlights</p>
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="navigation">Navigation</label>
                    <select name="navigation" id="navigation" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['navigation'] as $opt_value) {
                            if (isset($data['single_car']['cd_navigation']) && $data['single_car']['cd_navigation'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="keylessEntry">Keyless entry</label>
                    <select name="keyless_entry" id="keylessEntry" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['keyless_entry'] as $opt_value) {
                            if (isset($data['single_car']['cd_keyless_entry']) && $data['single_car']['cd_keyless_entry'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="appConnect">App Connect</label>
                    <select name="app_connect" id="appConnect" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['app_connect'] as $opt_value) {
                            if (isset($data['single_car']['cd_app_connect']) && $data['single_car']['cd_app_connect'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="airco">Airco</label>
                    <select name="airco" id="airco" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['airco'] as $opt_value) {
                            if (isset($data['single_car']['cd_airco']) && $data['single_car']['cd_airco'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="roof">Panorama</label>
                    <select name="roof" id="roof" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['roof'] as $opt_value) {
                            if (isset($data['single_car']['cd_roof']) && $data['single_car']['cd_roof'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="wheels">Alloy Wheels</label>
                    <select name="wheels" id="wheels" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['wheels'] as $opt_value) {
                            if (isset($data['single_car']['cd_wheels']) && $data['single_car']['cd_wheels'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="headlights">Headlights</label>
                    <select name="headlights" id="headlights" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['headlights'] as $opt_value) {
                            if (isset($data['single_car']['cd_headlights']) && $data['single_car']['cd_headlights'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="pdc">PDC</label>
                    <select name="pdc" id="pdc" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['pdc'] as $opt_value) {
                            if (isset($data['single_car']['cd_pdc']) && $data['single_car']['cd_pdc'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="cockpit">Digital Cockpit</label>
                    <select name="cockpit" id="cockpit" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['cockpit'] as $opt_value) {
                            if (isset($data['single_car']['cd_cockpit']) && $data['single_car']['cd_cockpit'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="camera">Camera</label>
                    <select name="camera" id="camera" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['camera'] as $opt_value) {
                            if (isset($data['single_car']['cd_camera']) && $data['single_car']['cd_camera'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="cruise">Cruise Control</label>
                    <select name="cruise_control" id="cruise" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['cruise_control'] as $opt_value) {
                            if (isset($data['single_car']['cd_cruise_control']) && $data['single_car']['cd_cruise_control'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="tow">Tow Bar</label>
                    <select name="tow_bar" id="tow" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['tow_bar'] as $opt_value) {
                            if (isset($data['single_car']['cd_tow_bar']) && $data['single_car']['cd_tow_bar'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div> <!-- ./ .col-5  -->

        <div class="col-12 col-md-7">

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="sportSeats">Sport seats</label>
                    <select name="sport_seats" id="sportSeats" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['sport_seats'] as $opt_value) {
                            if (isset($data['single_car']['cd_sport_seats']) && $data['single_car']['cd_sport_seats'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="sportPackage">Sportpackage</label>
                    <select name="sport_package" id="sportPackage" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['sport_package'] as $opt_value) {
                            if (isset($data['single_car']['cd_sport_package']) && $data['single_car']['cd_sport_package'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="seatsElectric">Seats electric</label>
                    <select name="seats_electric" id="seatsElectric" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['seats_electric'] as $opt_value) {
                            if (isset($data['single_car']['cd_seats_electric']) && $data['single_car']['cd_seats_electric'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="heating">Seat heating</label>
                    <select name="seat_heating" id="heating" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['seat_heating'] as $opt_value) {
                            if (isset($data['single_car']['cd_seat_heating']) && $data['single_car']['cd_seat_heating'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="seatMassage">Seat massage</label>
                    <select name="seat_massage" id="seatMassage" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['seat_massage'] as $opt_value) {
                            if (isset($data['single_car']['cd_seat_massage']) && $data['single_car']['cd_seat_massage'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="optics">Optics</label>
                    <select name="optics" id="optics" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['optics'] as $opt_value) {
                            if (isset($data['single_car']['cd_optics']) && $data['single_car']['cd_optics'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="tindedWindows">Tinted windows</label>
                    <select name="tinted_windows" id="tindedWindows" class="form-control">
                        <option value="0">-</option>
                        <?php
                        foreach ($data['tinted_windows'] as $opt_value) {
                            if (isset($data['single_car']['cd_tinted_windows']) && $data['single_car']['cd_tinted_windows'] == $opt_value["conversion_id"]) {
                                $selected = "selected";
                            } else {
                                $selected  = "";
                            }
                            echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>
        </div> <!-- /. .col-7 -->
    </div> <!-- ./ .row Section Factory Options / Highlights -->


    <hr />

    <p>Options </p>
    <div class="row d-flex align-items-stretch">
        <div class="col col-11">
            <textarea placeholder="" rows="7" style="resize: none;" class="w-150 form-control" name="options" id="options"><?php echo (isset($data['single_car']['cd_options']) ? $data['single_car']['cd_options']  : "") ?></textarea>
        </div>
    </div>
    <!-- ./ ROW  -->
    <!-- .ROW  -->
    <hr />


    <div class="row d-flex align-items-stretch">

        <div class="col col-5">
            <p>Remarks / Notes (internal)</p>
            <textarea placeholder="" rows="7" style="resize: none;" class="form-control" name="notes" id="notes"><?php echo (isset($data['single_car']['cd_notes']) ? $data['single_car']['cd_notes']  : "") ?></textarea>
        </div>
        <div class="col-12 col-md-2"></div>
        <div class="col col-12 col-md-4">
            <p>Uploaded Documents</p>
            <div class="form-control show-documents" name="uploaded_files" id="uploadedFiles">
                <?php if (!is_null($data['single_car_documents'])) {
                    foreach ($data['single_car_documents'] as $key => $doc) {
                        echo "<a href='{$doc[0]['cd_path']}'>{$doc[0]['cd_name']}</a>";
                    }
                }
                ?></div>
        </div>
    </div>
    <!-- ./ ROW  -->
    <!-- .ROW  -->
    <hr />


    <div class="row d-flex align-items-stretch">

        <div class="col col-5">
            <p>Connected to the Modules:</p>
            <div class="row d-flex align-items-stretch form-control show-documents">
                <div class="col col-3">
                    <div class="font-weight-light">Offer</div>
                    <div>text</div>
                </div>
                <div class="col col-3">
                    <div class="font-weight-light">Purchase Order</div>
                    <div>text</div>
                </div>
                <div class="col col-3">
                    <div class="font-weight-light">Sales Order</div>
                    <div>text</div>
                </div>
                <div class="col col-3">
                    <div class="font-weight-light">File</div>
                    <div>text</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2"></div>
        <div class="col col-12 col-md-2">
            <p>Internal Information</p>
            
            <div class="row d-flex align-items-stretch form-control show-documents">
                
            </div>
        </div>
    </div>
    <!-- ./ ROW  -->
    <hr />

    <!-- Main row 3 -->
    <p>Additional images</p>
    <div class="row car-images-row">
        <?php
        $imagesNumber = count($data['car_images'][0]);
        if ($imagesNumber > 4) {
            for ($i = 4; $i < $imagesNumber; $i++) {
                echo "<div class='col-12 col-md-3 car-image-col' id='extraImages'>
                            <img src='{$data['car_images'][0][$i]['cp_path']}' />
                        </div>";
            }
        }else {
            echo "<div class='col-12 col-md-3 car-image-col' id='extraImages'></div>";
        }

        ?>
    </div>

</div><!-- ./ ROW  -->

<!-- ./ Main row 3 -->


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