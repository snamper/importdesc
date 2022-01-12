<?php

function CountUpdateOrInsertQuery($table, $tableID, $StCountX)
{
    $table = mysqli_real_escape_string( $_POST['GWIconnector'], $table );
    $tableID = mysqli_real_escape_string( $_POST['GWIconnector'], $tableID );
    $StCount = mysqli_real_escape_string( $_POST['GWIconnector'], $StCountX );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM $table
              WHERE $tableID=\"$StCount\"
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}


function CountUpdateOrInsertQueryReserveer($StCountX)
{
    $DossierI               = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );
    $StCount                = mysqli_real_escape_string( $_POST['GWIconnector'], $StCountX );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM reservering_verkoop
              WHERE dossierID=\"$DossierI\" AND DebtorId=\"$StCount\"
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}

function GetNumberImage(){
    $dossierID                  = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

    try {
        $queryA = "INSERT INTO image_counter (
            nummer)
            VALUES (
             \"$dossierID\") ";

        $_POST['GWIconnector']->query($queryA);
        $_POST['IMGNR'] = mysqli_insert_id($_POST['GWIconnector']);

    } catch (Exception $e) {

    }
}
function UpdatePicsA($file){

    $files               = mysqli_real_escape_string( $_POST['GWIconnector'], $file);
    $DossierI               = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );


    try {
        $queryA = "INSERT INTO files_dossier (
            file, dossier_ID, soort)
            VALUES (
             \"$files\",
             \"$DossierI\",
             3
             ) ";

        $_POST['GWIconnector']->query($queryA);

    } catch (Exception $e) {

    }

}


function UploadKenteken(){
    GetNumberImage();
    $docer = $_SESSION['doc_directory'];

    if (basename($_FILES["fileToUploada"]["name"])==''){
    }else{
        $nrimg = $_POST['IMGNR']."-kenteken-";
        $target_dir = "../files_01/$docer/";
        $target_file = $target_dir .$nrimg. basename($_FILES["fileToUploada"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                $_SESSION['PicNot']=1;
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUploada"]["size"] > 35000000000) {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "docs" && $imageFileType != "docs" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "JPG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['PicNot']=1;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploada"]["tmp_name"], $target_file)) {


                UpdatePicsA($target_file);

            } else {
                $_SESSION['PicNot']=1;
            }
        }}

}


function UploadCOC(){
    GetNumberImage();

    $docer = $_SESSION['doc_directory'];

    if (basename($_FILES["fileToUploadb"]["name"])==''){}else{
        $nrimg = $_POST['IMGNR']."-coc-";
        $target_dir = "../files_01/$docer/";
        $target_file = $target_dir .$nrimg. basename($_FILES["fileToUploadb"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                $_SESSION['PicNot']=1;
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUploadb"]["size"] > 35000000000) {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "docs" && $imageFileType != "docs" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "JPG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['PicNot']=1;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploadb"]["tmp_name"], $target_file)) {


                UpdatePicsA($target_file);

            } else {
                $_SESSION['PicNot']=1;
            }
        }}

}

function UploadKoopovereenkomst(){
    GetNumberImage();
    $docer = $_SESSION['doc_directory'];

    if (basename($_FILES["fileToUploadc"]["name"])==''){}else{
        $nrimg = $_POST['IMGNR']."-koopovereenkomst-";
        $target_dir = "../files_01/$docer/";
        $target_file = $target_dir .$nrimg. basename($_FILES["fileToUploadc"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                $_SESSION['PicNot']=1;
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUploadc"]["size"] > 35000000000) {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "docs" && $imageFileType != "docs" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "JPG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['PicNot']=1;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploadc"]["tmp_name"], $target_file)) {


                UpdatePicsA($target_file);

            } else {
                $_SESSION['PicNot']=1;
            }
        }}

}

function UploadInkoopfactuur(){
    GetNumberImage();
    $docer = $_SESSION['doc_directory'];

    if (basename($_FILES["fileToUploadd"]["name"])==''){}else{
        $nrimg = $_POST['IMGNR']."-Inkoopfactuur-";
        $target_dir = "../files_01/$docer/";
        $target_file = $target_dir .$nrimg. basename($_FILES["fileToUploadd"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                $_SESSION['PicNot']=1;
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUploadd"]["size"] > 35000000000) {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "docs" && $imageFileType != "docs" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "JPG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['PicNot']=1;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploadd"]["tmp_name"], $target_file)) {


                UpdatePicsA($target_file);

            } else {
                $_SESSION['PicNot']=1;
            }
        }}

}


function UploadTijdelijketns(){
    GetNumberImage();
    $docer = $_SESSION['doc_directory'];

    if (basename($_FILES["fileToUploade"]["name"])==''){}else{
        $nrimg = $_POST['IMGNR']."-Tijdelijketns-";
        $target_dir = "../files_01/$docer/";
        $target_file = $target_dir .$nrimg. basename($_FILES["fileToUploade"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                $_SESSION['PicNot']=1;
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUploade"]["size"] > 35000000000) {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "docs" && $imageFileType != "docs" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "JPG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
            $_SESSION['PicNot']=1;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['PicNot']=1;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploade"]["tmp_name"], $target_file)) {


                UpdatePicsA($target_file);

            } else {
                $_SESSION['PicNot']=1;
            }
        }}

}




function IsThereAPecEvent($transport_opdrachtID){

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $query = "SELECT *
    FROM transport_opdracht
    WHERE dossierID=\"$DossierI\" AND transport_opdrachtID=\"$transport_opdrachtID\"
    ";

    $result = $_POST['GWIconnector']->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['pec_events'] = $row['pec_events'];
    }

}


function IsThereAPecEventWO($ID){

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $query = "SELECT *
    FROM maak_werkorder
    WHERE dossierID=\"$DossierI\" AND maak_werkorderID=\"$ID\"
    ";

    $result = $_POST['GWIconnector']->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['pec_events'] = $row['pec_events'];
        $_POST['pec_events_wo'] = $row['pec_events_wo'];
    }

}



function GetDataDebtorInvoice($VarsA){

    $VarA = mysqli_real_escape_string( $_POST['GWIconnector'], $VarsA );

    $query = "SELECT *
    FROM debtor
    WHERE DebtorId=\"$VarA\"
    ";

    $result = $_POST['GWIconnector']->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['Adressline1_debtor'] = $row['Adressline1'];// straat
        $_POST['Adressline3_debtor'] = $row['Adressline3'];// Postcode en plaats
        $_POST['IBAN_debtor'] = $row['IBAN'];// Postcode en plaats
    }

}

function CountInvoiceLinesHead()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice
              WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}

function CountInvoiceLinesHeadA()
{

    $DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['dossierID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice_lines_head
             
              WHERE dossierID=\"$DossierI\" 
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}

function CountInvoiceLinesDataUpdate()
{

    $UpdateId = mysqli_real_escape_string( $_POST['GWIconnector'], $_POST['invoice_lines_dataID'] );

    $result = mysqli_query($_POST['GWIconnector'], "SELECT *
              FROM invoice_lines_data
              WHERE invoice_lines_dataID=\"$UpdateId\"
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}


function GetDataArticleInvoice($VarsA){

    $VarA = mysqli_real_escape_string( $_POST['GWIconnector'], $VarsA );

    $query = "SELECT *
    FROM article
    WHERE ItemCode=\"$VarA\"
    ";

    $result = $_POST['GWIconnector']->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $_POST['Description'] = $row['Description'];
        $_POST['UnitId'] = $row['UnitId'];
        $_POST['VATGroup'] = $row['VATGroup'];
    }

}




function uitrusting_foto_nr_1(){

    $FotoNR=1;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_1']['name']);

    $NamePic = basename($_FILES['uploaded1_1']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_1']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_2();
    } else {
        uitrusting_foto_nr_2();
    } }



function uitrusting_foto_nr_2(){
    $FotoNR=2;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_2']['name']);
    $NamePic = basename($_FILES['uploaded1_2']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_2']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_3();
    } else {
        uitrusting_foto_nr_3();
    } }


function uitrusting_foto_nr_3(){
    $FotoNR=3;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_3']['name']);
    $NamePic = basename($_FILES['uploaded1_3']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_3']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_4();
    } else {
        uitrusting_foto_nr_4();
    } }


function uitrusting_foto_nr_4(){
    $FotoNR=4;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_4']['name']);
    $NamePic = basename($_FILES['uploaded1_4']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_4']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_5();
    } else {
        uitrusting_foto_nr_5();
    } }

function uitrusting_foto_nr_5(){
    $FotoNR=5;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_5']['name']);
    $NamePic = basename($_FILES['uploaded1_5']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_5']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_6();
    } else {
        uitrusting_foto_nr_6();
    } }

function uitrusting_foto_nr_6(){
    $FotoNR=6;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_6']['name']);
    $NamePic = basename($_FILES['uploaded1_6']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_6']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_7();
    } else {
        uitrusting_foto_nr_7();
    } }


function uitrusting_foto_nr_7(){
    $FotoNR=7;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_7']['name']);
    $NamePic = basename($_FILES['uploaded1_7']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_7']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_8();
    } else {
        uitrusting_foto_nr_8();
    } }


function uitrusting_foto_nr_8(){
    $FotoNR=8;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_8']['name']);
    $NamePic = basename($_FILES['uploaded1_8']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_8']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_9();
    } else {
        uitrusting_foto_nr_9();
    } }

function uitrusting_foto_nr_9(){
    $FotoNR=9;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_9']['name']);
    $NamePic = basename($_FILES['uploaded1_9']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_9']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_10();
    } else {
        uitrusting_foto_nr_10();
    } }

function uitrusting_foto_nr_10(){
    $FotoNR=10;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_10']['name']);
    $NamePic = basename($_FILES['uploaded1_10']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_10']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }

        uitrusting_foto_nr_11();
    } else {
        uitrusting_foto_nr_11();
    } }


function uitrusting_foto_nr_11(){
    $FotoNR=11;
    //UpdateImageCountPics();
    $target = "../files_01/".$_SESSION['DocDirectory']."/";
    $target = $target . basename($_FILES['uploaded1_11']['name']);
    $NamePic = basename($_FILES['uploaded1_11']['name']);
    $ok = 1;

    if (move_uploaded_file($_FILES['uploaded1_11']['tmp_name'], $target))
    {
        chmod($target, 0755);
        $_POST['foto_uploaded']=$target;

        $AantalP = CountPICSDossier($FotoNR);
        if($AantalP<1){
            insert_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }else{
            update_uitrusting_foto_nr_1($FotoNR, $NamePic);
        }


    } else {

    } }



function UpdateImageCountPics(){

    $DossierID = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['DID']);
    $Dealer = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['EDealer']);
    $dealervestiging = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['Edealervestiging']);

    $query = "INSERT INTO image_counter (
                    DossierID, created_DealerID, created_dealervestigingID)
                    VALUES (
                    \"$DossierID\",
                     \"$Dealer\",
                     \"$dealervestiging\"
                    ) ";

    $_POST['GWIconnector']->query($query);
    $_POST['nr'] = mysqli_insert_id($_POST['GWIconnector']);
}


function CountPICSDossier($VarA)
{
    $DossierID          = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['DID']);
    $foto_number        = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);

    $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM dossier_docs
              WHERE  DossierID=\"$DossierID\" AND foto_number=\"$foto_number\"
            ");
    $CountNow = mysqli_num_rows($result);

    return $CountNow;
}

function insert_uitrusting_foto_nr_1($VarA, $VarB){
    $DossierID          = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['DID']);
    $foto_number        = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);
    $foto_location      = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['foto_uploaded']);
    $foto_name          = mysqli_real_escape_string($_POST['GWIconnector'], $VarB);

    $expo_users_ID      = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['user_ID_db_su']);
    $Dealer             = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['EDealer']);
    $dealervestiging    = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['Edealervestiging']);


    $query = "INSERT INTO dossier_docs (
                DossierID, foto_number, foto_location, foto_name, created_expo_users_ID, created_DealerID, created_dealervestigingID)
                VALUES (
                \"$DossierID\",
                \"$foto_number\",
                \"$foto_location\",
                \"$foto_name\",
                \"$expo_users_ID\",
                \"$Dealer\",
                \"$dealervestiging\"
                ) ";

    $_POST['GWIconnector']->query( $query );

    $query = str_replace( array("\n", "\t", "\r"), ' ', $query );
    $query = preg_replace( array('/\s{2,}/', '/[\t\n]/'), ' ', $query );

    saveActivityLog( $query, 'DocsToevoegenDossier' );
}

function update_uitrusting_foto_nr_1($VarA, $VarB){

    $DossierID          = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['DID']);
    $foto_number        = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);
    $foto_location      = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['foto_uploaded']);
    $foto_name          = mysqli_real_escape_string($_POST['GWIconnector'], $VarB);

    $expo_users_ID      = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['user_ID_db_su']);



    $query = "UPDATE dossier_docs SET
                        foto_location=\"$foto_location\",
                        foto_name=\"$foto_name\",
                        created_expo_users_ID=\"$expo_users_ID\"

                        WHERE DossierID=\"$DossierID\" AND foto_number=\"$foto_number\"
                        LIMIT 1
                        ";
    $resultupdate = mysqli_query($_POST['GWIconnector'], $query);

    $query = str_replace( array("\n", "\t", "\r"), ' ', $query );
    $query = preg_replace( array('/\s{2,}/', '/[\t\n]/'), ' ', $query );

    saveActivityLog( $query, 'DocsToevoegenDossier' );
}
?>