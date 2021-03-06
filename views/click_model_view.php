<?php
$data['single_car'] = $data['single_car'][0];
if (!empty($data['car_images'][0]))
    usort($data['car_images'][0], function ($a, $b) {
        return (intval($a['cp_imagepos']) < intval($b['cp_imagepos'])) ? -1 : 1;
    });
?>
<div class="content js-fill-in-container" id="createEditCarPage">
    <div class="ref-container">
        <span data-ref="carMake">
            <?php echo isset($data['single_car']['cmake_name']) ? substr($data['single_car']['cmake_name'], 0, 3) : ""; ?>
        </span>
        <span data-ref="carModel">
            <?php echo isset($data['single_car']['cmodel_name']) ? $data['single_car']['cmodel_name'] : ""; ?>
        </span>
        <span data-ref="vin">
            <?php echo isset($data['single_car']['cd_meldcode']) ? $data['single_car']['cd_meldcode'] : ""; ?>
        </span>
        <span data-ref="sourceSupplier">
            <?php echo isset($data['single_car']['cd_source_supplier']) ? $data['single_car']['cd_source_supplier'] : ""; ?>
        </span>
    </div>
    <form action="car_start" action="car_start" method="POST" id="createEditCarForm" class="listing__form">
        <div class="col-xs-12 table-list">
            <div class="row my-4 align-items-start">
                <div class="col-12 col-md-5">
                    <div class="upload-file js-upload"><?php echo $_SESSION['lang']['car_start_page_1'] ?>
                        <input type="file" name="upload_photo[]" multiple id="uploadCarImage">
                    </div>
                </div>
                <div class="col-12 col-md-6" style="padding-right: 2%;">
                    <div class="upload-file js-upload"><?php echo $_SESSION['lang']['car_start_page_2'] ?>
                        <input type="file" name="upload_document[]" multiple id="uploadCarDocument">
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET['car_id'])) {
                echo "<input type='hidden' name='car_id' value='{$_GET['car_id']}'>";
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
                    <button type="submit" name="create_car" class="btn btn-primary">Create Car</button>
                </div>

                <div class="custom-col">
                    <button type="submit" name="create_open_car" class="btn btn-primary"><?php echo $_SESSION['lang']['car_start_page_3'] ?></button>
                </div>

            </div>

            <?php if (isset($_GET['duplicate'])) : ?>

                <hr />

                <div class="row">
                    <div class="col-12">
                        <span class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_10'] ?></span>
                    </div>
                </div>

                <div class="row align-items-start">
                    <!-- Left col  -->
                    <div class="col-12 col-md-5">

                        <div class="row" style="height: 40px;">
                            <div class="col-12 col-md-4">
                                <span><?php echo $_SESSION['lang']['car_start_page_11'] ?></span>
                            </div>
                            <div class="col-12 col-md-8">
                                <?php
                                if (isset($_GET['car_id'])) {
                                    echo sprintf("A%'.07d\n", $_GET['car_id']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span><?php echo $_SESSION['lang']['car_start_page_12'] ?></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control" id="duplicateNumber" type="number" name="duplicate_number" value="1" placeholder="" required />
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif ?>

            <hr />
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_13'] ?></span>
                </div>
            </div>
            <!-- Main row 1 -->
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4 spacer"></div>
                        <div class="col-12 col-md-8">
                            <span><?php echo $_SESSION['lang']['car_start_page_14'] ?></span>
                            <input type="checkbox" name="preorder" id="preorder" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row" style="height: 40px;">
                        <div class="col-12 col-md-6">
                            <span><?php echo $_SESSION['lang']['car_start_page_15'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php echo isset($_GET['car_id']) ? sprintf("A%'.07d\n", $_GET['car_id']) : ''; ?>
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
                            <span><?php echo $_SESSION['lang']['car_start_page_16'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select required class="form-control" name="status">
                                <option value="0">-</option>
                                <?php foreach ($data['car_status'] as $opt_value) {
                                    if (isset($data['single_car']['cd_status']) && $data['single_car']['cd_status'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_17'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" required id="customReference" type="text" name="car_ref_custom" value="<?php echo (isset($data['single_car']['cd_car_ref_custom']) ? $data['single_car']['cd_car_ref_custom']  : "") ?>" placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_18'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control js-fill-refer" type="text" name="vin" id="vin" value="<?php echo (isset($data['single_car']['cd_vin']) ? $data['single_car']['cd_vin']  : "") ?>" placeholder="" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?> />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_19'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="text" name="komm_number" value="<?php echo (isset($data['single_car']['cd_komm_number']) ? $data['single_car']['cd_komm_number']  : "") ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_20'] ?></span>
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
                            <span><?php echo $_SESSION['lang']['car_start_page_21'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control js-fill-refer" type="text" name="source_supplier" id="sourceSupplier" value="<?php echo (isset($data['single_car']['cd_source_supplier']) ? $data['single_car']['cd_source_supplier']  : "") ?>" placeholder="" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_22'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="text" name="supplier_ref" value="<?php echo (isset($data['single_car']['cd_supplier_ref']) ? $data['single_car']['cd_supplier_ref']  : "") ?>" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_23'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="current_registration" id="curReg" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>>
                                <?php foreach ($data['car_registration_country'] as $opt_value) {
                                    if (isset($data['single_car']['cd_current_registration']) && $data['single_car']['cd_current_registration'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_24'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="coc" id="cOc" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>>
                                <?php foreach ($data['coc'] as $opt_value) {
                                    if (isset($data['single_car']['cd_coc']) && $data['single_car']['cd_coc'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_25'] ?></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input class="form-control" type="number" name="conf_number" value="<?php echo (isset($data['single_car']['cd_conf_number']) ? $data['single_car']['cd_conf_number']  : "") ?>" />
                        </div>
                    </div>
                </div>
            </div> <!-- Rigth col -->
            <!-- ./ Main row 1 -->
            <hr />
            <!-- Main row 2 -->
            <div class="row justify-content-center align-items-stretch">
                <!-- Left col  -->
                <div class="col-12 col-md-5">
                    <div class="row" style="height: 50px;">
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold"><?php echo $_SESSION['lang']['car_start_page_26'] ?></span>
                        </div>
                    </div>

                    <!-- Rows  -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_27'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select name="car_vehicle_type" id="SoortVoertuig" class="form-control">
                                <!-- <option value="0">-</option> -->
                                <?php
                                $selectedVhclType = (!is_null($data['single_car']['car_vehicle_type'])) ? intval($data['single_car']['car_vehicle_type']) : -1;
                                ?>
                                <option <?php echo ($selectedVhclType == 1 || $selectedVhclType == -1) ? "selected" : ""; ?> value="1">Passenger car</option>
                                <option <?php echo $selectedVhclType == 2  ? "selected" : ""; ?> value="2">Company car max. 3500kg</option>
                                <option <?php echo $selectedVhclType == 3  ? "selected" : ""; ?> value="3">Camper</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_28'] ?></span>
                        </div>

                        <div class="col-12 col-md-8">
                            <select required class="form-control js-car-make js-fill-refer" id="carMake" name="car_make">
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
                            <span><?php echo $_SESSION['lang']['car_start_page_29'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <select required class="form-control js-car-model js-fill-refer" name="car_model" id="carModel">
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
                            <span><?php echo $_SESSION['lang']['car_start_page_30'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">

                                    <select class="form-control js-car-variant" name="car_variant" id="carUitvoering">
                                        <option value="0">-</option>
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
                            <span><?php echo $_SESSION['lang']['car_start_page_31'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select class="form-control" name="car_body_style" id="">
                                <?php foreach ($data['body_style'] as $opt_value) {
                                    if (isset($data['single_car']['car_body_style']) && $data['single_car']['car_body_style'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_32'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select required class="form-control js-car-fuel" name="car_fuel" id="BPMbrandstof">
                                <option value="">-</option>
                                <?php if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['fuel_id']}'> {$_SESSION['lang'][$data['single_car']['fuel_name']]}</option>";
                                } ?>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_33'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">

                                    <select required class="form-control js-car-motor" name="motor" id="carMotor">
                                        <option value="0">-</option>
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
                            <span><?php echo $_SESSION['lang']['car_start_page_34'] ?></span>
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
                                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
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
                            <span><?php echo $_SESSION['lang']['car_start_page_35'] ?></span>
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
                            <span><?php echo $_SESSION['lang']['car_start_page_61'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="text" autocomplete="off" class="form-control" name="first_registration_date" id="datepicker1" value="<?php echo (isset($data['single_car']['cd_first_registration_date']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_registration_date']))   : "") ?>" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span>CO<sup>2</sup></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <input type="text" class="form-control" id="BPMCO2WLTP" name="co_wltp" placeholder="<?php echo $_SESSION['lang']['car_start_page_37'] ?>" value="<?php echo (isset($data['single_car']['cd_co_wltp']) ? $data['single_car']['cd_co_wltp']  : "") ?>">
                                </div>
                                <div class="col-6 pl-0">
                                    <input type="text" class="form-control" id="BPMCO2" name="co_nedc" placeholder="<?php echo $_SESSION['lang']['car_start_page_38'] ?>" value="<?php echo (isset($data['single_car']['cd_co_nedc']) ? $data['single_car']['cd_co_nedc']  : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_39'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <input class="form-control" type="number" name="kilometers" onfocus="this.value=''" value="<?php echo (isset($data['single_car']['cd_kilometers']) ? $data['single_car']['cd_kilometers']  : 0) ?>">
                        </div>
                    </div>

                    <hr />

                    <div class="row" style="height: 30px;">
                        <div class="col-12 col-md-4">
                            <?php echo $_SESSION['lang']['car_start_page_40'] ?>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="checkbox" name="paint_type" <?php echo (isset($data['single_car']['cd_paint_type']) && $data['single_car']['cd_paint_type'] == '1' ? "checked" : "") ?> />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <span><?php echo $_SESSION['lang']['car_start_page_41'] ?></span>
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
                                            echo "<option value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
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
                            <span><?php echo $_SESSION['lang']['car_start_page_42'] ?></span>
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
                                            echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
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
                            <span><?php echo $_SESSION['lang']['car_start_page_43'] ?></span>
                        </div>
                        <div class="col-12 col-md-8">
                            <select class="form-control" name="interior_material" id="">
                                <option value="0">-</option>
                                <?php foreach ($data['interior_material'] as $opt_value) {
                                    if (isset($data['single_car']['cd_interior_material']) && $data['single_car']['cd_interior_material'] == $opt_value["conversion_id"]) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
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
                    <div class="container" id="calculationContainer" style="margin-left: 0!important;padding-left: 0!important;">
                        <div class="row align-items-start" style="gap: 1%;">
                            <div class="col-6 col-md-8 calculation-col">
                                <div class="row flex-nowrap" style="height: 50px; align-items: center;">

                                    <div class="col-6 col-md-6">
                                        <span><?php echo $_SESSION['lang']['car_start_page_45'] ?></span>
                                        <input type="checkbox" name="switchvat" id="switchvat" <?php
                                                                                                if (isset($data['single_car']['car_vat_marge'])) {
                                                                                                    echo ($data['single_car']['car_vat_marge'] == '0') ? "checked" : "";
                                                                                                } else {
                                                                                                    echo 'checked';
                                                                                                }
                                                                                                ?>>
                                        <span><?php echo $_SESSION['lang']['car_start_page_44'] ?></span>
                                        <input type="checkbox" name="switchmargin" id="switchmargin" <?php
                                                                                                        echo ((isset($data['single_car']['car_vat_marge']) && $data['single_car']['car_vat_marge'] == '1') ? "checked" : "")
                                                                                                        ?>>
                                    </div>
                                    <div class="col-6 col-md-3" style="padding-left: 3%; white-space: nowrap;">
                                        <label for="lockSalesPriceCh" class="font-weight-normal">Lock sales price</label>
                                        <input type="checkbox" name="lock_sales_price" id="lockSalesPriceCh" <?php echo (isset($data['single_car']['calculation_lock_sales_price']) && $data['single_car']['calculation_lock_sales_price'] == '1') ? "checked" : "" ?> />
                                    </div>
                                    <div class="col-6 col-md-1 text-right">
                                        <span>VAT</span>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <select name="vat_percentage" id="vatPercentage" class="form-control">
                                            <?php
                                            $percentage = isset($data['single_car']['calculation_vat_percentage']) ? $data['single_car']['calculation_vat_percentage'] : 21;

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

                                <!-- Current date  -->
                                <input type="hidden" autocomplete="off" class="form-control" name="huidigedatumbpm" id="datepicker2" value="<?php echo date('d-m-Y') ?>">

                                <div class="row str">
                                    <div class="col-12 col-md-6" id="priceNetoText">
                                        <?php echo $_SESSION['lang']['car_start_page_46'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" id="inkoopprijs_ex_ex" value="<?php echo (isset($data['single_car']['purchase_price_netto']) ?  $data['single_car']['purchase_price_netto'] : "") ?> " name="purchase_price_netto" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_47'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" id="addAfleverkosten" value="<?php echo (isset($data['single_car']['fee_intermediate_supplier']) ?  $data['single_car']['fee_intermediate_supplier'] : '') ?> " name="fee_intermediate_supplier" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold" id="totalPriceNetoText">
                                        <?php echo $_SESSION['lang']['car_start_page_48'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input class="form-control" readonly type="text" value="<?php echo (isset($data['single_car']['total_purchase_price_netto']) ?  $data['single_car']['total_purchase_price_netto'] : '') ?> " name="total_purchase_price_netto" id="totalPriceNettoSuppluier">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_49'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['costs_damage_and_repair']) ?  $data['single_car']['costs_damage_and_repair'] : '') ?> " id="addOpknapkosten" name="costs_damage_and_repair" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_50'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" id="addTransport_Buitenland" value="<?php echo (isset($data['single_car']['transport_international']) ?  $data['single_car']['transport_international'] : '') ?> " name="transport_international" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_51'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['transport_national']) ?  $data['single_car']['transport_national'] : '??? 85.00') ?> " id="addTransport_Binnenland" name="transport_national" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_52'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['costs_taxation_bpm']) ?  $data['single_car']['costs_taxation_bpm'] : '') ?> " id="costTaxation" name="costs_taxation_bpm" placeholder="">

                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Recycling fee
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['recycling_fee']) ?  $data['single_car']['recycling_fee'] : '??? 20.66') ?> " id="recyclingFee" name="recycling_fee" placeholder="">

                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_53'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" <?php echo (isset($data['single_car']['calculation_lock_sales_price']) && $data['single_car']['calculation_lock_sales_price'] == 0 || !isset($data['single_car']['calculation_lock_sales_price'])  ? "" : "readonly") ?> class="form-control js-calc-input" id="addFee" value="<?php echo (isset($data['single_car']['fee_gwi']) ?  $data['single_car']['fee_gwi'] : '') ?> " name="fee_gwi" placeholder="">

                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold">
                                        <?php echo $_SESSION['lang']['car_start_page_54'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly class="form-control" type="text" value="<?php echo (isset($data['single_car']['total_costs_and_fee']) ?  $data['single_car']['total_costs_and_fee'] : '') ?> " name="total_costs_and_fee" id="totalCostsFee">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold " id="salesPriceNetoText">
                                        <?php echo $_SESSION['lang']['car_start_page_55'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly class="form-control" type="text" value="<?php echo (isset($data['single_car']['sales_price_netto']) ?  $data['single_car']['sales_price_netto'] : '') ?> " name="sales_price_netto" id="totalPriceFee">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6" id="addBTWText">
                                        <?php echo $_SESSION['lang']['car_start_page_56'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly type="text" class="form-control" id="addBTW_21" value="<?php echo (isset($data['single_car']['vat_btw']) ?  $data['single_car']['vat_btw'] : '') ?> " name="vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6" id="addVerkooText">
                                        <?php echo $_SESSION['lang']['car_start_page_57'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly type="text" class="form-control" id="addVerkoopprijs_Marge_incl" value="<?php echo (isset($data['single_car']['sales_price_incl_vat_btw']) ?  $data['single_car']['sales_price_incl_vat_btw'] : '') ?> " name="sales_price_incl_vat_btw" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_58'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input js-calc-from-bpm" value="<?php echo (isset($data['single_car']['rest_bpm']) ?  $data['single_car']['rest_bpm'] : '') ?> " id="addRest_BPM" name="rest_bpm" placeholder="Rest BPM Indicatief">

                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        <?php echo $_SESSION['lang']['car_start_page_59'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['fees']) ?  $data['single_car']['fees'] : '??? 91.80') ?> " id="addLeges" name="fees" placeholder="">
                                    </div>
                                </div>
                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold" id="salesPriceTotalText">
                                        <?php echo $_SESSION['lang']['car_start_page_60'] ?>
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input class="form-control js-calc-from-total" <?php echo (isset($data['single_car']['calculation_lock_sales_price']) && $data['single_car']['calculation_lock_sales_price'] == 0 || !isset($data['single_car']['calculation_lock_sales_price'])  ? "readonly" : "") ?> value="<?php echo (isset($data['single_car']['sales_price_total']) ?  $data['single_car']['sales_price_total'] : '') ?> " type="text" name="sales_price_total" id="totalAll">
                                    </div>
                                </div>
                                <div class="row mt-4"></div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Bruto BPM (indication)
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly type="text" class="form-control" value="<?php echo (isset($data['single_car']['bruto_bpm']) ?  $data['single_car']['bruto_bpm'] : '') ?> " id="BPMBruto" name="bruto_bpm" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6 font-weight-bold">
                                        % BPM
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input type="text" class="form-control js-percantege-change-calc" id="percentage" value="<?php echo (isset($data['single_car']['percentage']) ?  $data['single_car']['percentage'] : '') ?>" name="percentage" placeholder="">
                                    </div>
                                </div>

                                <div class="row str">
                                    <div class="col-12 col-md-6">
                                        Rest BPM (indication)
                                    </div>
                                    <div class="col-12 col-md-6" style="padding-left: 3%;">
                                        <input readonly type="text" class="form-control" value="<?php echo (isset($data['single_car']['rest_bpm_indication']) ?  $data['single_car']['rest_bpm_indication'] : '') ?> " id="addRest_BPMReadOnly" name="rest_bpm_indication" placeholder="Rest BPM Indicatief">
                                    </div>
                                </div>

                            </div>
                            <!-- Calculation  -->

                            <!-- Images  -->
                            <div class="col-12 col-md-2 recent-images-col">
                                <div class='row'>
                                    <div class='col-12 car-image-col'>

                                        <?php
                                        if (empty($data['car_images'][0])) {
                                            for ($i = 0; $i < 5; $i++) {
                                                echo "<div class='car-image'>
                                                    <img src='/assets/images/no-image.gif' data-recent-imagepos='0' data-noimage='true' />
                                                </div>";
                                            }
                                        } else {
                                            $imagesCount = count($data['car_images'][0]);
                                            for ($i = $imagesCount - 1; $i >= 0; $i--) {

                                                if ($i < $imagesCount - 5) {
                                                    break;
                                                }
                                                echo "<div class='car-image'>
                                                    <span class='ti-trash'></span>
                                                    <img src='/{$data['car_images'][0][$i]['cp_path']}' draggable='true' ondragstart='onImageDrag(event)' ondragover='allowDrop(event)' ondrop='onImageDrop(event)' data-recent-imagepos='{$data['car_images'][0][$i]['cp_imagepos']}' />
                                                </div>";
                                            }
                                            $left = 5 - $imagesCount;
                                            if ($left > 0) {
                                                for ($i = 0; $i < $left; $i++) {
                                                    echo "<div class='car-image'>
                                                    <img src='/assets/images/no-image.gif' data-recent-imagepos='0' data-noimage='true' />
                                                    </div>";
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- Rigth col -->
            </div> <!-- Subrow  -->
        </div>
        <!-- ./ Main row 2 -->
        <hr />


        <div class="row justify-content-center align-items-start">
            <!-- Left col  -->
            <div class="col-12 col-md-5">
                <!-- Rows  -->
                <div class="row">
                    <div class="col-12 col-md-4">
                        <span><?php echo $_SESSION['lang']['car_start_page_62'] ?></span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="text" autocomplete="off" class="form-control" value="<?php echo (isset($data['single_car']['cd_first_nl_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_nl_registration']))   : "") ?>" name="first_nl_registration" id="datepicker3" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span><?php echo $_SESSION['lang']['car_start_page_63'] ?></span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input class="form-control" autocomplete="off" type="text" name="first_name_nl_registration" value="<?php echo (isset($data['single_car']['cd_first_name_nl_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_name_nl_registration']))  : "") ?>" id="datepicker10" placeholder="" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?> />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span><?php echo $_SESSION['lang']['car_start_page_64'] ?></span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input class="form-control" autocomplete="off" type="text" name="last_name_registration" id="datepicker11" value="<?php echo (isset($data['single_car']['cd_last_name_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_last_name_registration']))  : "") ?>" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?> />
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
                        <span><?php echo $_SESSION['lang']['car_start_page_65'] ?></span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" name="nl_registration_number" id="nlRegNumber" value="<?php echo (isset($data['single_car']['cd_nl_registration_number']) ? $data['single_car']['cd_nl_registration_number']  : "") ?>" placeholder="" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?> />
                    </div>
                </div>


                <div class="row my-1">
                    <div class="col-12 col-md-4">
                        <span><?php echo $_SESSION['lang']['car_start_page_66'] ?></span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" name="meldcode" id="melcode" value="<?php echo (isset($data['single_car']['cd_meldcode']) ? $data['single_car']['cd_meldcode']  : "") ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <span><?php echo $_SESSION['lang']['car_start_page_67'] ?></span>
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
        <p><?php echo $_SESSION['lang']['car_start_page_68'] ?></p>
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="navigation"><?php echo $_SESSION['lang']['car_start_page_69'] ?></label>
                        <select name="navigation" id="navigation" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['navigation'] as $opt_value) {
                                if (isset($data['single_car']['cd_navigation']) && $data['single_car']['cd_navigation'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="keylessEntry"><?php echo $_SESSION['lang']['car_start_page_70'] ?></label>
                        <select name="keyless_entry" id="keylessEntry" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['keyless_entry'] as $opt_value) {
                                if (isset($data['single_car']['cd_keyless_entry']) && $data['single_car']['cd_keyless_entry'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="appConnect"><?php echo $_SESSION['lang']['car_start_page_71'] ?></label>
                        <select name="app_connect" id="appConnect" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['app_connect'] as $opt_value) {
                                if (isset($data['single_car']['cd_app_connect']) && $data['single_car']['cd_app_connect'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="airco"><?php echo $_SESSION['lang']['car_start_page_72'] ?></label>
                        <select name="airco" id="airco" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['airco'] as $opt_value) {
                                if (isset($data['single_car']['cd_airco']) && $data['single_car']['cd_airco'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="roof"><?php echo $_SESSION['lang']['car_start_page_73'] ?></label>
                        <select name="roof" id="roof" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['roof'] as $opt_value) {
                                if (isset($data['single_car']['cd_roof']) && $data['single_car']['cd_roof'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="wheels"><?php echo $_SESSION['lang']['car_start_page_74'] ?></label>
                        <select name="wheels" id="wheels" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['wheels'] as $opt_value) {
                                if (isset($data['single_car']['cd_wheels']) && $data['single_car']['cd_wheels'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="headlights"><?php echo $_SESSION['lang']['car_start_page_75'] ?></label>
                        <select name="headlights" id="headlights" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['headlights'] as $opt_value) {
                                if (isset($data['single_car']['cd_headlights']) && $data['single_car']['cd_headlights'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="pdc"><?php echo $_SESSION['lang']['car_start_page_76'] ?></label>
                        <select name="pdc" id="pdc" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['pdc'] as $opt_value) {
                                if (isset($data['single_car']['cd_pdc']) && $data['single_car']['cd_pdc'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="cockpit"><?php echo $_SESSION['lang']['car_start_page_77'] ?></label>
                        <select name="cockpit" id="cockpit" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['cockpit'] as $opt_value) {
                                if (isset($data['single_car']['cd_cockpit']) && $data['single_car']['cd_cockpit'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="camera"><?php echo $_SESSION['lang']['car_start_page_78'] ?></label>
                        <select name="camera" id="camera" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['camera'] as $opt_value) {
                                if (isset($data['single_car']['cd_camera']) && $data['single_car']['cd_camera'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="cruise"><?php echo $_SESSION['lang']['car_start_page_79'] ?></label>
                        <select name="cruise_control" id="cruise" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['cruise_control'] as $opt_value) {
                                if (isset($data['single_car']['cd_cruise_control']) && $data['single_car']['cd_cruise_control'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="tow"><?php echo $_SESSION['lang']['car_start_page_80'] ?></label>
                        <select name="tow_bar" id="tow" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['tow_bar'] as $opt_value) {
                                if (isset($data['single_car']['cd_tow_bar']) && $data['single_car']['cd_tow_bar'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div> <!-- ./ .col-5  -->

            <div class="col-12 col-md-7">

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="sportSeats"><?php echo $_SESSION['lang']['car_start_page_81'] ?></label>
                        <select name="sport_seats" id="sportSeats" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['sport_seats'] as $opt_value) {
                                if (isset($data['single_car']['cd_sport_seats']) && $data['single_car']['cd_sport_seats'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-5">
                        <label for="sportPackage"><?php echo $_SESSION['lang']['car_start_page_82'] ?></label>
                        <select name="sport_package" id="sportPackage" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['sport_package'] as $opt_value) {
                                if (isset($data['single_car']['cd_sport_package']) && $data['single_car']['cd_sport_package'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="seatsElectric"><?php echo $_SESSION['lang']['car_start_page_83'] ?></label>
                        <select name="seats_electric" id="seatsElectric" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['seats_electric'] as $opt_value) {
                                if (isset($data['single_car']['cd_seats_electric']) && $data['single_car']['cd_seats_electric'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="heating"><?php echo $_SESSION['lang']['car_start_page_84'] ?></label>
                        <select name="seat_heating" id="heating" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['seat_heating'] as $opt_value) {
                                if (isset($data['single_car']['cd_seat_heating']) && $data['single_car']['cd_seat_heating'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="seatMassage"><?php echo $_SESSION['lang']['car_start_page_85'] ?></label>
                        <select name="seat_massage" id="seatMassage" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['seat_massage'] as $opt_value) {
                                if (isset($data['single_car']['cd_seat_massage']) && $data['single_car']['cd_seat_massage'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="optics"><?php echo $_SESSION['lang']['car_start_page_86'] ?></label>
                        <select name="optics" id="optics" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['optics'] as $opt_value) {
                                if (isset($data['single_car']['cd_optics']) && $data['single_car']['cd_optics'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label for="tindedWindows"><?php echo $_SESSION['lang']['car_start_page_87'] ?></label>
                        <select name="tinted_windows" id="tindedWindows" class="form-control">
                            <option value="0">-</option>
                            <?php
                            foreach ($data['tinted_windows'] as $opt_value) {
                                if (isset($data['single_car']['cd_tinted_windows']) && $data['single_car']['cd_tinted_windows'] == $opt_value["conversion_id"]) {
                                    $selected = "selected";
                                } else {
                                    $selected  = "";
                                }
                                echo "<option  $selected value='{$opt_value["conversion_id"]}'>{$_SESSION['lang'][$opt_value['conversion_name']]} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>
            </div> <!-- /. .col-7 -->
        </div> <!-- ./ .row Section Factory Options / Highlights -->


        <hr />

        <p><?php echo $_SESSION['lang']['car_start_page_88'] ?></p>
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
                <p><?php echo $_SESSION['lang']['car_start_page_89'] ?></p>
                <textarea placeholder="" rows="7" class="form-control remarks" name="notes" id="notes"><?php echo (isset($data['single_car']['cd_notes']) ? $data['single_car']['cd_notes']  : "") ?></textarea>
            </div>
            <div class="col col-12 col-md-6">
                <p><?php echo $_SESSION['lang']['car_start_page_90'] ?></p>
                <div class="form-control show-documents uploaded-documents-col" name="uploaded_files" id="uploadedFiles">
                    <?php
                    if (!is_null($data['single_car_documents'][0])) {
                        foreach ($data['single_car_documents'][0] as $key => $doc) {
                            echo "<div class='document' data-doc-id='{$doc['cd_id']}'>
                                <a href='{$doc['cd_path']}' about='_blank'>{$doc['cd_filename']}</a><span class='ti-trash'></span>
                            </div>";
                        }
                    }
                    ?></div>
            </div>
        </div>
        <!-- ./ ROW  -->

        <!-- .ROW  -->
        <!-- .ROW  -->
        <hr />


        <div class="row d-flex align-items-stretch">

            <div class="col col-12 col-md-5">
                <p><?php echo $_SESSION['lang']['car_start_page_91'] ?></p>
                <div class="row d-flex flex-nowrap align-items-stretch form-control show-documents text-muted connected-modules">
                    <div class="col-3">
                        <?php echo $_SESSION['lang']['car_start_page_92'] ?>
                    </div>
                    <div class="col-3"><?php echo $_SESSION['lang']['car_start_page_93'] ?>
                    </div>
                    <div class="col-3"><?php echo $_SESSION['lang']['car_start_page_94'] ?>
                    </div>
                    <div class="col-3"><?php echo $_SESSION['lang']['car_start_page_95'] ?>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-7">
                <p><?php echo $_SESSION['lang']['car_start_page_96'] ?></p>
                <div class="row d-flex flex-nowrap">
                    <div class="col-5 show-documents text-muted" style="white-space: nowrap; overflow: hidden;">
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_97'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_98'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_99'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_100'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_101'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_102'] ?></div>
                        <div class="row ml-1 mt-2"><?php echo $_SESSION['lang']['car_start_page_103'] ?></div>
                    </div>
                    <div class="col-5 show-documents internal-information" style="white-space: nowrap; background-color: white; overflow: hidden; border-radius: 3px; border: 1px solid #DCDCDC;">
                        <div class="row ml-1 mt-2"><input type="checkbox" name="source" id="sourceByCh" <?php echo (isset($data['single_car']['car_source']) && $data['single_car']['car_source'] == '1') ? "checked" : "" ?> /></div>
                        <div class="row ml-1 mt-2"><span>
                                <select name="source_id" id="sourceBy" class="form-control" <?php echo (isset($data['single_car']['car_source']) && $data['single_car']['car_source'] == '1') ? "disabled" : "" ?>>
                                    <option value="0">-</option>
                                    <?php
                                    foreach ($data['users'][0] as $user) {
                                        if (isset($data['single_car']['car_source_id']) && $data['single_car']['car_source_id'] == $user["expo_users_ID"]) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                        echo "<option $selected value='{$user["expo_users_ID"]}'>{$user["expo_users_name"]} </option>";
                                    }
                                    ?>
                                </select>
                            </span></div>
                        <div class="row ml-1 mt-2"><span><?php
                                                            echo (isset($data['single_car']['created_by']) ? $data['single_car']['created_by']  : "__")
                                                            ?></span></div>
                        <div class="row ml-1 mt-2"><span><?php
                                                            echo (isset($data['single_car']['created_at']) ? $data['single_car']['created_at']  : "__")
                                                            ?></span></div>
                        <div class="row ml-1 mt-2"><span><?php
                                                            echo (isset($data['single_car']['last_edited_by']) ? $data['single_car']['last_edited_by']  : "__")
                                                            ?></span></div>
                        <div class="row ml-1 mt-2"><span><?php
                                                            echo (isset($data['single_car']['updated_at']) ? $data['single_car']['updated_at']  : "__")
                                                            ?></span></div>
                        <div class="row ml-1 mt-2"><span>Dealer call name</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ ROW  -->

        <hr />

        <!-- Main row 3 -->
        <p><?php echo $_SESSION['lang']['car_start_page_104'] ?></p>
        <div class="row car-images-row" data-extra-images='true'>
            <?php
            $imagesNumber = count($data['car_images'][0]);
            for ($i = $imagesNumber - 1; $i >= 0; $i--) {
                echo "<div class='col-12 col-md-3 car-image-col'>
                    <div class='car-image'>
                        <span class='ti-trash'></span>
                        <img src='{$data['car_images'][0][$i]['cp_path']}' draggable='true' ondragstart='onImageDrag(event)' ondragover='allowDrop(event)' ondrop='onImageDrop(event)' data-imagepos='{$data['car_images'][0][$i]['cp_imagepos']}' />
                    </div>
                </div>";
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