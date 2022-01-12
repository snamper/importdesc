<?php
session_start();

include_once("../../../settings.php");

include_once("../../connn/ConCept.php");

include_once("../../connn/t-over.php");

require_once("../../connn/RightsMatrix.php");

include_once("../../connn/UnsetList.php");

$RSort = 'Geetetbjasdhj';
$Indicator = 457634244;
AantalRightsView($Indicator, $RSort);
if ($_POST['AantalRightsView'] == 1) {
    $RData = DataRightsView($Indicator, $RSort);
    foreach ($RData as $RDatas) {
        if ($RDatas['Active'] == 1) {

/*
$sql = "DELETE FROM alternatieveuitvoeringen"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM basisgegevens"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM eigenaarhistorie"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM opties"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM importreportdata"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM uitgebreidegegevens"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM waardegegevens"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM pakketten"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM pakketten_opties"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
$sql = "DELETE FROM headerberekening"; $resultquery = mysqli_query( $_POST['GWIconnector'], $sql); 
*/

//echo $_POST['kenteken_ie'];

$_POST['kenteken_ie']=str_replace("-","", $_GET['kent']);

$kenteken = $_POST['kenteken_ie'];
$_SESSION['kenteken']=$kenteken;
//SJ543L


$wsdl='http://apitest.autotelexpro.nl/autotelexproapi.svc?wsdl';

$param1 = 'GWI';
$param2 = 'x3EpjXYpA4T337Nb';

//$param3 = '64ZXL1';
$param3 	= $kenteken;


$token 	='3641d203-5afa-47fc-bfd1-4493c3e5da68';

// $params = array('username'=>$param1,'password'=>$param2);

$hvs1 = array('kenteken'=>$param3);
$params = array('token'=>$token,'vehicle'=>$hvs1 );


ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);

$options = array(
'uri'=>'http://schemas.xmlsoap.org/wsdl/soap/',
'style'=>SOAP_RPC,
'use'=>SOAP_ENCODED,
'soap_version'=>SOAP_1_1,
'cache_wsdl'=>WSDL_CACHE_NONE,
'connection_timeout'=>15,
'trace'=>true,
'encoding'=>'UTF-8',
'exceptions'=>true,
'username'=>'GWI',
'password'=>'x3EpjXYpA4T337Nb',
);
try {
$soap = new SoapClient($wsdl, $options);
// $data = $soap->GetVehicleDataPro($params);

$data = $soap->GetVehicleDataPRO($params);




foreach ($soap->GetVehicleDataPRO($params) as $item)
    {
		// echo  $item->AlternatieveUitvoeringen->VehicleType[0]->Brand;
		// echo count($item->AlternatieveUitvoeringen->VehicleType)."<br>";
		
		if (is_array($item->AlternatieveUitvoeringen->VehicleType)){
		//var_dump($item->AlternatieveUitvoeringen->VehicleType);	  
			  
		foreach($item->AlternatieveUitvoeringen->VehicleType as $alternatief) {
			
//			echo $alternatief->Brand."<br>";
//			echo $alternatief->FotoURLFront."<br>";
//			echo $alternatief->FotoURLInterior."<br>";
//			echo $alternatief->FotoURLRear."<br>";
//			echo $alternatief->GeleverdTotJaar."<br>";
//			echo $alternatief->GeleverdVanJaar."<br>";
//			echo $alternatief->ID."<br>";
//			echo $alternatief->Model."<br>";
//			echo $alternatief->NieuwPrijs."<br>";
//			echo $alternatief->Type."<br>";
//			echo $alternatief->Vermogen."<br>";
//			echo $alternatief->Versnelling."<br>";
			
			
			 $sql = "INSERT INTO atalternatieveuitvoeringen (
				Brand,
				FotoURLFront,
				FotoURLInterior,
				FotoURLRear,
				GeleverdTotJaar,
				GeleverdVanJaar,
				telex_ID, 
				Model,
				NieuwPrijs, 
				Type,
				Vermogen, 
				Versnelling)

			  VALUES (
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->Brand )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->FotoURLFront )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->FotoURLInterior )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->FotoURLRear )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->GeleverdTotJaar )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->GeleverdVanJaar )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->ID )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->Model )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->NieuwPrijs )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->Type )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->Vermogen )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $alternatief->Versnelling)."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				if ($resultquery){
					// echo "QUERY ok";
				} else {
//					echo "QUERY GAAT FOUT CHECK ";
				}			
			} 
		}

		$Dosser =  $_SESSION['dossierID'];
		
		
//			echo "<br> BasisGegevens- : <br>";
        $date = new DateTime();
        $_POST['creationdate']= $date->getTimestamp();
			
			$sql = "INSERT INTO atbasisgegevens (
			dossierID,
			Aandrijving,
            AantalDeuren,
            AantalZitplaatsen,
            Acceleratie,
            AutotelexKMStand,
            Bouwjaar,
            Bouwmaand,
            Brandstof,
            CO2,
            Cilinderinhoud,
            Cilinders,
            Energielabel,
            Euroklasse,
            Fijnstof,
            GVW,
            GeleverdTot,
            GeleverdVan,
            IsGeel,
            IsGrijs,
            Kenteken,
            Koetswerk,
            Koppel,
			ModelVariantGeleverdTot,
            ModelVariantGeleverdVan,
            NieuwPrijs,
            NumberOfGears,
			Segment,
            SegmentDescription,
            SegmentId,
			Topsnelheid,
            Turbo,
            UitvoeringID,
            Verbruik,
            VerbruikBinnen,
            VerbruikBuiten,
            Vermogen,
            VoertuigSoort,
            Wegenbelasting,
            Wielbasis,
            creationdate)

			VALUES (
			\"$Dosser\",        
			'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Aandrijving)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->AantalDeuren)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->AantalZitplaatsen)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Acceleratie)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->AutotelexKMStand)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Bouwjaar)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Bouwmaand)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Brandstof)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->CO2)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Cilinderinhoud)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Cilinders)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Energielabel)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Euroklasse)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Fijnstof)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->GVW)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->GeleverdTot)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->GeleverdVan)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->IsGeel)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->IsGrijs)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Kenteken)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Koetswerk)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Koppel)."',
			'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->ModelVariantGeleverdTot)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->ModelVariantGeleverdVan)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->NieuwPrijs)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->NumberOfGears)."',
			'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Segment)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->SegmentDescription)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->SegmentId)."',
		    '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Topsnelheid)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Turbo)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->UitvoeringID)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Verbruik)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->VerbruikBinnen)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->VerbruikBuiten)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Vermogen)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->VoertuigSoort)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Wegenbelasting)."',
             '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->BasisGegevens->Wielbasis)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $_POST['creationdate'])."')";
			
			$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
			if ($resultquery){
				// echo "QUERY ok";
			} else {
//				echo "QUERY GAAT FOUT CHECK ";
			}
			$hvs_auto_id =mysqli_insert_id($_POST['GWIconnector']);
            $_SESSION['NewCarID']=$hvs_auto_id;
       
			
			
			
//			echo "<br> Aantal OPTIES : ".count($item->BasisGegevens->Opties->Options)."<br>";
            foreach($item->BasisGegevens->Opties->Options as $hvs_optie) {
			  /*
			  echo $hvs_optie->Name."<br>";
			  echo $hvs_optie->ID."<br>";
              echo $hvs_optie->Price."<br>";
              echo $hvs_optie->Selected."<br>";
              echo $hvs_optie->ValueAddingOption."<br>";
			  echo "<br>";	
			  */
			  
			  $sql = "INSERT INTO atopties (
			   auto_id,
			   Name,
			   ID_telex,
			   Price,
			   Selected,
			   standaardoptie,
			   ValueAddingOption) 

			  VALUES (
				'$hvs_auto_id',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Name )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->ID )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Price )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Selected )."',
				'No',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->ValueAddingOption)."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				if ($resultquery){
					// echo "QUERY ok";
				} else {
//					echo "QUERY GAAT FOUT CHECK ";
				}			
				
			  }
			
			
//			echo "<br> Aantal STANDAARD OPTIES : ".count($item->BasisGegevens->StandaardOpties->Options)."<br>";
            foreach($item->BasisGegevens->StandaardOpties->Options as $hvs_optie) {
			 /*
			  echo $hvs_optie->Name."<br>";
			  echo $hvs_optie->ID."<br>";
              echo $hvs_optie->Price."<br>";
              echo $hvs_optie->Selected."<br>";
              echo $hvs_optie->ValueAddingOption."<br>";
			  echo "<br>";	
			  */
			   $sql = "INSERT INTO atopties (
			   auto_id,
			   Name,
			   ID_telex,
			   Price,
			   Selected,
			   standaardoptie,
			   ValueAddingOption) 

			  VALUES (
				'$hvs_auto_id',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Name )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->ID )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Price )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->Selected )."',
				'Yes',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_optie->ValueAddingOption)."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				if ($resultquery){
					// echo "QUERY ok";
				} else {
//					echo "QUERY GAAT FOUT CHECK ";
				}			
			  
			  
			  
			  }
			  
			if (is_array($item->BasisGegevens->Pakketten->Packets)){ 
//			echo "<br> Aantal pakketten : ".count($item->BasisGegevens->Pakketten->Packets)."<br>";
            foreach($item->BasisGegevens->Pakketten->Packets as $hvs_pakketten) {
//			  echo "ID ". $hvs_pakketten->ID."<br>";
//			  echo "Name ". $hvs_pakketten->Name."<br>";
//			  echo "price ". $hvs_pakketten->Price."<br>";
//			  echo "selected ". $hvs_pakketten->Selected."<br>";
//			  echo "ValueAddingOption ". $hvs_pakketten->ValueAddingOption."<br>";
			  
			  $sql = "INSERT INTO atpakketten (
			   auto_id,
			   telex_ID,
			   Name,
			   price,
			   selected,
			   ValueAddingOption) 

			  VALUES (
				'$hvs_auto_id',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakketten->ID  )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakketten->Name   )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakketten->Price   )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakketten->selected   )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakketten->ValueAddingOption )."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				$hvs_pakket_id =mysqli_insert_id($_POST['GWIconnector']);
				
//				echo "LAATSTE ID ".$hvs_pakket_id."<br><br>";
				
				if ($resultquery){
					// echo "QUERY ok";
				} else {
//					echo "QUERY PAKKETTEN GAAT FOUT CHECK ";
				}		
				
				
			  
			  
			  
			  if (is_array($hvs_pakketten->Opties->Options)){
//				  echo "<br> Aantal pakket opties: ".count($hvs_pakketten->Opties->Options)."<br>";
				  foreach($hvs_pakketten->Opties->Options as $hvs_pakket_opties) {
//					echo "pakket opties ID ".$hvs_pakket_opties->ID."<br>";
//					echo "pakket opties Name ".$hvs_pakket_opties->Name."<br>";
//					echo "pakket opties Price ".$hvs_pakket_opties->Price."<br>";
//					echo "pakket opties Sel ".$hvs_pakket_opties->Selected."<br>";
//					echo "pakket opties ValueAddingOption ".$hvs_pakket_opties->ValueAddingOption."<br>";
				
					$sql = "INSERT INTO atpakketten_opties (
					   auto_id,
					   telex_ID,
					   pakket_id,
					   Name,
					   price,
					   selected,
					   ValueAddingOption) 

					  VALUES (
						'$hvs_auto_id',
						'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakket_opties->ID  )."',
						'".$hvs_pakket_id."',
						'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakket_opties->Name   )."',
						'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakket_opties->Price   )."',
						'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakket_opties->selected   )."',
						'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_pakket_opties->ValueAddingOption )."')";
					
						$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
						if ($resultquery){
							// echo "QUERY ok";
						} else {
//							echo "QUERY PAKKETTEN OPTIES GAAT FOUT CHECK ";
						}		
					  
				
				
				} 
			  }
			  
			}
			  
			  echo "<br>";	
			  } else {
//				  echo "er zijn geen pakketten <br>";
			  }
				
		
			if (is_array($item->EigenaarHistorieRDWGegevens->RDWVoertuigData->VoertuigData)){ 
			echo "<br><br>Aantal Eigenaar ".count($item->EigenaarHistorieRDWGegevens->RDWVoertuigData->VoertuigData)."<br>";
			if (is_array($item->EigenaarHistorieRDWGegevens->RDWVoertuigData->VoertuigData)){
				foreach($item->EigenaarHistorieRDWGegevens->RDWVoertuigData->VoertuigData as $hvs_eigenaar) {
				  echo "Aantal dagen : ".$hvs_eigenaar->AantalDagen."<br>";
				  echo "Datum : ".$hvs_eigenaar->Datum."<br>";
				  echo "Extra info : ".$hvs_eigenaar->ExtraInfo."<br>";
				  echo "Type Eigenaar : ".$hvs_eigenaar->TypeEigenaar."<br>";
			
				
				$sql = "INSERT INTO ateigenaarhistorie (
			   auto_id,
			   AantalDagen,
			   Datum,
			   ExtraInfo,
			   TypeEigenaar) 

			  VALUES (
				'$hvs_auto_id',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_eigenaar->AantalDagen  )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_eigenaar->Datum  )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_eigenaar->ExtraInfo  )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_eigenaar->TypeEigenaar)."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				if ($resultquery){
					 echo "QUERY ok";
				} else {
					echo "QUERY GAAT FOUT CHECK ";
				}			
				}  
			}
			}
			{
				echo " Er is geen eigenaanhistorie bekend<br>";

			}


			
//			echo "<br>HEADER BEREKENING <br><br>";
//			echo $item->HeaderBerekening->Consumentenprijs."<br>";
//			echo $item->HeaderBerekening->ConsumentenprijsInclOpties."<br>";
//			echo $item->HeaderBerekening->EersteToelating."<br>";
//			echo $item->HeaderBerekening->IsGevuld."<br>";
//			echo $item->HeaderBerekening->NieuwprijsAutotelex."<br>";
//			echo $item->HeaderBerekening->Optiebedrag."<br>";
//			echo $item->HeaderBerekening->PrijslijstDatum."<br>";
//			echo $item->HeaderBerekening->SelectedOptions."<br>";
		
			$sql = "INSERT INTO atheaderberekening (
				auto_id,
				Consumentenprijs, 
				ConsumentenprijsInclOpties, 
				EersteToelating,
				IsGevuld, 
				NieuwprijsAutotelex, 
				Optiebedrag, 
				PrijslijstDatum, 
				SelectedOptions) 
	
			VALUES (
				'$hvs_auto_id',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->Consumentenprijs )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->ConsumentenprijsInclOpties)."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->EersteToelating)."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->IsGevuld)."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->NieuwprijsAutotelex)."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->Optiebedrag)."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->PrijslijstDatum )."',
				'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->HeaderBerekening->SelectedOptions )."')";
			
				$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
				if ($resultquery){
					// echo "QUERY ok";
				} else {
//					echo "QUERY GAAT FOUT CHECK ";
				}			
		
		


			$sql = "INSERT INTO atimportreportdata (
			auto_id,
			AantalDeuren,
            BerekeningObv, 
            BouwDatum,
            BpmDeclarationNumber,
            Brandstof,
            CO2, 
            Camper, 
            DatumKeuringRDW, 
            DubbeleCabine, 
            EersteRegistratieInNL, 
            HoogDak,
            Identificatienummer, 
            Invuldatum, 
            Kenteken, 
            Kilometerstand, 
            Koetswerk, 
            Merk, 
            Model, 
            OfferteAangevraagd,
            Registratiedatum, 
            RestBPM, 
            Roetfilter, 
            TaxateurNaam, 
            Transmissie, 
            Uitvoering)
			
			VALUES (
			'$hvs_auto_id',
			'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->AantalDeuren)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->BerekeningObv)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->BouwDatum)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->BpmDeclarationNumber)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Brandstof)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->CO2)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Camper)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->DatumKeuringRDW)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->DubbeleCabine)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->EersteRegistratieInNL)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->HoogDak)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Identificatienummer)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Invuldatum)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Kenteken)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Kilometerstand)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Koetswerk)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Merk)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Model)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->OfferteAangevraagd)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Registratiedatum)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->RestBPM)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Roetfilter)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->TaxateurNaam)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Transmissie)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->ImportReportData->Uitvoering)."')";
			
			$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
			if ($resultquery){
				// echo "QUERY ok";
			} else {
//				echo "QUERY ImportReportData GAAT FOUT CHECK ";
			}

			/*
			echo "<br><br>VoertuigVariabelen<br>";

			echo $item->VoertuigVariabelen->Chassisnummer."<br>";
			echo $item->VoertuigVariabelen->kilometerstand."<br>";
			*/

			$sql = "INSERT INTO atuitgebreidegegevens (
			auto_id,
			Afschrijvingspercentage, 
            ApprovalDate, 
            ApprovalNumber, 
            BPM,
            BerekendeOptiebedrag,
            BijtellingHelpText,
            BijtellingHelpTextID, 
            Bijtellingspercentage, 
            BijtellingspercentageGeldigTot, 
            DubbeleCabine, 
            GemiddeldeStatijd, 
            IsTaxi,
            KentekenStatus, 
            Kleur,
            MotorCode, 
            Nieuwprijs,
            RDWBrandstofverbruikBuitenweg,
            RDWBrandstofverbruikGecombineerd,
            RDWBrandstofverbruikStad,
            RDWBreedteVoertuigMax, 
            RDWCo2emissie,
            RDWDatumAansprakelijkheid,
            RDWDatumEersteToelatingInternationaal,
            RDWDatumEersteToelatingNationaal,
            RDWDatumVervalAPK, 
            RDWEmissiecode, 
            RDWEnergielabel, 
            RDWEuroklasse, 
            RDWHandelsbenaming, 
            RDWHoogteVoertuigMax, 
            RDWInrichtingscode,
            RDWKleur2, 
            RDWLengteVoertuigMax,
            RDWMassaLedigVoertuig,
            RDWMassaRijklaar, 
            RDWMaximaleConstructieSnelheid, 
            RDWMaximumMassa, 
            RDWMaximumMassaGeremd, 
            RDWMaximumMassaOngeremd,
            RDWMerk, 
            RDWNieuwPrijsBekend, 
            RDWParallelImport, 
            RDWUitvoeringscode, 
            RDWVoertuigClassificatie,
            RDWVoertuigClassificatieCode, 
            RDWWAMVerzekerd, 
            RDWWOKStatusIndicator,
            RDWZitplaatsen,
            RestBPM, 
            TypeCode,
            VariantCode, 
            WijzeVanInvoer,
            WijzeVanInvoerHelpTextID)
			
			VALUES (
			'$hvs_auto_id',
			'".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->Afschrijvingspercentage)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->ApprovalDate)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->ApprovalNumber)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->BPM)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->BerekendeOptiebedrag)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->BijtellingHelpText)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->BijtellingHelpTextID)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->Bijtellingspercentage)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->BijtellingspercentageGeldigTot)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->DubbeleCabine)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->GemiddeldeStatijd)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->IsTaxi)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->KentekenStatus)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->Kleur)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->MotorCode)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->Nieuwprijs)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWBrandstofverbruikBuitenweg)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWBrandstofverbruikGecombineerd)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWBrandstofverbruikStad)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWBreedteVoertuigMax)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWCo2emissie)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWDatumAansprakelijkheid)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWDatumEersteToelatingInternationaal)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWDatumEersteToelatingNationaal)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWDatumVervalAPK)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWEmissiecode)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWEnergielabel)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWEuroklasse)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWHandelsbenaming)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWHoogteVoertuigMax)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWInrichtingscode)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWKleur2)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWLengteVoertuigMax)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMassaLedigVoertuig)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMassaRijklaar)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMaximaleConstructieSnelheid)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMaximumMassa)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMaximumMassaGeremd)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMaximumMassaOngeremd)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWMerk)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWNieuwPrijsBekend)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWParallelImport)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWUitvoeringscode)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWVoertuigClassificatie)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWVoertuigClassificatieCode)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWWAMVerzekerd)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWWOKStatusIndicator)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RDWZitplaatsen)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->RestBPM)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->TypeCode)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->VariantCode)."', 
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->WijzeVanInvoer)."',
            '".mysqli_real_escape_string( $_POST['GWIconnector'], $item->UitgebreideGegevens->WijzeVanInvoerHelpTextID)."')";
			
			$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
			if ($resultquery){
				// echo "QUERY ok";
			} else {
//				echo "QUERY UitgebreideGegevens GAAT FOUT CHECK ";
			}
			
			
			/*
			echo "UitgebreideGegevens <br>";
			echo $item->UitgebreideGegevens->Afschrijvingspercentage."<br>"; 
            echo $item->UitgebreideGegevens->ApprovalDate."<br>"; 
            echo $item->UitgebreideGegevens->ApprovalNumber."<br>"; 
            echo $item->UitgebreideGegevens->BPM."<br>";
            echo $item->UitgebreideGegevens->BerekendeOptiebedrag."<br>";
            echo $item->UitgebreideGegevens->BijtellingHelpText."<br>";
            echo $item->UitgebreideGegevens->BijtellingHelpTextID."<br>"; 
            echo $item->UitgebreideGegevens->Bijtellingspercentage."<br>"; 
            echo $item->UitgebreideGegevens->BijtellingspercentageGeldigTot."<br>"; 
            echo $item->UitgebreideGegevens->DubbeleCabine."<br>"; 
            echo $item->UitgebreideGegevens->GemiddeldeStatijd."<br>"; 
            echo $item->UitgebreideGegevens->IsTaxi."<br>";
            echo $item->UitgebreideGegevens->KentekenStatus."<br>"; 
            echo $item->UitgebreideGegevens->Kleur."<br>";
            echo $item->UitgebreideGegevens->MotorCode."<br>"; 
            echo $item->UitgebreideGegevens->Nieuwprijs."<br>";
            echo $item->UitgebreideGegevens->RDWBrandstofverbruikBuitenweg."<br>";
            echo $item->UitgebreideGegevens->RDWBrandstofverbruikGecombineerd."<br>";
            echo $item->UitgebreideGegevens->RDWBrandstofverbruikStad."<br>";
            echo $item->UitgebreideGegevens->RDWBreedteVoertuigMax."<br>"; 
            echo $item->UitgebreideGegevens->RDWCo2emissie."<br>";
            echo $item->UitgebreideGegevens->RDWDatumAansprakelijkheid."<br>";
            echo $item->UitgebreideGegevens->RDWDatumEersteToelatingInternationaal."<br>";
            echo $item->UitgebreideGegevens->RDWDatumEersteToelatingNationaal."<br>";
            echo $item->UitgebreideGegevens->RDWDatumVervalAPK."<br>"; 
            echo $item->UitgebreideGegevens->RDWEmissiecode."<br>"; 
            echo $item->UitgebreideGegevens->RDWEnergielabel."<br>"; 
            echo $item->UitgebreideGegevens->RDWEuroklasse."<br>"; 
            echo $item->UitgebreideGegevens->RDWHandelsbenaming."<br>"; 
            echo $item->UitgebreideGegevens->RDWHoogteVoertuigMax."<br>"; 
            echo $item->UitgebreideGegevens->RDWInrichtingscode."<br>";
            echo $item->UitgebreideGegevens->RDWKleur2."<br>"; 
            echo $item->UitgebreideGegevens->RDWLengteVoertuigMax."<br>";
            echo $item->UitgebreideGegevens->RDWMassaLedigVoertuig."<br>";
            echo $item->UitgebreideGegevens->RDWMassaRijklaar."<br>"; 
            echo $item->UitgebreideGegevens->RDWMaximaleConstructieSnelheid."<br>"; 
            echo $item->UitgebreideGegevens->RDWMaximumMassa."<br>"; 
            echo $item->UitgebreideGegevens->RDWMaximumMassaGeremd."<br>"; 
            echo $item->UitgebreideGegevens->RDWMaximumMassaOngeremd."<br>";
            echo $item->UitgebreideGegevens->RDWMerk."<br>"; 
            echo $item->UitgebreideGegevens->RDWNieuwPrijsBekend."<br>"; 
            echo $item->UitgebreideGegevens->RDWParallelImport."<br>"; 
            echo $item->UitgebreideGegevens->RDWUitvoeringscode."<br>"; 
            echo $item->UitgebreideGegevens->RDWVoertuigClassificatie."<br>";
            echo $item->UitgebreideGegevens->RDWVoertuigClassificatieCode."<br>"; 
            echo $item->UitgebreideGegevens->RDWWAMVerzekerd."<br>"; 
            echo $item->UitgebreideGegevens->RDWWOKStatusIndicator."<br>";
            echo $item->UitgebreideGegevens->RDWZitplaatsen."<br>";
            echo $item->UitgebreideGegevens->RestBPM."<br>"; 
            echo $item->UitgebreideGegevens->TypeCode."<br>";
            echo $item->UitgebreideGegevens->VariantCode."<br>"; 
            echo $item->UitgebreideGegevens->WijzeVanInvoer."<br>";
            echo $item->UitgebreideGegevens->WijzeVanInvoerHelpTextID."<br>";
		*/
		
//
//			echo "Waarde gegevens <br>";
//
//			echo $item->WaardeGegevens->DatumTaxatie."<br>";
			if (is_array($item->WaardeGegevens->Restwaarden->RestWaarden)){ 
//			echo "<br><br>Aantal Restwaarden ".count($item->WaardeGegevens->Restwaarden->RestWaarden)."<br>";
			foreach($item->WaardeGegevens->Restwaarden->RestWaarden as $hvs_restwaarden) {
//				echo " ".$hvs_restwaarden->BPM."<br>";
//				echo " ".$hvs_restwaarden->BTW."<br>";
//				echo " ".$hvs_restwaarden->ID."<br>";
//				echo " ".$hvs_restwaarden->Naam."<br>";
//				echo " ".$hvs_restwaarden->Percentage."<br>";
//				echo " ".$hvs_restwaarden->Waarde."<br>";
//				echo " ".$hvs_restwaarden->WaardeExclusief."<br>";
				
				$sql = "INSERT INTO atwaardegegevens (
					auto_id,
					BPM,
					BTW,
					telex_ID,
					Naam,
					Percentage,
					Waarde,
					WaardeExclusief)
				
					VALUES (
					'$hvs_auto_id',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->BPM)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->BTW)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->ID)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->Naam)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->Percentage)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->Waarde)."',
					'".mysqli_real_escape_string( $_POST['GWIconnector'], $hvs_restwaarden->WaardeExclusief)."')";
				
					$resultquery = mysqli_query( $_POST['GWIconnector'], $sql);
					if ($resultquery){
					// echo "QUERY ok";
					} else {
//						echo "QUERY waardegegevens GAAT FOUT CHECK ";
					}
					
				
			}	
			} 
			
			
		
			
 	
//		echo '<pre>';
        // print_r($item);
		
		// var_dump($item);
		
		
		
		
        echo '</pre>';
    }   

}
catch(Exception $e) {
die($e->getMessage());
}


            $_POST['URLset']=$_SESSION['ReturnToSenderDB'];
            echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=" . $_POST['URLset'] . "\">";
            exit;



            // einde data
        } else {

            RedirectLogout();
        }
    }
} else {

    RedirectLogout();
}


close_conn();
?>