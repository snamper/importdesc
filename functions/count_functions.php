<?php

function CounterStartGWIA()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM price_calc WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterATalaanwezig()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM atbasisgegevens WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartInkoopgegevens()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM inkoopgegevens WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterInvoice()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice WHERE dossierID=\"$DossierI\" AND invoice_status=433

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartHighlightsOfferte()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM higlights_opties_total WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartVerkoopgegevens()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM verkoopgegevens WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartInvoice()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice_lines_head WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartCounterStartReservering()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM reservering_verkoop WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartCounterStartReserveringDefinitief()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM reservering_verkoop WHERE dossierID=\"$DossierI\" AND reserveren=2

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartCounterMaakWerkorder()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM maak_werkorder WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartReclamatie()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM reclamatie WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartTransportopdracht()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM transport_opdracht WHERE dossierID=\"$DossierI\"

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartinvoice_lines_head()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice
              LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
              WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}

function CounterStartinvoice_base()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice
              WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterStartinvoice_lines_data()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice
              LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
              LEFT JOIN invoice_lines_data ON invoice_lines_data.invoice_lines_headID = invoice_lines_head.invoice_lines_headID
              WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432 AND invoice_lines_data.voeg_toe=0

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}


function CounterAantlDefReserveringen()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM reservering_verkoop WHERE dossierID=\"$DossierI\" AND reserveren=2

            ");
    $CountNow = mysqli_num_rows($result);

    return  $CountNow;
}
?>