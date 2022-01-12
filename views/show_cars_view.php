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
            <th style="white-space: nowrap">Edit/duplic</th>
            

            <th style="white-space: nowrap" class="text-center">Edit</th>

        </thead>
        <tbody>
            <?php
            foreach($data['cars'] as $car) {
                // echo '<pre>';
                // var_dump($car);
                // echo '</pre>';
                // exit;
                echo <<<HTML
                    <tr>
                        <td style='vertical-align: middle;' class="text-center">
                            ????
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            {$car['name'][0]} - {$car['name'][1]} - ???
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            ?????????
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                        {$car['name'][2]}
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            {$car['name'][0]}
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            {$car['name'][1]}
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            $car[uitvoering]
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            $car[motor]
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            $car[conversie_naam]
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            $car[transmissie]
                        </td>


                        <td style='vertical-align: middle;' class="text-center">
                            $car[productiedatum]
                        </td>

                        <td style='vertical-align: middle;' class="text-center">
                            $car[km_stand]
                        </td>

                        
                        

          
                    </tr>
                HTML;
            }
            ?>
       
        </tbody>
    </table>

    <!-- END table -->

</div>