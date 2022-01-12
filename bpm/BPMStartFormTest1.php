<?php


//// voor de test
// todo deze per item isset doen
if (!isset($_GET['BPMCO2WLTP']) ){}else {
    $_POST['BPMCO2WLTP'] = $_GET['BPMCO2WLTP'];
    $_POST["BPMproductiedatum"] = $_GET['BPMproductiedatum'];
    $_POST['BPMbrandstof'] = $_GET['BPMbrandstof'];
    $_POST["BPMtenaamstellingNL"] = $_GET['BPMtenaamstellingNL'];
    $_POST['variabeledatumbpm'] = $_GET['variabeledatumbpm'];
    $_POST['variabeledatumbpm'] = $_GET['variabeledatumbpm'];
    $_POST['forfetaire_uitkomst']=$_GET['a'];
    $_POST['forfetaire_variabel_uitkomst']=$_GET['b'];
    $_POST['percentage']=$_GET['percentage'];
    $_POST['PercentageC']=$_GET['percentagec'];
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
<div id="content" class="content">
<body class="skin-3 .no-skin">

<?php //navigation_top_su_start(); ?>

<?php $co2 = $_POST['BPMCO2WLTP']; ?>
<?php $datum = $_POST["BPMproductiedatum"]; ?>
<?php $year_tns = date( 'Y', strtotime( $datum ) ); ?>
<?php $brandstof = $_POST['BPMbrandstof']; ?>


<?php $years = getYears( $datum ); ?>


    <?php if ($co2 != '' && $year_tns != '1970' && $co2 != '')
        foreach ( $years as $key => $value ) { ?>
<!--           --><?php // floor( calculateBpm( $co2, $value['bpm_date'], $brandstof ) ); ?>
                    <?php $_POST['BPMArray'][]=floor( calculateBpmTest( $co2, $value['bpm_date'], $brandstof ) ); ?>

        <?php } else { ?>

    <?php } ?>


<div class="main-container" id="main-container">

    <div class="main-content">
        <div class="page-content">


            <div class="page-content-area">
                <div class="row">
                    <div class="col-xs-12">
<!-- Hier start de BPM berekening -->

                        <div class='row'>

                            <!-- Bereken BPM -->
                            <div class='col-xs-12'>

                                <!-- BPM formulier -->
                                <?php
                                echo "<div class='row'>";
                                echo "<div class='col-xs-6 col-sm-6 widget-container-col'>";
                                echo "<div class='widget-box'>";

                                echo "<div class='widget-body no-padding'>";
                                echo "<div class='widget-main no-padding'>";

                                echo "<table class='table table-bordered table-hover'>";
                                echo "<tbody>";

                               // hier start de form om de BPM te berekenen





//                                    $_POST["historischenieuwwaardekeuze"]   = $row["historischenieuwwaardekeuze"];
//                                    $_POST["datumdeel1"]                    = $row["datumdeel1"];
//                                    $_POST["mmmtu"]                         = $row["mmmtu"];
//                                    $_POST["meeruitvoeringentotaal"]        = $row["meeruitvoeringentotaal"];
//                                    $_POST["totaalx"]                       = $row["totaal"];
//                                    $_POST["huidigedatuminvoerdatum"]       = $row["huidigedatuminvoerdatum"];
//                                    $_POST["brutobpm"]                      = $row["brutobpm"];
//                                    $_POST["eurotaxxx"]                     = $row["eurotax"];
//                                    $_POST["autotelexxx"]                   = $row["autotelex"];
//                                    $_POST["schadebedrag"]                  = $row["schadebedrag"];
//                                    $_POST["xrayxx"]                        = $row["xray"];
//                                    $_POST["taxatiewaardexx"]               = $row["taxatiewaarde"];
//                                    $_POST["variabeledatumbpm"]             = $row["variabeledatumbpm"];
//                                    $_POST["forfaitaire"]                   = $row["forfaitaire"];
//                                    $_POST["forfaitaire_variabel"]          = $row["forfaitaire_variabel"];
//                                    $_POST["forfaitaire_tenaamstelling_nl"] = $row["forfaitaire_tenaamstelling_nl"];
//                                    $_POST["koerslijst"]                    = $row["koerslijst"];
//                                    $_POST["forfaitaire_percentage"]        = $row["forfaitaire_percentage"];
//                                    $_POST["forfaitaire_maanden"]           = $row["forfaitaire_maanden"];
//                                    $_POST["taxatiewaarde"]                 = $row["taxatiewaarde"];
//                                    $_POST["winnaar"]                       = $row["winnaar"];
//                                    $_POST["winnaarbedrag"]                 = $row["winnaarbedrag"];
//                                    $_POST["douanerapport"]                 = $row["douanerapport"];

                                    echo "<form id=\"002\" name=\"bereken\" method=\"POST\" action=\"../data/library/bpm/BPMUpdateTest.php\">";
// start input
                                echo '<tr bgcolor="#f8f8f8"><td colspan="2"><h1>BPM forfaitair berekenen WLTP</h1></td></tr>';

                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Soort voertuig  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                // return arrangement
                                echo "<input style='border:0; width:100%;   ' value=\"999\"   class=\"form-control\" type=\"hidden\" name=\"Return\" id=\"Return\" />";

                                ?>
                                <select
                                    name="SoortVoertuig"
                                    class="form-control"
                                    id="SoortVoertuig"
                                    style='border:0;  width: 100%;'
                                    >
                                    <option value="0">
                                        Maak een
                                        keuze
                                    </option>

                                    <option value="1"
                                    <?php
                                    if ($_GET['SoortVoertuig']==1) {
                                    echo "selected";
                                    } else {

                                    }
                                    echo " >Personenwagen (standaard)</option>";
                                    ?>

                                    <option value="2"
                                        <?php
                                        if ($_GET['SoortVoertuig']==2) {
                                            echo "selected";
                                        } else {

                                        }
                                        echo ">Bedrijfswagen tot 3500KG</option>";
                                        ?>

                                    <option value="3"
                                    <?php
                                    if ($_GET['SoortVoertuig']==3) {
                                        echo "selected";
                                    } else {

                                    }
                                        echo ">Camper</option>";
                                        ?>


                                </select>
                                <?php

                                echo "</td></tr>";
                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Eerste toelating";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                ?>
                                <input style="border:0; margin: 0px; width:100%;" type="text"  class="form-control" id="datepicker1"
                                    <?php if ($_POST["BPMproductiedatum"] == '' || $_POST["BPMproductiedatum"] == '1970-01-01 ') {
                                        ?>
                                        value=''
                                    <?php
                                    }else{ ?>
                                       value='<?php echo date('d-m-Y ', strtotime($_POST["BPMproductiedatum"])); ?>'
                                       <?php } ?>
                                       name="BPMproductiedatum" />
                               <?php
                                echo "</td></tr>";
                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Tenaamstelling NL  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                               ?>
                                <input style="border:0; margin: 0px; width:100%;" type="text"  class="form-control" id="datepicker2"
                                    <?php if ($_POST["BPMtenaamstellingNL"] == '' || $_POST["BPMtenaamstellingNL"] == '1970-01-01 ') {
                                        ?>
                                        value=''
                                    <?php
                                    }else{ ?>
                                        value='<?php echo date('d-m-Y ', strtotime($_POST["BPMtenaamstellingNL"])); ?>'
                                    <?php } ?>
                                       name="BPMtenaamstellingNL" />
                                <?php


                                echo "</td></tr>";
                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Brandstof soort  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                ?>
                                <select
                                    name="BPMbrandstof"
                                    id="BPMbrandstof"
                                    class="form-control"
                                    style='border:0;  width: 100%;'
                                    >
                                    <option value="0">
                                        Maak een
                                        keuze
                                    </option>
<?php


$query = "SELECT *
FROM bpm_brandstof_type";

$result = $_POST['GWIconnector']->query($query);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value=\"" . $row['id'] . "\"";
                                    if ($_GET['BPMbrandstof'] == $row['id']) {
                                    echo "selected";
                                    } else {
                                    }
                                    echo ">" . $row['naam'] . "</option>";
                                    }

?>


                                </select>

                                <?php

                                echo "</td></tr>";


                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "CO2 wltp";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["BPMCO2WLTP"] . "\"  class=\"form-control\" type=\"text\" name=\"BPMCO2WLTP\" id=\"BPMCO2WLTP\" />";

                                echo "</td></tr>";
                                echo "</td></tr>";


                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Restwaarde percentage (koerslijst) ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST['PercentageC'] . "\"  class=\"form-control\" type=\"text\" name=\"percentage\" id=\"percentage\" />";

                                echo "</td></tr>";


                                // einde input
                                echo '<tr bgcolor="#f8f8f8"><td colspan="2"><h1>Reguliere berekening</h1></td></tr>';

                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Bruto BPM (gunstigste)  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                    echo "<input style='border:0;width:100%;   ' value=\"" . min(array_filter($_POST['BPMArray'])) . "\"  class=\"form-control\" type=\"text\" name=\"brutobpm\" id=\"brutobpm\" />";

                                echo "</td></tr>";


                                    echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["schadebedrag"] . "\"  class=\"form-control\" type=\"hidden\" name=\"schadebedrag\" id=\"schadebedrag\" />";



                                $_POST['today'] = date( "Y-m-d" );


                                echo "<input style='border:0; width:100%;   ' value=\"" . date( 'd-m-Y', strtotime( $_POST['today'] ) ) . "\"   class=\"form-control\" type=\"hidden\" name=\"huidigedatumbpm\" id=\"huidigedatumbpm\" />";



                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "REST BPM (Forfaitaire afschrijftabel) - Huidige datum<br /><span style='color:#696969; font-size: 11px;'><em>((100 - afschrijvingspercentage) / 100) x bruto bpm = rest bpm</em></span>";
                                echo "</td><td style='padding:0px; vertical-align: middle;'>";
                                if ( isset( $_POST["forfetaire_uitkomst"] ) ) {
                                    echo "<input style=' border:0; width:100%;   ' value=\"" . floor( $_POST["forfetaire_uitkomst"] ) . "\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                } else {
                                    echo "<input style=' border:0; width:100%;   ' value=\"\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                }
                                echo "</td></tr>";




                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Rest BPM koerslijst (op basis van percentage) ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style='border:0;width:100%;   ' value=\"" .$_POST['percentage'] . "\"  class=\"form-control\" type=\"text\" name=\"PercentageBerekening\" id=\"PercentageBerekening\" />";

                                echo "</td></tr>";









                                echo "<tr><td>";
                                echo "&nbsp;";
                                echo "</td><td>";
                                //echo "<input type=\"submit\" name=\"update\" value=\"Bereken\" align=\"right\" style=\" border: 0;  height: 25px;    background-color: #0e3e89; color:#FFF; \">";
                                echo "<div class='wizard-actions'>";
                                echo "<button class='btn btn-info btn-block' data-last='Finish'>";
                                //get_field_names_new( $_POST['fieldnumber'] = '58' );
                                echo "Bereken BPM";
                                echo "<i class='ace-icon fa fa-arrow-right icon-on-right'></i>";
                                echo "</button>";
                                echo "</div>";
                                echo "</td></tr>";
                                echo "</form>";






                                // hier eindigt de form om de BPM te berekenen

                                echo "</tbody>";
                                echo "</table>";

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                ?>
                                <!-- einde BPM formulier -->



                            </div>

                            <!-- Bereken BPM op basis van CO2 -->
                            <div class='col-xs-6'>




                                        Hoe wordt de CO2-uitstoot bepaald?<br /><br />
                                        Nieuwe auto’s: sinds 1 juli 2020 wordt voor nieuwe auto’s de WLTP-meetmethode (Worldwide harmonized Light vehicles Test Procedures) gebruikt voor de berekening van de bruto bpm. De WLTP-meetmethode is de opvolger van de NEDC-meetmethode (New European Driving Cycle).<br />
                                <br />Gebruikte auto’s: voor gebruikte auto’s met een datum 1e toelating tot 1 juli 2020 kan het bruto bpm-bedrag ook worden vastgesteld aan de hand van de NEDC-tabellen die gelden tot 1 juli 2020.<br /><br />
                                        Dat werkt als volgt. <br />Is voor een auto met een datum 1e toelating tot 1 juli 2020 de WLTP-waarde met het Europese rekenmodel CO2MPAS omgerekend naar een NEDC-waarde? Dan kiest u zelf of u aangifte doet op basis van de NEDC-waarde of de WLTP-waarde. Hier kan een verschil in zitten. Is uw auto alleen getest volgens de NEDC-meetmethode? Dan moet u het bruto bpm-bedrag berekenen volgens de NEDC-tabellen. Als beide waarden aanwezig zijn, dan worden ze vermeld op het Certificaat van Overeenstemming (CvO). Is uw auto vervaardigd vóór 2018? Dan is er geen WLTP-waarde.
                                        Voor de berekening van het bruto bpm-bedrag wordt uitgegaan van de CO2-uitstoot zoals die in het kentekenregister is of wordt opgenomen.





                            </div>

                        </div>

</div>
 <!-- hier eindigt de BPM berekening -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php //footer(); ?>
    <?php //button_up(); ?>

</div>



<?php //org_tables_js($_POST["extralocatie"] = "../"); ?>
<?php script_datepicker( $_POST["extralocatie"] = "../" ); ?>

</body>
</html>

