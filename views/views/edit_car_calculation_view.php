<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">            
        <form id="editCarForm" method="POST" action="edit_car">
            <input type="hidden" name="create_cars">
            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 200; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
                </div>
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 200; right: 0; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: orange; border: 1px solid orange;">Button</button>
                </div>
            </div>
                <?php include_once realpath("views/cars/single_car_form.php"); ?>
            </form>
        </div>
    </div>
    

            <?php include realpath("views/marge_view_include.php"); ?>

<h5>Car calculations</h5>
    <div class="">
    <table id="sample-table-2" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">Soort Voertuig</th>
            <th style="white-space: nowrap">Brandstof soort</th>
            <th style="white-space: nowrap">Eerste toelating</th>
            <th style="white-space: nowrap">Huidige datum BPM</th>
            <th style="white-space: nowrap">Tenaamstelling NL</th>
            <th style="white-space: nowrap">Referentie</th>
            <th style="white-space: nowrap">Uitvoering</th>
            <th style="white-space: nowrap">CO² NEDC</th>
            <th style="white-space: nowrap">CO² WLTP</th>
            <th style="white-space: nowrap">Restwaarde Percentage</th>
            <th style="white-space: nowrap">Inkoopprijs Netto BTW</th>
            <th style="white-space: nowrap">Afleverkosten</th>
            <th style="white-space: nowrap">Opknapkosten ex</th>
            <th style="white-space: nowrap">Transport Buitenland</th>
            <th style="white-space: nowrap">Transport Binnenland</th>
            <th style="white-space: nowrap">Taxatie Kosten</th>
            <th style="white-space: nowrap">Kosten Totaal</th>
            <th style="white-space: nowrap">Fee</th>
            <th style="white-space: nowrap">Verkoopprijs Netto</th>
            <th style="white-space: nowrap">BTW 21%</th>
            <th style="white-space: nowrap">Rest BPM Indicatief</th>
            <th style="white-space: nowrap">Leges</th>
            <th style="white-space: nowrap">Verkoopprijs Marge incl. BPM</th>
        </thead>
        <tbody>
            <?php
            foreach ($data['calculations'] as $c) { ?>
                    <tr>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['SoortVoertuig'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['BPMbrandstof'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['BPMproductiedatum'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['huidigedatumbpm'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['BPMtenaamstellingNL'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['referentie'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['carUitvoering'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['BPMCO2'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['BPMCO2WLTP'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['percentage'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['inkoopprijs_ex_ex'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['delivery_costs'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['opknapkosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['transport_buitenland'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['transport_binnenland'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['taxatie_kosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['totaalkosten'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['fee'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['verkoopprijs_ex'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['btw'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['restbpm'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['leges'] ?>
                        </td>
                        <td style='vertical-align: middle;' class="text-center">
                            <?php echo $c['verkoopprijsin'] ?>
                        </td>
                    </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <!-- END table -->