<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';


class element
{
	private $carID;
	private $dossierReferentie;
	private $vinnummer;
	private $carMarkDip;
	private $carModelDip;
	private $uitvoering;
	private $motor;
	private $brandstof;
	private $transmissie;
	private $transmissieSoort;
	private $kleur;
	private $interieurKleur;
	private $co2;
	private $BPMCO2WLTP;
	private $restBPMIndicatief;
	private $huidigeRestBpm;
	private $leveringSoort;
	private $verwachtteLevertermijn;
	private $kmStand;
	private $kmVerwacht;
	private $bevestigd;
	private $documentnr;
	private $tenaamStellingsCode;
	private $plaatAfgifteCode;
	private $datumEersteToelating;
	private $huidigeDatumBPM;
	private $eersteTenaamstellingNL;
	private $laatsteTenaamstelling;
	private $kenteken;
	private $tag;
	private $highlightsTitle;
	private $highlightsText;
	private $toelichtingTitle;
	private $toelichtingText;
	private $activeUser;

	public function __get($property)
	{
		return $this->$property;
	}
	public function __set($property, $value)
	{
		$this->$property = addslashes($value);
	}
}


class dossier extends view
{

	public function __construct()
	{
		// displayed page index
		$this->base = $_SESSION['base'];
		$obj = new Element();
		if (isset($_POST['updaters_dossier'])) {
			$obj->carID = $_POST['carID'];
			$obj->dossierReferentie = $_POST['dossierReferentie'];
			$obj->vinnummer = $_POST['vinnummer'];
			$obj->carMarkDip = $_POST['carMarkDip'];
			$obj->uitvoering = $_POST['uitvoering'];
			$obj->motor = $_POST['motor'];
			$obj->brandstof = $_POST['brandstof'];
			$obj->transmissie = $_POST['transmissie'];
			$obj->transmissieSoort = $_POST['transmissieSoort'];
			$obj->kleur = $_POST['kleur'];
			$obj->interieurKleur = $_POST['interieurKleur'];
			$obj->co2 = $_POST['co2'];
			$obj->leveringSoort = $_POST['leveringSoort'];
			$obj->kmStand = $_POST['kmStand'];
			$obj->kmVerwacht = $_POST['kmVerwacht'];
			$obj->bevestigd = $_POST['bevestigd'];
			$obj->documentnr = $_POST['documentnr'];
			$obj->tenaamStellingsCode = $_POST['tenaamStellingsCode'];
			$obj->plaatAfgifteCode = $_POST['plaatAfgifteCode'];
			$obj->datumEersteToelating = $_POST['datumEersteToelating'];
			$obj->eersteTenaamstellingNL = $_POST['eersteTenaamstellingNL'];
			$obj->laatsteTenaamstelling = $_POST['laatsteTenaamstelling'];
			$obj->kenteken = $_POST['kenteken'];
			$obj->tag = $_POST['tag'];
			$this->updateDossier($obj);
		}

		if (isset($_POST['updaters_highlights'])) {
            $obj->carID = $_POST['carID'];
            $obj->highlightsTitle = $_POST['highlightsTitle'];
            $obj->highlightsText = $_POST['highlightsText'];
            $obj->activeUser = $_SESSION['user'][0]['expo_users_ID'];
            $this->updateHighlights($obj);
        }
        if (isset($_POST['updaters_toelichting'])) {
            $obj->carID = $_POST['carID'];
            $obj->toelichtingTitle = $_POST['toelichtingTitle'];
            $obj->toelichtingText = $_POST['toelichtingText'];
            $obj->activeUser = $_SESSION['user'][0]['expo_users_ID'];
            $this->updateToelichting($obj);
        }

		if (isset($_REQUEST['dip'])) {
			$carID = $_REQUEST['dip'];
			$carTypeID = 1;
			$_SESSION['car_data'] = $this->getCarData($carID);
			$_SESSION['highlights_data1'] = $this->getConditionData($carID);
			$_SESSION['highlights_data2'] = $this->getExplanatoionData($carID);
			$_SESSION['car_make'] = $this->getCarMake($carTypeID);

			parent::__construct('dip_view.php');
			die;
		}
		if (isset($_POST['carMarkSelect'])) {
			$markID = $_POST['carMarkSelect'];
			$data = $this->getCarModel($markID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if (isset($_POST['carTrimSelect'])) {
			$modelID = $_POST['carTrimSelect'];
			$data = $this->getCarMotor($modelID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}


		if (isset($_SESSION['user'])) parent::__construct('dossier_view.php');
		else parent::__construct('login_view.php');
	}


	protected function getCarData($carID)
	{
		return $this->base->getCarData($carID);
	}
	protected function getConditionData($carID)
	{
		return $this->base->getConditionData($carID);
	}
	protected function getExplanatoionData($carID)
	{
		return $this->base->getExplanatoionData($carID);
	}

	protected function getCarMake($carTypeID)
	{
		$data = $this->base->getCarMake($carTypeID);
		$html_options = '';

		foreach ($data as $key => $value) {
			$html_options = $html_options . '<option value="' . $value['id_car_make'] . '" >' . $value['name'] . '</option>';
		}
		return $html_options;
	}
	protected function getCarModel($markID)
	{
		$data = $this->base->getCarModel($markID);
		$html_options = '';

		foreach ($data as $key => $value) {
			$html_options = $html_options . '<option value="' . $value['id_car_model'] . '" >' . $value['name'] . '</option>';
		}
		return $html_options;
	}
	protected function getCarMotor($modelID)
	{
		$data = $this->base->getCarMotor($modelID);
		$html_options = '';

		foreach ($data as $key => $value) {
			$html_options = $html_options . '<option value="' . $value['id_car_trim'] . '" >' . $value['name'] . '</option>';
		}
		return $html_options;
	}

	protected function updateDossier($obj)
	{
		$this->base->updateDossier($obj);
	}

	protected function updateHighlights($obj)
	{
		$this->base->updateHighlights($obj);
	}
	protected function updateToelichting($obj)
	{
		$this->base->updateToelichting($obj);
	}
}
