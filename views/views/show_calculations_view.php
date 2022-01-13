<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle dossiers </li> -->
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Calculations
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

<table id="sample-table-1" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">Inkoopprijs ex/ex</th>
            <th style="white-space: nowrap">Fee leverancier/bemiddelaar</th>
            <th style="white-space: nowrap">Inkoopprijs totaal</th>
            <th style="white-space: nowrap">Opknapkosten</th>
            <th style="white-space: nowrap">Transport buitenland</th>
            <th style="white-space: nowrap">Transport binnenland</th>
            <th style="white-space: nowrap">Taxatie kosten</th>
            <th style="white-space: nowrap">Totaal kosten</th>
            <th style="white-space: nowrap">Fee GWI</th>
            <th style="white-space: nowrap">Verkoopprijs ex/ex</th>
            <th style="white-space: nowrap">BTW 21%</th>
            <th style="white-space: nowrap">Verkoopprijs incl. BTW</th>
            <th style="white-space: nowrap">Rest BPM (indicatief)</th>
            <th style="white-space: nowrap">Leges (BTW vrij)</th>
            <th style="white-space: nowrap">Verkoopprijs in/in</th>
            <th style="white-space: nowrap">Connect</th>
        </thead>
        <tbody>
            <?php
            foreach ($data['calculations'] as $calc) { ?>

                    <tr>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['inkoopprijs_ex_ex'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['feeleverancier'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['inkoopprijstotaal'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['opknapkosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['transport_buitenland'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['transport_binnenland'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['taxatie_kosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['totaalkosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['fee'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['verkoopprijs_ex'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['btw'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['verkoopprijsbtw'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['restbpm'] ?>
                        </td>                        
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['leges'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $calc['verkoopprijsin']  ?>
                        </td>       
                        
                        <td style='vertical-align: middle;' class="text-center">
                       
                            Connect with a car:
                            <form action="calculation" method="POST" >
                                <input type="hidden" name="calculation_id" value="<?php echo $calc['calclulation_id'] ?>" />
                                <select class="form-control" name="car_id_to_connect" id="">
                                    <option value=""> - </option>
                                    <?php
                                    foreach ($data['cars'] as $car) {
                                       
                                       if( $calc['calculation_for_car_id'] == $car['carID'][0] ) {
                                           $selected  = "selected";
                                       }else {
                                           $selected = "";
                                       }
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $car['carID'][0] ?>"> <?php echo $car['carID'][0] .' : '.  $car['name'][0].' '.$car['name'][1] .' - ' .$car['motor'] ; ?></option>
                                      
                                    <?php }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Connect</button>
                    
                        </td>                           
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <!-- END table -->

</div>