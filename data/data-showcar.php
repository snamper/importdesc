<?php
session_start();
//error_reporting(0);
$config = include("../config.php");
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
/* Array of database columns which should be read and sent back to DataTables. Use a space where
 * you want to insert a non-database field (for example a counter or static image)
 */
$aColumns = array( 'cp.cp_path', 'c.car_id', 'cd.cd_car_ref_custom', 'dp.dp_num', 'c.car_preorder', 'cd.cd_vin', 'cd.cd_conf_number', 'cd.cd_nl_registration_number','cm.cmake_name','cmod.cmodel_name','cmu.cmu_name','cmotor.cmotor_name', 'tr.description', 'u_cr.expo_users_name', 'c.created_at', 'c.car_id as edit','c.car_id as duplicate');
/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "c.car_id as number";
/* DB table to use */
$sJoin = ' cars c ';
$sJoin .= ' INNER JOIN car_details cd on c.car_id = cd.cd_car_id ';
$sJoin .= '  INNER JOIN car_makes cm on c.car_make = cm.cmake_id';
$sJoin .= '  INNER JOIN car_models cmod on c.car_model = cmod.cmodel_id ';
$sJoin .= '  INNER JOIN car_motors cmotor on cd.cd_motor = cmotor.cmotor_id';
$sJoin .= '   INNER JOIN car_make_uitvoerings cmu on c.car_variant  = cmu.cmu_id';
$sJoin .= '   LEFT JOIN car_photos cp on c.car_id = cp.cp_car_id AND cp.cp_imagepos = 1';
$sJoin .= '   INNER JOIN expo_users u_cr on c.user_id = u_cr.expo_users_ID ';
$sJoin .= '   INNER JOIN conversions bs on c.car_body_style = bs.conversion_id ';
$sJoin .= '   INNER JOIN translate tr on bs.conversion_name = tr.label ';
$sJoin .= '   LEFT JOIN duplicates dp on c.car_id = dp.dp_newfile ';

/*
 * Local functions
 */
function fatal_error ( $sErrorMessage = '' )
{
//    header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
//    die( $sErrorMessage );
}
/*
 * MySQL connection
 */
//$_POST['24conn'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
if ( ! $conn = new mysqli($config['hostName'], $config['userName'], $config['passWord'], $config['dbName'] ) )
{
    fatal_error( 'Could not open connection to server' );
}
if ( ! mysqli_select_db($conn, $config['dbName']))
{
    fatal_error( 'Could not select database ' );
}
if (!$conn->set_charset($config['charSet'])) {
    die( 'Error loading character set "'.$config['charSet'].'": '.$db->error );
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
                $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($conn, $aWords[$j] )."%' OR ";
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
        $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($conn, $_GET['sSearch_'.$i])."%' ";
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
$rResult = mysqli_query($conn, $sQuery) or fatal_error( 'MySQL Error: ' . mysqli_errno($conn) );
mysqli_query($conn, "SET character_set_results=utf8");
$rResult = mysqli_query($conn, $sQuery) or die(mysqli_error($conn));
/* Data set length after filtering */
$sQuery = "
        SELECT FOUND_ROWS()
    ";
$rResultFilterTotal =  mysqli_query($conn, $sQuery ) or fatal_error( 'MySQL Error: ' . mysqli_errno($conn) );
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];
/* Total data set length */
$sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   $sTable
    ";
$rResultTotal = mysqli_query($conn, $sQuery) or fatal_error( 'MySQL Error: ' . mysqli_errno($conn) );
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
        }   elseif ( $aColumns[ $i ] == 'c.car_make' ) {
             $row[] = '<center>'.$j.'</center>';
        } elseif ( $aColumns[ $i ] == 'c.car_id as edit' ) {
            $row[] = '<center style="display:flex;"><a href="car_start?car_id='.$aRow[$i].'" class="btn btn-default btn-xs"><i class="ti-brush"></i></a><a href="show_cars?delete='.$aRow[$i].'" class="btn btn-default btn-xs"><i class="ti-trash"></i></a></center>';
        }elseif ( $aColumns[ $i ] == 'c.car_id as duplicate' ) {
            $row[] = '<center style="display:flex;"><a href="car_start?car_id='.$aRow[$i].'&duplicate" class="btn btn-default btn-xs"><i class="ti-files"></i></a></center>';
        } elseif ( $aColumns[ $i ] == 'cp.cp_path' ) {
            $row[] = '<center style="display:flex;"><img src="'.($aRow[$i] == '' ? '/assets/images/no-image.gif' : $aRow[$i]).'" style="width: 100px;"></center>';
        } elseif ( $aColumns[ $i ] == 'c.car_id' ) {
            $row[] = '<center style="display:flex;">'.sprintf("A%'.07d\n", $aRow[$i]).'</center>';
        } elseif ( $aColumns[ $i ] == 'c.car_preorder' ) {
            $row[] = '<center style="display:flex;">'.($aRow[$i] == '1' ? 'Yes' : 'No').'</center>';
        }  elseif ( $aColumns[ $i ] != ' ' ) {
            /* General output */
            $row[] = $aRow[$i];
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode( $output );
?>