<?php
include_once "engine/db_driver.php";
include_once "engine/db_driver1.php";
class base
{

	public function __construct()
	{
	}
	function setAccountInfo($obj)
	{
		$dbDriver = new db_driver();
		$sql = "INSERT INTO `users`(`firstName`,`lastName`, `emailAddress`, `usernames`, `password`,`status`) VALUES ('$obj->firstName','$obj->lastName','$obj->emailAddress','$obj->usernames','$obj->password', 1)";
		$dbDriver->query($sql);
	}
	function getAccountInfo($obj)
	{
		$dbDriver = new db_driver();
		$usr = $obj->username;
		$sql = "SELECT * FROM `expo_users` WHERE `expo_users_login` = '$usr'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getAccounttInfo($obj)
	{
		$dbDriver = new db_driver();
		$usr = $obj->username;
		$userPassword = $obj->userPassword;
		$sql = "SELECT * FROM `expo_users` WHERE `expo_users_login` = '$usr' AND `expo_users_password` = '$userPassword'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getAccountttInfo($obj)
	{
		$dbDriver = new db_driver();
		$EmailAddress = $obj->EmailAddress;
		$sql = "SELECT * FROM `users` WHERE `emailAddress` = '$EmailAddress' AND `password` = '$userPassword'";
		$sql = "INSERT INTO `logtable`(`emailAddress`) VALUES ('$obj->EmailAddress')";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}

	function getCarTypes()
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_type`";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getCarMark($carTypeID = 1, $active = 1)
	{
		$dbDriver = new db_driver();
		$sql = "SELECT * FROM `car_make` WHERE `id_car_type` = '$carTypeID'";
        if ($active == 0 || $active == 1)
            $sql .= " AND `active` = ".$active;
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
    function createCarMark($mark)
    {
        $dbDriver = new db_driver();
        $sql = "INSERT INTO `car_make` (`name`, `date_create`, `date_update`, `id_car_type`, `active`) VALUES ('".$mark->name."', '".$mark->date_create."', '".$mark->date_update."', '".$mark->id_car_type."', '".$mark->id_car_type."')";
        $dbDriver->query($sql);
        return $dbDriver->insert_id();
        //return $dbDriver->query("SELECT MAX(id_car_make) FROM `car_make`")->fetchColumn();
    }
    function updateCarMark($mark)
    {
        $dbDriver = new db_driver();
        $sql = "UPDATE `car_make` SET `name` = '".$mark->name."', `date_update` = '".$mark->date_update."', `active` = '".$mark->active."' WHERE `car_make`.`id_car_make` = " . $mark->id_car_make;
        $dbDriver->query($sql);
    }
	function getCarModel($markID, $active = 1)
	{
		$dbDriver = new db_driver();
		$sql = "SELECT * FROM `car_model` WHERE `id_car_make` = '$markID'";
        if ($active == 0 || $active == 1)
            $sql .= " AND `active` = ".$active;
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
    function createCarModel($model)
    {
        $dbDriver = new db_driver();
        $sql = "INSERT INTO `car_model` (`id_car_make`, `name`, `date_create`, `date_update`, `id_car_type`) VALUES ('".$model->id_car_make."', '".$model->name."', '".$model->date_create."', '".$model->date_update."', '".$model->id_car_type."')";
        $dbDriver->query($sql);
    }
    function updateCarModel($model)
    {
        $dbDriver = new db_driver();
        $sql = "UPDATE `car_model` SET `name` = '".$model->name."', `date_update` = '".$model->date_update."', `active` = '".$model->active."' WHERE `car_model`.`id_car_model` = " . $model->id_car_model;
        $dbDriver->query($sql);
    }
	function getCarGeneration($generationID)
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_generation` WHERE `id_car_model` = '$generationID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getCarSerie($serieID)
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_serie` WHERE `id_car_generation` = '$serieID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getCarTrim($trimID)
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_trim` WHERE `id_car_serie` = '$trimID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getCarMotor($modelID)
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_trim` WHERE `id_car_model` = '$modelID'";
		$dbDriver->querySelects($sql);


		return $dbDriver->fetchAssoc();
	}
	function getCarEquipment($equipmentID)
	{
		$dbDriver = new db_driver1();
		$sql = "SELECT * FROM `car_equipment` WHERE `id_car_trim` = '$equipmentID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function updateAccountInfoSettings($obj)
	{
		$dbDriver = new db_driver();
		$sql = "UPDATE `users` SET `firstName`='$obj->firstName',`lastName`='$obj->lastName',`emailAddress`='$obj->emailAddress'WHERE `userID`= '$obj->userID'";
		$dbDriver->query($sql, 'updateuser');
	}

	function getCarData($carID)
	{
		$dbDriver = new db_driver();
		//$sql = "SELECT * FROM `car` WHERE `dossierID` = '$carID'";
		$sql = "SELECT * FROM `dossier` LEFT JOIN `car` ON car.carID = dossier.carID WHERE dossier.dossierID='$carID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getConditionData($carID)
	{
		$dbDriver = new db_driver();
		//$sql = "SELECT * FROM `car` WHERE `dossierID` = '$carID'";
		$sql = "SELECT * FROM `car_condition_qt` WHERE `carID` ='$carID'";

		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function getExplanatoionData($carID)
	{
		$dbDriver = new db_driver();
		//$sql = "SELECT * FROM `car` WHERE `dossierID` = '$carID'";
		$sql = "SELECT * FROM `car_explanation_qt` WHERE `carID` ='$carID'";

		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}
	function inserBerekening($obj)
	{
		$dbDriver = new db_driver();
		$sql = "INSERT INTO `berekening_forms`(`priceType`,`vehicleType`, `make`, `model`, `generation`,`serie`,`trim`,`equipment`,`uitvoering`,`brandstofSoort`,`eersteToelating`,`huidigeDatumBPM`,`tenaamstellingNL`,`referentie`,`co2NEDC`,`co2WLTP`,`restwaardePercentage`,`inkoopprijsNettoBTW`,`afleverkosten`,`opknapkostenEX`,`transportBuitenland`,`transportBinnenland`,`taxatieKosten`,`kostenTotaal`,`fee`,`verkoopprijsNetto`,`btw`,`restBPMIndicatief`,`leges`,`verkoopprijsMarge`)
    VALUES ('$obj->priceType','$obj->vehicleType','$obj->make','$obj->model','$obj->generation','$obj->serie','$obj->trim','$obj->equipment','$obj->uitvoering','$obj->brandstofSoort','$obj->eersteToelating','$obj->huidigeDatumBPM','$obj->tenaamstellingNL','$obj->referentie','$obj->co2NEDC','$obj->co2WLTP','$obj->restwaardePercentage','$obj->inkoopprijsNettoBTW','$obj->afleverkosten','$obj->opknapkostenEX','$obj->transportBuitenland','$obj->transportBinnenland','$obj->taxatieKosten','$obj->kostenTotaal','$obj->fee','$obj->verkoopprijsNetto','$obj->btw','$obj->restBPMIndicatief','$obj->leges','$obj->verkoopprijsMarge')";
		$dbDriver->query($sql, 'calculatorinsert');
	}
	function inserDossier($obj)
	{
		$dbDriver = new db_driver();


		$sql = "INSERT INTO `car`(`car_merk`,`car_model`, `uitvoering`, `motor`, `brandstof`,`productiedatum`,`tenaamstellingNL`,`co2`)
    VALUES ('$obj->make','$obj->model','$obj->uitvoering','$obj->trim','$obj->brandstofSoort','$obj->huidigeDatumBPM','$obj->tenaamstellingNL','$obj->co2WLTP')";
		$dbDriver->query($sql, 'calculatorinsert');
		$id = $dbDriver->insert_id();
		$userID = $_SESSION['user'][0]['expo_users_ID'];
		$rand = bin2hex(openssl_random_pseudo_bytes(5));
		$folderName =  $id . $userID . $rand;
		$folder = $_SERVER['DOCUMENT_ROOT'] . '/files/' . $folderName;
		$photos = $folder . '/images';
		$docs = $folder . '/docs';
		mkdir($folder, 0755);
		mkdir($photos, 0755);
		mkdir($docs, 0755);
		$sql = "INSERT INTO dossier (carID, doc_directory, created_by) VALUES ('$id', '$folderName', '$userID') ";
		$dbDriver->query($sql, 'createdossier');
		$dossierid = $dbDriver->insert_id();
		$sql = "UPDATE `car` SET `dossierID`='$dossierid' WHERE carID ='$id'";
		$dbDriver->query($sql, 'setDossierID');
	}

	function updateDossier($obj)
	{
		$dbDriver = new db_driver();
		$sql = "UPDATE `car` SET
    `car_merk`='$obj->carMarkDip'
    ,`car_model`='$obj->dossierReferentie'
    ,`uitvoering`='$obj->uitvoering'
    ,`motor`='$obj->motor'
    ,`brandstof`='$obj->brandstof'
    ,`transmissie`='$obj->transmissie'
    ,`transmissieSoort`='$obj->transmissieSoort'
    ,`kleur`='$obj->kleur'
    ,`productiedatum`='$obj->datumEersteToelating'
    ,`tenaamstellingNL`='$obj->eersteTenaamstellingNL'
    ,`co2`='$obj->co2'
    ,`km_stand`='$obj->kmStand'
    ,`levering_soort`='$obj->leveringSoort'
    ,`vinnummer`='$obj->vinnummer'
    ,`kenteken`='$obj->kenteken'
    ,`km_verwacht`='$obj->kmVerwacht'
    ,`plaat_afgifte_code`='$obj->plaatAfgifteCode'
    ,`interieur_kleur`='$obj->interieurKleur'
    ,`bevestigd`='$obj->bevestigd'
    ,`tijdelijk_nummer`='$obj->documentnr'
    ,`laatste_tenaamstelling`='$obj->laatsteTenaamstelling'
    ,`tenaam_stellings_code`='$obj->tenaamStellingsCode'
    ,`tag`='$obj->tag'
    WHERE `carID` = '$obj->carID'";
		$dbDriver->query($sql, 'updatedossier');
	}

	function updateHighlights($obj)
	{
		$dbDriver = new db_driver();
		$carInDB = "SELECT * FROM `car_condition_qt` WHERE `carID`='$obj->carID' AND `clientID`='$obj->activeUser'";
		$dbDriver->querySelects($carInDB);
		$data = $dbDriver->fetchAssoc();
		if ($data) {
			$sql =  "UPDATE `car_condition_qt` SET `conditionTitle`= '$obj->highlightsTitle', `conditionText`= '$obj->highlightsText' WHERE `carID`='$obj->carID' AND `clientID`='$obj->activeUser'";
		} else {
			$sql = "INSERT INTO `car_condition_qt`(`carID`,`clientID`, `conditionTitle`, `conditionText`) 
      VALUES ('$obj->carID','$obj->activeUser','$obj->highlightsTitle','$obj->highlightsText')";
		}
		$dbDriver->query($sql, 'updateHighlights');
	}

	function updateToelichting($obj)
	{
		$dbDriver = new db_driver();
		$carInDB = "SELECT * FROM car_explanation_qt WHERE `carID`='$obj->carID' AND `clientID`='$obj->activeUser'";
		$dbDriver->querySelects($carInDB);
		$data = $dbDriver->fetchAssoc();
		if ($data) {
			$sql = "UPDATE `car_explanation_qt` SET `explanationTitle`= '$obj->toelichtingTitle', `explanationText`= '$obj->toelichtingText' WHERE `carID`='$obj->carID' AND `clientID`='$obj->activeUser'";
		} else {
			$sql = "INSERT INTO `car_explanation_qt`(`carID`,`clientID`, `explanationTitle`, `explanationText`) 
      VALUES ('$obj->carID','$obj->activeUser','$obj->toelichtingTitle','$obj->toelichtingText')";
		}
		$dbDriver->query($sql, 'updateToelichting');
	}

	public function getAllCreditors()
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM creditor";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getFuelAllFuelTypes()
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM conversie_tabel_gwi WHERE `conversie_soort` = 'brandstof'";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getAllTransmitions()
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM conversie_tabel_gwi WHERE `conversie_soort` = 'transmissie'";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getAllCarDoors()
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM conversie_tabel_gwi WHERE `conversie_soort` = 'aantal_deuren'";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function createCar($post)
	{
		$dbDriver = new db_driver();

		$dbDriver->dbCon->beginTransaction();
		
		$transmissies = explode("|", $post['transmissieSoort']);
		$transmissie = $transmissies[1];
		$transmissieSoort = $transmissies[0];

		try {
						
			$query = "INSERT INTO car 
		(
			car_merk,
			car_model,
			uitvoering,
			aantal_deuren,
			motor, 
			brandstof, 
			transmissieSoort,
			productiedatum,
			co2,
			kleur,
			dossierID,
			km_stand,
			vinnummer,
			kenteken,
			levering,
			transmissie,
			huidigland,
			optie,
			opmerkingen,
			auto_referentie,
			custom_ref
		) 
			VALUES (
							
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?
			)";

			$stmt = $dbDriver->dbCon->prepare($query);
			$stmt->execute(
				[
					$post['carMark'],
					$post['carModel'],
					$post['caUitvoering'],
					$post['doors_number'],
					$post['carModification'],
					$post['BPMbrandstof'],
					$transmissieSoort,
					$post['productiedatum'],
					$post['BPMCO2'],
					$post['kleur'],
					$dbDriver->dbCon->lastInsertId(),
					$post['km_stand'],
					$post['vinnummer'],
					$post['kenteken'],
					$post['levering'],
					$transmissie,
					$post['huidigland'],
					$post['opties'],
					$post['opmerkingen'],
					$post['auto_referentie'],
					$post['custom_ref']					
				]
			);
			$last_car_id = $dbDriver->dbCon->lastInsertId();

			$query2 = "INSERT INTO dossier (carID, created_by) VALUES (?, ?)";
			$stmt2 = $dbDriver->dbCon->prepare($query2);
			$stmt2->execute([$last_car_id, $_SESSION['user'][0]['expo_users_ID']]);
			$last_dossier_id = $dbDriver->dbCon->lastInsertId();


			$stmt3 = $dbDriver->dbCon->prepare("UPDATE car SET dossierID = ? WHERE carID = ? ");
			$stmt3->execute([$last_dossier_id, $last_car_id]);


			$query4 = "INSERT INTO berekening_forms ( 
				vehicleType,
				make,
				model,
				`trim`,
				brandstofSoort,
				eersteToelating,
				co2NEDC,
				co2WLTP
			)
			 VALUES (
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?
			)";
			$stmt4 = $dbDriver->dbCon->prepare($query4);
			$productiedatum = explode("-", $post['productiedatum'])[0];
			$stmt4->execute([
				1,
				$post['carMark'],
				$post['carModel'],
				$post['carModification'],
				$post['BPMbrandstof'],
				$productiedatum,
				$post['BPMCO2'],
				$post['BPMCO2WLTP']

			]);

		} catch (Exception $e) {
			$dbDriver->dbCon->rollBack();
			echo 'Error: ' .  $e->getMessage() . "\n";
		}

		$dbDriver->dbCon->commit();
	}

	public function getAllCars() {
		$dbDriver = new db_driver();

		$sql = "SELECT * FROM dossier
		LEFT JOIN car ON car.carID = dossier.carID
		INNER JOIN car_make cm on car.car_merk = cm.id_car_make 
		INNER JOIN car_model cmod on car.car_model = cmod.id_car_model
		INNER JOIN car_type ct on cmod.id_car_type = ct.id_car_type
		INNER JOIN conversie_tabel_gwi ctw on car.brandstof = ctw.conversie_tabel_ID
		";
		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);
		

		return $result;
	}

	public function getCarInfo($car_id) {
		$dbDriver = new db_driver();

		$sql = "SELECT * FROM dossier
		LEFT JOIN car ON car.carID = dossier.carID
		INNER JOIN car_make cm on car.car_merk = cm.id_car_make 
		INNER JOIN car_model cmod on car.car_model = cmod.id_car_model
		INNER JOIN car_type ct on cmod.id_car_type = ct.id_car_type
		INNER JOIN conversie_tabel_gwi ctw on car.brandstof = ctw.conversie_tabel_ID
		WHERE car.carID = ?";

		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([$car_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function updateCarInfo($post, $car_id) {

		$dbDriver = new db_driver();

		// $dbDriver->dbCon->beginTransaction();
		
		$transmissies = explode("|", $post['transmissieSoort']);
		$transmissie = $transmissies[1];
		$transmissieSoort = $transmissies[0];

	
		// try {
			$query1 = "UPDATE car SET 
			car_merk = ?,
			car_model = ?,
			uitvoering = ?,
			aantal_deuren = ?,
			motor = ?,
			brandstof = ?, 
			transmissieSoort = ?,
			productiedatum = ?,
			co2 = ?,
			kleur = ?,
			dossierID = ?,
			km_stand = ?,
			vinnummer = ?,
			kenteken = ?,
			levering = ?,
			transmissie = ?,
			huidigland = ?,
			optie = ?,
			opmerkingen = ?,
			auto_referentie = ?,
			custom_ref = ?
			WHERE carID = ?";


			$stmt1 = $dbDriver->dbCon->prepare($query1);
			$stmt1->execute(
				[
					$post['carMark'],
					$post['carModel'],
					$post['caUitvoering'],
					$post['doors_number'],
					$post['carModification'],
					$post['BPMbrandstof'],
					$transmissieSoort,
					$post['productiedatum'],
					$post['BPMCO2'],
					$post['kleur'],
					$car_id,
					$post['km_stand'],
					$post['vinnummer'],
					$post['kenteken'],
					$post['levering'],
					$transmissie,
					$post['huidigland'],
					$post['opties'],
					$post['opmerkingen'],
					$post['auto_referentie'],
					$post['custom_ref'],										
					$car_id
				]
			);

			// // QUERY 2

			// $query2 = "UPDATE berekening_forms SET
			// 	vehicleType = ?,
			// 	make = ?,
			// 	model = ?,
			// 	`trim` = ?,
			// 	brandstofSoort = ?,
			// 	eersteToelating = ?,
			// 	co2NEDC = ?,
			// 	co2WLTP = ?
			// 	WHERE 
		 	// ";

			// $stmt2 = $dbDriver->dbCon->prepare($query2);
			// $productiedatum = explode("-", $post['productiedatum'])[0];
			// $stmt2->execute([
			// 	1,
			// 	$post['carMark'],
			// 	$post['carModel'],
			// 	$post['carModification'],
			// 	$post['BPMbrandstof'],
			// 	$productiedatum,
			// 	$post['BPMCO2'],
			// 	$post['BPMCO2WLTP']
			// ]);


			
		// }catch (Exception $e) {
		// 	$dbDriver->dbCon->rollBack();
		// 	echo 'Error: ' .  $e->getMessage() . "\n";
		// }
	}

	public function insertCalculation($_request)  {

		$dbDriver = new db_driver();

		
		
		$calculation_for_car_id=$_request['fromCarView'];
		$inkoopprijs_ex_ex=$_request['inkoopprijs_ex_ex'];
		$feeleverancier=$_request['feeleverancier'];
		$inkoopprijstotaal=$_request['taxatie_kosten1'];
		$opknapkosten=$_request['opknapkosten_ex'];
		$transport_buitenland=$_request['transport_buitenland'];
		$transport_binnenland=$_request['transport_binnenland'];
		$taxatie_kosten=$_request['taxatie_kosten'];
		$totaalkosten=$_request['taxatie_kosten1'];
		$fee=$_request['fee'];
		$verkoopprijs_ex=$_request['verkoopprijs_netto'];
		$btw=$_request['btw'];
		$verkoopprijsbtw=$_request['addVerkoopprijs_Marge_incl'];
		$restbpm=$_request['gekozen_bpm_bedrag'];
		$leges=$_request['leges'];
		$verkoopprijsin=$_request['addVerkoopprijs_Marge_incl'];
		$SoortVoertuig=$_request['SoortVoertuig'];
		$BPMbrandstof=$_request['BPMbrandstof'];
		$huidigedatumbpm=$_request['huidigedatumbpm'];
		$referentie=$_request['referentie'];
		$BPMproductiedatum=$_request['BPMproductiedatum'];
		$BPMtenaamstellingNL=$_request['BPMtenaamstellingNL'];
		$carUitvoering=$_request['caUitvoering'];
		$BPMCO2=$_request['BPMCO2'];
		$BPMCO2WLTP=$_request['BPMCO2WLTP'];
		$percentage=$_request['percentage'];
		$delivery_costs=$_request['delivery_costs'];
		$inkoopprijs_btw=$_request['inkoopprijs_btw'];

		  // $dbDriver = new db_driver();
        $sql = "INSERT INTO calculations (
			calculation_for_car_id,
			inkoopprijs_ex_ex,
			feeleverancier,
			inkoopprijstotaal,
			opknapkosten,
			transport_buitenland,
			transport_binnenland,
			taxatie_kosten,
			totaalkosten,
			fee,
			verkoopprijs_ex,
			btw,
			verkoopprijsbtw,
			restbpm,
			leges,
			verkoopprijsin,
			SoortVoertuig,
			BPMbrandstof,
			huidigedatumbpm,
			referentie,
			BPMproductiedatum,
			BPMtenaamstellingNL,
			carUitvoering,
			BPMCO2,
			BPMCO2WLTP,
			percentage,
			delivery_costs,
			inkoopprijs_btw
		) VALUES (
			'$calculation_for_car_id',
		'$inkoopprijs_ex_ex',
		'$feeleverancier',
		'$inkoopprijstotaal',
		'$opknapkosten',
		'$transport_buitenland',
		'$transport_binnenland',
		'$taxatie_kosten',
		'$totaalkosten',
		'$fee',
		'$verkoopprijs_ex',
		'$btw',
		'$verkoopprijsbtw',
		'$restbpm',
		'$leges',
		'$verkoopprijsin',
		'$SoortVoertuig',
		'$BPMbrandstof',
		'$huidigedatumbpm',
		'$referentie',
		'$BPMproductiedatum',
		'$BPMtenaamstellingNL',
		'$carUitvoering',
		'$BPMCO2',
		'$BPMCO2WLTP',
		'$percentage',
		'$delivery_costs',
		'$inkoopprijs_btw'
		)";
        $dbDriver->query($sql);

	}

	public function getAllCalculations() {

		$dbDriver = new db_driver();

		$query = "SELECT * FROM calculations";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);

		return $result;
	}

	public function connectCalculationCar($calculation_id, $car_id) {
		$dbDriver = new db_driver();

		$query = "UPDATE calculations SET calculation_for_car_id = ? WHERE calclulation_id =?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id, $calculation_id]);
	}

	public function getCarCalculations($car_id) {
        $dbDriver = new db_driver();
        $query = "SELECT * FROM calculations WHERE calculation_for_car_id = ?";
        $stmt = $dbDriver->dbCon->prepare($query);
        $stmt->execute([$car_id]);
        $result = $stmt->fetchAll(PDO::FETCH_NAMED);
        return $result;
    }

	public function duplicateCar($obj) {
		$dbDriver = new db_driver();


		// $query = "INSERT INTO car (";
		// foreach($obj as $key => $val) {
		// 	$query .= "`$key`, ";
		// 	echo $obj->gettype($key);
		// }
		// $query = substr($query, 0, -2);
		// $query .= ") VALUES (";

		// foreach($obj as $value) { 
		// 	$query .= "$value, ";
		// }

		// $query = substr($query, 0, -2);

		// $query .= ")";

		$query = "DROP TABLE IF EXISTS temp_car_table;
		CREATE TEMPORARY TABLE IF NOT EXISTS temp_car_table AS (SELECT * FROM car WHERE carID=58);
		ALTER TABLE temp_car_table DROP carID;
		SELECT * FROM temp_car_table;";

		
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		// $this->createCar($result);

	}

}


