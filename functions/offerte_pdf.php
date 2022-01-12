<?php
session_start();

/** Error reporting */
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Europe/London');

require_once( '../../../settings.php' );

include_once("../../connn/ConCept.php");

require_once( '../../library/functions_01/GwiPdf.php' );

//require_once( '../../library/functions/Dossier.php' );
//require_once( '../../control/functions.php' );


echo $_POST['gwi_factuur_gegevens_id'];
exit;

/** Error reporting */
//    error_reporting(E_ALL);
//    ini_set('display_errors', TRUE);
//    ini_set('display_startup_errors', TRUE);
//    date_default_timezone_set('Europe/London');

//GetImagesPDF();
//echo "../".$_POST['PdfImages'][0];
//echo "../".$_POST['PdfImages'][1];

//$pdf->Ln( 5 );
//$pdf->Image('/images/' . $_POST['PdfImages'][0], 150, 35, 50);
//$pdf->Image( WEB_ROOT . '/images/' . $_POST['PdfImages'][0], 150, 35, 50);
//print_r($_POST);
//exit;



if ( isset( $_POST ) ) {

    // get debiteur

    $resultA = mysqli_query($_POST['GWIconnector'], " SELECT * FROM vestiging_contacten
                        LEFT JOIN gebruikers ON gebruikers.gebruikers_ID = vestiging_contacten.gebruikers_ID
                        WHERE vestiging_contacten.vestiging_contacten_ID ='" . $_POST['contact'] . "'
                        ");
    while ($row = mysqli_fetch_array($resultA)) {
        $_POST['adres_1'] = $row['adres_1'];
        $_POST['postcode'] = $row['postcode'];
        $_POST['plaatsnaam'] = $row['plaatsnaam'];
    }


    $merkID = $_POST['brand'];
                        $resultMailC = mysqli_query($_POST['GWIconnector'], " SELECT * FROM automerken
                        WHERE automerken_ID ='" . $merkID . "'
                        ");
                        while ($row = mysqli_fetch_array($resultMailC)) {
                        $_POST['automerken'] = $row['automerken'];
                        }

    $extra_highlights= iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));

	$quotation_ID = $_POST['quotation_ID'];

	$doc_directory = $_POST['doc_directory'];
	$doc_directory = str_replace("..", "", $doc_directory);

	$company     = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['company']));
	$name        = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['name']));
	$description = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['description']));

	$brand       = $_POST['automerken'];
	$model       = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['model']));
	$type        = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['type']));
	$kilometer   = $_POST['kilometer'];
	$uitvoering  = '';
	$transmissie = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['transmissie']));
	$kleur       = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['kleur']));
	$vermogen    = '';
    $motoromschrijving = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['motoromschrijving']));
    $kilometer = $_POST['kilometer'];
    $productiedatum = $_POST['productiedatum'];
    $co2 = $_POST['co2'];

    if ($_POST['achtwielen']==1){
        $achtwielen ='Ja';
    }elseif($_POST['achtwielen']==2) {
        $achtwielen = 'Nee';
    }



    $chassisnummer = $_POST['chassisnummer'];
    $type = $_POST['type'];
    $kenteken = $_POST['kenteken'];
    $co2 = $_POST['co2'];


    $vrijehighlight_offerte = $_POST['vrijehighlight_offerte'];
    $originalDate = $productiedatum;
    $newDate = date("m-Y", strtotime($originalDate));

    $uitvoering = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['uitvoering']));
    $chassisnummer = $_POST['chassisnummer'];
    $brandstof = $_POST['brandstof'];
    $transmissie = $_POST['transmissie'];

    $kleur = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['kleur']));
    $interieur_kleur = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['interieur_kleur']));
    $_POST['euro']=iconv('UTF-8', 'windows-1252', html_entity_decode('&euro;'));

    $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$brandstof."'
                        ");
    while ($row = mysqli_fetch_array($resultFuel)) {
        $_POST['SoortBrandstof']=$row['conversie_naam'];
    }
	$inkoper  = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['inkoper']));
	$verkoper = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['verkoper']));

    if ($_POST['inkoopprijs_ex_ex']>0){
        $_POST['SoortBelasting']='BTW auto';

    }else{
        $_POST['SoortBelasting']='Marge auto';
    }

	$sales_price_ex_ex          = $_POST['sales_price_ex_ex'];
	$display_sales_price_ex_ex  = $_POST['display_sales_price_ex_ex'];
	$delivery_costs             = $_POST['delivery_costs'];
	$display_delivery_costs     = $_POST['display_delivery_costs'];
	$other_costs                = $_POST['other_costs'];
	$display_other_costs        = $_POST['display_other_costs'];
	$sub_price_ex_ex            = $_POST['sub_price_ex_ex'];
	$display_sub_price_ex_ex    = $_POST['display_sub_price_ex_ex'];
	$vat_costs                  = $_POST['vat_costs'];
	$display_vat_costs          = $_POST['display_vat_costs'];
	$residual_vat_costs         = $_POST['residual_vat_costs'];

    $sales_price_btw                = $_POST['sales_price_btw'];
    $display_sales_price_btw        = $_POST['display_sales_price_btw'];


	$display_residual_vat_costs = $_POST['display_residual_vat_costs'];
	$fees                       = $_POST['fees'];
	$display_fees               = $_POST['display_fees'];
	$price_in_in                = $_POST['price_in_in'];
	$display_price_in_in        = $_POST['display_price_in_in'];
    $nl_nieuwprijs                = $_POST['nl_nieuwprijs'];
    $display_nl_nieuwprijs      = $_POST['display_nl_nieuwprijs'];
    $extra_highlights           = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));

	$quotation_date = date( 'd-m-Y' );

    $_POST['AantalDisplay']=$_POST['display_sales_price_ex_ex']+$_POST['display_delivery_costs']+ $_POST['display_other_costs']+$_POST['display_sub_price_ex_ex']+$_POST['display_vat_costs']+$_POST['display_residual_vat_costs']+ $_POST['display_fees']+$_POST['display_price_in_in'];

}



$verkoper_details = getContactDetails( $verkoper );

$_POST['bedrijfsnaam']=$verkoper_details['bedrijfsnaam'];

$data = array(
	'Merk'           => $brand,
	'Model'          => $model,
	'Type'           => $type,
	'Kilometerstand' => $kilometer,
	'Uitvoering'     => $uitvoering,
	'Transmissie'    => $transmissie,
	'Kleur'          => $kleur,
	'Vermogen'       => $vermogen,
    'motoromschrijving'  => $motoromschrijving,
    'productiedatum'=> $productiedatum,
     'kilometer' => $kilometer,
    'uitvoering' =>$uitvoering,
    'chassisnummer'=>$chassisnummer,
    'brandstof'=>$brandstof,
    'transmissie'=>$transmissie,
    'kleur'=>$kleur,
    'interieur_kleur'=>$interieur_kleur
);

// Instanciation of inherited class
$pdf = new GwiPdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255,255,255);

// Logo
//$pdf->Image( WEB_ROOT . '/images/' . $verkoper_details['logo'], 170, 10, 30 );
//$pdf->Image( '../../images/' . $verkoper_details['logo'], 170, 8, 30 );
$pdf->Image( '../../images/' . $verkoper_details['logo'], 170, 8, 30 );
// Line break
$pdf->Ln( 0 );




AantalImagesPDF();

if ($_POST['aantalImagesPDF']>0){
    GetImagesPDF();
    $pdf->Ln( 0 );
    $pdf->Image( "../".$_POST['PdfImages'][0], 142, 22, 58);
    //$pdf->Image( "../". $_POST['PdfImages'][0], 150, 35, 50);

    //$pdf->Image( WEB_ROOT . '/images/' . $_POST['PdfImages'][0], 150, 35, 50);
}
AantalImagesPDF();

if ($_POST['aantalImagesPDF']>1){
    GetImagesPDF();
    $pdf->Ln( 0 );
    $pdf->Image( "../".$_POST['PdfImages'][1], 75, 22, 58 );

}

//if ( isset( $_POST['image-01'] ) ) {
//	$pdf->Image( WEB_ROOT . '/images/' . $_POST['image-01'], 150, 35, 50 );
//}



$pdf->SetFont( 'Arial', '', 10 );


$pdf->SetFont( 'Arial', 'B', 10 );
$pdf->Cell( 40, 10, $company );
$pdf->SetFont( 'Arial', '', 10 );
$pdf->Ln( 5 );
if ($name==''){
    $pdf->Cell( 40, 10, '' . $name );
}else{
    $pdf->Cell( 40, 10, $name );
}
$pdf->Ln( 5 );
$pdf->Cell( 40, 10, $_POST['adres_1'] );
$pdf->Ln( 5 );
$pdf->Cell( 40, 10, $_POST['postcode']." ".$_POST['plaatsnaam'] );
$pdf->Ln( 5 );

$pdf->Ln( 15 );
$pdf->Cell( 0, 0, 'Datum:             ' . $quotation_date );
$pdf->Ln( 5 );
$pdf->Cell( 0, 0, 'Referentienr:    ' . $quotation_ID );
$pdf->Ln( 5 );


$pdf->Ln( 5 );
$pdf->SetFont( 'Arial', 'B', 14 );
$pdf->Cell( 40, 10, $_POST['automerken']." ".$model." ".$uitvoering." ".$motoromschrijving." ".$transmissie   );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Cell( 40, 10, $newDate." | ".$kilometer ." km | ". $vrijehighlight_offerte);

$pdf->Ln( 10 );

$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->Cell( 40, 10, ' ' );
$pdf->SetLeftMargin(141);
$pdf-> PriceTableA( $data );

$pdf->SetLeftMargin(10);
$pdf->SetFont( 'Arial', '', 9 );
if ($_POST['AantalDisplay']==0){
    $pdf->Ln( 0);
}elseif($_POST['AantalDisplay']==1){
    $pdf->Ln( -7.5);
}elseif($_POST['AantalDisplay']==2){
    $pdf->Ln( -14);
}elseif($_POST['AantalDisplay']==3){
    $pdf->Ln( -20.5);
}elseif($_POST['AantalDisplay']==4){
    $pdf->Ln( -27);
}elseif($_POST['AantalDisplay']==5){// tot hier
    $pdf->Ln( -32);
}elseif($_POST['AantalDisplay']==6){
    $pdf->Ln( -37.5);
}elseif($_POST['AantalDisplay']==7){
    $pdf->Ln( -44);
}elseif($_POST['AantalDisplay']==8){
    $pdf->Ln( -49.5);
}
$pdf->Ln( 5.5);
$pdf->Cell( 0, 0,"Kleur:               ".$kleur." / ".$interieur_kleur );
$pdf->Ln( 5.5);
$pdf->Cell( 0, 0,"Brandstof:        ".$_POST['SoortBrandstof']);
$pdf->Ln( 5.5);
$pdf->Cell( 0, 0,"CO2:               ".$co2." g/km");
$pdf->Ln( 5.5);
$pdf->Cell( 0, 0,"BTW/ Marge:   ".$_POST['SoortBelasting']);
$pdf->Ln( 5.5);
// levertijd
$pdf->Ln( 5.5);
$pdf->Cell( 0, 0, '            ');

$pdf->Ln( 12);
if ($description==''){}else {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 0, 'Toelichting: ');
}

$pdf->SetFont( 'Arial', '', 9 );
$pdf->SetLeftMargin(74);
$pdf->Ln( -39.5);
$pdf->Cell( 0, 0,"Chassisnr:        ".$chassisnummer );

    $pdf->Ln(5.5);
    $pdf->Cell(0, 0, "NL Nieuwprijs:  ".$_POST['euro']." " . number_format($nl_nieuwprijs,2,",","."));

$pdf->Ln( 5.5);
$pdf->Cell( 0, 0,"Kenteken:         ".$kenteken);
$pdf->Ln( 5.5);

$pdf->Cell( 0, 0,"Levertijd:         ".$_POST['levertijd']);
$pdf->Ln( 5.5);
// kenteken

$pdf->Ln( 5.5);
$pdf->Cell( 0, 0, '            ');
//$pdf->Ln( 12 );
//$pdf->SetFont( 'Arial', '', 12 );
//
//
//$pdf->Cell( 40, 10, $_POST['SoortBrandstof']." | ".$_POST['SoortBelasting']);


// bij 1 lijn
$pdf->Ln( 15);

// bij

$pdf->SetLeftMargin(10);
$pdf->Ln( 0 );
$pdf->SetFont( 'Arial', '', 10 );

if ($description==''){
    $description='';
    $pdf->MultiCell( 180, 5, $description );
    $pdf->Ln( 5);
}else{
    $pdf->MultiCell( 180, 5, $description );

}



if ($description==''){


    $pdf->SetLeftMargin(10);

    $pdf->SetFont( 'Arial', 'B', 12 );
    $pdf->Cell( 40, -25, 'Meeruitvoeringen ' );
    $pdf->Ln( 0);
    $pdf->SetFont( 'Arial', '', 8 );
    $pdf->PrintChapter(1,'1',$extra_highlights);


}else {


    $pdf->SetLeftMargin(10);

    $pdf->SetFont( 'Arial', 'B', 12 );
    $pdf->Cell( 40, 10, 'Meeruitvoeringen ' );
    $pdf->Ln( 8);
    $pdf->SetFont( 'Arial', '', 8 );
    $pdf->PrintChapter(1,'1',$extra_highlights);
}








// Output PDF on screen
$pdf->Output();

// Save PDF to Dossier Files folder
//$upload_dir = FILES_ROOT . $doc_directory; //FILES_ROOT;
$upload_dir = "../".$_POST['doc_directory']; //FILES_ROOT;
$filenameA='Offerte_';

if ($model==''){
    $filenameB='';
}else{
    $modelNew=str_replace(' ','',$model);
    $filenameB=$modelNew."_";
}

if ($chassisnummer==''){
    $chassisnummerNew='';
}else {
    $chassisnummerNew = substr($chassisnummer, -4);

}
$filename = $filenameA.$quotation_ID ."_".$filenameB.$chassisnummerNew. '.pdf';

$PDFSave=$upload_dir .'/'. $filename;
$pdf->Output( $PDFSave, 'F' );
chmod($PDFSave, 0755);

$DBpdfSave=$_POST['doc_directory']."/".$filename;
$_SESSION['DBsave']=$DBpdfSave;
$sqlA = "INSERT INTO files_dossier (file, dossier_ID, offerte, viewoff)
        VALUES ('" . $DBpdfSave . "',
        '" . $_SESSION['dossier_ID'] ."',
        '".$quotation_ID."',
        1)";
$resultupdate = mysql_query( $sqlA );


