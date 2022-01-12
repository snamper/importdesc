<?php
require_once('../vendor/autoload.php');
require_once( '../../../settings.php' );

/** Error reporting */
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
//date_default_timezone_set('Europe/London');

class GwiPdfOrder extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
//       $this->Image( WEB_ROOT . '/images/gwi-header-left.jpg', 0, 0, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Ln( 0 );
        $this->SetFont( 'Arial', '', 12 );
        $this->Cell( 40, 10, 'Koopovereenkomst : '.$_POST['automerken']." ".$_POST['ModelNew']." ".$_POST['motoromschrijvingNew']." ".$_POST['transmissieNew']  );
        $this->Cell(112);
        $this->SetFont( 'Arial', '', 10 );
        $this->Cell( 40, 10, 'Exemplaar voor verkoper' );
        // Title
        // Line break
        $this->Ln(8);
    }

    // Page footer
    function Footer()
    {
        // Position at 1 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', '', 6);
        // Page number
        $this->Cell(10, 1, $_POST['bedrijfsnaam'].', Utrechthaven 11E, 3433 PN Nieuwegein. Aanbod onder voorbehoud van beschikbaarheid en levering door leverancier. Uitvoering, CO2 en rest-BPM bedragen zijn indicatief. Hieraan  ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 8,'kunnen geen rechten worden ontleend. Voertuigen geproduceerd voor een andere markt kunnen qua specificatie en uitvoering afwijken van voertuigen geproduceerd voor de Nederlandse markt. Levering af ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 15,'Nieuwegein vanaf vijf tot tien werkdagen na voldoening van de koopprijs excl. BPM. Voertuigen kunnen ten behoeve van cosmetische verbeteringen voorzien zijn van lakherstellingen. Handelsverkoop aan ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 22,'autobedrijven vindt plaats onder uitsluiting van elke vorm van garantie.', 0, 0, 'L');


    }

    // Table
    function Table($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data

        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();



        $this->Ln();



        $this->Ln();




        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();


        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }


    function TableXX($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Autogegevens', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();
        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['Merk'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['Model'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['motoromschrijving'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['productiedatum'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Kilometerstand', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['kilometer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Uitvoering', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['uitvoering'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();

        $this->Cell($w[0], 6, 'Transmissie', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['transmissie'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }
    // Table
    function TableHigh()
    {
        // Column widths
        $w = array(40, 40, 40, 40);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Highlights', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        AantalHighPDF();

        If ( $_POST['aantalHighPDF']==1){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');

            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==2){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==3){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==4){
            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==5){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==6){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==7){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==8){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==9){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==10){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==11){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==12){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==13){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 12,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }else{

            $this->Cell($w[0], 6, 'Geen highlights bekend', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[1], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');
            $this->Cell($w[2], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');


        }


    }

    function PriceTableA(){
        $w = array(35, 60, 35, 60);

//        // Data
//        $this->SetFont('Arial', 'B', '10');
//        $this->Cell($w[0], 6, 'Louis', 0, 0, 'L');
//        $this->SetFont('Arial', '', '10');
//        $this->Cell($w[1], 6, 'Test', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Ln();
//        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();
//
//        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();


        if ( $_POST['display_sales_price_ex_ex'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Prijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['sales_price_ex_ex'], 0, 0, 'R');
            $this->Ln();
//

        }
        if ( $_POST['display_delivery_costs'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Afleveringskosten:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['delivery_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_other_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Transport:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['other_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sub_price_ex_ex'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Verkoopprijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['sub_price_ex_ex'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'BTW:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['vat_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_residual_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Indicatie rest BPM:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['residual_vat_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_fees'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Leges:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['fees'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_price_in_in'] == 1 ) {

            $this->SetFont('Arial', 'b', '12');
            $this->Cell($w[0], 6, 'Prijs in/in:', 0, 0, 'L');
            $this->SetFont('Arial', 'B', '12');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
            $this->Ln();

        }

    }


    function PriceTableB(){
        $w = array(35, 60, 35, 160);




            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, ' ', 0, 0, 'R');
            $this->Ln();
//




        if ($_POST['display_sales_price_ex_ex']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Tegen de prijs van', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'] . ' ' . $_POST['sales_price_ex_ex'], 0, 0, 'R');
            $this->Ln();
        }else{}


        if ($_POST['display_delivery_costs']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Afleveringskosten', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['delivery_costs'], 0, 0, 'R');
            $this->Ln();
        }else{}

            if ($_POST['display_other_costs']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Trans/Overig/Diverse', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['other_costs'], 0, 0, 'R');
            $this->Ln();
            }else{}



                    if ($_POST['display_sub_price_ex_ex']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Verkoopprijs ex/ex', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['sub_price_ex_ex'], 0, 0, 'R');
            $this->Ln();
                    }else{}

        if ($_POST['display_vat_costs']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'BTW 21%', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['vat_costs'], 0, 0, 'R');
            $this->Ln();
        }else{}

        if ($_POST['display_sales_price_btw']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Verkoopprijs incl. BTW (ex. BPM)', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['sales_price_btw'], 0, 0, 'R');
            $this->Ln();
        }else{}



                        if ($_POST['display_residual_vat_costs']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Indicatieve rest BPM', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['residual_vat_costs'], 0, 0, 'R');
            $this->Ln();
                        }else{}

                            if ($_POST['display_fees']==1) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[3], 6, 'Leges', 0, 0, 'R');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['fees'], 0, 0, 'R');
            $this->Ln();
                            }else{}


                                if ($_POST['display_price_in_in']==1) {
            $this->SetFont('Arial', 'b', '12');
            $this->Cell($w[3], 6, 'Totaalprijs in/in', 0, 0, 'R');
            $this->SetFont('Arial', 'B', '12');
            $this->Cell($w[0], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
            $this->Ln();
                                }else{}

        if ($_POST['SoortBelasting']=='Marge auto') {
            $this->SetLeftMargin(10);
            $this->Ln(-2);
            $this->SetFont('Arial', 'b', '9');
            $this->Cell($w[0], 0, 'Levering volgens de Marge regeling', 0, 0, 'L');

            $this->Ln(5);
        }else{}



    }
    // Current column
    var $col = 0;
// Ordinate of column start
    var $y0 =143;



    function SetCol($col)
    {
        // Set position at a given column
        $this->col = $col;
        $x = 10+$col*98;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // Method accepting or not automatic page break
        if($this->col<2)
        {
            // Go to next column
            $this->SetCol($this->col+1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        }
        else
        {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }
    function ChapterBody()
    {
        // Read text file
        $txt = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));
        // Font
        $this->SetFont('Arial','',8);
        // Output text in a 6 cm width column
        $this->MultiCell(95,4,$txt,0,1);
        $this->Ln();
        // Mention

        // Go back to first column
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // Add chapter
        $this->ChapterBody($file);
    }

}

class GwiPdf extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
//       $this->Image( WEB_ROOT . '/images/gwi-header-left.jpg', 0, 0, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Offerte ', 0, 0, 'C');
        // Line break
        $this->Ln(8);
    }

    // Page footer
    function Footer()
    {
        // Position at 1 cm from bottom
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial', 'b', 6);
        // Page number
        $this->Cell(10, 1, $_POST['bedrijfsnaam'].', Utrechthaven 11E, 3433 PN Nieuwegein.  ', 0, 0, 'L');
        $this->SetFont('Arial', '', 6);
        $this->SetX(76);
        $this->Cell(10, 1, 'Levering aan huis. De aangegeven kilometerstand is indicatief. De maximale opknapkosten bij levering: € 250,- exclusief BTW, tenzij   ', 0, 0, 'L');

        $this->SetX(10);
        $this->Cell(10, 8,'expliciet anders afgesproken. De specificaties en/ of uitvoeringen kunnen afwijken t.o.v. de Nederlandse specificaties en/ of uitvoeringen. De verkoopprijs is inclusief rest-bpm (indien van toepassing),', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 15,'berekend met de ons bekende CO2 en op basis van de huidige bpm-tabel, volgens de huidige bpm-wetgeving. Eventuele van toepassing zijnde veranderingen in wetgeving, bpm-tabel of afschrijfmethodiek zal', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 22,' worden gecorrigeerd in de eindprijs van het voertuig. Aanbieding onder voorbehoud van beschikbaarheid en daadwerkelijke levering door leverancier. De verwachte levertijd is een indicatie van de ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 29,' en/of leverancier en dient te worden beschouwd als richtlijn. Er bestaat de mogelijkheid dat de autos later worden geleverd. GWI Auto is niet verantwoordelijk voor eventuele vertraging in het productieproces', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 36,'van de fabrikant en aanvaardt geen aansprakelijkheid voor eventuele gevolgschade en bijbehorende kosten in geval van vertraagde levering van de autos.Onder voorbehoud van fouten en wijzigingen.', 0, 0, 'L');


    }

    // Table
    function Table($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data

        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();



        $this->Ln();



        $this->Ln();




        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();


        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }


    function TableXX($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Autogegevens', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();
        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['Merk'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['Model'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['motoromschrijving'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['productiedatum'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Kilometerstand', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['kilometer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Uitvoering', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['uitvoering'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();

        $this->Cell($w[0], 6, 'Transmissie', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['transmissie'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }
    // Table
    function TableHigh()
    {
        // Column widths
        $w = array(40, 40, 40, 40);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Highlights', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        AantalHighPDF();

        If ( $_POST['aantalHighPDF']==1){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');

            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==2){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==3){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==4){
            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==5){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==6){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==7){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==8){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==9){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==10){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==11){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==12){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==13){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 12,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }else{

            $this->Cell($w[0], 6, 'Geen highlights bekend', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[1], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');
            $this->Cell($w[2], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');


        }


    }

    function PriceTableA(){
        $w = array(35, 60, 35, 60);

//        // Data
//        $this->SetFont('Arial', 'B', '10');
//        $this->Cell($w[0], 6, 'Louis', 0, 0, 'L');
//        $this->SetFont('Arial', '', '10');
//        $this->Cell($w[1], 6, 'Test', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Ln();
//        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();
//
//        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();


            if ( $_POST['display_sales_price_ex_ex'] == 1 ) {

                        $this->SetFont('Arial', '', '9');
                        $this->Cell($w[0], 6, 'Prijs ex/ex:', 0, 0, 'L');
                        $this->SetFont('Arial', '', '9');
                        $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_ex_ex'],2,",","."), 0, 0, 'R');
                        $this->Ln();
//

            }
            if ( $_POST['display_delivery_costs'] == 1 ) {

                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'Afleveringskosten:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['delivery_costs'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
            if ( $_POST['display_other_costs'] == 1 ) {
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'Transport:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['other_costs'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
            if ( $_POST['display_sub_price_ex_ex'] == 1 ) {
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'Verkoopprijs ex/ex:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sub_price_ex_ex'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
            if ( $_POST['display_vat_costs'] == 1 ) {
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'BTW 21%:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['vat_costs'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
            if ( $_POST['display_residual_vat_costs'] == 1 ) {
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'Indicatieve rest BPM:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['residual_vat_costs'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
        if ( $_POST['display_sales_price_btw'] == 1 ) {
            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[0], 6, 'Prijs incl. BTW:', 0, 0, 'L');
            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_btw'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }

            if ( $_POST['display_fees'] == 1 ) {
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[0], 6, 'Leges:', 0, 0, 'L');
                $this->SetFont('Arial', '', '9');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['fees'],2,",","."), 0, 0, 'R');
                $this->Ln();

            }
            if ( $_POST['display_price_in_in'] == 1 ) {

                $this->SetFont('Arial', 'b', '10');
                $this->Cell($w[0], 6, 'Totaalprijs in/in:', 0, 0, 'L');
                $this->SetFont('Arial', 'B', '10');
                $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['price_in_in'],2,",","."), 0, 0, 'R');


//                $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
                $this->Ln();

            }

    }

    // Current column
    var $col = 0;
// Ordinate of column start
    var $y0 =143;



    function SetCol($col)
    {
        // Set position at a given column
        $this->col = $col;
        $x = 10+$col*98;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // Method accepting or not automatic page break
        if($this->col<2)
        {
            // Go to next column
            $this->SetCol($this->col+1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        }
        else
        {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }
    function ChapterBody()
    {
        // Read text file
        $txt = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));
        // Font
        $this->SetFont('Arial','',8);
        // Output text in a 6 cm width column
        $this->MultiCell(95,4,$txt,0,1);
        $this->Ln();
        // Mention

        // Go back to first column
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // Add chapter
        $this->ChapterBody($file);
    }

}

class GwiPdfAanbieding extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
//       $this->Image( WEB_ROOT . '/images/gwi-header-left.jpg', 0, 0, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Aanbieding ', 0, 0, 'C');
        // Line break
        $this->Ln(8);
    }

    // Page footer
    function Footer()
    {
        // Position at 1 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', '', 6);
        // Page number
        $this->Cell(10, 1, $_POST['bedrijfsnaam'].', Utrechthaven 11E, 3433 PN Nieuwegein. Aanbod onder voorbehoud van beschikbaarheid en levering door leverancier. Uitvoering, CO2 en rest-BPM bedragen zijn indicatief. Hieraan kunnen ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 8,'geen rechten worden ontleend. Voertuigen geproduceerd voor een andere markt kunnen qua specificatie en uitvoering afwijken van voertuigen geproduceerd voor de Nederlandse markt. Levering af ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 15,'Nieuwegein vanaf vijf tot tien werkdagen na voldoening van de koopprijs excl. BPM. Voertuigen kunnen ten behoeve van cosmetische verbeteringen voorzien zijn van lakherstellingen. Handelsverkoop aan ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 22,'autobedrijven vindt plaats onder uitsluiting van elke vorm van garantie.', 0, 0, 'L');


    }

    // Table
    function Table($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data

        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();



        $this->Ln();



        $this->Ln();




        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();


        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }


    function TableXX($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Autogegevens', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();
        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['Merk'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['Model'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['motoromschrijving'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['productiedatum'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Kilometerstand', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['kilometer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Uitvoering', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['uitvoering'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();

        $this->Cell($w[0], 6, 'Transmissie', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['transmissie'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }
    // Table
    function TableHigh()
    {
        // Column widths
        $w = array(40, 40, 40, 40);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Highlights', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        AantalHighPDF();

        If ( $_POST['aantalHighPDF']==1){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');

            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==2){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==3){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==4){
            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==5){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==6){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==7){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==8){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==9){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==10){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==11){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==12){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==13){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 12,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }else{

            $this->Cell($w[0], 6, 'Geen highlights bekend', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[1], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');
            $this->Cell($w[2], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');


        }


    }

    function PriceTableA(){
        $w = array(35, 60, 35, 60);

//        // Data
//        $this->SetFont('Arial', 'B', '10');
//        $this->Cell($w[0], 6, 'Louis', 0, 0, 'L');
//        $this->SetFont('Arial', '', '10');
//        $this->Cell($w[1], 6, 'Test', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Ln();
//        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();
//
//        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();


        if ( $_POST['display_sales_price_ex_ex'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Prijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['sales_price_ex_ex'], 0, 0, 'R');
            $this->Ln();
//

        }
        if ( $_POST['display_delivery_costs'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Afleveringskosten:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['delivery_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_other_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Transport:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['other_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sub_price_ex_ex'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Verkoopprijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['sub_price_ex_ex'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'BTW:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['vat_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_residual_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Indicatie rest BPM:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['residual_vat_costs'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_fees'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Leges:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['fees'], 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_price_in_in'] == 1 ) {

            $this->SetFont('Arial', 'b', '12');
            $this->Cell($w[0], 6, 'Prijs in/in:', 0, 0, 'L');
            $this->SetFont('Arial', 'B', '12');
            $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
            $this->Ln();

        }

    }

    // Current column
    var $col = 0;
// Ordinate of column start
    var $y0 =143;



    function SetCol($col)
    {
        // Set position at a given column
        $this->col = $col;
        $x = 10+$col*98;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // Method accepting or not automatic page break
        if($this->col<2)
        {
            // Go to next column
            $this->SetCol($this->col+1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        }
        else
        {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }
    function ChapterBody()
    {
        // Read text file
        $txt = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));
        // Font
        $this->SetFont('Arial','',8);
        // Output text in a 6 cm width column
        $this->MultiCell(95,4,$txt,0,1);
        $this->Ln();
        // Mention

        // Go back to first column
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // Add chapter
        $this->ChapterBody($file);
    }

}


class GwiPdfVerkooporderNew extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
//       $this->Image( WEB_ROOT . '/images/gwi-header-left.jpg', 0, 0, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Koopovereenkomst ', 0, 0, 'C');
        // Line break
        $this->Ln(8);
    }

    // Page footer
    function Footer()
    {
        // Position at 1 cm from bottom
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial', 'b', 6);
        // Page number
        $this->Cell(10, 1, $_POST['bedrijfsnaam'].', Utrechthaven 11E, 3433 PN Nieuwegein.  ', 0, 0, 'L');
        $this->SetFont('Arial', '', 6);
        $this->SetX(76);
        $this->Cell(10, 1, 'Levering aan huis. De aangegeven kilometerstand is indicatief. De maximale opknapkosten bij levering: € 250,- exclusief BTW, tenzij   ', 0, 0, 'L');

        $this->SetX(10);
        $this->Cell(10, 8,'expliciet anders afgesproken. De specificaties en/ of uitvoeringen kunnen afwijken t.o.v. de Nederlandse specificaties en/ of uitvoeringen. De verkoopprijs is inclusief rest-bpm (indien van toepassing),', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 15,'berekend met de ons bekende CO2 en op basis van de huidige bpm-tabel, volgens de huidige bpm-wetgeving. Eventuele van toepassing zijnde veranderingen in wetgeving, bpm-tabel of afschrijfmethodiek zal', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 22,' worden gecorrigeerd in de eindprijs van het voertuig. Aanbieding onder voorbehoud van beschikbaarheid en daadwerkelijke levering door leverancier. De verwachte levertijd is een indicatie van de ', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 29,' en/of leverancier en dient te worden beschouwd als richtlijn. Er bestaat de mogelijkheid dat de autos later worden geleverd. GWI Auto is niet verantwoordelijk voor eventuele vertraging in het productieproces', 0, 0, 'L');
        $this->SetX(10);
        $this->Cell(10, 36,'van de fabrikant en aanvaardt geen aansprakelijkheid voor eventuele gevolgschade en bijbehorende kosten in geval van vertraagde levering van de autos.Onder voorbehoud van fouten en wijzigingen.', 0, 0, 'L');



    }

    // Table
    function Table($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data

        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();



        $this->Ln();



        $this->Ln();




        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();


        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }


    function TableXX($data)
    {
        // Column widths
        $w = array(35, 60, 35, 60);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Autogegevens', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Ln();
        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['Merk'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['Model'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['motoromschrijving'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['productiedatum'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Kilometerstand', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['kilometer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Uitvoering', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['uitvoering'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Chassisnummer', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['chassisnummer'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Brandstof', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer='".$data['brandstof']."'
                        ");
        while ($row = mysqli_fetch_array($resultFuel)) {
            $this->Cell($w[3], 6, $row['conversie_naam'], 0, 0, 'L');
        }
        $this->SetFont('Arial', '');



        $this->Ln();

        $this->Cell($w[0], 6, 'Transmissie', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['transmissie'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'Exterieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, $data['kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        $this->Cell($w[0], 6, 'Interieur kleur', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[1], 6, $data['interieur_kleur'], 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, 'BTW of Marge', 0, 0, 'L');
        if ($_POST['inkoopprijs_ex_ex']>0){
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'BTW auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }else{
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, 'Marge auto', 0, 0, 'L');
            $this->SetFont('Arial', '');
        }
    }
    // Table
    function TableHigh()
    {
        // Column widths
        $w = array(40, 40, 40, 40);

        // Data
        $this->SetFont('Arial', 'B', '13');
        $this->Cell($w[0], 6, 'Highlights', 0, 0, 'L');
        $this->SetFont('Arial', 'B', '10');
        $this->Cell($w[1], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');
        $this->Cell($w[2], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', 'B');
        $this->Cell($w[3], 6, '', 0, 0, 'L');
        $this->SetFont('Arial', '');

        $this->Ln();

        AantalHighPDF();

        If ( $_POST['aantalHighPDF']==1){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');

            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==2){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==3){

            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==4){
            $HighLightPDF =GetHighLightsDB();
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==5){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==6){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==7){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==8){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==9){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==10){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==11){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==12){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,8';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,12';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }elseif( $_POST['aantalHighPDF']==13){
            $idh='limit 0,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 4,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 8,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

            $idh='limit 12,4';
            $HighLightPDF =GetHighLightsDB($idh);
            foreach ( $HighLightPDF as $HL ) {
                $this->Cell($w[0], 6, $HL['highlightsNaam'], 0, 0, 'L');
            }
            $this->Ln();

        }else{

            $this->Cell($w[0], 6, 'Geen highlights bekend', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[1], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');
            $this->Cell($w[2], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', 'B');
            $this->Cell($w[3], 6, '', 0, 0, 'L');
            $this->SetFont('Arial', '');


        }


    }

    function PriceTableA(){
        $w = array(35, 60, 35, 60);

//        // Data
//        $this->SetFont('Arial', 'B', '10');
//        $this->Cell($w[0], 6, 'Louis', 0, 0, 'L');
//        $this->SetFont('Arial', '', '10');
//        $this->Cell($w[1], 6, 'Test', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Ln();
//        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();
//
//        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();


        if ( $_POST['display_sales_price_ex_ex'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Prijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_ex_ex'],2,",","."), 0, 0, 'R');
            $this->Ln();
//

        }
        if ( $_POST['display_delivery_costs'] == 1 ) {

            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Afleveringskosten:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['delivery_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_other_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Transport:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['other_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sub_price_ex_ex'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Verkoopprijs ex/ex:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sub_price_ex_ex'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'BTW 21%:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['vat_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_residual_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Indicatieve rest BPM:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['residual_vat_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sales_price_btw'] == 1 ) {
            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[0], 6, 'Prijs incl. BTW:', 0, 0, 'L');
            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_btw'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }

        if ( $_POST['display_fees'] == 1 ) {
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[0], 6, 'Leges:', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['fees'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_price_in_in'] == 1 ) {

            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[0], 6, 'Totaalprijs in/in:', 0, 0, 'L');
            $this->SetFont('Arial', 'B', '10');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['price_in_in'],2,",","."), 0, 0, 'R');


//                $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
            $this->Ln();

        }

    }


    function PriceTableVerkooporder(){
        $w = array(35, 60, 35, 60);

//        // Data
//        $this->SetFont('Arial', 'B', '10');
//        $this->Cell($w[0], 6, 'Louis', 0, 0, 'L');
//        $this->SetFont('Arial', '', '10');
//        $this->Cell($w[1], 6, 'Test', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Ln();
//        $this->Cell($w[0], 6, 'Merk', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Model', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();
//
//        $this->Cell($w[0], 6, 'Motor omschrijving', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[1], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//        $this->Cell($w[2], 6, 'Eerste toelating', 0, 0, 'L');
//        $this->SetFont('Arial', 'B');
//        $this->Cell($w[3], 6, '', 0, 0, 'L');
//        $this->SetFont('Arial', '');
//
//        $this->Ln();


        if ( $_POST['display_sales_price_ex_ex'] == 1 ) {

            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Prijs ex/ex', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_ex_ex'],2,",","."), 0, 0, 'R');
            $this->Ln();
//

        }
        if ( $_POST['display_delivery_costs'] == 1 ) {

            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Afleveringskosten', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['delivery_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_other_costs'] == 1 ) {
            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Transport', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['other_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sub_price_ex_ex'] == 1 ) {
            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Verkoopprijs ex/ex', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sub_price_ex_ex'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'BTW 21%', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['vat_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_residual_vat_costs'] == 1 ) {
            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Indicatieve rest BPM', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['residual_vat_costs'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_sales_price_btw'] == 1 ) {
            $this->SetFont('Arial', 'b', '7');
            $this->Cell($w[0], 6, 'Prijs incl. BTW', 0, 0, 'L');
            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['sales_price_btw'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }

        if ( $_POST['display_fees'] == 1 ) {
            $this->SetFont('Arial', '', '6');
            $this->Cell($w[0], 6, 'Leges', 0, 0, 'L');
            $this->SetFont('Arial', '', '9');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['fees'],2,",","."), 0, 0, 'R');
            $this->Ln();

        }
        if ( $_POST['display_price_in_in'] == 1 ) {

            $this->SetFont('Arial', 'b', '10');
            $this->Cell($w[0], 6, 'Totaalprijs in/in', 0, 0, 'L');
            $this->SetFont('Arial', 'B', '10');
            $this->Cell($w[10], 6, $_POST['euro'].' '.number_format($_POST['price_in_in'],2,",","."), 0, 0, 'R');


//                $this->Cell($w[10], 6, $_POST['euro'].' '.$_POST['price_in_in'], 0, 0, 'R');
            $this->Ln();

        }

    }

    // Current column
    var $col = 0;
// Ordinate of column start
    var $y0 =143;



    function SetCol($col)
    {
        // Set position at a given column
        $this->col = $col;
        $x = 10+$col*98;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // Method accepting or not automatic page break
        if($this->col<2)
        {
            // Go to next column
            $this->SetCol($this->col+1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        }
        else
        {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }
    function ChapterBody()
    {
        // Read text file
        $txt = iconv('UTF-8', 'windows-1252', html_entity_decode($_POST['extra_highlights']));
        // Font
        $this->SetFont('Arial','',8);
        // Output text in a 6 cm width column
        $this->MultiCell(95,4,$txt,0,1, true);
        $this->Ln();
        // Mention

        // Go back to first column
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // Add chapter
        $this->ChapterBody($file);
    }

}

function GetNamePDF(){
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM quotations
 LEFT JOIN expo_users ON expo_users.expo_users_ID = quotations.ingegeven_door
    ");
    while ($row = mysqli_fetch_array($queryA)) {
        $_POST['expo_users_name']=$row['expo_users_name'];

    }}

function GetImagesPDF(){
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM files_dossier WHERE
            dossier_ID= \"" . $_SESSION['dossier_ID'] . "\" AND offerte = 1 AND viewoff=0 ORDER BY offerte_positie ASC
    ");
    while ($row = mysqli_fetch_array($queryA)) {
        $_POST['PdfImages'][]=$row['file'];

    }}


function AantalImagesPDF()
{
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM files_dossier WHERE
            dossier_ID= \"" . $_SESSION['dossier_ID'] . "\" AND offerte = 1 AND viewoff=0
            ");
    $_POST['aantalImagesPDF'] = mysqli_num_rows($queryA);

}


function AantalHighPDF()
{
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM highlights WHERE
            dossier_ID= \"" . $_SESSION['dossier_ID'] . "\"
            ");
    $_POST['aantalHighPDF'] = mysqli_num_rows($queryA);

}

function GetHighLightsDB($idh) {
    $query = "
      SELECT * FROM highlights
      WHERE dossier_ID = '".$_SESSION['dossier_ID']."'
       $idh
    ";

    $result = $_POST['GWIconnector']->query( $query );
    if ( ! $result ) {
        $rows[] = null;

        return $rows;
    }
    while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {
        $rows[] = $row;
    }

    return $rows;
}
function getContactDetails( $id ) {
    $query = "
      SELECT * FROM gwi_factuur_gegevens
      WHERE gwi_factuur_gegevens_id = \"$id\"
    ";

    $result = $_POST['GWIconnector']->query( $query );
    if ( ! $result ) {
        $rows[] = null;

        return $rows;
    }
    while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {
        $rows[] = $row;
    }

    return $rows[0];
}