<?php
session_start();
require_once('../../vendor/autoload.php');
//dump($GLOBALS);exit;

/** Error reporting */
/* error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London'); */


//require_once('../../OLDGWI/settings.php');

include_once("../../OLDGWI/data/connn/ConCept.php");

require_once('../../classes/GwiPdf.php');
require_once ('QueriesTest.php');
//$_SESSION['DID']=11;
$_SESSION['dossier_ID']=$_SESSION['DID'];

//$_POST['DebtorIdVerkoop']=10030;

$price_calcIDFPDF = $_POST['price_calcIDFPDF'];

GetDebiteurPDF();
GetContactFPDF();


$NameContact = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['FullName']));
$debtor = $_POST['DebtorName'];
$debtoradres = $_POST['Adressline1'];
$debtorplaats = $_POST['Adressline3'];

GetBrandFPDF();

$extra_highlights = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['highlights_title']));

$quotation_ID = $_POST['price_calcIDFPDF'];

$doc_directory = $_SESSION['DocDirectory'];
//$doc_directory = str_replace("..", "", $doc_directory);
$_POST['name']='';
$company = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['DebtorName']));
$name = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['name'])); // nog doen in form zelf ook
$description = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['toelichting_text']));

$brand = $_POST['automerken'];
GetModelFPDF();
$model = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['automerken_soort']));
$type = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['uitvoering']));
$kilometer = $_POST['km_stand'];
$uitvoering = '';
$transmissie = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['transmissie'])); // hier nog de transmissie uit database
$kleur = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['kleur']));
$vermogen = '';
$motoromschrijving = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['motor']));
$kilometer = $_POST['km_stand'];
$productiedatum = $_POST['productiedatum'];
$co2 = $_POST['co2'];
$CO2WLTP = $_POST['BPMCO2WLTP'];
$levering = $_POST['levering'];

//if ($_POST['achtwielen']==1){
//    $achtwielen ='Ja';
//}elseif($_POST['achtwielen']==2) {
//    $achtwielen = 'Nee';
//}

$chassisnummer = $_POST['vinnummer'];
$kenteken = $_POST['kenteken'];


//$vrijehighlight_offerte = $_POST['vrijehighlight_offerte'];

$_toelatingNL =$_POST['BPMtenaamstellingNL'];
$_toelatingNLA = date("m-Y", strtotime($_toelatingNL));
$originalDate = $_POST['productiedatum'];
$newDate = date("m-Y", strtotime($originalDate));
$today = date("d-m-Y");
$uitvoering = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['uitvoering']));
$chassisnummer = $_POST['vinnummer'];


GetTransmissieFPDF();

$transmissie = $_POST['SoortTransmissie'];
$kleur = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['kleur']));
$interieur_kleur = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['interieur_kleur']));
$_POST['euro'] = iconv('UTF-8', 'windows-1252', html_entity_decode('€'));
$euro = $_POST['euro'];
GetFuelFPDF();
$brandstof =$_POST['SoortBrandstof'];
// next



$verkoper = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['EmployeeIdVerkoop']));

if ($_POST['btw_marge_bepaling']==0){
    $_POST['SoortBelasting']='BTW auto';
}else{
    $_POST['SoortBelasting']='Marge auto';
}

$soortauto =$_POST['SoortBelasting'];

$id=$_SESSION['DID'];

$query = "SELECT * FROM price_calc WHERE dossierID = \"$id\"";

$result = $_POST['GWIconnector']->query( $query );
while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {

    $sales_price_ex_ex = $row['inkoopprijs_ex_ex'];

    $display_sales_price_ex_ex = $row['display_inkoopprijs_ex_ex'];
    $delivery_costs = $row['delivery_costs'];
    $display_delivery_costs = $row['display_delivery_costs'];
    $opknapkosten_ex = $row['opknapkosten_ex'];
    $display_opknapkosten_ex = $row['display_opknapkosten_ex'];
    $transport_buitenland = $row['transport_buitenland'];
    $display_transport_buitenland = $row['display_transport_buitenland'];
    $transport_binnenland = $row['transport_binnenland'];
    $display_transport_binnenland = $row['display_transport_binnenland'];
    $taxatie_kosten = $row['taxatie_kosten'];
    $display_taxatie_kosten = $row['display_taxatie_kosten'];
    $kosten_totaal = $row['kosten_totaal'];
    $display_kosten_totaal = $row['display_kosten_totaal'];
    $verkoopprijs_netto = $row['verkoopprijs_netto'];
    $display_verkoopprijs_netto = $row['display_verkoopprijs_netto'];
    $btw = $row['btw'];
    $display_btw = $row['display_btw'];
    $bpm_berekening = $row['btw'];
    $bpm_berekening = $row['gekozen_bpm_bedrag'];
    $display_bpm_berekening = $row['display_rest_bpm_indicatief'];
    $fees = $row['fee'];
    $display_fees = $row['display_fee'];
    $leges = $row['leges'];
    $display_leges = $row['display_leges'];
    $verkoopprijs_in_in = $row['verkoopprijs_in_in'];
    $display_verkoopprijs_in_in = $row['display_verkoopprijs_in_in'];
}

$extra_highlights           = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['highlights_title']));

$highlights_text           = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['highlights_text']));


$quotation_date = date( 'd-m-Y' );

$_POST['AantalDisplay']=$_POST['display_inkoopprijs_ex_ex']+$_POST['display_delivery_costs']+ $_POST['display_opknapkosten_ex']+$_POST['display_transport_buitenland']+
    $_POST['display_transport_binnenland']+$_POST['display_taxatie_kosten']+ $_POST['display_kosten_totaal']+$_POST['display_verkoopprijs_netto']
    +$_POST['display_btw']+ $_POST['display_rest_bpm_indicatief']+$_POST['display_fee']
    +$_POST['display_leges']+ $_POST['display_verkoopprijs_in_in'];





$verkoper_details = getContactDetails( $_POST['gwi_factuur_gegevens_id'] );

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





// nog doen
$verkoper_details['logo']='autobid_nl_logo.png';

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->Image( '../images_01/' . $verkoper_details['logo'], 170, 8, 30 );
//$pdf->Ln( 0 );
//
//$pdf->SetFont('Arial','B',16);
//
//$pdf->Output();


$pdf = new GwiPdfNew();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->Image( '../images_01/' . $verkoper_details['logo'], 170, 8, 30 );

$pdf->Cell(64,12,'Datum : '.$today." | Referentie : ".$price_calcIDFPDF,0,0,'L',0);   // empty cell with left,top, and right borders
$pdf->SetFont('Arial','B',16);
$pdf->Cell(64,12,'Aanbieding',0,0,'C',0);
$pdf->Cell(64,12,'',0,0,'L',0);

$pdf->Image( $_SERVER['DOCUMENT_ROOT'].'/OLDGWI/data/library/images_01/' . $verkoper_details['logo'], 170, 8, 30 );
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(64,5,'',0,0,'L',0);   // empty cell with left,top, and right borders
$pdf->SetFont('Arial','',12);
$pdf->Cell(64,5,'',0,0,'L',0);
$pdf->Cell(64,5,'',0,0,'L',0);
$pdf->Ln();




AantalImagesFPDF();

if ($_POST['aantalImagesPDF']>0){
    GetImagesFPDF();
    $pdf->Ln( 0 );
    $pdf->Image( $_SERVER['DOCUMENT_ROOT']."/files/".$_POST['PdfImages'][2], 142, 30, 58);
    //$pdf->Image( "../". $_POST['PdfImages'][0], 150, 35, 50);

    //$pdf->Image( WEB_ROOT . '/images/' . $_POST['PdfImages'][0], 150, 35, 50);
}
AantalImagesPDF();

if ($_POST['aantalImagesPDF']>1){
    GetImagesFPDF();
    $pdf->Ln( 0 );
    $pdf->Image( $_SERVER['DOCUMENT_ROOT']."/files/".$_POST['PdfImages'][1], 75, 30, 58 );

}

if ($_POST['aantalImagesPDF']>2){
    GetImagesFPDF();
    $pdf->Ln( 0 );
    $pdf->Image( $_SERVER['DOCUMENT_ROOT']."/files/".$_POST['PdfImages'][0], 10, 30, 58 );

}
$pdf->Ln( 60 );

$pdf->SetFont('Arial','B',14);
$pdf->Cell(192,5,$_POST['automerken']." ".$model." ".$uitvoering." ".$motoromschrijving." ".$transmissie  ,0,0,'L',0);
$pdf->Ln();

$pdf->SetFont('Arial','',12);
$pdf->Cell(192,5,$newDate." | ".$kilometer ." km | ". $extra_highlights  ,0,0,'L',0);
$pdf->Ln( 15 );

$display_sales_price_ex_ex=AGetDisplayPricesFPDF($_SESSION['DID']);

$pdf->SetFont('Arial','',10);
$pdf->Cell(32,5,'Transmissie',0,0,'L',0);
$pdf->Cell(32,5, $transmissie,0,0,'L',0);
$pdf->Cell(32,5,'Chassisnummer',0,0,'L',0);
$pdf->Cell(32,5,$chassisnummer,0,0,'L',0);
$pdf->Cell(32,5,'Datum 1ste toel.',0,0,'L',0);
$pdf->Cell(32,5,$newDate,0,0,'L',0);
$pdf->Ln();

$pdf->Cell(32,5,'Brandstof ',0,0,'L',0);
$pdf->Cell(32,5, $brandstof,0,0,'L',0);
$pdf->Cell(32,5,'Kenteken',0,0,'L',0);
$pdf->Cell(32,5,$kenteken,0,0,'L',0);
$pdf->Cell(32,5,'Datum 1ste toel NL',0,0,'L',0);
$pdf->Cell(32,5,$_toelatingNLA,0,0,'L',0);
$pdf->Ln();

$pdf->Cell(32,5,'CO'.iconv('UTF-8', 'windows-1252', html_entity_decode('²')).' NEDC',0,0,'L',0);
$pdf->Cell(32,5, $co2,0,0,'L',0);
$pdf->Cell(32,5,'Levertermijn*',0,0,'L',0);
$pdf->Cell(32,5,$levering,0,0,'L',0);
$pdf->Cell(32,5,'Soort voertuig',0,0,'L',0);
$pdf->Cell(32,5,$soortauto,0,0,'L',0);
$pdf->Ln();

$pdf->Cell(32,5,'CO'.iconv('UTF-8', 'windows-1252', html_entity_decode('²')).' WLTP',0,0,'L',0);
$pdf->Cell(32,5, $CO2WLTP,0,0,'L',0);
$pdf->Cell(32,5,'Exterieur kleur',0,0,'L',0);
$pdf->Cell(32,5,$kleur,0,0,'L',0);
$pdf->Cell(32,5,'Interieur kleur',0,0,'L',0);
$pdf->Cell(32,5,$interieur_kleur,0,0,'L',0);
$pdf->Ln(10);

if ($description==NULL || $description==''){}else{
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(192,5,'Toelichting'  ,0,0,'L',0);
    $pdf->Ln(  );
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell( 190, 5, $description);
    $pdf->Ln( 5 );
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(192,5,'Prijsofferte'  ,0,0,'L',0);
$pdf->Ln(5);

$id = $_SESSION['DID'];
$query = "SELECT * FROM price_calc WHERE dossierID = \"$id\"";
$result = $_POST['GWIconnector']->query( $query );
while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {

    $pdf->SetFont('Arial','',10);

    if ($row['display_inkoopprijs_ex_ex']==1) {
        //$pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(64, 5, 'Inkoopprijs Netto', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['inkoopprijs_ex_ex'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_delivery_costs']==1) {
        //$pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Afleverkosten', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['delivery_costs'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_opknapkosten_ex']==1) {
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(64, 5, 'Opknapkosten ex Netto', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['opknapkosten_ex'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_transport_buitenland']==1) {
        //$pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Transport buitenland', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['transport_buitenland'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_transport_binnenland']==1) {
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Transport binnenland', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['transport_binnenland'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_taxatie_kosten']==1) {
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Taxatie kosten', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['taxatie_kosten'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}

    if ($row['display_kosten_totaal']==1) {
      //  $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Kosten totaal', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['kosten_totaal'], 'T', 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_fee']==1) {
      //  $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Fee', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['fee'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_verkoopprijs_netto']==1) {
        $pdf->SetFont('Arial','B',10);
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Verkoopprijs Netto', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['verkoopprijs_netto'], 'T', 0, 'R', 0);
        $pdf->Ln();
    }else{}
    $pdf->SetFont('Arial','',10);
    if ($row['display_btw']==1) {
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'BTW 21%', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['btw'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_rest_bpm_indicatief']==1) {
      //  $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Rest BPM indicatief', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['rest_bpm_indicatief'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_leges']==1) {
      //  $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders

        $pdf->Cell(64, 5, 'Leges', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['leges'], 0, 0, 'R', 0);
        $pdf->Ln();
    }else{}
    if ($row['display_verkoopprijs_in_in']==1) {
       // $pdf->Cell(96, 5, '', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(64, 5, 'Verkoopprijs ', 0, 0, 'L', 0);   // empty cell with left,top, and right borders
        $pdf->Cell(32, 5, $_POST['euro'] ." ".$row['verkoopprijs_in_in'], 'T', 0, 'R', 0);
        $pdf->Ln();
    }else{}
}
//$euro = $_POST['euro'];
//$pdf->SetY(260);
//$pdf->SetX(76);
//$pdf->SetFont('Arial','',6);
//$pdf->MultiCell(192,3,'Autobid Nederland B.V., Utrechthaven 11E, 3433 PN Nieuwegein. Levering aan huis. De aangegeven kilometerstand is indicatief. De maximale opknapkosten bij levering:.'.$euro.' 250,- exclusief BTW, tenzij expliciet anders afgesproken. De specificaties en/ of uitvoeringen kunnen afwijken t.o.v. de Nederlandse specificaties en/ of uitvoeringen. De verkoopprijs is inclusief rest-bpm (indien van toepassing), berekend met de ons bekende CO2 en op basis van de huidige bpm-tabel, volgens de huidige bpm-wetgeving. Eventuele van toepassing zijnde veranderingen in wetgeving, bpm-tabel of afschrijfmethodiek zal worden gecorrigeerd in de eindprijs van het voertuig. Aanbieding onder voorbehoud van beschikbaarheid en daadwerkelijke levering door leverancier. De verwachte levertijd is een indicatie van de en/of leverancier en dient te worden beschouwd als richtlijn. Er bestaat de mogelijkheid dat de autos later worden geleverd. GWI Auto is niet verantwoordelijk voor eventuele vertraging in het productieproces van de fabrikant en aanvaardt geen aansprakelijkheid voor eventuele gevolgschade en bijbehorende kosten in geval van vertraagde levering van de autos.Onder voorbehoud van fouten en wijzigingen.', 1);



if ($highlights_text==NULL || $highlights_text==''){}else{
    $pdf->AddPage();
    $pdf->Ln( 10 );
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(192,5,'Meeruitvoeringen'  ,0,0,'L',0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell( 190, 5, $highlights_text, 0);
    $pdf->Ln( 5 );
}



$pdf->SetFont('Arial','B',16);

$pdf->Output();


// Save PDF to Dossier Files folder
//$upload_dir = FILES_ROOT . $doc_directory; //FILES_ROOT;
$upload_dir = $_SERVER['DOCUMENT_ROOT']."/files/".$doc_directory; //FILES_ROOT;
$filenameA='Aanbieding_';

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

$PDFSave=$_SERVER['DOCUMENT_ROOT']."/files/".$doc_directory."/".$filename;

$SaveLoc =$doc_directory."/".$filename;

$Dosser = $_SESSION['DID'];

$queryA = "INSERT INTO files_dossier (
            file, dossier_ID, offerte, viewoff, aanbieding_pdf)
            VALUES (
                 \"$SaveLoc\",
                \"$Dosser\",
                \"$quotation_ID\",
                0,
                    1
                    ) ";

$_POST['GWIconnector']->query($queryA);


$pdf->Output( $PDFSave, 'F' );
chmod($PDFSave, 0755);



?>