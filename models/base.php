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
		$userPassword = $obj->userPassword;
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

	public function getAllCarMakes() {

		$dbDriver = new db_driver();

		$sql = "SELECT * FROM car_makes";

		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;

	}

	function getCarMark($carTypeID = 1, $active = 1)
	{

		$dbDriver = new db_driver();
		$sql = "SELECT * FROM `car_makes` WHERE cmake_active = 1";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}

	public function getCarBrandByName($brand_name)
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_make WHERE `name` = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$brand_name]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getModelByName($model_name)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_model WHERE `name` = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$model_name]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getCarVersiesByModelName($model_name)
	{
		$dbDriver = new db_driver();

		$car_model = $this->getModelByName($model_name);

		$query = "SELECT id_car_generation, `name` FROM car_generation WHERE id_car_model = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_model['id_car_model']]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	function createCarMark($mark)
	{
		$dbDriver = new db_driver();
		$sql = "INSERT INTO `car_makes` (cmake_name) VALUES ('" . $mark->cmake_name . "')";

		$dbDriver->query($sql);
		return $dbDriver->insert_id();
		//return $dbDriver->query("SELECT MAX(id_car_make) FROM `car_make`")->fetchColumn();
	}
	function updateCarMark($mark)
	{
		$dbDriver = new db_driver();

		$sql = "UPDATE `car_makes` SET `cmake_name` = '" . $mark->name . "' WHERE cmake_id = " . $mark->id_car_make;
		$dbDriver->query($sql);
	}

	function getCarModelByBrandName($_get_value, $active = 1)
	{
		$dbDriver = new db_driver();

		$query = "SELECT * FROM car_makes cm INNER JOIN car_models cmod on cm.cmake_id = cmod.cmod_id
		WHERE cm.name = ? ";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$_get_value]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
	function getCarModel($markID, $active = 1)
	{

		$dbDriver = new db_driver();
		$sql = "SELECT * FROM `car_models` WHERE `cmodel_make_id` = '$markID'";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}

	function createCarModel($model)
	{
		$dbDriver = new db_driver();
		$sql = "INSERT INTO `car_models` (`cmodel_make_id`, `cmodel_name`) VALUES ('" . $model->id_car_make . "', '" . $model->name . "')";
		$dbDriver->query($sql);
	}


	function updateCarModel($model)
	{
		$dbDriver = new db_driver();
		$sql = "UPDATE `car_models` SET `cmodel_name` = '" . $model->name . "' WHERE `cmodel_id` = " . $model->id_car_model;
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
	public function getCarMotorByModelName($model_name)
	{

		$dbDriver = new db_driver();
		$query = "SELECT ct.name, ct.id_car_trim FROM car_model cm INNER JOIN car_trim ct on cm.id_car_model = ct.id_car_model 
		WHERE cm.name = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$model_name]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);
		return $result;
	}

	public function getGenerationByModelName($model_name)
	{
		$dbDriver = new db_driver();
		$query = "SELECT ct.name FROM car_model cm INNER JOIN car_trim ct on cm.id_car_model = ct.id_car_model 
		WHERE cm.name = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$model_name]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);
		return $result;
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

	function getLangs()
	{
		$dbDriver = new db_driver();
		$sql = "SELECT `langID`, `lang`, `langfull` FROM `lang`";
		$dbDriver->query($sql);
		return $dbDriver->fetchAssoc();
	}

	function setLang($userID, $langID)
	{
		$dbDriver = new db_driver();
		$sql = "UPDATE `expo_users` SET `langID`='$langID' WHERE expo_users_ID = $userID";
		$dbDriver->query($sql);
	}

	function getTranslate($langID)
	{
		$dbDriver = new db_driver();
		$sql = "SELECT `label`, `description` FROM `translate` WHERE `langID`= $langID";
		$dbDriver->query($sql);
		return $dbDriver->fetchAssoc();
	}

	function getTranslations()
	{
		$dbDriver = new db_driver();
		$sql = "SELECT e.transID, e.label, e.description, u.langID, u.langfull FROM `translate` e LEFT JOIN `lang` u ON u.langID = e.langID";
		$dbDriver->query($sql);
		return $dbDriver->fetchAssoc();
	}

	function getLangTranslations($lang_id, $page_name = NULL) {
		$dbDriver = new db_driver();
		if(!is_null($page_name)) {
			$query = "SELECT * FROM translate WHERE `langID` = ? AND page_name = ?";
			$stmt = $dbDriver->dbCon->prepare($query);
			$stmt->execute([$lang_id, $page_name]);
			
		}else {
			$query = "SELECT * FROM translate WHERE `langID` = ?";
			$stmt = $dbDriver->dbCon->prepare($query);
			$stmt->execute([$lang_id]);
		}
		
	
		$result = array();
		while($lang = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[$lang['label']] = $lang['description'];
		}


		return $result;
	}

	public function getCarDocuments($car_id)
	{

		$dbDriver = new db_driver();
		// $dbDriver->dbCon->beginTransaction();

		// try {

		$query = "SELECT * FROM car_documents WHERE cd_car_id = ? ORDER BY cd_id DESC";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}




	function getCarData($carID)
	{
		$dbDriver = new db_driver();
		//$sql = "SELECT * FROM `car` WHERE `dossierID` = '$carID'";
		$sql = "SELECT * FROM `dossier` LEFT JOIN `cars` ON cars.car_id = dossier.carID WHERE dossier.dossierID='$carID'";
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


		$sql = "INSERT INTO `cars`(`car_mаке`,`car_model`, `car_uitvoering`, `car_motor`, `car_fuel`)
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
		$sql = "UPDATE `cars` SET
    `car_mаке`='$obj->carMarkDip'
    ,`car_model`='$obj->dossierReferentie'
    ,`car_uitvoering`='$obj->uitvoering'
    ,`car_motor`='$obj->motor'
    ,`car_fuel`='$obj->brandstof'
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
		$query = "SELECT * FROM conversions
		INNER JOIN translate on conversions.conversion_name = translate.label AND translate.langID = ?
		WHERE `conversion_type` = 'fuel'";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$_SESSION['user'][0]['langID']]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function addCarMerk($_post)
	{

		$dbDriver = new db_driver();
		$query1 = "INSERT INTO car_trim (id_car_model, id_car_serie, `name`, fuel_name) VALUES (
			?,
			?,
			?,
			?
		)";

		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt1->execute([$_post['modelId'], 458, $_post['addMotor'], $_post['fuelName']]);
		$motor_id = $dbDriver->dbCon->lastInsertId();



		// QUERY 3 
		$query3 = "INSERT INTO car_generation (id_car_model, `name`) VALUES (
			?,
			?
		)";

		$stmt3 = $dbDriver->dbCon->prepare($query3);
		$stmt3->execute([$_post['modelId'], $_post['generationName']]);
	}

	public function getAllUsers()
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM expo_users";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getMotorsByMake($make_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_motors WHERE cmotor_make_id = ?";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getModelsByMake($make_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_models WHERE cmodel_make_id = ?";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getUitvoeringsByMake($make_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_make_uitvoerings WHERE cmu_make_id = ?";


		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getFuelByMake($make_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT cmotor_fuel_id, conv.conversion_name  FROM car_motors
		INNER JOIN conversions conv on conv.conversion_id = car_motors.cmotor_fuel_id
		 WHERE cmotor_id = ?";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getFuelByMotor($motor_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT cmotor_fuel_id, translate.description  FROM car_motors
		INNER JOIN conversions conv on conv.conversion_id = car_motors.cmotor_fuel_id
		INNER JOIN translate on conv.conversion_name = translate.label AND translate.langID = ?
		 WHERE cmotor_id = ?";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$_SESSION['user'][0]['langID'], $motor_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getMotorsByFuel($fuel_id, $make_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_motors WHERE cmotor_fuel_id = $fuel_id AND cmotor_make_id = $make_id";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$fuel_id, $make_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getFuelsByMotor($motor_id)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM conversions conv
		INNER JOIN car_motors cm on conv.conversion_id = cm.cmotor_fuel_id
		WHERE cm.cmotor_id = $motor_id";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$motor_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function createMotor($_post)
	{

		$dbDriver = new db_driver();
		$query1 = "INSERT INTO car_motors (cmotor_name, cmotor_fuel_id, cmotor_make_id) VALUES (
			?,
			?,
			?
		)";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$stmt1->execute([$_post['create_motor_name'], $_post['fuelType'], $_post['car_make']]);
	}

	public function createUitvoering($_post)
	{

		$dbDriver = new db_driver();

		$query1 = "INSERT INTO car_make_uitvoerings (cmu_name, cmu_make_id) VALUES (?,?)";

		// $dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$stmt1->execute([$_post['uitvoering_create'], $_post['car_make']]);
	}

	public function getFuelByMotorName($motor_name)
	{

		$dbDriver = new db_driver();
		$query = "SELECT * FROM ";

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

	public function removeImage($delPos, $movedNum)
	{
		$dbDriver = new db_driver();

		$query = "DELETE FROM car_photos
		WHERE cp_imagepos = ?; ";

		for($i = 1; $i <= $movedNum; $i++)
			$query = $query . "UPDATE car_photos
			SET cp_imagepos = cp_imagepos - 1
			WHERE cp_imagepos = " . ($delPos + $i) . "; ";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbDriver->dbCon->prepare($query);


		$stmt->execute(
			[
				$delPos
			]
		);
	}

	public function deleteCar($car_id)
	{
		$dbDriver = new db_driver();

		$query = "DELETE FROM cars WHERE ";
	}

	public function createDuplicateEntry($car_id, $dpNum, $newCarId)
	{
		$dbDriver = new db_driver();

		$query = "INSERT INTO duplicates
		(
			dp_basefile,
			dp_num,
			dp_newfile
		)
		VALUES (
			?,
			?,
			?
		)";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbDriver->dbCon->prepare($query);

		$stmt->execute(
			[
				$car_id,
				$dpNum,
				$newCarId
			]
		);
	}

	public function createCar($_post)
	{
		$dbDriver = new db_driver();

		// $dbDriver->dbCon->beginTransaction();

		// Convert the dates - dosn't work in JS
		$_post['first_registration_date'] = date("Y-m-d", strtotime($_post['first_registration_date']));
		$_post['first_nl_registration'] = date("Y-m-d", strtotime($_post['first_nl_registration']));
		$_post['first_name_nl_registration'] = date("Y-m-d", strtotime($_post['first_name_nl_registration']));
		$_post['last_name_registration'] = date("Y-m-d", strtotime($_post['last_name_registration']));
		$_post['apk_valid'] = date("Y-m-d", strtotime($_post['apk_valid']));

		if (isset($_post['preorder'])) {
			$_post['preorder'] = 1;
		} else {
			$_post['preorder'] = 0;
		}

		// try {
		$query = "INSERT INTO cars
        (
			car_vehicle_type,
            car_make,
            car_model,
            car_variant,
			car_fuel,
			car_body_style,
			car_preorder,
			car_vat_marge,
			car_source,
			car_source_id,
			`updated_by_id`,
			`user_id`
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
				?
            )";
		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbDriver->dbCon->prepare($query);

		$stmt->execute(
			[
				$_post['car_vehicle_type'],
				$_post['car_make'],
				$_post['car_model'],
				$_post['car_variant'],
				$_post['car_fuel'],
				$_post['car_body_style'],
				$_post['preorder'] ? '1' : '0',
				$_post['switchmargin'] ? '1' : '0',
				$_post['source'] ? '1' : '0',
				$_post['source_id'],
				$_SESSION['user'][0]['expo_users_ID'],
				$_SESSION['user'][0]['expo_users_ID']

			]
		);

		$inserted_car_id = $dbDriver->dbCon->lastInsertId();

		// INSERT INTO car_details 
		$query = "INSERT INTO car_details ( cd_car_id,
				cd_preorder,
				cd_car_ref_custom,
				cd_vin,
				cd_conf_number,
				cd_komm_number,
				cd_advert_link,
				cd_source_supplier,
				cd_supplier_ref,
				cd_current_registration,
				cd_coc,
				cd_status,
				cd_model_additional,
				cd_variant_additional,
				cd_fuel_type,
				cd_motor,
				cd_motor_additional,
				cd_transmission,
				cd_transmission_additional,
				cd_power_kpw,
				cd_cubic_capacity,
				cd_co_wltp,
				cd_co_nedc,
				cd_kilometers,
				cd_paint_type,
				cd_color,
				cd_color_additional,
				cd_interior_color,
				cd_interior_color_additional,
				cd_interior_material,
				cd_first_registration_date,
				cd_first_nl_registration,
				cd_first_name_nl_registration,
				cd_last_name_registration,
				cd_nl_registration_number,
				cd_meldcode,
				cd_apk_valid, 
				cd_navigation,
				cd_keyless_entry,
				cd_app_connect,
				cd_airco,
				cd_roof,
				cd_wheels,
				cd_headlights,
				cd_pdc,
				cd_cockpit,
				cd_camera,
				cd_cruise_control,
				cd_tow_bar,
				cd_sport_seats,
				cd_sport_package,
				cd_seats_electric,
				cd_seat_heating,
				cd_seat_massage,
				cd_optics,
				cd_tinted_windows,
				cd_options,
				cd_notes
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
				$inserted_car_id,
				$_post['preorder'],
				$_post['car_ref_custom'],
				$_post['vin'],
				is_null($_post['conf_number']) ? 0 : intval($_post['conf_number']),
				$_post['komm_number'],
				$_post['advert_link'],
				$_post['source_supplier'],
				$_post['supplier_ref'],
				$_post['current_registration'],
				$_post['coc'],
				$_post['status'],
				$_post['model_additional'],
				$_post['variant_additional'],
				$_post['car_fuel'],
				$_post['motor'],
				$_post['motor_additional'],
				$_post['transmission'],
				$_post['transmission_additional'],
				$_post['power_kpw'],
				$_post['cubic_capacity'],
				$_post['co_wltp'],
				$_post['co_nedc'],
				$_post['kilometers'],
				$_post['paint_type'] ? 1 : 0,
				$_post['color'],
				$_post['color_additional'],
				$_post['interior_color'],
				$_post['interior_color_additional'],
				$_post['interior_material'],
				$_post['first_registration_date'],
				$_post['first_nl_registration'],
				$_post['first_name_nl_registration'],
				$_post['last_name_registration'],
				$_post['nl_registration_number'],
				$_post['meldcode'],
				$_post['apk_valid'],
				$_post['navigation'],
				$_post['keyless_entry'],
				$_post['app_connect'],
				$_post['airco'],
				$_post['roof'],
				$_post['wheels'],
				$_post['headlights'],
				$_post['pdc'],
				$_post['cockpit'],
				$_post['camera'],
				$_post['cruise_control'],
				$_post['tow_bar'],
				$_post['sport_seats'],
				$_post['sport_package'],
				$_post['seats_electric'],
				$_post['seat_heating'],
				$_post['seat_massage'],
				$_post['optics'],
				$_post['tinted_windows'],
				$_post['options'],
				$_post['notes']

			]
		);



		// exit;

		// } catch (Exception $e) {
		//     $dbDriver->dbCon->rollBack();
		//     echo 'Error: ' .  $e->getMessage() . "\n";
		// }
		// $dbDriver->dbCon->commit();


		$this->createCalculation($_post, $inserted_car_id);

		return $inserted_car_id;
	}


	public function updateCar($_post, $car_id)
	{
		$dbDriver = new db_driver();

		// Convert the dates - dosn't work in JS
		$_post['first_registration_date'] = date("Y-m-d", strtotime($_post['first_registration_date']));
		$_post['first_nl_registration'] = date("Y-m-d", strtotime($_post['first_nl_registration']));
		$_post['first_name_nl_registration'] = date("Y-m-d", strtotime($_post['first_name_nl_registration']));
		$_post['last_name_registration'] = date("Y-m-d", strtotime($_post['last_name_registration']));
		$_post['apk_valid'] = date("Y-m-d", strtotime($_post['apk_valid']));

		if (isset($_post['preorder'])) {
			$_post['preorder'] = 1;
		} else {
			$_post['preorder'] = 0;
		}

		// try {
		$query = "UPDATE cars SET
			car_vehicle_type = ?,
            car_make = ?,
            car_model = ?,
            car_variant = ?,
			car_fuel = ?,
			car_body_style = ?,
			car_preorder = ?,
			car_vat_marge = ?,
			car_source = ?,
			car_source_id = ?,
			`user_id` = ?
			WHERE car_id = ?
           ";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbDriver->dbCon->prepare($query);

		$stmt->execute(
			[
				$_post['car_vehicle_type'],
				$_post['car_make'],
				$_post['car_model'],
				$_post['car_variant'],
				$_post['car_fuel'],
				$_post['car_body_style'],
				$_post['preorder'] ? '1' : '0',
				$_post['switchmargin'] ? '1' : '0',
				$_post['source'] ? '1' : '0',
				$_post['source_id'],
				$_SESSION['user'][0]['expo_users_ID'],
				$car_id

			]
		);

		// echo '<pre>';
		// var_dump($_post);
		// echo '</pre>';
		// exit;

		// UPDATE `car_details` table 
		$query = "UPDATE car_details SET
				cd_preorder = ?,
				cd_car_ref_custom = ?,
				cd_vin = ?,
				cd_conf_number = ?,
				cd_komm_number = ?,
				cd_advert_link = ?,
				cd_source_supplier = ?,
				cd_supplier_ref = ?,
				cd_current_registration = ?,
				cd_coc = ?,
				cd_status = ?,
				cd_model_additional = ?,
				cd_variant_additional = ?,
				cd_fuel_type = ?,
				cd_motor = ?,
				cd_motor_additional = ?,
				cd_transmission = ?,
				cd_transmission_additional = ?,
				cd_power_kpw = ?,
				cd_cubic_capacity = ?,
				cd_co_wltp = ?,
				cd_co_nedc = ?,
				cd_kilometers = ?,
				cd_paint_type = ?,
				cd_color = ?,
				cd_color_additional = ?,
				cd_interior_color = ?,
				cd_interior_color_additional = ?,
				cd_interior_material = ?,
				cd_first_registration_date = ?,
				cd_first_nl_registration = ?,
				cd_first_name_nl_registration = ?,
				cd_last_name_registration = ?,
				cd_nl_registration_number = ?,
				cd_meldcode = ?,
				cd_apk_valid = ?, 
				cd_navigation = ?,
				cd_keyless_entry = ?,
				cd_app_connect = ?,
				cd_airco = ?,
				cd_roof = ?,
				cd_wheels = ?,
				cd_headlights = ?,
				cd_pdc = ?,
				cd_cockpit = ?,
				cd_camera = ?,
				cd_cruise_control = ?,
				cd_tow_bar = ?,
				cd_sport_seats = ?,
				cd_sport_package = ?,
				cd_seats_electric = ?,
				cd_seat_heating = ?,
				cd_seat_massage = ?,
				cd_optics = ?,
				cd_tinted_windows = ?,
				cd_options = ?,
				cd_notes = ?
				WHERE cd_car_id = ?";

		$stmt = $dbDriver->dbCon->prepare($query);

		$stmt->execute(
			[
				$_post['preorder'],
				$_post['car_ref_custom'],
				$_post['vin'],
				is_null($_post['conf_number']) ? 0 : intval($_post['conf_number']),
				$_post['komm_number'],
				$_post['advert_link'],
				$_post['source_supplier'],
				$_post['supplier_ref'],
				$_post['current_registration'],
				$_post['coc'],
				$_post['status'],
				$_post['model_additional'],
				$_post['variant_additional'],
				$_post['car_fuel'],
				$_post['motor'],
				$_post['motor_additional'],
				$_post['transmission'],
				$_post['transmission_additional'],
				$_post['power_kpw'],
				$_post['cubic_capacity'],
				$_post['co_wltp'],
				$_post['co_nedc'],
				$_post['kilometers'],
				$_post['paint_type'] ? 1 : 0,
				$_post['color'],
				$_post['color_additional'],
				$_post['interior_color'],
				$_post['interior_color_additional'],
				$_post['interior_material'],
				$_post['first_registration_date'],
				$_post['first_nl_registration'],
				$_post['first_name_nl_registration'],
				$_post['last_name_registration'],
				$_post['nl_registration_number'],
				$_post['meldcode'],
				$_post['apk_valid'],
				$_post['navigation'],
				$_post['keyless_entry'],
				$_post['app_connect'],
				$_post['airco'],
				$_post['roof'],
				$_post['wheels'],
				$_post['headlights'],
				$_post['pdc'],
				$_post['cockpit'],
				$_post['camera'],
				$_post['cruise_control'],
				$_post['tow_bar'],
				$_post['sport_seats'],
				$_post['sport_package'],
				$_post['seats_electric'],
				$_post['seat_heating'],
				$_post['seat_massage'],
				$_post['optics'],
				$_post['tinted_windows'],
				$_post['options'],
				$_post['notes'],
				$car_id
			]
		);
	}

	public function getSingleCar($car_id)
	{
		$dbDriver = new db_driver();
		$query = "SELECT c.created_at,
		   c.car_id, c.car_preorder, c.car_model, cd.cd_car_ref_custom, cd.cd_conf_number, cm.cmake_id, cm.cmake_name, cmod.cmodel_name,
		   cmu.cmu_id, cmu.cmu_name, cmotor.cmotor_id, cmotor.cmotor_name, cv.conversion_name as fuel_name, cv.conversion_id as fuel_id,
		   conv2.conversion_id as transmission_name, cd.cd_first_registration_date,
		   cd.cd_kilometers, cd.cd_first_nl_registration,
		   cd.cd_vin,cd.cd_status, cd.cd_komm_number, cd.cd_advert_link,
				cd.cd_source_supplier,cd.cd_supplier_ref, cd.cd_current_registration,
				cd.cd_coc,c.car_vehicle_type, cd.cd_transmission_additional,
				cd.cd_power_kpw,cd.cd_cubic_capacity,cd.cd_co_wltp,cd.cd_co_nedc,
				cd.cd_kilometers,cd.cd_paint_type,conv3.conversion_id as color_name,cd.cd_color_additional,cd.cd_interior_color,
				cd.cd_interior_color_additional,cd.cd_interior_material,cd.cd_first_registration_date,
				cd.cd_nl_registration_number,cd.cd_meldcode,cd.cd_apk_valid,cd.cd_last_name_registration,
				cd.cd_first_name_nl_registration,cd.cd_navigation,cd.cd_keyless_entry,cd.cd_app_connect,
				cd.cd_airco,cd.cd_roof,cd.cd_wheels,cd.cd_headlights,cd.cd_pdc,cd.cd_cockpit,cd.cd_camera,
				cd.cd_cruise_control,cd.cd_tow_bar,cd.cd_sport_seats,cd.cd_sport_package,cd.cd_seats_electric,
				cd.cd_seat_heating,cd.cd_seat_massage,cd.cd_optics,cd.cd_tinted_windows,cd.cd_options,cd.cd_notes,c.car_body_style,
				calc.purchase_price_netto, calc.fee_intermediate_supplier,calc.total_purchase_price_netto,
				calc.costs_damage_and_repair, calc.transport_international,	calc.transport_national,
				calc.costs_taxation_bpm, calc.fee_gwi, calc.recycling_fee, calc.total_costs_and_fee, calc.sales_price_netto,
				calc.vat_btw, calc.calculation_vat_percentage, calc.calculation_lock_sales_price, calc.sales_price_incl_vat_btw, calc.rest_bpm, calc.fees, calc.sales_price_total, calc.bruto_bpm, calc.percentage, calc.rest_bpm_indication, c.updated_at,
				u_cr.expo_users_name as created_by, u_edit.expo_users_name as last_edited_by, c.car_vat_marge, c.car_source, c.car_source_id

		   FROM
			 cars c
		   INNER JOIN car_details cd on c.car_id = cd.cd_car_id 
			INNER JOIN car_makes cm on c.car_make = cm.cmake_id
			INNER JOIN car_models cmod on c.car_model = cmod.cmodel_id
			INNER JOIN car_motors cmotor on cd.cd_motor = cmotor.cmotor_id
		   INNER JOIN conversions cv on c.car_fuel = cv.conversion_id
		   INNER JOIN conversions conv2 on cd.cd_transmission = conv2.conversion_id
		   INNER JOIN conversions conv3 on cd.cd_color = conv3.conversion_id
		   INNER JOIN car_make_uitvoerings cmu on c.car_variant  = cmu.cmu_id
			INNER JOIN calculations calc on c.car_id = calc.calculation_for_car_id
			INNER JOIN expo_users u_edit on c.updated_by_id = u_edit.expo_users_ID
			INNER JOIN expo_users u_cr on c.user_id = u_cr.expo_users_ID 
		   WHERE c.car_id = ?
		   ";
		
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);


		return $result;
	}


	public function createCalculation($_post, $car_id = NULL)
	{

		$dbDriver = new db_driver();
		$query = "INSERT INTO calculations (
			calculation_for_car_id,
			purchase_price_netto,
			fee_intermediate_supplier,
			total_purchase_price_netto,
			costs_damage_and_repair,
			transport_international,
			transport_national,
			costs_taxation_bpm,
			recycling_fee,
			fee_gwi,
			total_costs_and_fee,
			sales_price_netto,
			vat_btw,
			sales_price_incl_vat_btw,
			rest_bpm,
			fees,
			sales_price_total,
			bruto_bpm,
			percentage,
			rest_bpm_indication,
			calculation_lock_sales_price,
			calculation_vat_percentage,
			`user_id`

		) VALUES (
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
			?,
			?,
			?
		)";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([
			$car_id,
			$_post['purchase_price_netto'],
			$_post['fee_intermediate_supplier'],
			$_post['total_purchase_price_netto'],
			$_post['costs_damage_and_repair'],
			$_post['transport_international'],
			$_post['transport_national'],
			$_post['costs_taxation_bpm'],
			$_post['recycling_fee'],
			$_post['fee_gwi'],
			$_post['total_costs_and_fee'],
			$_post['sales_price_netto'],
			$_post['vat_btw'],
			$_post['sales_price_incl_vat_btw'],
			$_post['rest_bpm'],
			$_post['fees'],
			$_post['sales_price_total'],
			$_post['bruto_bpm'],			
			$_post['percentage'],
			$_post['rest_bpm_indication'],
			$_post['lock_sales_price'] ? 1 : 0, 
			$_post['vat_percentage'],
			$_SESSION['user'][0]['expo_users_ID']

		]);
	}

	public function updateCalculation($_post, $car_id) {

		$dbDriver = new db_driver();
		$query = "UPDATE calculations SET
			purchase_price_netto =?,
			fee_intermediate_supplier =?,
			total_purchase_price_netto =?,
			costs_damage_and_repair =?,
			transport_international =?,
			transport_national =?,
			costs_taxation_bpm =?,
			recycling_fee =?,
			fee_gwi =?,
			total_costs_and_fee =?,
			sales_price_netto =?,
			vat_btw =?,
			sales_price_incl_vat_btw =?,
			rest_bpm =?,
			fees =?,
			sales_price_total =?,
			bruto_bpm =?,
			percentage =?,
			rest_bpm_indication =?,
			calculation_lock_sales_price =?,
			calculation_vat_percentage = ?,
			`user_id` = ?
			WHERE calculation_for_car_id = ?";

		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([
			$_post['purchase_price_netto'],
			$_post['fee_intermediate_supplier'],
			$_post['total_purchase_price_netto'],
			$_post['costs_damage_and_repair'],
			$_post['transport_international'],
			$_post['transport_national'],
			$_post['costs_taxation_bpm'],
			$_post['recycling_fee'],
			$_post['fee_gwi'],
			$_post['total_costs_and_fee'],
			$_post['sales_price_netto'],
			$_post['vat_btw'],
			$_post['sales_price_incl_vat_btw'],
			$_post['rest_bpm'],
			$_post['fees'],
			$_post['sales_price_total'],
			$_post['bruto_bpm'],
			$_post['percentage'],
			$_post['rest_bpm_indication'],
			$_post['lock_sales_price'] ? 1 : 0, 
			$_post['vat_percentage'],
			$_SESSION['user'][0]['expo_users_ID'],
			$car_id,

		]);
		
	}

	public function getAllCars($carID = 0)
	{
		$dbDriver = new db_driver();

		$sql = "SELECT * FROM dossier
		LEFT JOIN car ON car.carID = dossier.carID
		INNER JOIN car_make cm on car.car_mаке = cm.id_car_make 
		INNER JOIN car_model cmod on car.car_model = cmod.id_car_model
		INNER JOIN car_type ct on cmod.id_car_type = ct.id_car_type
		INNER JOIN conversie_tabel_gwi ctw on car.brandstof = ctw.conversie_tabel_ID
		";
		if ($carID) {
			$sql .= ' WHERE `dossier`.`carID` = ' . $carID;
		}
		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);


		return $result;
	}

	public function getPhotoLastPos($inserted_car_id)
	{
		$dbDriver = new db_driver();
		$sql = "SELECT cp_imagepos 
		FROM car_photos
		WHERE cp_car_id = ?
		ORDER BY cp_imagepos DESC
		LIMIT 1
		";

		$stmt = $dbDriver->dbCon->prepare($sql);
		return $stmt->execute([$inserted_car_id]);
	}

	public function switchImages($_post, $car_id) {
		
		$dbDriver = new db_driver();

		if(isset($_post['frompos'])) {
			$filename = explode("/", $_post['tosrc']);

			$sql = "UPDATE `car_photos` SET `cp_filename`=?,`cp_path`=? WHERE `cp_car_id`=? AND `cp_imagepos`=?";

			$stmt1 = $dbDriver->dbCon->prepare($sql);
			$stmt1->execute(
				[
					$filename[count($filename)-1],
					$_post['tosrc'],
					$car_id,
					$_post['frompos']
				]
			);
		}

		if(isset($_post['topos'])) {
			$filename = explode("/", $_post['fromsrc']);
			
			$sql = "UPDATE `car_photos` SET `cp_filename`=?,`cp_path`=? WHERE `cp_car_id`=? AND `cp_imagepos`=?";

			$stmt1 = $dbDriver->dbCon->prepare($sql);
			$stmt1->execute(
				[
					$filename[count($filename)-1],
					$_post['fromsrc'],
					$car_id,
					$_post['topos']
				]
			);
		}
	}

	public function insertCarPhoto($path, $inserted_car_id, $imagepos)
	{

		$dbDriver = new db_driver();
		$arrFile = explode("/", $path);

		$sql = "INSERT INTO car_photos (cp_car_id, cp_filename, cp_path, cp_user_id, cp_imagepos)
      VALUES (
         ?,
         ?,
         ?,
         ?,
		 ?

      )";

		$stmt = $dbDriver->dbCon->prepare($sql);
		$result = $stmt->execute([$inserted_car_id, $arrFile[count($arrFile) - 1], $path, $_SESSION['user'][0]['expo_users_ID'], $imagepos]);
	}

	public function insertCarDocument($path, $inserted_car_id)
	{
		$file_name = end(explode("/", $path));
		
		$dbDriver = new db_driver();

		$sql = "INSERT INTO car_documents (cd_car_id, cd_filename, cd_path, cd_user_id)
      VALUES (
         ?,
         ?,
          ?,
         ?

      )";

		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([$inserted_car_id, $file_name, $path, $_SESSION['user'][0]['expo_users_ID']]);
	}

	public function getCarInfo($car_id)
	{
		$dbDriver = new db_driver();

		$sql = "SELECT * FROM dossier
		LEFT JOIN cars ON car.car_id = dossier.carID
		INNER JOIN car_makes cm on cars.car_make = cm.cmake_id 
		INNER JOIN car_models cmod on cars.car_model = cmod.cmodel_id
		INNER JOIN conversions c on cars.car_fuel = conversions.conversion_id
		WHERE car.car_id = ?";

		$stmt = $dbDriver->dbCon->prepare($sql);
		$stmt->execute([$car_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getCarImages($car_id)
	{

		$dbDriver = new db_driver();
		// $dbDriver->dbCon->beginTransaction();

		// try {

		$query = "SELECT * FROM car_photos WHERE cp_car_id = ? ORDER BY cp_id DESC";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function updateCarInfo($post, $car_id)
	{

		$dbDriver = new db_driver();
		// $dbDriver->dbCon->beginTransaction();

		// try {
		$query1 = "UPDATE cars SET
            car_make = ?,
            car_model = ?,
            car_uitvoering = ?,
            car_motor = ?,
            car_fuel = ?,
            car_dossier_id = ?,
            car_auto_ref = ?,
            car_custom_ref = ?,
			car_vat_marge = ?,
			car_source = ?,
			car_source_id = ?
            WHERE car_id = ?";
		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$stmt1->execute(
			[
				$post['carMake'],
				$post['car_model'],
				$post['car_uitvoering'],
				$post['car_motor'],
				$post['BPMbrandstof'],
				$car_id,
				$post['auto_referentie'],
				$post['custom_ref'],
				$post['vat_marge'] ? 1 : 0,
				$post['source'],
				$post['source_id'],
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
		// 	$post['car_make'],
		// 	$post['car_model'],
		// 	$post['car_motor'],
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

	public function insertCalculation($_request)
	{
		$dbDriver = new db_driver();

		$calculation_for_car_id = $_request['fromCarView'];
		$inkoopprijs_ex_ex = $_request['inkoopprijs_ex_ex'];
		$feeleverancier = $_request['feeleverancier'];
		$inkoopprijstotaal = $_request['taxatie_kosten1'];
		$opknapkosten = $_request['opknapkosten_ex'];
		$transport_buitenland = $_request['transport_buitenland'];
		$transport_binnenland = $_request['transport_binnenland'];
		$taxatie_kosten = $_request['taxatie_kosten'];
		$totaalkosten = $_request['taxatie_kosten1'];
		$fee = $_request['fee'];
		$verkoopprijs_ex = $_request['verkoopprijs_netto'];
		$btw = $_request['btw'];
		$verkoopprijsbtw = $_request['addVerkoopprijs_Marge_incl'];
		$restbpm = $_request['gekozen_bpm_bedrag'];
		$leges = $_request['leges'];
		$verkoopprijsin = $_request['addVerkoopprijs_Marge_incl'];
		$SoortVoertuig = $_request['SoortVoertuig'];
		$BPMbrandstof = $_request['BPMbrandstof'];
		$huidigedatumbpm = $_request['huidigedatumbpm'];
		$referentie = $_request['referentie'];
		$BPMproductiedatum = $_request['BPMproductiedatum'];
		$BPMtenaamstellingNL = $_request['BPMtenaamstellingNL'];
		$carUitvoering = $_request['car_uitvoering'];
		$BPMCO2 = $_request['BPMCO2'];
		$BPMCO2WLTP = $_request['BPMCO2WLTP'];
		$percentage = $_request['percentage'];
		$delivery_costs = $_request['delivery_costs'];
		$inkoopprijs_btw = $_request['inkoopprijs_btw'];

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

	public function getAllCalculations()
	{

		$dbDriver = new db_driver();

		$query = "SELECT * FROM calculations";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);

		return $result;
	}

	public function connectCalculationCar($calculation_id, $car_id)
	{
		$dbDriver = new db_driver();

		$query = "UPDATE calculations SET calculation_for_car_id = ? WHERE calclulation_id =?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id, $calculation_id]);
	}


	public function disableModel($disID)
	{
		$dbDriver = new db_driver();

		$query = "UPDATE `car_models` SET cmodel_active = 0 WHERE `cmodel_id`= ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
	}
	public function disableCalc($disID)
	{
		$dbDriver = new db_driver();

		$query = "UPDATE `calculations` SET `active`=`active` ^ 1 WHERE `calclulation_id`= ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
	}

	public function disableMark($disID)
	{
		$dbDriver = new db_driver();

		$query = "UPDATE `car_makes` SET cmake_active = 0 WHERE cmake_id =?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
	}

	public function getCarCalculations($car_id)
	{
		$dbDriver = new db_driver();
		$query = "SELECT * FROM calculations WHERE calculation_for_car_id = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$car_id]);
		$result = $stmt->fetchAll(PDO::FETCH_NAMED);
		return $result;
	}

	public function duplicateCar($obj)
	{
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
	}

	public function getConversions($conversion_type = NULL, $conversion_page = NULL)
	{

		$dbDriver = new db_driver();

		if (is_null($conversion_type) && is_null($conversion_page)) {

			throw new Exception('One of the following $conversion_type or $conversion_page MUST NOT BE NULL');
		}

		if (!is_null($conversion_type)) {
			$query = "SELECT * FROM conversions WHERE conversion_type = ?";
			$check_value = $conversion_type;
		} else {
			$query = "SELECT * FROM conversions WHERE ? IN(conversion_pages	)";
			$check_value = $conversion_page;
		}

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$check_value]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}
