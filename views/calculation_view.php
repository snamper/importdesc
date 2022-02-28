 <div class="content">
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

          <!-- Calculation rows -->
         <div class="row">
                        <div class="col-12 col-md-6">
                            <span><?php echo $_SESSION['lang']['car_start_page_27'] ?></span>
                        </div>
                        <div class="col-12 col-md-6" style="padding-left: 3%;">
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
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_28'] ?></span>
             </div>

             <div class="col-12 col-md-6"  style="padding-left: 3%;">
                 <select required class="form-control" id="carMake" name="car_make">
                     <option value="0">-</option>
                     <?php
                        if (isset($_GET['car_id'])) {
                            echo "<option selected value='{$data['single_car']['cmake_id']}'> {$data['single_car']['cmake_name']}</option>";
                        } ?>
                 </select>
             </div>
         </div>
         <div class="row">
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_29'] ?></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <div class="row">
                     <div class="col-12">
                         <select required class="form-control" name="car_model" id="carModel">
                             <option value="0"> - </option>
                             <?php
                                if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['car_model']}'> {$data['single_car']['cmodel_name']}</option>";
                                } ?>
                         </select>
                     </div>
                 </div>

             </div>

         </div>

         <div class="row">
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_32'] ?></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <select required class="form-control js-car-fuel" name="car_fuel" id="BPMbrandstof">
                     <option value="">-</option>
                     <?php if (isset($_GET['car_id'])) {
                            echo "<option selected value='{$data['single_car']['fuel_id']}'> {$_SESSION['lang'][$data['single_car']['fuel_name']]}</option>";
                        } ?>

                 </select>
             </div>
         </div>

         <div class="row">
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_33'] ?></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <div class="row">
                     <div class="col-12">

                         <select required class="form-control js-car-motor" name="motor" id="carMotor">
                             <option value="0">-</option>
                             <?php if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['cmotor_id']}'> {$data['single_car']['cmotor_name']}</option>";
                                } ?>

                         </select>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_30'] ?></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <div class="row">
                     <div class="col-12">

                         <select class="form-control" name="car_variant" id="carUitvoering">
                             <option value="0">-</option>
                             <?php
                                if (isset($_GET['car_id'])) {
                                    echo "<option selected value='{$data['single_car']['cmu_id']}'> {$data['single_car']['cmu_name']}</option>";
                                } ?>

                         </select>
                     </div>
                 </div>
             </div>
         </div>
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
                 <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['transport_national']) ?  $data['single_car']['transport_national'] : '€ 85.00') ?> " id="addTransport_Binnenland" name="transport_national" placeholder="">
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
                 <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['recycling_fee']) ?  $data['single_car']['recycling_fee'] : '€ 20.66') ?> " id="recyclingFee" name="recycling_fee" placeholder="">

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

         <div class="row">
             <div class="col-12 col-md-6">
                 <span><?php echo $_SESSION['lang']['car_start_page_61'] ?></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <input type="text" autocomplete="off" class="form-control" name="first_registration_date" id="datepicker1" value="<?php echo (isset($data['single_car']['cd_first_registration_date']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_registration_date']))   : "") ?>" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>>
             </div>
         </div>

         <div class="row">
                <div class="col-12 col-md-6">
                    <span><?php echo $_SESSION['lang']['car_start_page_63'] ?></span>
                </div>
                <div class="col-12 col-md-6" style="padding-left: 3%;">
                    <input class="form-control" autocomplete="off" type="text" name="first_name_nl_registration" value="<?php echo (isset($data['single_car']['cd_first_name_nl_registration']) ? date("d-m-Y", strtotime($data['single_car']['cd_first_name_nl_registration']))  : "") ?>" id="datepicker10" placeholder="" <?php echo (isset($data['single_car']['car_preorder']) && $data['single_car']['car_preorder'] == '1') ? 'disabled' : ''; ?>/>
                </div>
            </div>

         <div class="row">
             <div class="col-12 col-md-6">
                 <span>CO<sup>2</sup></span>
             </div>
             <div class="col-12 col-md-6" style="padding-left: 3%;">
                 <div class="row">
                     <div class="col-6">
                         <input type="text" class="form-control" id="BPMCO2WLTP" name="co_wltp" placeholder="<?php echo $_SESSION['lang']['car_start_page_37'] ?>" value="<?php echo (isset($data['single_car']['cd_co_wltp']) ? $data['single_car']['cd_co_wltp']  : "") ?>">
                     </div>
                     <div class="col-6 pl-0">
                         <input type="text" class="form-control" id="BPMCO2" name="co_nedc" placeholder="<?php echo $_SESSION['lang']['car_start_page_38'] ?>" value="<?php echo (isset($data['single_car']['cd_co_nedc']) ? $data['single_car']['cd_co_nedc']  : "") ?>">
                     </div>
                 </div>
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
                 <input type="text" class="form-control js-calc-input" value="<?php echo (isset($data['single_car']['fees']) ?  $data['single_car']['fees'] : '€ 91.80') ?> " id="addLeges" name="fees" placeholder="">
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