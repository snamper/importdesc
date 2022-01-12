<?php

function AutoTelexClientData(){

$DossierI = mysqli_real_escape_string( $_POST['GWIconnector'], $_SESSION['NewCarID'] );

$query = "SELECT *
FROM atbasisgegevens
LEFT JOIN atalternatieveuitvoeringen ON atalternatieveuitvoeringen.telex_ID = atbasisgegevens.UitvoeringID
LEFT JOIN atheaderberekening ON atheaderberekening.auto_id = atbasisgegevens.id
LEFT JOIN atimportreportdata ON atimportreportdata.auto_id = atbasisgegevens.id
LEFT JOIN atuitgebreidegegevens ON atuitgebreidegegevens.auto_id = atbasisgegevens.id
WHERE atbasisgegevens.id=\"$DossierI\"
";

$result = $_POST['GWIconnector']->query($query);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
$rows[] = $row;
}
return $rows;
}



function AutoTelexatwaardegegevensFull($some){
    $LanguageDatasFunc = GWIGetLanguageDataFunctions('ATatwaardegegevens');

    $IDCar= mysqli_real_escape_string($_POST['GWIconnector'], $some);

    $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM atwaardegegevens
               WHERE auto_id=\"$IDCar\"
                ");
    while ($row = mysqli_fetch_array($result)) {?>

        <tr>
            <td style="font-weight: bold; width: 16.6%; border-top: 1px #000000 solid;" class="text-left"><?php echo $LanguageDatasFunc[0]['language_text']; ?></td>
            <td style=" width: 16.6%; border-top: 1px #000000 solid;" class="text-left"><?php echo $row['Naam']; ?></td>
            <td style="font-weight: bold; width: 16.6%; border-top: 1px #000000 solid;" class="text-left"><?php echo $LanguageDatasFunc[1]['language_text']; ?></td>
            <td style=" width: 16.6%; border-top: 1px #000000 solid;" class="text-left">&euro; <?php echo $row['Waarde']; ?></td>
            <td style="font-weight: bold; width: 16.6%; border-top: 1px #000000 solid;" class="text-left"> <?php echo $LanguageDatasFunc[2]['language_text']; ?></td>
            <td style=" width: 16.6%; border-top: 1px #000000 solid;" class="text-left">&euro; <?php echo $row['BTW']; ?></td>

        </tr>
        <tr>
            <td style="font-weight: bold; width: 16.6%;" class="text-left"><?php echo $LanguageDatasFunc[3]['language_text']; ?></td>
            <td style=" width: 16.6%;" class="text-left">&euro; <?php echo $row['BPM']; ?></td>
            <td style="font-weight: bold; width: 16.6%;" class="text-left"><?php echo $LanguageDatasFunc[4]['language_text']; ?></td>
            <td style=" width: 16.6%;" class="text-left">&euro; <?php echo $row['WaardeExclusief']; ?></td>
            <td style="font-weight: bold; width: 16.6%;" class="text-left"> <?php echo $LanguageDatasFunc[5]['language_text']; ?></td>
            <td style=" width: 16.6%;" class="text-left"><?php echo $row['Percentage']; ?> %</td>

        </tr>

    <?php

    }}



function AutoTelexCarHistory($some){
    ?>
    <tr>

        <th style=" width: 16.6%;" class="text-left">Datum</th>
        <th style="width: 16.6%;" class="text-left">Extra info</th>
        <th style=" width: 16.6%;" class="text-left">Eigenaar</th>
        <th style=" width: 16.6%;" class="text-left">Dagen</th>
    </tr>


    <?php

    $IDCar= mysqli_real_escape_string($_POST['GWIconnector'], $some);

    $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM ateigenaarhistorie
               WHERE auto_id=\"$IDCar\"
                ");
    while ($row = mysqli_fetch_array($result)) {?>
        <tr>

            <?php   $datumeigenaar = date_create($row['Datum']);
            $datumeigenaar = date_format($datumeigenaar, "d/m/Y");
            ?>
            <td style=" width: 16.6%;" class="text-left"><?php echo $datumeigenaar. " (".$row['AantalDagen'].")"; ?></td>
            <td style="width: 16.6%;" class="text-left"><?php echo $row['ExtraInfo']; ?> </td>
            <td style=" width: 16.6%;" class="text-left"><?php echo $row['TypeEigenaar']; ?></td>
            <td style=" width: 16.6%;" class="text-left"><?php echo $row['AantalDagen']; ?></td>
        </tr>

    <?php

    }}



function DirNumber() {
    $_POST['number_secret_1'] = substr( "23422789", mt_rand( 0, 7 ), 1 );
    $_POST['number_secret_2'] = substr( "asdfghjjkl", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_3'] = substr( "23456789", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_4'] = substr( "27776789", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_2'] = substr( "asdfghjjkl", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_3'] = substr( "23456789", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_5'] = substr( "76543569", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_6'] = substr( "ajkuefghr", mt_rand( 0, 7 ), 2 );
    $_POST['number_secret_5'] = substr( "76543569", mt_rand( 0, 7 ), 2 );
    $_SESSION['dir_nummer']   = $_POST['number_secret_1'] . "" . $_POST['number_secret_2'] . "" . $_POST['number_secret_3'] . "" . $_POST['number_secret_4'] . "" . $_POST['number_secret_5'] . "" . $_POST['number_secret_6'];
}


function GWICarHistory($some){


    $IDCar= mysqli_real_escape_string($_POST['GWIconnector'], $some);

    $result = mysqli_query($_POST['GWIconnector'], "SELECT * FROM ateigenaarhistorie
               WHERE auto_id=\"$IDCar\" AND ExtraInfo LIKE '%atste tena%'
                ");
    while ($row = mysqli_fetch_array($result)) {?>


            <?php   $datumeigenaar = date_create($row['Datum']);
            $datumeigenaar = date_format($datumeigenaar, "d/m/Y");
          
             echo $datumeigenaar. " (".$row['AantalDagen'].")"; 
    

    }}




function script_datepicker()
{

    ?>

    <script src="../data/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        //datepicker plugin
        //link
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
            //show datepicker when clicking on the icon
            .next().on(ace.click_event, function () {
                $(this).prev().focus();
            });

        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose: true});

        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
            'applyClass': 'btn-sm btn-success',
            'cancelClass': 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        })
            .prev().on(ace.click_event, function () {
                $(this).next().focus();
            });

    </script>
<?php
}



function DropDownBasic($varA, $varB, $varC){
// $varA = conversie_soort
// $varB = selected = zelfde =
// $varC = name & id

?>
            <select
                name="<?php echo $varC; ?>"
                id="<?php echo $varC; ?>"
                class="text-input"
                style='border:0;  width: 100%;  '
                    >
                <option value="0">Maak een keuze </option>
                <?php
                    $query = "SELECT *
                    FROM conversie_tabel_gwi WHERE conversie_soort=\"$varA\"";

                    $result = $_POST['GWIconnector']->query($query);

                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value=\"" . $row['conversie_tabel_ID'] . "\"";
                        if ($varB == $row['conversie_tabel_ID']) {
                            echo "selected";
                        } else {
                        }
                        echo ">" . $row['conversie_naam'] . "</option>";
                    }
                ?>
            </select>
<?php }



?>