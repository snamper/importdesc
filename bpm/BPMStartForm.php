<?php


//// voor de test
// todo deze per item isset doen
if (!isset($_GET['BPMCO2'])) {
} else {
    $_POST['BPMCO2'] = $_GET['BPMCO2'];
    $_POST["BPMproductiedatum"] = $_GET['BPMproductiedatum'];
    $_POST['BPMbrandstof'] = $_GET['BPMbrandstof'];
    $_POST["BPMtenaamstellingNL"] = $_GET['BPMtenaamstellingNL'];
    $_POST['variabeledatumbpm'] = $_GET['variabeledatumbpm'];
    $_POST['variabeledatumbpm'] = $_GET['variabeledatumbpm'];
    $_POST['forfetaire_uitkomst'] = $_GET['a'];
    $_POST['forfetaire_variabel_uitkomst'] = $_GET['b'];
    $_POST['percentage'] = $_GET['percentage'];
    $_POST['PercentageC'] = $_GET['percentagec'];
}
//
//
//$_POST['variabeledatumbpm']='2017-01-01';// todo hier een variabel veld van maken in form
//// Dit doet niks in de berekening
//$_POST["historischenieuwwaardekeuze"]=0; // vor de viscale
//$_POST["meeruitvoeringentotaal"]=0; // vooor de viscale
//
//$_POST["totaalx"]=$_POST["historischenieuwwaardekeuze"]+$_POST["meeruitvoeringentotaal"]; //voor de viscale
//// tot hier doet het niets
//
//
//$_POST["brutobpm"]=2392; // todo overnemen uit de berekening van jaren
//$_POST["schadebedrag"]=0; // todo in form opnemen

//// einde voor de test


include_once("../data/library/functions_01/Bpm.php");


?>


<?php $co2 = $_POST['BPMCO2']; ?>
<?php $datum = $_POST["BPMproductiedatum"]; ?>
<?php $year_tns = date('Y', strtotime($datum)); ?>
<?php $brandstof = $_POST['BPMbrandstof']; ?>


<?php $years = getYears($datum); ?>


<?php if ($co2 != '' && $year_tns != '1970' && $co2 != '')
    foreach ($years as $key => $value) { ?>
    <?php floor(calculateBpm($co2, $value['bpm_date'], $brandstof)); ?>
    <?php $_POST['BPMArray'][] = floor(calculateBpm($co2, $value['bpm_date'], $brandstof)); ?>

<?php }
else { ?>

<?php } ?>


<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form method="POST" action="../data/library/bpm/BPMUpdate.php" class="listing__form">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="table-list body1" style="width: 100%;">



                            <div class="form-group col-xs-12">
                                <h3>BPM Forfaitair Berekenen NEDC</h3>
                            </div>



                            <div class="row str">
                                <div class="col-sm-2">Soort Voertuig</div>
                                <div class="col-sm-4">
                                    <select name="SoortVoertuig" id="SoortVoertuig" class="form-control">
                                        <option value="0">Maak een keuze</option>
                                        <option <?php if ($_GET['SoortVoertuig'] == 1) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="1">Personenwagen (standaard)</option>
                                        <option <?php if ($_GET['SoortVoertuig'] == 2) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="2">Bedrijfswagen tot 3500KG</option>
                                        <option <?php if ($_GET['SoortVoertuig'] == 3) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="3">Camper</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Eerste Toelating</div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" <?php if ($_POST["BPMproductiedatum"] == '' || $_POST["BPMproductiedatum"] == '1970-01-01 ') { ?> value='' <?php } else { ?> value='<?php echo date('d-m-Y ', strtotime($_POST["BPMproductiedatum"])); ?>' <?php } ?> class="form-control" name="BPMproductiedatum" id="datepicker3">
                                </div>

                                <div class="col-sm-2">Tenaamstelling NL</div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" <?php if ($_POST["BPMproductiedatum"] == '' || $_POST["BPMproductiedatum"] == '1970-01-01 ') { ?> value='' <?php } else { ?> value='<?php echo date('d-m-Y ', strtotime($_POST["BPMproductiedatum"])); ?>' <?php } ?> class="form-control" name="BPMtenaamstellingNL" id="datepicker4">
                                </div>
                            </div>




                            <div class="row str">
                                <div class="col-sm-2">Brandstof soort</div>
                                <div class="col-sm-4">
                                    <select name="BPMbrandstof" id="BPMbrandstof" class="form-control">
                                        <option value="0">Maak een keuze</option>
                                        <option <?php if ($_GET['BPMbrandstof'] == 1) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="1">Benzine</option>
                                        <option <?php if ($_GET['BPMbrandstof'] == 2) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="2">Diesel</option>
                                        <option <?php if ($_GET['BPMbrandstof'] == 3) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="3">PHEV Benzine</option>
                                        <option <?php if ($_GET['BPMbrandstof'] == 4) {
                                                    echo "selected";
                                                } else {
                                                } ?> value="4">PHEV Diesel</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">CO2 Gecombineerd</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="BPMCO2" name="BPMCO2" value="<?php echo $_POST['BPMCO2'] ?>" placeholder="CO2 Gecombineerd">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Restwaarde Percentage
                                    (koerslijst)</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="percentage" name="percentage" value="<?php echo $_POST['PercentageC'] ?>" placeholder="Restwaarde Percentage">
                                </div>
                            </div>
                            <br>
                            <div class="row str">
                                <div class=" col-xs-12">
                                    <h3>Reguliere Berekening</h3>
                                </div>
                            </div>


                            <div class="row str">
                                <div class="col-sm-2">Bruto BPM</div>
                                <div class="col-sm-4">
                                    <?php if ($_POST["BPMArray"]) : ?>
                                        <?php $xh1 =  min(array_filter($_POST["BPMArray"])); ?>
                                        <input type="text" class="form-control" value="<?php echo  $xh1 ?>" id="brutobpm" name="brutobpm" placeholder="Bruto BPM">
                                    <?php else : ?>
                                        <input type="text" class="form-control" value="0" id="brutobpm" name="brutobpm" placeholder="Bruto BPM">
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    REST BPM
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="forfaitaire" name="forfaitaire" value="<?php echo floor($_POST['forfetaire_uitkomst']) ?>" placeholder="REST BPM - Huidige datum">
                                </div>

                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Rest BPM koerslijst
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="PercentageBerekening" name="PercentageBerekening" value="<?php echo floor($_POST['percentage']) ?>" placeholder="Rest_BPM_Koerslijst">
                                </div>

                            </div>
                            <input type="hidden" name="huidigedatumbpm" id="huidigedatumbpm" value="<?php echo date('d-m-Y', strtotime($_POST['today'])) ?>">

                            


                        </div>






                    </div>

                </div>
            </form>
        </div>
    </div>


</div>









<?php //org_tables_js($_POST["extralocatie"] = "../"); 
?>
<?php script_datepicker($_POST["extralocatie"] = "../"); ?>

</body>

</html>