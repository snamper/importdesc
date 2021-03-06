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
$aColumns = array('pl_id', 'car_preorder', 'pl_vehicle_id', 'cm.cmake_name', 'cmod.cmodel_name', 'cmu_name', 'cmotor.cmotor_name', 'car_vat_marge', 'pl_expected_delivery', 'po_vat_deposit', 'pl_km_delivery', 'pl_transport_by_supplier', 'pl_purchase_value', 'pl_fee_intermediate_supplier', 'pl_transport_cost', 'po_vat_percentage', 'rest_bpm', 'po_down_payment_amount', 'po_id');
/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "c.car_id as number";
/* DB table to use */
$sJoin = ' purchase_order';
$sJoin .= '  INNER JOIN purchase_order_lines on po_id = pl_purchase_id';
$sJoin .= '  INNER JOIN cars on pl_vehicle_id = car_id';
$sJoin .= '  INNER JOIN car_details on pl_vehicle_id = cd_car_id';
$sJoin .= '  INNER JOIN conversions as conv on conv.conversion_id = cd_status';
$sJoin .= '  INNER JOIN car_make_uitvoerings on cmu_id = car_variant';
$sJoin .= '  INNER JOIN calculations on calculation_for_car_id = car_id';
$sJoin .= '  INNER JOIN car_makes cm on car_make = cm.cmake_id';
$sJoin .= '  INNER JOIN car_models cmod on car_model = cmod.cmodel_id ';
$sJoin .= '  INNER JOIN car_motors cmotor on cd_motor = cmotor.cmotor_id';
// $sJoin .= '   INNER JOIN translate tr on bs.conversion_name = tr.label ';


/*
 * Local functions
 */
function fatal_error($sErrorMessage = '')
{
    //    header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
    //    die( $sErrorMessage );
}
/*
 * MySQL connection
 */
//$_POST['24conn'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
if (!$conn = new mysqli($config['hostName'], $config['userName'], $config['passWord'], $config['dbName'] )) {
    fatal_error('Could not open connection to server');
}
if (!mysqli_select_db($conn, $config['dbName'])) {
    fatal_error('Could not select database ');
}
if (!$conn->set_charset($config['charSet'])) {
    die('Error loading character set "' . $config['charSet'] . '": ' . $db->error);
}
/*
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
        intval($_GET['iDisplayLength']);
}
/*
 * Ordering
 */
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
                    " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }
    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
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
if ($_GET['sSearch'] != "") {
    $aWords = preg_split('/\s+/', $_GET['sSearch']);
    $sWhere = "WHERE (";
    for ($j = 0; $j < count($aWords); $j++) {
        if ($aWords[$j] != "") {
            $sWhere .= "( ";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($conn, $aWords[$j]) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ") AND ";
        }
    }
    $sWhere = substr_replace($sWhere, "", -4);
    $sWhere .= ')';
}
/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($conn, $_GET['sSearch_' . $i]) . "%' ";
    }
}

if (isset($_GET['order_id'])) {
    if ($sWhere == "") {
        $sWhere = "WHERE ";
    } else {
        $sWhere .= " AND ";
    }
    $sWhere .= "pl_purchase_id = " . mysqli_real_escape_string($conn, $_GET['order_id']);
}


/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
        SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM   $sTable
        $sJoin
        $sWhere
        $sOrder
        $sLimit
    ";



$rResult = mysqli_query($conn, $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($conn));
mysqli_query($conn, "SET character_set_results=utf8");
$rResult = mysqli_query($conn, $sQuery) or die(mysqli_error($conn));
/* Data set length after filtering */
$sQuery = "
        SELECT FOUND_ROWS()
    ";
$rResultFilterTotal =  mysqli_query($conn, $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($conn));
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];
/* Total data set length */
$sQuery = "
        SELECT COUNT(" . $sIndexColumn . ")
        FROM   $sTable
    ";
$rResultTotal = mysqli_query($conn, $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($conn));
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
    "sEcho"                => intval($_GET['sEcho']),
    "iTotalRecords"        => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData"               => array()
);
// var_dump(mysqli_fetch_array($rResult));
// die;
$j = 0;

// $clickableTd = ['pl_km_delivery', 'pl_expected_delivery', 'pl_expected_damage_amount'];
// $selects = ['pl_accident_free', 'pl_extra_set_of_wheels', 'pl_deposit'];
$clickableTd = ['', '', ''];
$selects = ['', '', ''];

while ($aRow = mysqli_fetch_array($rResult)) {
    $j++;
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == 'pl_id') {
            $row[] = '<center style="display:flex;"><a href="create_po?order_id='.$aRow[18].'&line='.$aRow[$i].'">' . sprintf("PL%'.07d\n", $aRow[$i]) . '</a></center>';
        } elseif ($aColumns[$i] == 'car_preorder' || $aColumns[$i] == 'po_vat_deposit' || $aColumns[$i] == 'pl_transport_by_supplier') {
            if ($aRow[$i] == 0) {
                $row[] = '<center style="display:flex;">NO</center>';
            } else {
                $row[] = '<center style="display:flex;">YES</center>';
            }
        } elseif ($aColumns[$i] == 'pl_vehicle_id') {
            $row[] = '<center data-line-id="' . $aRow[$i] . '" style="display:flex;"><a href="car_start?car_id=' . $aRow[$i] . '">' . sprintf("A%'.07d\n", $aRow[$i]) . '</a></center>';
        } elseif ($aColumns[$i] == 'car_vat_marge') {
            if ($aRow[$i] == 0) {
                $row[] = '<center style="display:flex;">VAT</center>';
            } else {
                $row[] = '<center style="display:flex;">Margin</center>';
            }
        } elseif (in_array($aColumns[$i], $clickableTd)) {
            $row[] = "<span class='js-clickable-table td-span-full-size' data-db-row='$aRow[pl_id]' data-col-name='$aColumns[$i]'>$aRow[$i]</span>";
        } elseif (in_array($aColumns[$i], $selects)) {

            // $row[] = "<span class='js-clickable-table' data-db-row='$aRow[pl_id]' data-col-name='$aColumns[$i]'>$aRow[$i]</span>";

            $options = '';
            for ($j = 0; $j < 2; $j++) {
                if ($aRow[$i] == $j) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                if ($j == 0) {
                    $text = "No";
                } else {
                    $text = "Yes";
                }

                $options .= "<option $selected value='$j'> $text </option>";
            }

            $row[] = "<select class='form-control js-submitable-select' data-db-row='$aRow[pl_id]' data-col-name='$aColumns[$i]'> $options </select>";
        } elseif ($aColumns[$i] != ' ') {
            /* General output */
            $row[] = $aRow[$i];
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
