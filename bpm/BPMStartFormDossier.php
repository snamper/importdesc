<?php


//// voor de test
// todo deze per item isset doen
if (!isset($_GET['BPMCO2']) ){}else {
    $_POST['BPMCO2'] = $_GET['BPMCO2'];
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



<?php //navigation_top_su_start(); ?>

<?php $co2 = $_POST['BPMCO2']; ?>
<?php $datum = $_POST["BPMproductiedatum"]; ?>
<?php $year_tns = date( 'Y', strtotime( $datum ) ); ?>
<?php $brandstof = $_POST['BPMbrandstof']; ?>


<?php $years = getYears( $datum ); ?>


    <?php if ($co2 != '' && $year_tns != '1970' && $co2 != '')
        foreach ( $years as $key => $value ) { ?>
           <?php  floor( calculateBpm( $co2, $value['bpm_date'], $brandstof ) ); ?>
                    <?php $_POST['BPMArray'][]=floor( calculateBpm( $co2, $value['bpm_date'], $brandstof ) ); ?>

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
                                echo "<div class='col-xs-12 col-sm-12 widget-container-col'>";
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

                                echo "<form id=\"002\" name=\"bereken\" method=\"POST\" action=\"../data/library/bpm/BPMUpdate.php\">";
// start input
                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "CO2 gecombineerd NEDC";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                    echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["BPMCO2"] . "\"  class=\"form-control\" type=\"text\" name=\"BPMCO2\" id=\"BPMCO2\" />";

                                echo "</td></tr>";


                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "CO2 gecombineerd WLTP";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["BPMCO2"] . "\"  class=\"form-control\" type=\"text\" name=\"BPMCO2\" id=\"BPMCO2\" />";

                                echo "</td></tr>";


                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "Restwaarde percentage (koerslijst) ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST['PercentageC'] . "\"  class=\"form-control\" type=\"text\" name=\"percentage\" id=\"percentage\" />";

                                echo "</td></tr>";


                                // einde input
                                echo '<tr bgcolor="#f8f8f8"><td colspan="2"><h1>Reguliere berekening</h1></td></tr>';

                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "NEDC: Bruto BPM (gunstigste)  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                    echo "<input style='border:0;width:100%;   ' value=\"" . min($_POST['BPMArray']) . "\"  class=\"form-control\" type=\"text\" name=\"brutobpm\" id=\"brutobpm\" />";

                                echo "</td></tr>";


                                    echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["schadebedrag"] . "\"  class=\"form-control\" type=\"hidden\" name=\"schadebedrag\" id=\"schadebedrag\" />";



                                $_POST['today'] = date( "Y-m-d" );


                                echo "<input style='border:0; width:100%;   ' value=\"" . date( 'd-m-Y', strtotime( $_POST['today'] ) ) . "\"   class=\"form-control\" type=\"hidden\" name=\"huidigedatumbpm\" id=\"huidigedatumbpm\" />";



                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "NEDC: REST BPM (Forfaitaire afschrijftabel) - Huidige datum<br /><span style='color:#696969; font-size: 11px;'><em>((100 - afschrijvingspercentage) / 100) x bruto bpm = rest bpm</em></span>";
                                echo "</td><td style='padding:0px; vertical-align: middle;'>";
                                if ( isset( $_POST["forfetaire_uitkomst"] ) ) {
                                    echo "<input style=' border:0; width:100%;   ' value=\"" . floor( $_POST["forfetaire_uitkomst"] ) . "\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                } else {
                                    echo "<input style=' border:0; width:100%;   ' value=\"\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                }
                                echo "</td></tr>";




                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "NEDC: Rest BPM koerslijst (op basis van percentage) ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style='border:0;width:100%;   ' value=\"" .$_POST['percentage'] . "\"  class=\"form-control\" type=\"text\" name=\"PercentageBerekening\" id=\"PercentageBerekening\" />";

                                echo "</td></tr>";


// hier

                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "WLTP: Bruto BPM (gunstigste)  ";
                                echo "</td><td  style='padding:0px; vertical-align: middle;'>";

                                echo "<input style='border:0;width:100%;   ' value=\"" . min($_POST['BPMArray']) . "\"  class=\"form-control\" type=\"text\" name=\"brutobpm\" id=\"brutobpm\" />";

                                echo "</td></tr>";


                                echo "<input style=' border:0; width:100%;   ' value=\"" . $_POST["schadebedrag"] . "\"  class=\"form-control\" type=\"hidden\" name=\"schadebedrag\" id=\"schadebedrag\" />";



                                $_POST['today'] = date( "Y-m-d" );


                                echo "<input style='border:0; width:100%;   ' value=\"" . date( 'd-m-Y', strtotime( $_POST['today'] ) ) . "\"   class=\"form-control\" type=\"hidden\" name=\"huidigedatumbpm\" id=\"huidigedatumbpm\" />";



                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "WLTP: REST BPM (Forfaitaire afschrijftabel) - Huidige datum  <br /><span style='color:#696969; font-size: 11px;'><em>((100 - afschrijvingspercentage) / 100) x bruto bpm = rest bpm</em></span>";
                                echo "</td><td style='padding:0px; vertical-align: middle;'>";
                                if ( isset( $_POST["forfetaire_uitkomst"] ) ) {
                                    echo "<input style=' border:0; width:100%;   ' value=\"" . floor( $_POST["forfetaire_uitkomst"] ) . "\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                } else {
                                    echo "<input style=' border:0; width:100%;   ' value=\"\"  class=\"form-control\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
                                }
                                echo "</td></tr>";




                                echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
                                echo "WLTP: Rest BPM koerslijst (op basis van percentage) ";
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
                            <div class='col-xs-3'>


                                <?php

                                ?>

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






