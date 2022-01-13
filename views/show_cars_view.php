<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle dossiers </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Cars
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <?php

    ?>

<div class="table-responsive">
    <table id="sample-table-1" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">Datum aangemaakt</th>
            <th style="white-space: nowrap">Auto referentie</th>
            <th style="white-space: nowrap">Auto referentie (custom)</th>
            <th style="white-space: nowrap">Type</th>
            <th style="white-space: nowrap">Merk</th>
            <th style="white-space: nowrap">Model</th>
            <th style="white-space: nowrap">Uitvoering</th>
            <th style="white-space: nowrap">Motor</th>
            <th style="white-space: nowrap">Brandstof</th>
            <th style="white-space: nowrap">Transmissie</th>
            <th style="white-space: nowrap">Datum eerste toelating</th>
            <th style="white-space: nowrap">Km-stand</th>
            <th style="white-space: nowrap">Huidig land geregistreerd</th>
            <th style="white-space: nowrap">Vin</th>
            <th style="white-space: nowrap">Edit</th>
            <th style="white-space: nowrap">Duplicate</th>

        </thead>
        <tbody>
            <?php
            foreach ($data['cars'] as $car) {
                // echo '<pre>';
                // var_dump($car);
                // echo '</pre>';
                // exit;
                $date = date('Y-m-d', strtotime($car['DateIn'][0])); ?>
                    <tr>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $date ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['name'][0]. ' - ' . $car['name'][1] . ' - ' .  $date ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                        <?php echo $car['name'][2] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['name'][0] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['name'][1] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['uitvoering'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['motor'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                           <?php echo  $car['conversie_naam'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['transmissie'] ?>
                        </td>


                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['productiedatum'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['km_stand'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['huidigland'] ?>
                        </td>                        

                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $car['vinnummer'] ?>
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            <a class="btn btn-default btn-xs js-fill-car-info" data-id="<?php echo $car['carID'][0] ?>" data-toggle="modal" data-target="#editCarForm"><i class="ti-pencil"></i></a>

                            <a href="edit_car_calculation?car_id=<?php echo $car['carID'][0] ?>" class="btn btn-default btn-xs"><i class="ti-brush"></i></a>
                        </td>           
                        
                        <td style='vertical-align: middle;' class="text-center">
                            
                            <a href="edit_car?duplicate=<?php echo $car['carID'][0] ?>" class="btn btn-default btn-xs"><i class="ti-files"></i></a>
                            
                        </td>                   
                        
                        
                    </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
    <!-- END table -->

    <!-- Modal -->
    <div class="modal fade" id="editCarForm" tabindex="-1" role="dialog" aria-labelledby="editCarForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCarForm" method="POST" action="edit_car">
                        <?php include_once realpath("views/cars/single_car_form.php"); ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary send-form">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>