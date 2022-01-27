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
		$sql = "SELECT * FROM `car_makes` WHERE cmake_active = 1";
		$dbDriver->querySelects($sql);
		return $dbDriver->fetchAssoc();
	}

	public function getCarBrandByName($brand_name) {
		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_make WHERE `name` = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$brand_name]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	

	}

	public function getModelByName($model_name){		

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_model WHERE `name` = ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$model_name]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;

	}

	public function getCarVersiesByModelName($model_name) {
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
        $sql = "INSERT INTO `car_makes` (cmake_name) VALUES ('".$mark->cmake_name."')";
	
        $dbDriver->query($sql);
        return $dbDriver->insert_id();
        //return $dbDriver->query("SELECT MAX(id_car_make) FROM `car_make`")->fetchColumn();
    }
    function updateCarMark($mark)
    {
        $dbDriver = new db_driver();
		
        $sql = "UPDATE `car_makes` SET `cmake_name` = '".$mark->name."' WHERE cmake_id = " . $mark->id_car_make;
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
	function getcar_model($markID, $active = 1)
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
        $sql = "INSERT INTO `car_models` (`cmodel_make_id`, `cmodel_name`) VALUES ('".$model->id_car_make."', '".$model->name."')";
        $dbDriver->query($sql);
    }


    function updateCarModel($model)
    {
        $dbDriver = new db_driver();
        $sql = "UPDATE `car_models` SET `cmodel_name` = '".$model->name."' WHERE `cmodel_id` = " . $model->id_car_model;
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
	public function getCarMotorByModelName($model_name) {
		
		$dbDriver = new db_driver();
        $query = "SELECT ct.name, ct.id_car_trim FROM car_model cm INNER JOIN car_trim ct on cm.id_car_model = ct.id_car_model 
		WHERE cm.name = ?";
        $stmt = $dbDriver->dbCon->prepare($query);
        $stmt->execute([$model_name]);
        $result = $stmt->fetchAll(PDO::FETCH_NAMED);
        return $result;

	}

    public function getGenerationByModelName($model_name) {
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
		$query = "SELECT * FROM conversie_tabel_gwi WHERE `conversie_soort` = 'brandstof'";

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function addCarMerk($_post) {
		
		$dbDriver = new db_driver();
		$query1 = "INSERT INTO car_trim (id_car_model, id_car_serie, `name`, fuel_name) VALUES (
			?,
			?,
			?,
			?
		)";

		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$stmt1->execute([ $_post['modelId'], 458, $_post['addMotor'], $_post['fuelName'] ]);
		$motor_id = $dbDriver->dbCon->lastInsertId();

		

		// QUERY 3 
		$query3 = "INSERT INTO car_generation (id_car_model, `name`) VALUES (
			?,
			?
		)";
		
		$stmt3 = $dbDriver->dbCon->prepare($query3);
		$stmt3->execute([$_post['modelId'], $_post['generationName']]);
	}

	public function getMotorsByMake($make_id) {

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_motor WHERE cm_make_id = ?";		

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function getUitvoeringsByMake($make_id) {

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_make_uitvoering WHERE cmu_make_id = ?";		

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$make_id]);
		$result = $stmt->fetchAll();

		return $result;
	}	

	public function getFuelByMotor($motor_id) {

		$dbDriver = new db_driver();
		$query = "SELECT cm_fuel_id, ctw.conversie_naam  FROM car_motor
		INNER JOIN conversie_tabel_gwi ctw 
		ON ctw.conversie_tabel_ID = car_motor.cm_fuel_id WHERE cm_id = ?";		

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$motor_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;

	}

	public function getMotorsByFuel($fuel_id, $make_id) {

		$dbDriver = new db_driver();
		$query = "SELECT * FROM car_motor WHERE cm_fuel_id = $fuel_id AND cm_make_id = $make_id";		

		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$fuel_id, $make_id]);
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
		$stmt1->execute([ $_post['create_motor_name'], $_post['fuelType'], $_post['car_make']]);

	}

	public function createUitvoering($_post) 
	{

		$dbDriver = new db_driver();

		$query1 = "INSERT INTO car_make_uitvoerings (cmu_name, cmu_make_id) VALUES (?,?)";	
	
		// $dbDriver->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$stmt1 = $dbDriver->dbCon->prepare($query1);
		$stmt1->execute([$_post['uitvoering_create'], $_post['car_make']]);
	}

	public function getFuelByMotorName($motor_name) {

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
            car_mаке,
            car_model,
            uitvoering,
            aantal_deuren,
            motor,
            brandstof,
            transmissieSoort,
            productiedatum,
            co2,
            co2_wltp,
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
                ?,
                ?
            )";
            $stmt = $dbDriver->dbCon->prepare($query);
            $stmt->execute(
                [
                    $post['car_make'],
                    $post['car_model'],
                    $post['car_uitvoering'],
                    $post['doors_number'],
                    $post['car_motor'],
                    $post['BPMbrandstof'],
                    $transmissieSoort,
                    $post['productiedatum'],
                    $post['BPMCO2'],
                    $post['BPMCO2WLTP'],
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
                $post['car_make'],
                $post['car_model'],
                $post['car_motor'],
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

	public function getAllCars($carID = 0) {
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

	public function getCarInfo($car_id) {
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

	public function updateCarInfo($post, $car_id) {

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
            car_custom_ref = ?
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
		$carUitvoering=$_request['car_uitvoering'];
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


	public function disableModel($disID) {
		$dbDriver = new db_driver();

		$query = "UPDATE `car_models` SET cmodel_active = 0 WHERE `cmodel_id`= ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
	}
	public function disableCalc($disID) {
		$dbDriver = new db_driver();

		$query = "UPDATE `calculations` SET `active`=`active` ^ 1 WHERE `calclulation_id`= ?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
	}

	public function disableMark($disID) {
		$dbDriver = new db_driver();

		$query = "UPDATE `car_makes` SET cmake_active = 0 WHERE cmake_id =?";
		$stmt = $dbDriver->dbCon->prepare($query);
		$stmt->execute([$disID]);
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


