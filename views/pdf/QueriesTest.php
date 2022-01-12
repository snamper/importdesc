<?php
require_once('../../OLDGWI/data/library/vendor/autoload.php');

class GwiPdfNew extends FPDF
{
    // Page header


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



}

function getContactDetailsFPDF( $id ) {
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

function getDossierQuotationFPDF( $id ) {
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
}

function GetTransmissieFPDF(){

    $transmissieSoortID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['transmissieSoort']);
    $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='transmissie' AND conversie_tabel_ID=\"$transmissieSoortID\"
                        ");
    while ($row = mysqli_fetch_array($resultFuel)) {
        $_POST['SoortTransmissie']=$row['conversie_naam'];
    }
}

function GetFuelFPDF(){

    $merkID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['brandstof']);
    $resultFuel = mysqli_query($_POST['GWIconnector'], " SELECT * FROM conversie_tabel_gwi
                      WHERE conversie_soort='brandstof' AND conversie_nummer=\"$merkID\"
                        ");
    while ($row = mysqli_fetch_array($resultFuel)) {
        $_POST['SoortBrandstof']=$row['conversie_naam'];
    }
}
function GetBrandFPDF()
{
    $merkID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['first']);
    $resultMailC = mysqli_query($_POST['GWIconnector'], " SELECT * FROM automerken
                        WHERE automerken_ID =\"$merkID\"
                        ");
    while ($row = mysqli_fetch_array($resultMailC)) {
        $_POST['automerken'] = $row['automerken'];
    }
}

function GetModelFPDF()
{
    $merkID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['second']);
    $resultMailC = mysqli_query($_POST['GWIconnector'], " SELECT * FROM automerken_soort
                        WHERE automerken_soort_ID =\"$merkID\"
                        ");
    while ($row = mysqli_fetch_array($resultMailC)) {
        $_POST['automerken_soort'] = $row['automerken_soort'];
    }
}

function GetDebiteurPDF()
{

    $UsedID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['DebtorIdVerkoop']);
    $resultA = mysqli_query($_POST['GWIconnector'], " SELECT * FROM debtor
                        WHERE DebtorId =\"$UsedID\"
                        ");
    while ($row = mysqli_fetch_array($resultA)) {

        $_POST['DebtorName'] = $row['DebtorName'];
        $_POST['Adressline1'] = $row['Adressline1'];
        $_POST['Adressline3'] = $row['Adressline3'];

    }
}

function GetContactFPDF()
{

    $UsedID = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['ContactId']);

    $resultA = mysqli_query($_POST['GWIconnector'], " SELECT * FROM contacts_afas
                        WHERE ContactId =\"$UsedID\"
                        ");
    while ($row = mysqli_fetch_array($resultA)) {

        $_POST['FullName'] = $row['FullName'];

    }
}

function AantalImagesFPDF()
{
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM files_dossier 
                        WHERE dossier_ID= \"" . $_SESSION['DID'] . "\" 
                        AND offerte!=0 AND soort=1
            ");
    $_POST['aantalImagesPDF'] = mysqli_num_rows($queryA);

}

function GetImagesFPDF(){
    $queryA = mysqli_query($_POST['GWIconnector'], "SELECT * FROM files_dossier WHERE
            dossier_ID= \"" . $_SESSION['DID'] . "\"  AND offerte!=0 AND soort=1
    ");
    while ($row = mysqli_fetch_array($queryA)) {
        $_POST['PdfImages'][]=$row['file'];


    }}


function AGetDisplayPricesFPDF( $id ) {
    $query = "SELECT * FROM price_calc WHERE dossierID = \"$id\"";
    $result = $_POST['GWIconnector']->query( $query );
    while ( $row = $result->fetch_array( MYSQLI_ASSOC ) ) {


//        $display_sales_price_ex_ex = $row['display_inkoopprijs_ex_ex'];
//        $delivery_costs = $row['delivery_costs'];
//        $display_delivery_costs = $row['display_delivery_costs'];
//        $opknapkosten_ex = $row['opknapkosten_ex'];
//        $display_opknapkosten_ex = $row['display_opknapkosten_ex'];
//        $transport_buitenland = $row['transport_buitenland'];
//        $display_transport_buitenland = $row['display_transport_buitenland'];
//        $transport_binnenland = $row['transport_binnenland'];
//        $display_transport_binnenland = $row['display_transport_binnenland'];
//        $taxatie_kosten = $row['taxatie_kosten'];
//        $display_taxatie_kosten = $row['display_taxatie_kosten'];
//        $kosten_totaal = $row['kosten_totaal'];
//        $display_kosten_totaal = $row['display_kosten_totaal'];
//        $verkoopprijs_netto = $row['verkoopprijs_netto'];
//        $display_verkoopprijs_netto = $row['display_verkoopprijs_netto'];
//        $btw = $row['btw'];
//        $display_btw = $row['display_btw'];
//        $bpm_berekening = $row['btw'];
//        $bpm_berekening = $row['gekozen_bpm_bedrag'];
//        $display_bpm_berekening = $row['display_rest_bpm_indicatief'];
//        $fees = $row['fee'];
//        $display_fees = $row['display_fee'];
//        $leges = $row['leges'];
//        $display_leges = $row['display_leges'];
//        $verkoopprijs_in_in = $row['verkoopprijs_in_in'];
//        $display_verkoopprijs_in_in = $row['display_verkoopprijs_in_in'];
    }
}

function Footer()
{
// Go to 1.5 cm from bottom
    $pdf->SetY(-15);
// Select Arial italic 8
    $pdf->SetFont('Arial','I',8);
// Print centered page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo(),0,0,'C');
}
?>