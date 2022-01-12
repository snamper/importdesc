<?php
$gaSql['user']       = "deb64406n9_import1";
$gaSql['password']   = "RbB38eSQ";
$gaSql['db']         = "deb64406n9_import1";
$gaSql['server']     = "localhost";

//



/**
 * Nieuwe MySQL connectie
 *
 * Te gebruiken in nieuw te maken functies.
 * Oude functies die nog in gebruik zijn worden in een latere fase omgezet naar deze connectie.
 */

$_POST['GWIconnector'] = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
mysqli_query($_POST['GWIconnector'],"SET CHARACTER SET 'utf8'");
mysqli_query($_POST['GWIconnector'],"SET SESSION collation_connection ='utf8_unicode_ci'");
mysqli_set_charset($_POST['GWIconnector'],"utf8");
if ($_POST['GWIconnector']->connect_errno) {
    echo "Failed to connect to MySQL: (" . $_POST['GWIconnector']->connect_errno . ") " . $_POST['GWIconnector']->connect_error;

    exit;
}


// exactinum




// functions

function TableModalVariable(){


    $query = "SELECT *
              FROM task

              ";
    $result = $_POST['GWIconnector']->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['taskID']=$row['taskID'];

        include(WEB_ROOT_DATA.'library/modals/taskmodal.php');
    }}



// functions


function UpdateFlyOver(){
    if (isset($_SESSION['RightsClient'])){
        $PassID               = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION["PassOverDB"] );
        $UserNext             = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['UserIDClient'] );
    }elseif(isset($_SESSION['RightsClient'])){
        $PassID               = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION["PassOverDB"] );
        $UserNext             = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['UserIDClient'] );
    }else{
        $redirect_pagina =  'https://www.24dynamics.nl/logout.php';
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=" . $redirect_pagina . "\">";
    }

    $query = "UPDATE inlog_client
                        SET
                            Active = 0

                        WHERE
                            Active=25 AND
                            Tover=md5('" . $PassID . "') AND
                            expo_user_ID=\"$UserNext\"
                            LIMIT 1 ";

    $result = $_POST['GWIconnector']->query($query);
}



function close_conn(){

    unset ($_SESSION['TabActief']);

    mysqli_close($_POST['GWIconnector']);
    mysqli_close($_POST['GWIconnector_exacts']);
}
function update_url()
{
    $_SESSION['ReturnURL'] = $_SERVER['REQUEST_URI'];

}

function RedirectLogout()
{
    $redirect_pagina =  WEB_ROOT.'../logout.php';
    echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=" . $redirect_pagina . "\">";

}



?>