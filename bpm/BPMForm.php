<?php


//$result = mysql_query( "SELECT * FROM dossier WHERE dossier_ID='" . $_SESSION['dossier_ID'] . "'" );

$result = mysql_query( "SELECT * FROM dossier WHERE dossier_ID='3786'" );
while ( $row = mysql_fetch_array( $result ) ) {

    $_POST["historischenieuwwaardekeuze"]   = $row["historischenieuwwaardekeuze"];
    $_POST["datumdeel1"]                    = $row["datumdeel1"];
    $_POST["mmmtu"]                         = $row["mmmtu"];
    $_POST["meeruitvoeringentotaal"]        = $row["meeruitvoeringentotaal"];
    $_POST["totaalx"]                       = $row["totaal"];
    $_POST["huidigedatuminvoerdatum"]       = $row["huidigedatuminvoerdatum"];
    $_POST["brutobpm"]                      = $row["brutobpm"];
    $_POST["eurotaxxx"]                     = $row["eurotax"];
    $_POST["autotelexxx"]                   = $row["autotelex"];
    $_POST["schadebedrag"]                  = $row["schadebedrag"];
    $_POST["xrayxx"]                        = $row["xray"];
    $_POST["taxatiewaardexx"]               = $row["taxatiewaarde"];
    $_POST["variabeledatumbpm"]             = $row["variabeledatumbpm"];
    $_POST["forfaitaire"]                   = $row["forfaitaire"];
    $_POST["forfaitaire_variabel"]          = $row["forfaitaire_variabel"];
    $_POST["forfaitaire_tenaamstelling_nl"] = $row["forfaitaire_tenaamstelling_nl"];
    $_POST["koerslijst"]                    = $row["koerslijst"];
    $_POST["forfaitaire_percentage"]        = $row["forfaitaire_percentage"];
    $_POST["forfaitaire_maanden"]           = $row["forfaitaire_maanden"];
    $_POST["taxatiewaarde"]                 = $row["taxatiewaarde"];
    $_POST["winnaar"]                       = $row["winnaar"];
    $_POST["winnaarbedrag"]                 = $row["winnaarbedrag"];
    $_POST["douanerapport"]                 = $row["douanerapport"];

    echo "<form id=\"002\" name=\"bereken\" method=\"POST\" action=\"BPMupdate.php\">";
    echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;' >";
    echo "Historische nieuwpr. (in/in)";
    echo "</td><td  style='padding:0px; vertical-align: middle;' >";
    if ( isset( $_POST["historischenieuwwaardekeuze"] ) ) {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["historischenieuwwaardekeuze"] . "\" class=\"text-input\" type=\"text\" name=\"historischenieuwwaardekeuze\" id=\"historischenieuwwaardekeuze\" />";
    } else {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\" class=\"text-input\" type=\"text\" name=\"historischenieuwwaardekeuze\" id=\"historischenieuwwaardekeuze\" />";
    }
    echo "</td></tr>";

    echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
    echo "Meeruitvoeringen (in/in)  ";
    echo "</td><td  style='padding:0px; vertical-align: middle;'>";
    if ( isset( $_POST["meeruitvoeringentotaal"] ) ) {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["meeruitvoeringentotaal"] . "\"  class=\"text-input\" type=\"text\" name=\"meeruitvoeringentotaal\" id=\"meeruitvoeringentotaal\" />";
    } else {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"meeruitvoeringentotaal\" id=\"meeruitvoeringentotaal\" />";
    }
}
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Totaalprijs (in/in)  ";
echo "</td><td style='padding:0px; vertical-align: middle;' >";
if ( isset( $_POST["totaalx"] ) ) {
    if ( $_POST["totaalx"] > 1 ) {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["totaalx"] . "\" disabled   class=\"text-input\" type=\"text\" name=\"totaal\" id=\"totaal\" />";
    } else {
        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Wordt automatisch ingevuld\" disabled   class=\"text-input\" type=\"text\" name=\"totaal\" id=\"totaal\" />";

    }
} else {
    echo "<inputstyle=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Wordt automatisch ingevuld\" disabled   class=\"text-input\" type=\"text\" name=\"totaal\" id=\"totaal\" />";
}
echo "</td></tr>";

echo '<tr bgcolor="#ffffff"><td colspan="2"></td></tr>';

echo '<tr bgcolor="#f8f8f8"><td colspan="2"><strong>Reguliere berekening</strong></td></tr>';

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Bruto BPM (gunstigste)  ";
echo "</td><td  style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["brutobpm"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["brutobpm"] . "\"  class=\"text-input\" type=\"text\" name=\"brutobpm\" id=\"brutobpm\" />";
} else {
    echo "<input style='border:0;  width:98%; margin-left:2%;' value=\"\"  class=\"text-input\" type=\"text\" name=\"brutobpm\" id=\"brutobpm\" />";
}
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Schadebedrag (incl BTW)";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["schadebedrag"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["schadebedrag"] . "\"  class=\"text-input\" type=\"text\" name=\"schadebedrag\" id=\"schadebedrag\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"schadebedrag\" id=\"schadebedrag\" />";
}
echo "</td></tr>";

echo '<tr bgcolor="#f8f8f8"><td></td><td></td></tr>';

$_POST['today'] = date( "Y-m-d" );

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Huidige datum ";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . date( 'd-m-Y', strtotime( $_POST['today'] ) ) . "\"   class=\"text-input\" type=\"text\" name=\"huidigedatumbpm\" id=\"huidigedatumbpm\" />";
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "REST BPM (Forfaitaire afschrijftabel) - Huidige datum<br /><span style='color:#696969; font-size: 11px;'><em>((100 - afschrijvingspercentage) / 100) x bruto bpm = rest bpm</em></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["forfaitaire"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . floor( $_POST["forfaitaire"] ) . "\"  class=\"text-input\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"forfaitaire\" id=\"forfaitaire\" />";
}
echo "</td></tr>";

echo '<tr bgcolor="#f8f8f8"><td></td><td></td></tr>';

$_POST['variabel'] = $_POST['variabeledatumbpm'];

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Variabele datum ";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . date( 'd-m-Y', strtotime( $_POST['variabel'] ) ) . "\"   class=\"text-input\" type=\"text\" name=\"variabeledatumbpm\" id=\"variabeledatumbpm\" />";
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "REST BPM (Forfaitaire afschrijftabel) - Variabele datum<br /><span style='color:#696969; font-size: 11px;'><em>((100 - afschrijvingspercentage) / 100) x bruto bpm = rest bpm</em></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["forfaitaire_variabel"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . floor( $_POST["forfaitaire_variabel"] ) . "\"  class=\"text-input\" type=\"text\" name=\"forfaitaire_variabel\" id=\"forfaitaire_variabel\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"forfaitaire_variabel\" id=\"forfaitaire_variabel\" />";
}
echo "</td></tr>";

echo '<tr bgcolor="#ffffff"><td colspan="2"></td></tr>';

echo '<tr bgcolor="#f8f8f8"><td colspan="2"><strong>Koerslijst berekening</strong></td></tr>';

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "REST BPM (Koerslijst)<br /><span style='color:#696969; font-size: 11px;'></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["koerslijst"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . floor( $_POST["koerslijst"] ) . "\"  class=\"text-input\" type=\"text\" name=\"koerslijst\" id=\"koerslijst\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"koerslijst\" id=\"koerslijst\" />";
}
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Hoog gerekende bruto BPM (Koerslijst)<br /><span style='color:#696969; font-size: 11px;'><em>bruto bpm = rest bpm / ((100 - afschrijvingspercentage) / 100)</em></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
$percentage = getForfaitairePercentage($_POST["forfaitaire_maanden"]);
$bruto_bpm_koerslijst = $_POST["koerslijst"] / ( ( 100 - $percentage['percentage'] ) / 100 );
if ( isset( $bruto_bpm_koerslijst ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . ceil( $bruto_bpm_koerslijst ) . "\"  class=\"text-input\" type=\"text\" name=\"bruto_bpm_koerslijst\" id=\"bruto_bpm_koerslijst\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"bruto_bpm_koerslijst\" id=\"bruto_bpm_koerslijst\" />";
}
echo "</td></tr>";

echo '<tr bgcolor="#ffffff"><td colspan="2"></td></tr>';

echo '<tr bgcolor="#f8f8f8"><td colspan="2"><strong>Taxatie berekening</strong></td></tr>';

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo $_POST['forfetaire_mnd'];
echo "REST BPM (Taxatie)<br /><span style='color:#696969; font-size: 11px;'><em>bruto bpm = rest bpm / ((100 - afschrijvingspercentage) / 100)</em></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
if ( isset( $_POST["taxatiewaarde"] ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . floor( $_POST["taxatiewaarde"] ) . "\"  class=\"text-input\" type=\"text\" name=\"taxatiewaarde\" id=\"taxatiewaarde\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"taxatiewaarde\" id=\"taxatiewaarde\" />";
}
echo "</td></tr>";

echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
echo "Hoog gerekende bruto BPM (Taxatie)<br /><span style='color:#696969; font-size: 11px;'><em>bruto bpm = rest bpm / ((100 - afschrijvingspercentage) / 100)</em></span>";
echo "</td><td style='padding:0px; vertical-align: middle;'>";
$bruto_bpm_taxatie = $_POST["taxatiewaarde"] / ( ( 100 - $percentage['percentage'] ) / 100 );
if ( isset( $bruto_bpm_taxatie ) ) {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . ceil( $bruto_bpm_taxatie ) . "\"  class=\"text-input\" type=\"text\" name=\"bruto_bpm_taxatie\" id=\"bruto_bpm_taxatie\" />";
} else {
    echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"bruto_bpm_taxatie\" id=\"bruto_bpm_taxatie\" />";
}
echo "</td></tr>";

//    echo '<tr bgcolor="#dddddd"><td></td><td></td></tr>';

//	echo "<tr><td  style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
//	?><!--<a style='color:#373896;' href="URL"-->
<!--         onclick="window.open('http://xcn-nl.eurotaxglass.com/xchange/nlnl/index.php', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">Eurotax</a>--><?php
//	echo "</td><td style='padding:0px; vertical-align: middle;' >";
//	if ( isset( $_POST["eurotaxxx"] ) ) {
//		echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["eurotaxxx"] . "\"  class=\"text-input\" type=\"text\" name=\"eurotax\" id=\"eurotax\" />";
//	} else {
//		echo "<input style='border:0;  width:98%; margin-left:2%;' value=\"\"  class=\"text-input\" type=\"text\" name=\"eurotax\" id=\"eurotax\" />";
//	}
//	echo "</td></tr>";
//
//	echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
//	?><!--<a style='color:#373896;' href="URL"-->
<!--         onclick="window.open('http://www.autotelexpro.nl/LoginPage.aspx', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">Autotelex</a>--><?php
//	echo "</td><td style='padding:0px; vertical-align: middle;'>";
//	if ( isset( $_POST["autotelexxx"] ) ) {
//		echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["autotelexxx"] . "\"  class=\"text-input\" type=\"text\" name=\"autotelex\" id=\"autotelex\" />";
//	} else {
//		echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"autotelex\" id=\"autotelex\" />";
//	}
//	echo "</td></tr>";
//
//	echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
//	?><!--<a style='color:#373896;' href="URL"-->
<!--         onclick="window.open('http://live.xray.nl/account/login', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">Xray</a>--><?php
//	echo "</td><td style='padding:0px; vertical-align: middle;'>";
//	if ( isset( $_POST["xrayxx"] ) ) {
//		echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["xrayxx"] . "\"  class=\"text-input\" type=\"text\" name=\"xray\" id=\"xray\" />";
//	} else {
//		echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"xray\" id=\"xray\" />";
//	}
//	echo "</td></tr>";
//
//    echo '<tr><td></td><td></td></tr>';

//    echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
//    echo "Forfaitaire afschrijftabel - Tenaamstelling NL";
//    echo "</td><td style='padding:0px; vertical-align: middle;'>";
//    if ( isset( $_POST["forfaitaire_tenaamstelling_nl"] ) ) {
//        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"" . $_POST["forfaitaire_tenaamstelling_nl"] . "\"  class=\"text-input\" type=\"text\" name=\"forfaitaire_tenaamstelling_nl\" id=\"forfaitaire_tenaamstelling_nl\" />";
//    } else {
//        echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"\"  class=\"text-input\" type=\"text\" name=\"forfaitaire_tenaamstelling_nl\" id=\"forfaitaire_tenaamstelling_nl\" />";
//    }
//    echo "</td></tr>";

/* winnaar bepaling */
if ( isset( $_POST['winnaar'] ) ) {
    if ( $_POST['winnaar'] >= 1 ) {
        echo "<tr><td style='padding-top:0px;padding-bottom:0px; vertical-align: middle;'>";
        echo "Winnaar is  ";
        echo "</td><td style='padding:0px; vertical-align: middle;'>";
        if ( $_POST['winnaar'] == 1 ) {
            echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Eurotax met &euro; " . $_POST["winnaarbedrag"] . "\" disabled class=\"text-input\" type=\"text\" name=\"winnaar\" id=\"winnaar\" />";
        } elseif ( $_POST['winnaar'] == 2 ) {
            echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Autotelex met &euro; " . $_POST["winnaarbedrag"] . "\" disabled class=\"text-input\" type=\"text\" name=\"winnaar\" id=\"winnaar\" />";
        } elseif ( $_POST['winnaar'] == 3 ) {
            echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Xray met &euro; " . $_POST["winnaarbedrag"] . "\" disabled class=\"text-input\" type=\"text\" name=\"winnaar\" id=\"winnaar\" />";
        } elseif ( $_POST['winnaar'] == 4 ) {
            echo "<input style=' border-left:0; border-right:0;border-top:0; width:100%;   ' value=\"Taxatiewaarde met &euro; " . $_POST["winnaarbedrag"] . "\" disabled class=\"text-input\" type=\"text\" name=\"winnaar\" id=\"winnaar\" />";
        } else {
        }
        echo "</td></tr>";
    } else {
    }// als de winnaar groter of gelijk is aan 1
} else {
}// is de winnaar er

echo "<tr><td>";
echo "&nbsp;";
echo "</td><td>";
//echo "<input type=\"submit\" name=\"update\" value=\"Bereken\" align=\"right\" style=\" border: 0;  height: 25px;    background-color: #0e3e89; color:#FFF; \">";
button_voor_form_berekening();
echo "</td></tr>";
echo "</form>";


?>