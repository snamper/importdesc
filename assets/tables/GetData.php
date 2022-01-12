<?php
include_once "engine/db_driver.php";
include_once "engine/db_driver1.php";

function GetLanguageData($extras)
{

    $LanguagePreset          = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['LanguagePreset']);
    $extra          = mysqli_real_escape_string($_POST['GWIconnector'], $extras);

    $query = "SELECT * FROM language WHERE language_sort=\"$LanguagePreset\" AND active=1 AND extra=\"$extra\"";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();
    if (!$result) {
        $rows[] = null;

        return $rows;
    }
    while ($result) {
        $rows[] = $row;
    }

    return $rows;
}


function GetConversionData($varA)
{

    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

    $query = "SELECT * FROM conversie WHERE conversie_nummer=\"$varA\"";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        return $result['conversiename'];
    }
}

function GetContact($varA)
{

    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

    $query = "SELECT * FROM contacts WHERE contactsID=\"$varA\"";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        return $result['fullname'];
    }
}

function GetEmployeeAfas($varA)
{

    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

    $query = "SELECT * FROM employees WHERE EmployeeId=\"$varA\"";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        return $result['Initials'] . " " . $row['BirthName'];
    }
}
function GetContactCompany($varA)
{

    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

    $query = "SELECT * FROM contacts WHERE contactsID=\"$varA\"";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        return $result['companiesID'];
    }
}

function GetCompanies($varA)
{
    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);
    $query = "SELECT * FROM companies WHERE companiesID=\"$varA\"";
    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();
    while ($result) {
        return $result['company_name'];
    }
}

function GetCompaniesCountry($varA)
{
    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);
    $query = "SELECT * FROM companies WHERE companiesID=\"$varA\"";
    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();
    while ($result) {
        return $result['t_country'];
    }
}

function GetVisitor($varA)
{
    $varA          = mysqli_real_escape_string($_POST['GWIconnector'], $varA);
    $query = "SELECT * FROM visitors WHERE visitorsID=\"$varA\"";
    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();
    while ($result) {
        return $result['visitor_fullname'] . " " . $row['company_name'];
    }
}

function DossierDataBase()
{ // USD
    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

    $query = "SELECT *
    FROM dossier
    WHERE dossier.dossierID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $_POST['origin'] = $row['autoID'];
        $_SESSION['doc_directory'] = $row['doc_directory'];
    }
}

function DossierData()
{ // USD

    //    JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

    $query = "SELECT *
    FROM dossier
    LEFT JOIN atbasisgegevens ON atbasisgegevens.dossierID = dossier.dossierID
    WHERE dossier.dossierID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function DossierDataImport($VarA)
{ // USD

    //    JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID

    $Varry = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);

    $query = "SELECT *
    FROM atimportreportdata
    WHERE auto_id=\"$Varry\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function DossierDataUitgebreid($VarA)
{ // USD

    //    JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID

    $Varrq = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);

    $query = "SELECT *
    FROM atuitgebreidegegevens
    WHERE auto_id=\"$Varrq\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function DossierDataALT($VarA)
{ // USD

    //    JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID

    $Varri = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);

    $query = "SELECT *
    FROM atalternatieveuitvoeringen
    WHERE telex_ID=\"$Varri\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function GetDataDates()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['CompanyID']);

    $query = "SELECT *
    FROM companies
    WHERE companiesID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $_POST['original_date_in'] = $row['original_date_in'];
        $_POST['GewijzigdOp_oude_data'] = $row['GewijzigdOp_oude_data'];
        $_POST['date_in'] = $row['date_in'];
    }
}


function OldDataDossierData()
{

    $dossierID = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['CompanyID']);

    $query = "SELECT *
    FROM oude_data

    WHERE oude_data.Klantnummer=\"$dossierID\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}



function DossierDataContacts()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ContactsID']);

    $query = "SELECT *
    FROM contacts
    LEFT JOIN contacts_mailing ON contacts_mailing.contactsID = contacts.contactsID
    WHERE contacts.contactsID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function GetDataDatesContacts()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ContactsID']);

    $query = "SELECT *
    FROM contacts
    WHERE contactsID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $_POST['original_date_in'] = $row['original_date_in'];
        $_POST['GewijzigdOp_oude_data'] = $row['GewijzigdOp_oude_data'];
        $_POST['date_in'] = $row['date_in'];
    }
}

function DossierDataVisitor($idnumber)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $idnumber);

    $query = "SELECT *
    FROM visitors
    WHERE visitors.visitorsID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function CompanyInterestOverview()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['CompanyID']);
    $numberI = mysqli_real_escape_string($_POST['GWIconnector'], $number);

    $query = "SELECT *
    FROM companies_interest
    WHERE companiesID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function CompanyInterestOverviewBU($number)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['CompanyID']);
    $numberI = mysqli_real_escape_string($_POST['GWIconnector'], $number);

    $query = "SELECT *
    FROM companies_interest
    WHERE companiesID=\"$DossierI\" AND interestnr=\"$numberI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function ContactsMailing($VarMail)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ContactsID']);
    $VarMail = mysqli_real_escape_string($_POST['GWIconnector'], $VarMail);

    $query = "SELECT *
    FROM contacts_mailing
    WHERE contactsID=\"$DossierI\" AND mailing=\"$VarMail\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        return $result['yesno'];
    }
}


function ProjectData()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ProjectEdit']);

    $query = "SELECT *
    FROM projects_main
    WHERE projects_main.projects_mainID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function SubProjectData()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ProjectEdit']);

    $query = "SELECT *
    FROM projects_sub
    WHERE projects_sub.projects_mainID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function TargetsAndPricesData()
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ProjectEdit']);

    $query = "SELECT *
    FROM projects_targets_prices
    WHERE projects_targets_prices.projects_mainID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function ProjectSalesData($Company)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ProjectEdit']);
    $CompanyI  = mysqli_real_escape_string($_POST['GWIconnector'], $Company);

    $query = "SELECT *
    FROM exhibitors
    LEFT JOIN companies ON companies.companiesID = exhibitors.companiesID
    WHERE exhibitors.projects_mainID=\"$DossierI\" AND exhibitors.exhibitorsID=\"$CompanyI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function ProjectSalesDataCompany($DossierI, $Company)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $DossierI);
    $CompanyI  = mysqli_real_escape_string($_POST['GWIconnector'], $Company);

    $query = "SELECT *
    FROM exhibitors
    LEFT JOIN companies ON companies.companiesID = exhibitors.companiesID
    WHERE exhibitors.projects_mainID=\"$DossierI\" AND exhibitors.exhibitorsID=\"$CompanyI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function ProjectSupplierData($Company)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['ProjectEdit']);
    $CompanyI  = mysqli_real_escape_string($_POST['GWIconnector'], $Company);

    $query = "SELECT *
    FROM projects_suppliers
    LEFT JOIN companies ON companies.companiesID = projects_suppliers.companiesID
    WHERE projects_suppliers.projects_mainID=\"$DossierI\" AND projects_suppliers.projects_suppliersID=\"$CompanyI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}

function ContactPersonData($CID)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $CID);

    $query = "SELECT *
    FROM contacts
    WHERE contactsID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $_POST['email_contactperson'] = $row['email'];
        $_POST['cellnumber_contactperson'] = $row['cellnumber'];
    }
}

function TaskData($idnumber)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $idnumber);

    $query = "SELECT *
    FROM task
    WHERE taskID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function ProjectSupplierDataCompany($project)
{

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $project);


    $query = "SELECT *
    FROM projects_suppliers
    LEFT JOIN companies ON companies.companiesID = projects_suppliers.companiesID
    WHERE projects_suppliers.projects_suppliersID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}



function GetTaskDataOverview()
{

    $UserI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['UserIDClient']);

    $query = "SELECT *
    FROM task
    WHERE task.task_owner=\"$UserI\" AND task_status=329
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {


?>


        <li class="notification">
            <a href='#edittask<?php echo $row['taskID']; ?>' data-toggle="modal">
                <div class="notification-icon bg-primary">
                    <i class="ti-comment-alt"></i>
                </div>
                <div class="notification-info">
                    <h4 class="notification-title"><?php echo $row['t_tasktype']; ?> <span class="notification-time"><?php echo GetCompanies($row['companiesID']); ?> </span></h4>
                    <p class="notification-desc">
                        <?php
                        echo substr($row['task_comments'], 0, 20)
                        ?>
                    </p>
                </div>
            </a>
        </li>

    <?php





    }
}


function FormDataAPI()
{


    $query = "SELECT *
    FROM formdata
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


function AgendaDataViewA()
{
    ?>
    <ul class="nav nav-tabs" id="nav-tabs">
        <?php
        $query = "SELECT *
    FROM contacts
    WHERE contacttype=259 AND agenda_active=1
    ";

        $dbDriver = new db_driver();
        $dbDriver->querySelects($query);
        $result =  $dbDriver->fetchAssoc();

        while ($result) {

        ?>
            <li class="nav-item"><a href="#<?php echo $row['contactsID']; ?>" class="nav-link " data-toggle="tab"><?php echo $row['fullname']; ?></a></li>
        <?php
        }

        ?>
    </ul>
<?php

}


function AgendaDataViewB()
{
?>
    <!-- BEGIN tab-content -->
    <div class="tab-content ">
        <!-- BEGIN tab-pane -->
        <?php
        $query = "SELECT *
    FROM contacts
    WHERE contacttype=259 AND agenda_active=1
    ";

        $dbDriver = new db_driver();
        $dbDriver->querySelects($query);
        $result =  $dbDriver->fetchAssoc();

        while ($result) {

        ?>
            <div class="tab-pane fade in" id="<?php echo $row['contactsID']; ?>">
                <p>

                    <iframe src="https://webmail.cloudorb.com/owa/calendar/<?php echo $row['agenda']; ?>/<?php echo $row['doc_directory']; ?>/calendar.html" frameborder="0" scrolling="no" height="1200" width="1200"></iframe>
                </p>
            </div>
        <?php
        }

        ?>
    </div> <?php

        }

        function GetLinesInvoice($INID)
        {
            ?><table class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <tbody>

            <tr>
                <td style="font-weight: 700" width="55%" class="text-left">Item description</td>
                <td style="font-weight: 700" width="15%" class="text-left">Price</td>
                <td style="font-weight: 700" width="15%" class="text-left">Quantity</td>
                <td style="font-weight: 700" width="15%" class="text-left">Total price</td>
            </tr>
            <?php
            $query = "SELECT *
              FROM exact_online_sales_lines
              WHERE InvoiceID=\"$INID\"



              ";
            $result = $_POST['GWIconnector_exacts']->query($query);

            while ($result) {

            ?> <tr>
                    <td class="text-left"><?php echo $row['ItemDescription']; ?></td>
                    <td class="text-left"><?php echo $_POST['Currency'] . " " . $row['NetPrice']; ?></td>
                    <td class="text-left"><?php echo $row['Quantity']; ?></td>
                    <td style=" padding-top:0px; padding-bottom:0px; vertical-align: middle;" class="text-left"><?php echo $_POST['Currency'] . " " . $row['AmountFC']; ?></td>
                </tr><?php


                    }
                        ?>
    </table>
    </tbody><?php
        }


        function automerken()
        {
            $var = mysqli_real_escape_string($_POST['GWIconnector'], $_POST['PreSelectMerk']);

            //  $query = "SELECT * FROM automerken ORDER BY sort_view DESC";
            $query = "SELECT * FROM automerken order by automerken_ID='" . $var . "' desc, sort_view DESC";


            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            while ($result) {

                $_POST['automerken_ID'] = $row['automerken_ID'];
                $_POST['automerken'] = $row['automerken'];

                echo "\"" . $_POST['automerken'] . "\": {
                        \"key\" : " . $_POST['automerken_ID'] . ",
                       \"defaultvalue\" : " . $_POST['PreSelectModel'] . ",

                        \"values\" : {";
                automerken_model();

                echo "}
                    },";
            }
        }


        function automerken_model()
        {

            $query = "SELECT * FROM automerken_soort WHERE actief='1' AND automerken_ID='" . $_POST['automerken_ID'] . "' ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            while ($result) {


                $_POST['automerken_soort_ID'] = $row['automerken_soort_ID'];
                $_POST['automerken_soort'] = $row['automerken_soort'];
                echo "\"" . $_POST['automerken_soort'] . "\": " . $_POST['automerken_soort_ID'] . ",";
            }
        }


        function automerkenA()
        {

            $query = "SELECT * FROM automerken ORDER BY sort_view DESC";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            while ($result) {

                $_POST['automerken_ID'] = $row['automerken_ID'];
                $_POST['automerken'] = $row['automerken'];

                echo "\"" . $_POST['automerken'] . "\": {
                        \"key\" : " . $_POST['automerken_ID'] . ",
                        \"defaultvalue\" : 311,
                        \"values\" : {";
                automerken_modelA();

                echo "}
                    },";
            }
        }


        function automerken_modelA()
        {

            $query = "SELECT * FROM automerken_soort WHERE actief='1' AND automerken_ID='" . $_POST['automerken_ID'] . "' ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            while ($result) {


                $_POST['automerken_soort_ID'] = $row['automerken_soort_ID'];
                $_POST['automerken_soort'] = $row['automerken_soort'];
                echo "\"" . $_POST['automerken_soort'] . "\": " . $_POST['automerken_soort_ID'] . ",";
            }
        }


        function GetAutoMerken($varA)
        {

            $query = "SELECT * FROM `car_make` WHERE `id_car_make` = '$varA'";

            $dbDriver = new db_driver1();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            foreach ($result as $v) {


                return $v['name'];
            }
        }

        function GetAutoMerkenA($varB)
        {

            $query = "SELECT * FROM `car_model` WHERE `id_car_model` = '$varB'";
            $dbDriver = new db_driver1();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            foreach ($result as $v) {

                return $v['name'];
            }
        }
        function DossierUpdateButtonGWI()
        {

            echo "<div style=' position: fixed;
        top: 1%;
        left: 45%;
        z-index: 14900;>
        ";
            echo "<div class='wizard-actions' >";
            echo "<button formaction='../data/library/insert/InsertPrijsBTW.php' formmethod='post'  class='btn btn-primary' name='button' value='2'  >";

            echo "Dossier aanmaken";

            echo " </button>";
            echo "</div>";

            if ($_POST['WLHost'] == 5) {
            } else {
                echo "<div style=' position: fixed;
top: 1%;
left: 55%;
z-index: 14900;>
";
                echo "<div class='wizard-actions' >";
                echo "<button formaction='../data/library/insert/InsertPrijsBTW.php' formmethod='post'  class='btn btn-warning' name='button' value='3'  >";

                echo "Start opnieuw";

                echo " </button>";
                echo "</div>";
            }
        }

        function DossierUpdateButtonGWIMarge()
        {

            echo "<div style=' position: fixed;
        top: 1%;
        left: 45%;
        z-index: 14900;>
        ";
            echo "<div class='wizard-actions' >";
            echo "<button formaction='../data/library/insert/InsertPrijsMarge.php' formmethod='post'  class='btn btn-primary' name='button' value='2'  >";

            echo "Dossier aanmaken";

            echo " </button>";
            echo "</div>";

            if ($_POST['WLHost'] == 5) {
            } else {
                echo "<div style=' position: fixed;
top: 1%;
left: 55%;
z-index: 14900;>
";
                echo "<div class='wizard-actions' >";
                echo "<button formaction='../data/library/insert/InsertPrijsMarge.php' formmethod='post'  class='btn btn-warning' name='button' value='3'  >";

                echo "Start opnieuw";

                echo " </button>";
                echo "</div>";
            }
        }

        function DossierUpdateButtonGWIB()
        {

            echo "<div style=' position: fixed;
        top: 1%;
        left: 45%;
        z-index: 14900;>
        ";
            echo "<div class='wizard-actions' >";
            echo "<button formaction='../data/library/insert_01/InsertDossierNew.php' formmethod='post'  class='btn btn-primary' name='button' value='2'  >";

            echo "Dossier aanmaken";

            echo " </button>";
            echo "</div>";

            if ($_POST['WLHost'] == 5) {
            } else {
                echo "<div style=' position: fixed;
top: 1%;
left: 55%;
z-index: 14900;>
";
                echo "<div class='wizard-actions' >";
                echo "<button formaction='#' formmethod='post'  class='btn btn-warning' name='button' value='3'  >";

                echo "Start opnieuw";

                echo " </button>";
                echo "</div>";
            }
        }



        // dossier data voor eigen car


        function DossierDataCar()
        { // own form

            //    JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM dossier
    LEFT JOIN car ON car.carID = dossier.carID
    WHERE dossier.dossierID=\"$DossierI\"
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }

        function DossierDataInkoopgegevens()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM inkoopgegevens
    WHERE dossierID=\"$DossierI\"
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierDataHightlightsOfferte()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM higlights_opties_total
    WHERE dossierID=\"$DossierI\"
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }

        function DossierDataverkoopgegevens()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM verkoopgegevens
    WHERE dossierID=\"$DossierI\"
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function GetDataReserveringen()
        { // own form

            ?>
    <div style="background-color: #f8f9fa; font-weight: 700;"> Oude reserveringen</div><br />
    <table class='table table-bordered table-hover'>
        <tbody>
            <?php
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM reservering_verkoop
    WHERE dossierID=\"$DossierI\"  ORDER BY reservering_verkoopID DESC
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
            ?>

                <tr>
                    <th>Voor</th>
                    <td>

                        <!--                    <input type="hidden" id="vehicle1" name="reserverendefinitiefID[]" value="--><?php //echo $row['DebtorId']; 
                                                                                                                                ?>
                        <!--">-->
                        <?php $Debtor = GetDataDebtor($row['DebtorId']); ?>
                        <?php echo $Debtor; ?>
                    </td>


                    <th>Contact</th>
                    <td>
                        <?php echo $row['contactpersoon_reserveer'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Van</th>
                    <td>
                        <?php echo $row['van_reserveer'] ?>
                    </td>

                    <th>Tot</th>
                    <td>
                        <?php echo $row['tot_reserveer'] ?>
                    </td>
                </tr>
                <tr>
                    <?php $DefRes = CounterStartCounterStartReserveringDefinitief(); ?>

                    <?php if ($DefRes < 1) {
                    ?>
                        <th>Maak definitief</th>
                        <td>
                            <center><input type="checkbox" id="vehicle1" name="reserverendefinitief[]" value="<?php echo $row['DebtorId']; ?>"></center>
                        </td>
                        <?php

                    } else {

                        if ($row['reserveren'] == 2) {
                        ?>
                            <th style="color: green;">Definitief vastgelegd</th>
                            <td>

                            </td>
                        <?php
                        } else {
                        ?>
                            <td style="color: darkred;">Helaas, te laat</td>
                            <td>

                            </td>
                    <?php
                        }
                    }
                    ?>


                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td>

                    </td>

                    <th></th>
                    <td>

                    </td>
                </tr>



            <?php
            }
            ?>
        </tbody>
    </table>
<?php
        }


        function DossierDataReserveringen()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM reservering_verkoop
    WHERE dossierID=\"$DossierI\" ORDER BY reservering_verkoopID DESC LIMIT 1
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierDataMaakWerkorder()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM maak_werkorder
    WHERE dossierID=\"$DossierI\" ORDER BY maak_werkorderID DESC LIMIT 1
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierDataReclamatie()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM reclamatie
    WHERE dossierID=\"$DossierI\" AND maak_reclamatie=0 ORDER BY reclamatieID DESC LIMIT 1
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierDataTransport()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM transport_opdracht
    WHERE dossierID=\"$DossierI\" AND maaktransportopdracht=0 ORDER BY transport_opdrachtID DESC LIMIT 1
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }

        function getQuotationImages16($varA)
        {
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);
            $varA = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

            $query = "SELECT * FROM files_dossier WHERE dossier_ID = \"$DossierI\" AND offerte != 0 AND aanbieding_pdf=0 AND soort=\"$varA\" LIMIT 4";
            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            if (!$result) {
                $rows[] = null;

                return $rows;
            }
            while ($result) {
                $rows[] = $row;
            }

            return $rows;
        }

        function getQuotationImages58($varA)
        {
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);
            $varA = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

            $query = "SELECT * FROM files_dossier WHERE dossier_ID = \"$DossierI\" AND offerte != 0 AND aanbieding_pdf=0 AND soort=\"$varA\" LIMIT 4,8";
            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            if (!$result) {
                $rows[] = null;

                return $rows;
            }
            while ($result) {
                $rows[] = $row;
            }

            return $rows;
        }

        function getQuotationImages($varA)
        {
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);
            $varA = mysqli_real_escape_string($_POST['GWIconnector'], $varA);

            $query = "SELECT * FROM files_dossier WHERE dossier_ID = \"$DossierI\" AND offerte = 0 AND soort=\"$varA\"";
            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            if (!$result) {
                $rows[] = null;

                return $rows;
            }
            while ($result) {
                $rows[] = $row;
            }

            return $rows;
        }


        function GetDataReclamaties()
        { // own form

?>
    <div style="background-color: #f8f9fa; font-weight: 700;"> Verstuurde reserveringen</div><br />
    <table class='table table-bordered table-hover'>
        <tbody>
            <?php
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM reclamatie
    WHERE dossierID=\"$DossierI\"  ORDER BY reclamatieID DESC
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
            ?>

                <tr>
                    <th>Voor</th>
                    <td>
                        <!--                    <input type="hidden" id="vehicle1" name="reserverendefinitiefID[]" value="--><?php //echo $row['DebtorId']; 
                                                                                                                                ?>
                        <!--">-->
                        <?php $Debtor = GetDataDebtor($row['DebtorId']); ?>
                        <?php echo $Debtor; ?>
                    </td>


                    <th>Contact</th>
                    <td>
                        <?php echo $row['contactpersoon_reserveer'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Van</th>
                    <td>
                        <?php echo $row['van_reserveer'] ?>
                    </td>

                    <th>Tot</th>
                    <td>
                        <?php echo $row['tot_reserveer'] ?>
                    </td>
                </tr>
                <tr>
                    <?php $DefRes = CounterStartCounterStartReserveringDefinitief(); ?>

                    <?php if ($DefRes < 1) {
                    ?>
                        <th>Maak definitief</th>
                        <td>
                            <center><input type="checkbox" id="vehicle1" name="reserverendefinitief[]" value="<?php echo $row['DebtorId']; ?>"></center>
                        </td>
                        <?php

                    } else {

                        if ($row['reserveren'] == 2) {
                        ?>
                            <th style="color: green;">Definitief vastgelegd</th>
                            <td>

                            </td>
                        <?php
                        } else {
                        ?>
                            <td style="color: darkred;">Helaas, te laat</td>
                            <td>

                            </td>
                    <?php
                        }
                    }
                    ?>


                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td>

                    </td>

                    <th></th>
                    <td>

                    </td>
                </tr>



            <?php
            }
            ?>
        </tbody>
    </table>
<?php
        }


        function GetDataReclamation()
        {

?> <br />
    <div style="background-color: #f8f9fa; font-weight: 700;"> Reclamaties</div><br /><?php

                                                                                        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

                                                                                        $query = "SELECT * FROM reclamatie
              WHERE dossierID=\"$DossierI\" AND maak_reclamatie=1

               ";

                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();
                                                                                        if (!$result) {
                                                                                            $rows[] = null;

                                                                                            return $rows;
                                                                                        }
                                                                                        while ($result) {

                                                                                        ?>
        <div class="panel panel-inverse" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">


                    <a href="javascript:;" class="btn" data-toggle="panel-collapse"><i class="glyphicon glyphicon-chevron-up"></i></a>

                </div>
                <h4 class="panel-title" style="font-weight: 500;"><?php echo $row['reclamatie_naam']; ?> : <?php echo $row['DateIn']; ?></h4>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body" style="display: none;">

                <div class="table-responsive">
                    <!-- BEGIN table -->
                    <table class="table table-condensed table-hover text-center">

                        <thead>
                            <td style=" font-weight: 600; " class="text-left">Reclamatie details</td>
                            <th style=" " class="text-left"></th>
                            <th style=" " class="text-left"></th>
                            <th style=" " class="text-left"></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">Datum reclamation</td>
                                <td style=" " class="text-left">
                                    <?php echo $row['DateIn']; ?>
                                </td>
                            </tr>

                            <tr>
                                <td style=" " class="text-left">Reclamatie voor </td>
                                <td style="  padding-top:0px; padding-bottom:0px; vertical-align: middle;" class="text-left">

                                    <?php echo $row['reclamatie_voor']; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style=" " class="text-left">Email contact</td>
                                <td style="  padding-top:0px; padding-bottom:0px; vertical-align: middle;" class="text-left">

                                    <?php echo $row['reclamatie_email']; ?>
                                </td>


                            </tr>
                            <tr>
                                <td style=" " class="text-left">Subject mail</td>
                                <td style="  padding-top:0px; padding-bottom:0px; vertical-align: middle;" class="text-left">

                                    <?php echo $row['reclamatie_onderwerp']; ?>
                                </td>


                            </tr>

                            <tr>
                                <td style=" " class="text-left"></td>
                                <td class="text-left">


                                    <textarea style="width: 100%; border:0px;" rows="5" id="" name="xx"><?php echo $row['reclamatie_tekst']; ?></textarea>
                                </td>


                            </tr>
                            <tr>
                                <td style=" " class="text-left">Status </td>
                                <td style="  padding-top:0px; padding-bottom:0px; vertical-align: middle;" class="text-left">

                                    Verzonden
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <!-- END table -->
                </div>


            </div>
            <!-- END panel-body -->
            <!--
            <div class="panel-loading">
                <div class="spinner"></div>
            </div>
    -->
        </div>
        <br />
    <?php
                                                                                        }
                                                                                    }


                                                                                    function StatusTables_article()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM article
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();
                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['ItemCode']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Description']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['UnitId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['ArtGroup']; ?>
            </td>

        </tr>
    <?php

                                                                                        }
                                                                                    }


                                                                                    function StatusTables_contacten()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM contacts_afas
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['ContactId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Name_afas']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Department']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['AddressLine1']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['AddressLine3']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['TelWork']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['MailWork']; ?>
            </td>


        </tr>
    <?php

                                                                                        }
                                                                                    }


                                                                                    function StatusTables_organisaties()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM organisatie_afas
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['BcCo']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Name_afas']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['AdressLine1']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['AdressLine3']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['TelWork']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['MailWork']; ?>
            </td>


            <td style='vertical-align: middle;'>
                <?php echo $row['Homepage']; ?>
            </td>
        </tr>
    <?php

                                                                                        }
                                                                                    }



                                                                                    function StatusTables_projecten()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM projects_afas
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['ProjectId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Description']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['ProjectGroup']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['BcCo']; ?>
            </td>


        </tr>
    <?php

                                                                                        }
                                                                                    }




                                                                                    function StatusTables_medewerkers()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM employees
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['PersonId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Initials']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['BirthName']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['DateOfBirth']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['Street'] . " " . $row['HouseNumber']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['City']; ?>
            </td>


            <td style='vertical-align: middle;'>
                <?php echo $row['FunctionDesc']; ?>
            </td>
        </tr>
    <?php

                                                                                        }
                                                                                    }



                                                                                    function StatusTables_creditor()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM creditor
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['CreditorId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['CreditorName']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['BcCo']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Adressline1'] . " " . $row['Adressline3']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['TelNr']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Email']; ?>
            </td>


            <td style='vertical-align: middle;'>
                <?php echo $row['PaymentCondition']; ?>
            </td>
        </tr>
    <?php

                                                                                        }
                                                                                    }


                                                                                    function StatusTables_debtor()
                                                                                    {
                                                                                        $query = "SELECT *
                FROM debtor
                ";
                                                                                        $dbDriver = new db_driver();
                                                                                        $dbDriver->querySelects($query);
                                                                                        $result =  $dbDriver->fetchAssoc();

                                                                                        foreach ($result as $row) {
    ?>

        <tr>

            <td style='vertical-align: middle;'>
                <?php echo $row['DebtorId']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['DebtorName']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['BcCo']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Adressline1'] . " " . $row['Adressline3']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['TelNr']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['Email']; ?>
            </td>


            <td style='vertical-align: middle;'>
                <?php echo $row['IBAN']; ?>
            </td>
        </tr>
        <?php
    
            }
        }

        function StatusTables_dossier()
        {
            $dbDriver = new db_driver();
            $query = "SELECT *
                FROM dossier
                LEFT JOIN car ON car.dossierID = dossier.dossierID
                ";
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            foreach ($result as $row) {

            $automerk = GetAutoMerken($row['car_merk']);
            $automodel = GetAutoMerkenA($row['car_model']);
    ?>

        <tr>
            <td style='vertical-align: middle;' class="text-center">
                <?php echo $row['dossierID']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $automerk . " " . $automodel; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['uitvoering']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['productiedatum']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['tenaamstellingNL']; ?>
            </td>
            <td style='vertical-align: middle;'>
                <?php echo $row['km_stand']; ?>
            </td>


            <td style='vertical-align: middle;'>
                <?php echo $row['kenteken']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <?php echo $row['tag']; ?>
            </td>

            <td style='vertical-align: middle;'>
                <center><a class="btn btn-default btn-xs" href="?dip=<?php echo $row['dossierID']; ?>"><i class="ti-pencil"></i></a></center>
            </td>
        </tr>
    <?php

        }
    }

    function DossierData_invoiceCheck()
    { // own form

        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
        FROM invoice
        WHERE dossierID=\"$DossierI\" 
    ";

        $dbDriver = new db_driver();
        $dbDriver->querySelects($query);
        $result =  $dbDriver->fetchAssoc();

        while ($result) {
            $rows[] = $row;
        }
        return $rows;
    }

    function DossierData_invoice_lines_heads()
    { // own form

        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
    FROM invoice
    LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
    WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432
    ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierData_invoice()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
            FROM invoice
            WHERE dossierID=\"$DossierI\" AND invoice_status=432
        ";

            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();

            while ($result) {
                $rows[] = $row;
            }
            return $rows;
        }


        function DossierData_invoice_lines_Data()
        { // own form

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM invoice
    LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
    LEFT JOIN invoice_lines_data ON invoice_lines_data.invoice_lines_headID = invoice_lines_head.invoice_lines_headID
    WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432
    ";

        $dbDriver = new db_driver();
        $dbDriver->querySelects($query);
        $result =  $dbDriver->fetchAssoc();

        while ($result) {
            $rows[] = $row;
        }
        return $rows;
    }

    function GetDataArticleInvoiceView($VarsA)
    {

        $VarA = mysqli_real_escape_string($_POST['GWIconnector'], $VarsA);

        $query = "SELECT *
    FROM article
    WHERE ItemCode=\"$VarA\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $_POST['Description'] = $row['Description'];
        $_POST['UnitId'] = $row['UnitId'];
        $_POST['VATGroup'] = $row['VATGroup'];
    }
}

    function DossierData_invoice_lines_Data_View()
    { // own form

        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
    FROM invoice
    LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
    LEFT JOIN invoice_lines_data ON invoice_lines_data.invoice_lines_headID = invoice_lines_head.invoice_lines_headID
    WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432 AND invoice_lines_data.voeg_toe=1
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {

        GetDataArticleInvoiceView($row['ItemCode']);

        $_POST['invoice_lines_dataID'] = $row['invoice_lines_dataID'];

        $factuur = $row['InvoiceID_Afas'];
    ?>
        <tr>
            <td><?php echo $_POST['Description']; ?></td>
            <td><?php echo $row['Aantal_eenheden']; ?></td>
            <td><?php echo $row['Aantal']; ?></td>
            <td><?php echo $row['invoice_lines_data_omschrijving']; ?></td>
            <td><?php echo $row['Regelkorting']; ?></td>
            <td><?php echo $row['Prijs_per_eenheid']; ?></td>
            <td><?php echo $row['Kostprijs']; ?></td>

            <td class="text-center"><a href="../data/library/update/N_UpdateLinesAfasExtra.php?UpdateID=<?php echo $_POST['invoice_lines_dataID']; ?>"> <i class="ti-close  m-r-10" style="color: red;"></i></a></td>
            <td class="text-center"><a href="#AfasAanpas<?php echo $_POST['invoice_lines_dataID']; ?>" data-toggle="modal"><i class="ti-pencil m-r-10" style="color: green;"></i></a></td>

        </tr>
    <?php

        }
    }

    function DossierData_invoice_lines_Data_View_Modals()
    { // own form

        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
        FROM invoice
        LEFT JOIN invoice_lines_head ON invoice_lines_head.invoiceID = invoice.invoiceID
        LEFT JOIN invoice_lines_data ON invoice_lines_data.invoice_lines_headID = invoice_lines_head.invoice_lines_headID
        WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=432 AND invoice_lines_data.voeg_toe=1
        ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {

        $_POST['invoice_lines_dataID'] = $row['invoice_lines_dataID'];
        $_POST['ItemCode'] = $row['ItemCode'];
        $_POST['Aantal_eenheden'] = $row['Aantal_eenheden'];
        $_POST['Aantal'] = $row['Aantal'];
        $_POST['invoice_lines_data_omschrijving'] = $row['invoice_lines_data_omschrijving'];
        $_POST['Regelkorting'] = $row['Regelkorting'];
        $_POST['Prijs_per_eenheid'] = $row['Prijs_per_eenheid'];
        $_POST['Kostprijs'] = $row['Kostprijs'];

        include('../data/library/modals/Afas_Facturatie_Lines_Update.php');
    }
}

function GetAllInvoiceOKA()
{
    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

    $query = "SELECT *
    FROM invoice
    WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=433
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {

        echo $row['invoiceID'] . "<br />";
        GetAllInvoiceOKB($row['invoiceID']);
    }
}
function GetAllInvoiceOKB($VarA)
{
    $DossierA = mysqli_real_escape_string($_POST['GWIconnector'], $VarA);

    $query = "SELECT *
    FROM invoice_lines_head
    WHERE invoiceID=\"$DossierA\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {

        echo $row['invoice_lines_headID'] . "<br />";
    }
}

function DossierData_invoice_lines_Data_View_Done()
{ // own form

    $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

    $query = "SELECT *
    FROM invoice_lines_data
    LEFT JOIN invoice_lines_head ON invoice_lines_data.invoice_lines_headID = invoice_lines_head.invoice_lines_headID
    LEFT JOIN invoice ON invoice_lines_head.invoiceID = invoice.invoiceID
    WHERE invoice.dossierID=\"$DossierI\" AND invoice.invoice_status=433 AND invoice_lines_data.voeg_toe=0
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {

        GetDataArticleInvoiceView($row['ItemCode']);

        $factuur = $row['InvoiceID_Afas'];
    ?>
        <tr>
            <td><?php echo $_POST['Description']; ?></td>
            <td><?php echo $row['Aantal_eenheden']; ?></td>
            <td><?php echo $row['Aantal']; ?></td>
            <td><?php echo $row['invoice_lines_data_omschrijving']; ?></td>
            <td><?php echo $row['Regelkorting']; ?></td>
            <td><?php echo $row['Prijs_per_eenheid']; ?></td>
            <td><?php echo $row['Kostprijs']; ?></td>
            <?php if ($_POST['InvoiceExist'] < 1) { ?>
                <td class="text-center"><i class="ti-close  m-r-10" style="color: red;"></i></td>
                <td class="text-center"><i class="ti-pencil m-r-10" style="color: green;"></i></td>
            <?php } else { ?>
                <td><?php echo $factuur; ?></td>
                <td class="text-center"><a href="../data/library/invoice_pdf/gwi_factuur_<?php echo $factuur; ?>.pdf" target="_blank" <i class="ti-file m-r-10" style="color: green;"></i></td>
            <?php } ?>
        </tr>
<?php
        }
    }


    function GetQuotationDataView()
    {

    ?>
    <table class='table table-bordered table-hover' ">
    <tbody>
    <tr style=" text-align: center">
        <th>Soort</th>
        <th style="text-align: center">View</th>


        </tr>
<?php
        GetQuotationViewer();
        GetQuotationViewerA();
        ?>
        </tbody>
    </table>
    <?php
    }


    function GetQuotationViewer()
    {
        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
    FROM files_dossier
    WHERE dossier_ID=\"$DossierI\" AND offerte!=0 AND aanbieding_pdf!=1 ORDER BY files_dossier_ID DESC LIMIT 1
";
    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
    ?>

        <tr>
            <td style='padding:0px; vertical-align: middle; text-align: center;'>
                <?php if ($row['aanbieding_pdf'] == 1) {
                echo "Aanbieding ";
            } else {
                echo "Offerte";
            } ?>
            </td>
            <td style='padding:0px; vertical-align: middle; text-align: center;'>

        <?php
        echo "<a href='../data/library/files_01/" . $row['file'] . "' target='_blank'>Bekijk file, klik hier</a>"; ?>
            </td>
        </tr>

    <?php
        }
    }

    function GetQuotationViewerA()
    {
        $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

        $query = "SELECT *
    FROM files_dossier
    WHERE dossier_ID=\"$DossierI\" AND aanbieding_pdf=1 ORDER BY files_dossier_ID DESC LIMIT 1
    ";
    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
    ?>

        <tr>
            <td style='padding:0px; vertical-align: middle; text-align: center;'>
        <?php if ($row['aanbieding_pdf'] == 1) {
            echo "Aanbieding ";
        } else {
            echo "Offerte";
        } ?>
            </td>
            <td style='padding:0px; vertical-align: middle; text-align: center;'>

                <?php
                echo "<a href='../data/library/files_01/" . $row['file'] . "' target='_blank'>Bekijk file, klik hier</a>"; ?>
            </td>
        </tr>

<?php
            }
        }


        function getQuotationID()
        {

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT * FROM price_calc WHERE dossierID = \"$DossierI\"";
            $dbDriver = new db_driver();
            $dbDriver->querySelects($query);
            $result =  $dbDriver->fetchAssoc();
            while ($result) {
                return $result['price_calcID'];
            }
        }

        function GetSendAanbieding()
        {
            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM quotations_aanbieding WHERE dossierID = \"$DossierI\" AND VerzondenMail=0

");
            $CountNow = mysqli_num_rows($result);

            return  $CountNow;
        }

        function GetSendAanbiedingA()
        {

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM files_dossier WHERE dossier_ID = \"$DossierI\" AND aanbieding_pdf=1");
            $CountNow = mysqli_num_rows($result);

            return  $CountNow;
        }


        function ATClientData_Purchase()
        {

            $DossierI = mysqli_real_escape_string($_POST['GWIconnector'], $_SESSION['dossierID']);

            $query = "SELECT *
    FROM atbasisgegevens
    LEFT JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID
    LEFT JOIN atheaderberekening ON atheaderberekening.auto_id = atbasisgegevens.id
    LEFT JOIN atimportreportdata ON atimportreportdata.auto_id = atbasisgegevens.id
    LEFT JOIN atuitgebreidegegevens ON atuitgebreidegegevens.auto_id = atbasisgegevens.id
    WHERE atbasisgegevens.dossierID=\"$DossierI\"
    ";

    $dbDriver = new db_driver();
    $dbDriver->querySelects($query);
    $result =  $dbDriver->fetchAssoc();

    while ($result) {
        $rows[] = $row;
    }
    return $rows;
}


?>