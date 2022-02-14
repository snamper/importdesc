<?php

include_once ('connn.php');
include_once ('../functions/Bpm.php');
/** Error reporting */
//error_reporting( E_ALL );
//ini_set( 'display_errors', true );
//ini_set( 'display_startup_errors', true );
//date_default_timezone_set( 'Europe/London' );

//$_POST['BPMCO2']=107;// todo hier een variabel veld van maken in form
//$_POST["BPMproductiedatum"]='2015-01-06';// todo hier een variabel veld van maken in form
//$_POST['BPMbrandstof']=1; // todo hier een variabel veld van maken in form
//$_POST["BPMtenaamstellingNL"]='2016-01-01'; // todo hier een variabel veld van maken in form
//$_POST['variabeledatumbpm']='2017-01-01';// todo hier een variabel veld van maken in form
// Dit doet niks in de berekening
//$_POST["historischenieuwwaardekeuze"]=24995; // vor de viscale
//$_POST["meeruitvoeringentotaal"]=500; // vooor de viscale

//$_POST["totaalx"]=$_POST["historischenieuwwaardekeuze"]+$_POST["meeruitvoeringentotaal"]; //voor de viscale
// tot hier doet het niets


$_POST['variabeledatumbpm'] = $_POST['BPMtenaamstellingNL'];

?>
<?php $co2 = $_POST['BPMCO2WLTP']; ?>
<?php $datum = $_POST["BPMproductiedatum"]; ?>
<?php $year_tns = date( 'Y', strtotime( $datum ) ); ?>
<?php $brandstof = $_POST['BPMbrandstof']; ?>


<?php $years = getYears( $datum ); ?>


<?php if ($co2 != '' && $year_tns != '1970' && $co2 != '')
    foreach ( $years as $key => $value ) { ?>
       
<?php // floor( calculateBpmTest( $co2, $value['bpm_date'], $brandstof ) );?>
        <?php $_POST['BPMArray'][]=floor( calculateBpmTest( $co2, $value['bpm_date'], $brandstof ) ); ?>

    <?php } else { ?>

<?php }


//        $_POST["productiedatum"] = $_POST["productiedatum"];//ok
        $_POST["BPMtenaamstellingNL"] = $_POST["BPMtenaamstellingNL"];//ok
        $_POST['forfetaire_brutobpm']=$_POST["BPMproductiedatum"];// ok

            /**
             * Alle data variabelen.
             * Gebruikt voor de forfaitaire berekeningen.
             */
            $today                = date( "Y-m-d" );
            $d1                   = strtotime( $_POST["BPMproductiedatum"] );
            $d2                   = strtotime( $today );
            $d2_variabel          = strtotime( $_POST['variabeledatumbpm'] );
            $d2_tenaamstelling_nl = strtotime( $_POST['BPMtenaamstellingNL'] );



            if ( isset( $_POST["schadebedrag"] ) ) {
                $schadebedrag = $_POST["schadebedrag"];
            } else {
                $schadebedrag = 0;
            }

            /**
             * Vaste Datum
             * Vandaag
             */
            $min_date = min( $d1, $d2 );
            $max_date = max( $d1, $d2 );
            $i        = 0;
            while ( ( $min_date = strtotime( "+1 MONTH", $min_date ) ) <= $max_date ) {
                $i ++;
            }
            $_POST['forfetaire_mnd'] = $i + 1;
            $_POST["forfaitaire_mnd"] = $i + 1;

            /**
             * Variabele datum
             * Opgegeven datum
             */
            $min_date_variabel = min( $d1, $d2_variabel );
            $max_date_variabel = max( $d1, $d2_variabel );
            $j                 = 0;
            while ( ( $min_date_variabel = strtotime( "+1 MONTH", $min_date_variabel ) ) <= $max_date_variabel ) {
                $j ++;
            }
            $_POST['forfetaire_mnd_variabel'] = $j + 1;

            /**
             * Variabele datum
             * Tenaamstelling NL
             */
            $min_date_tenaamstelling_nl = min( $d1, $d2_tenaamstelling_nl );
            $max_date_tenaamstelling_nl = max( $d1, $d2_tenaamstelling_nl );
            $k                          = 0;
            while ( ( $min_date_tenaamstelling_nl = strtotime( "+1 MONTH", $min_date_tenaamstelling_nl ) ) <= $max_date_tenaamstelling_nl ) {
                $k ++;
            }
            $_POST['forfetaire_mnd_tenaamstelling_nl'] = $k + 1;

            /**
             * Haal op basis van het berekende aantal maanden
             * de juiste percentages op.
             */
            NEW_forfetaire_berekeningWLTP();
            NEW_forfetaire_berekening_variabelWLTP();
            NEW_forfetaire_berekening_tenaamstelling_nlWLTP();
//            NEW_forfetaire_berekening_bpm();


$_POST['forfetaire_brutobpm']=min($_POST['BPMArray']);


            /**
             * Bereken de forfaitaire uitkomst
             * op basis van de bovengenoemde percentages.
             */
            $_POST['forfetaire_uitkomst']                   = ( $_POST['forfetaire_brutobpm'] - ( ( $_POST['forfetaire_percentage'] * $_POST['forfetaire_brutobpm'] ) / 100 ) ) - $schadebedrag;
            $_POST['forfetaire_variabel_uitkomst']          = ( $_POST['forfetaire_brutobpm'] - ( ( $_POST['forfetaire_percentage_variabel'] * $_POST['forfetaire_brutobpm'] ) / 100 ) ) - $schadebedrag;
            $_POST['forfetaire_tenaamstelling_nl_uitkomst'] = ( $_POST['forfetaire_brutobpm'] - ( ( $_POST['forfetaire_percentage_tenaamstelling_nl'] * $_POST['forfetaire_brutobpm'] ) / 100 ) ) - $schadebedrag;


// percentage berekening

$_POST['percentageX']=($_POST['percentage']*$_POST['forfetaire_brutobpm'])/100;


//NEW_update_stap_1_bpm();
//		WHERE (forfaitaire_periode.geldig_van <= '" . $datum . "' AND forfaitaire_periode.geldig_tot >= '" . $datum . "')

function NEW_forfetaire_berekeningWLTP() {
    $datum  = date( 'Y-m-d', ( $d2 ) );

    $foretaireA=$_POST['forfetaire_mnd'];

        $query = "SELECT *
		FROM forfaitaire_periode
		LEFT JOIN forfaitaire ON forfaitaire.periode = forfaitaire_periode.id
		WHERE forfaitaire.maanden = \"$foretaireA\"";

        $result = $_POST['GWIconnector']->query($query);

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        $_POST['forfetaire_percentage'] = $row['percentage'];
    }
}
//		WHERE (forfaitaire_periode.geldig_van <= '" . $datum . "' AND forfaitaire_periode.geldig_tot >= '" . $datum . "')

function NEW_forfetaire_berekening_variabelWLTP() {
    $datum  = date( 'Y-m-d', ( strtotime( $_POST['variabeledatumbpm'] ) ) );
        $foretaireB=$_POST['forfetaire_mnd_variabel'];

        $query = "SELECT *
		FROM forfaitaire_periode
		LEFT JOIN forfaitaire ON forfaitaire.periode = forfaitaire_periode.id
		WHERE forfaitaire.maanden = \"$foretaireB\"";

        $result = $_POST['GWIconnector']->query($query);

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {



        $_POST['forfetaire_percentage_variabel'] = $row['percentage'];
    }
}

function NEW_forfetaire_berekening_tenaamstelling_nlWLTP() {
    $datum  = date( 'Y-m-d', ( strtotime( $_POST['BPMtenaamstellingNL'] ) ) );
        $foretaireC=$_POST['forfetaire_mnd_tenaamstelling_nl'];

        $query = "SELECT *
		FROM forfaitaire_periode
		LEFT JOIN forfaitaire ON forfaitaire.periode = forfaitaire_periode.id
		WHERE forfaitaire.maanden = \"$foretaireC\"";

        $result = $_POST['GWIconnector']->query($query);

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['forfetaire_percentage_tenaamstelling_nl'] = $row['percentage'];
    }
}




// return to sender
//
$_SESSION['BPMSAready']=1234; // dit om het pop up scherm te tonen.

$_POST['bpmPrice'] = min(array_filter($_POST["BPMArray"]));
var_dump($_POST['BPMArray']);
die;

$redirect_pagina = "../../../crm/bpmcalculatorWLTP.php?SoortVoertuig=".$_POST['SoortVoertuig']."&BPMCO2WLTP=".$_POST['BPMCO2WLTP']."&BPMproductiedatum=".$_POST['BPMproductiedatum']."&BPMbrandstof=".$_POST['BPMbrandstof']."&BPMtenaamstellingNL=".$_POST["BPMtenaamstellingNL"]."&variabeledatumbpm=".$_POST['variabeledatumbpm']."&a=".$_POST['forfetaire_uitkomst']."&b=".$_POST['forfetaire_variabel_uitkomst']."&variabeledatumbpm=".$_POST['variabeledatumbpm']."&percentage=".$_POST['percentageX']."&percentagec=".$_POST['percentage']."&bpmprice=".$_POST['forfetaire_brutobpm'];
// echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=" . $redirect_pagina . " \" >";
 $return_arr[] = array(
                    "SoortVoertuig" => $_POST['SoortVoertuig'],
                    "BPMCO2WLTP" => $_POST['BPMCO2WLTP'],
                    "BPMproductiedatum" => $_POST['BPMproductiedatum'],
                    "BPMbrandstof" => $_POST['BPMbrandstof'],
                    "BPMtenaamstellingNL" => $_POST['BPMtenaamstellingNL'],
                    "variabeledatumbpm" => $_POST['variabeledatumbpm'],
                    "a" => $_POST['forfetaire_uitkomst'],
                    "b" => $_POST['forfetaire_variabel_uitkomst'],
                    "variabeledatumbpm" => $_POST['variabeledatumbpm'],
                    "percentage" => $_POST['percentageX'],
                    "percentagec" => $_POST['percentage'],
                    "bpmprice" => $_POST['forfetaire_brutobpm']
                );
echo json_encode($return_arr);

?>


