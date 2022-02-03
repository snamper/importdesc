<?php $data['single_car'] = $data['single_car'][0];?>
<div class="content" id="createEditCarPage">
    <div class="col-xs-12 table-list">
        <form action="car_start" enctype="multipart/form-data" method="POST" class="listing__form">
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
                    <button type="submit" class="btn btn-info">Save</button>
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

            <div class="row my-4">
                <div class="col-12 col-md-3">
                    <div class="upload-photo">Upload photo
                        <input type="file" name="upload_photo[]" multiple id="uploadCarImage">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="upload-document">Upload document
                        <input type="file" name="upload_document[]" multiple id="uploadCarDocument">
                    </div>
                </div>

                <div class="col-12 col-md-3 ml-auto text-right">
                    <button type="submit" class="btn btn-primary">Create and open Offer</button>
                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold">Basic Information</span>
                </div>
            </div>
            <!-- Main row 1 -->
            <div class="row justify-content-center align-items-start">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Current car status* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row my-1">
                                <div class="col-2">
                                    <span>Preorder</span>
                                </div>
                                <div class="pl-2 col-10">
                                    <input type="checkbox" name="preorder" id="preorder">
                                </div>
                            </div>
                            <?php
                            // echo '<pre>';
                            // var_dump($data['single_car']);
                            // echo '</pre>';
                            // exit; 
                            ?>
                        
                            <select required class="form-control" name="status">
                                <option value="0">-</option>
                                <?php foreach ($data['car_status'] as $opt_value) {
                                    if(isset($data['single_car']['cd_status']) && $data['single_car']['cd_status'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    }else {
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
                            <input class="form-control" type="text" name="car_ref_custom" value="" placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>VIN</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="vin" value="" placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Komm. Number</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="komm_number" value="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Link to Advert</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="advert_link" value="" />
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
                            <input class="form-control" type="text" name="source_supplier" value="" placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Reference Number Supplier</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="supplier_ref" value="" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Current Registration</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="current_registration" id="">
                                <?php foreach ($data['car_registration_country'] as $opt_value) {
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
                            </select>
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
                                <option value="1">Passenger car</option>
                                <option value="2">Company car max. 3500kg</option>
                                <option value="3">Camper</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Make* </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select required class="form-control" id="carMake" name="car_make">
                                <option value="">-</option>
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
                                    <select required class="form-control" name="car_model" id="carModel">
                                        <option value="">-</option>
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
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                                <?php foreach ($data['fuel'] as $opt_value) {
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                }
                                ?>
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
                                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="transmission_additional" placeholder="">
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
                                    <input class="form-control" type="text" name="power_kpw" id="" placeholder="">
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="cubic_capacity" id="" placeholder="">
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
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            <input type="text" class="form-control" id="BPMCO2WLTP" name="co_wltp" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>CO² NEDC</span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="text" class="form-control" id="BPMCO2" name="co_nedc" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>Kilometers </span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="number" name="kilometers" value="0" placeholder="">
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
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="color_additional" id="" placeholder="">
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
                                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <input class="form-control" type="text" name="interior_color_additional" id="" placeholder="">
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
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            <div class="col-12 col-md-6 calculation-col">
                                <div class="row align-items-start str">
                                    <!-- <div class="col-12 col-sm-2">
                                                    Purchase / Sale Price
                                                </div>
                                                <div class="col-sm-3 switcher" style="padding-bottom: 5px;">
                                                    <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                                                    <label for="switchPrice"></label>
                                                </div> -->
                                    <div class="col-9">
                                        BTW/MARGE
                                    </div>
                                    <div class="col-3">
                                        <div class="switcher" style="padding-bottom: 5px;">
                                            <input type="checkbox" name="switchBTW" id="switchBTW" checked />
                                            <label for="switchBTW"></label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Current date  -->
                                <input type="hidden" autocomplete="off" class="form-control" name="huidigedatumbpm" id="datepicker2">

                                <div class="row str">
                                    <div class="col-12">
                                        Purchase Price netto (ex/ex)
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="inkoopprijs_ex_ex" name="purchase_price_netto" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        Fee Intermediate Supplier
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="addAfleverkosten" name="fee_intermediate_supplier" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 font-weight-bold">
                                        Total Purchase Price netto
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control js-calc-changer" readonly type="text" name="" id="totalPriceNettoSuppluier">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        Costs of Damages and Repair
                                         <input type="text"  class="form-control js-calc-changer" id="addOpknapkosten" name="costs_damage_and_repair" placeholder="">         
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        Transport International
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="addTransport_Buitenland" name="transport_international" placeholder="">
                                    </div>
                                </div>     

                                <div class="row str">
                                    <div class="col-12">
                                        Transport National
                                    </div> 
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="addTransport_Binnenland" name="transport_national" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        Costs of Taxation for BPM
                                    </div>
                                    <div class="col-12">
                                    <input type="text" class="form-control js-calc-changer" id="costTaxation" name="cost_taxation" placeholder="">
                                      
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        Fee GWI
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="addFee" name="fee_gwi" placeholder="">
                                        
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 font-weight-bold">
                                        Totaal Costs and Fee
                                    </div>
                                    <div class="col-12">
                                       <input readonly class="form-control" type="text" name="total_costs_fee" id="totalCostsFee">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 font-weight-bold ">
                                        Sales Price netto (ex/ex)
                                    </div>
                                    <div class="col-12">
                                    <input readonly class="form-control" type="text" name="total_price_fee" id="totalPriceFee">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12">
                                        VAT / BTW (21%)
                                    </div>
                                    <div class="col-12">
                                        <input readonly type="text" class="form-control" id="addBTW_21" name="vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12">
                                        Sales Price incl. VAT / BTW
                                    </div>
                                    <div class="col-12">
                                        <input readonly type="text" class="form-control" id="addVerkoopprijs_Marge_incl" name="sales_price_incl_vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12">
                                        Rest BPM (indication)
                                    </div>
                                    <div class="col-12">
                                    <input type="text" class="form-control js-calc-changer" id="addRest_BPM" name="" placeholder="Rest BPM Indicatief">
                                
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12">
                                        Leges (VAT / BTW free)
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control js-calc-changer" id="addLeges" name="add_leges" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 font-weight-bold">
                                        Sales Price Total (in/in)
                                    </div>
                                    <div class="col-12">
                                        <input readonly class="form-control" type="text" name="" id="totalAll">
                                    </div>
                                </div>

                                <!-- <div class="row str">
                                    <div class="col-12">
                                        Residual Value Percentage
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="percentage" name="percentage" placeholder="">
                                    </div>
                                </div>     -->
                            </div>   <!-- Calculation  -->
                            
                            <div class="col-12 col-md-6 recent-images-col">
                                
                                <?php 
                                    if(empty($data['car_images'][0])) {
                                        for( $i = 0; $i < 5; $i++) {
                                            echo "<div class='row'>
                                            <div class='col-12 car-image-col'>
                                                <img src='/assets/images/no-image.gif' />
                                            </div>
                                        </div>";   
                                        }
                                    }
                                    foreach($data['car_images'][0] as $key => $img) {

                                        if($key > 4) {
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
    <!-- ERI  -->

    <div class="row justify-content-center align-items-start">
        <!-- Left col  -->
        <div class="col-12 col-md-5">
            <!-- Rows  -->
            <div class="row">
                <div class="col-12 col-md-4">
                    <span> First registration ever (date)</span>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" autocomplete="off" class="form-control" name="first_registration_date" id="datepicker1">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>First registration in the Netherlands (date)</span>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" autocomplete="off" class="form-control" name="first_nl_registration" id="datepicker3">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>First registration on a name in the Netherlands (date)</span>
                </div>
                <div class="col-12 col-md-8">
                    <input class="form-control" type="text" name="first_name_nl_registration" value="" id="datepicker10" placeholder="" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <span>Last registration on a name (date)</span>
                </div>
                <div class="col-12 col-md-8">
                    <input class="form-control" type="text" name="last_name_registration" id="datepicker11" />
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
                    <input class="form-control" type="text" name="nl_registration_number" value="" placeholder="" />
                </div>
            </div>


            <div class="row my-1">
                <div class="col-12 col-md-4">
                    <span>Identification code (meldcode)</span>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" class="form-control" name="meldcode" id="melcode">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <span>APK / Check valid until</span>
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control" type="text" name="apk_valid" id="datepicker13" />
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
                            echo "<option value='{$opt_value["conversion_id"]}'>{$opt_value['conversion_name']} </option>";
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
            <textarea placeholder="" rows="7" style="resize: none;" class="w-150 form-control" name="options" id="options"></textarea>
        </div>
    </div>
    <!-- ./ ROW  -->
    <!-- .ROW  -->
    <hr />


    <div class="row d-flex align-items-stretch">

        <div class="col col-5">
            <p>Remarks / Notes (internal)</p>
            <textarea placeholder="" rows="7" style="resize: none;" class="form-control" name="notes" id="notes"></textarea>
        </div>
        <div class="col-12 col-md-2"></div>
        <div class="col col-12 col-md-4">
            <p>Uploaded Documents</p>
            <textarea placeholder="" rows="7" style="resize: none;" class="form-control" name="uploaded_files" id="uploadedFiles"></textarea>
        </div>
    </div>
    <!-- ./ ROW  -->
    <hr />

        <!-- Main row 3 -->
        <div class="row">
            <?php 
                $imagesNumber = count($data['car_images'][0]);
                if($imagesNumber > 4) {
                    for($i = 4; $i < $imagesNumber; $i++){                    
                        echo "<div class='col-12 col-md-3 car-image-col'>
                            <img src='{$data['car_images'][0][$i]['cp_path']}' />
                        </div>";
                    }
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