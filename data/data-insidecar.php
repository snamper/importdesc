<?php
session_start();
//error_reporting(0);
// var_dump($_SERVER['HTTP_REFERER']);
$test = explode('?car_id=',$_SERVER['HTTP_REFERER']);
include("connection.php");



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

/* Array of database columns which should be read and sent back to DataTables. Use a space where
 * you want to insert a non-database field (for example a counter or static image)
 */
$aColumns = array( 'calclulation_id','inkoopprijs_ex_ex', 'feeleverancier', 'inkoopprijstotaal', 'opknapkosten', 'transport_buitenland', 'transport_binnenland', 'taxatie_kosten', 'totaalkosten', 'fee', 'verkoopprijs_ex', 'btw', 'verkoopprijsbtw', 'restbpm', 'leges', 'verkoopprijsin','calclulation_id as connect','calculation_for_car_id as carid','active');

$sIndexColumn = "calclulation_id";

/* DB table to use */
$sTable = "calculations";

$sWhere .= "WHERE calculation_for_car_id =".$test[1];
// $sJoin .= ' WHERE `translate.langID`= $langID';
/*
 * Local functions
 */
function fatal_error ( $sErrorMessage = '' )
{
//    header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
//    die( $sErrorMessage );
}

$gaSql['charset']  = 'utf8';

/*
 * MySQL connection
 */
//$_POST['24conn'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
if ( ! $gaSql['link'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] ) )
{
    fatal_error( 'Could not open connection to server' );
}

if ( ! mysqli_select_db($gaSql['link'], $gaSql['db']))
{
    fatal_error( 'Could not select database ' );
}
if (!$gaSql['link']->set_charset($gaSql['charset'])) {
    die( 'Error loading character set "'.$gaSql['charset'].'": '.$db->error );
}

/*
 * Paging
 */
$sLimit = "";
if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
{
    $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
        intval( $_GET['iDisplayLength'] );
}


/*
 * Ordering
 */
$sOrder = "";
if ( isset( $_GET['iSortCol_0'] ) )
{
    $sOrder = "ORDER BY  ";
    for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
    {
        if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
        {
            $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
        }
    }

    $sOrder = substr_replace( $sOrder, "", -2 );
    if ( $sOrder == "ORDER BY" )
    {
        $sOrder = "";
    }
}


/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
/* replace start
$sWhere = "";
if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
{
    $sWhere = "WHERE (";
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
        {
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
        }
    }
    $sWhere = substr_replace( $sWhere, "", -3 );
    $sWhere .= ')';
}
 replace end */
if ( $_GET['sSearch'] != "" )
{
    $aWords = preg_split('/\s+/', $_GET['sSearch']);
    $sWhere = "WHERE (";

    for ( $j=0 ; $j<count($aWords) ; $j++ )
    {
        if ( $aWords[$j] != "" )
        {
            $sWhere .= "( ";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $aWords[$j] )."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ") AND ";
        }
    }
    $sWhere = substr_replace( $sWhere, "", -4 );
    $sWhere .= ')';
}

/* Individual column filtering */
for ( $i=0 ; $i<count($aColumns) ; $i++ )
{
    if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
    {
        if ( $sWhere == "" )
        {
            $sWhere = "WHERE ";
        }
        else
        {
            $sWhere .= " AND ";
        }
        $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
    }
}


/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
        $sJoin
        $sWhere
        $sOrder
        $sLimit
    ";

$rResult = mysqli_query($gaSql['link'], $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysqli_errno($gaSql['link']) );
mysqli_query($gaSql['link'], "SET character_set_results=utf8", $gaSql['link']);

$rResult = mysqli_query($gaSql['link'], $sQuery ) or die(mysql_error());
/* Data set length after filtering */
$sQuery = "
        SELECT FOUND_ROWS()
    ";
$rResultFilterTotal =  mysqli_query($gaSql['link'], $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysqli_errno($gaSql['link']) );
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   $sTable
    ";
$rResultTotal = mysqli_query($gaSql['link'], $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysqli_errno($gaSql['link']) );
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


/*
 * Output
 */
//$output = array(
//    "sEcho" => intval($_GET['sEcho']),
//    "iTotalRecords" => $iTotal,
//    "iTotalDisplayRecords" => $iFilteredTotal,
//    "aaData" => array()
//);
//
//while ( $aRow = mysql_fetch_array( $rResult ) )
//{
//    $row = array();
//    for ( $i=0 ; $i<count($aColumns) ; $i++ )
//    {
//        if ( $aColumns[$i] == "version" )
//        {
//            /* Special output formatting for 'version' column */
//            $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
//        }
//        else if ( $aColumns[$i] != ' ' )
//        {
//            /* General output */
//            $row[] = $aRow[ $aColumns[$i] ];
//        }
//    }
//    $output['aaData'][] = $row;
//}


$output = array(
    "sEcho"                => intval( $_GET['sEcho'] ),
    "iTotalRecords"        => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData"               => array()
);
// var_dump(mysqli_fetch_array($rResult));
// die;
$j=0;
while ( $aRow = mysqli_fetch_array( $rResult ) ) {
	$j++;
    $row = array();
    for ( $i = 0; $i < count( $aColumns ); $i ++ ) {
        if ( $aColumns[ $i ] == "version" ) {
            /* Special output formatting for 'version' column */
            $row[] = ( $aRow[ $aColumns[ $i ] ] == "0" ) ? '-' : $aRow[ $aColumns[ $i ] ];
        }   elseif ( $aColumns[ $i ] == 'c.id_car_make' ) {
             $row[] = '<center>'.$j.'</center>';
        } elseif ( $aColumns[ $i ] == 'calclulation_id as connect' ) {
            $row[] = '<center style="display:flex;"><a href="?disable_calc='.$aRow[$i].'" class="btn btn-default btn-xs"><i class="ti-close" ></i></a></center>';
        }elseif ( $aColumns[ $i ] == 'cm.id_car_make as edit' ) {
            $row[] = '<center style="display:flex;"><a href="?disable_mark='.$aRow[$i].'"  class="btn btn-default btn-xs"><i class="ti-close" ></i></a></center>';
        }  elseif ( $aColumns[ $i ] != ' ' ) {
            /* General output */
            $row[] = $aRow[$i];
        }
    }
    $output['aaData'][] = $row;

}
echo json_encode( $output );
?>