<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class element
{
	private $id;
	private $priceType;
	private $vehicleType;
	private $make;
	private $model;
	private $generation;
	private $serie;
	private $trim;
	private $equipment;
	private $uitvoering;
	private $brandstofSoort;
	private $eersteToelating;
	private $huidigeDatumBPM;
	private $tenaamstellingNL;
	private $referentie;
	private $co2NEDC;
	private $co2WLTP;
	private $restwaardePercentage;
	private $inkoopprijsNettoBTW;
	private $afleverkosten;
	private $opknapkostenEX;
	private $transportBuitenland;
	private $transportBinnenland;
	private $taxatieKosten;
	private $kostenTotaal;
	private $fee;
	private $verkoopprijsNetto;
	private $btw;
	private $restBPMIndicatief;
	private $leges;
	private $verkoopprijsMarge;


	public function __get($property)
	{
		return $this->$property;
	}
	public function __set($property, $value)
	{
		$this->$property = addslashes($value);
	}
}

class calculation extends view{

    public function __construct() {
		// displayed page index
		$obj = (object)[];
		$this->base = $_SESSION['base'];
		$_SESSION['carType'] = $this->getCarTypes();
		if (isset($_POST['merge_insert'])) {
			$obj->priceType = 0;
			$obj->vehicleType = $_POST['carType'];
			$obj->make = $_POST['carMark'];
			$obj->model = $_POST['carModel'];
			$obj->generation = $_POST['carGeneration'];
			$obj->serie = $_POST['carSerie'];
			$obj->trim = $_POST['carModification'];
			$obj->equipment = $_POST['carEquipment'];
			$obj->uitvoering = $_POST['caUitvoering'];
			$obj->brandstofSoort = $_POST['BPMbrandstof'];
			$obj->eersteToelating = $_POST['BPMproductiedatum'];
			$obj->huidigeDatumBPM = $_POST['huidigedatumbpm'];
			$obj->tenaamstellingNL = $_POST['BPMtenaamstellingNL'];
			$obj->referentie = $_POST['referentie'];
			$obj->co2NEDC = $_POST['BPMCO2'];
			$obj->co2WLTP = $_POST['BPMCO2WLTP'];
			$obj->restwaardePercentage = $_POST['percentage'];
			$obj->inkoopprijsNettoBTW = $_POST['inkoopprijs_ex_ex'];
			$obj->afleverkosten = $_POST['delivery_costs'];
			$obj->opknapkostenEX = $_POST['opknapkosten_ex'];
			$obj->transportBuitenland = $_POST['transport_buitenland'];
			$obj->transportBinnenland = $_POST['transport_binnenland'];
			$obj->taxatieKosten = $_POST['taxatie_kosten'];
			$obj->kostenTotaal = $_POST['taxatie_kosten1'];
			$obj->fee = $_POST['fee'];
			$obj->verkoopprijsNetto = $_POST['display_verkoopprijs_netto'];
			$obj->btw = $_POST['btw'];
			$obj->restBPMIndicatief = $_POST['gekozen_bpm_bedrag'];
			$obj->leges = $_POST['leges'];
			$obj->verkoopprijsMarge = $_POST['addVerkoopprijs_Marge_incl'];
			if ($obj->vehicleType && $obj->make && $obj->model) {
				$this->inserBerekening($obj);
				$this->inserDossier($obj);
			}
			// return json_encode($employee_new);
		}

		if(isset($_POST['carTypeSelect'])){
			$carTypeID = $_POST['carTypeSelect'];
			$data = $this->getCarMark($carTypeID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if(isset($_POST['carMarkSelect'])){
			$markID = $_POST['carMarkSelect'];
			$data = $this->getCarModel($markID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if(isset($_POST['carModelSelect'])){
			$generationID = $_POST['carModelSelect'];
			$data = $this->getCarGeneration($generationID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if(isset($_POST['carSerieSelect'])){
			$serieID = $_POST['carSerieSelect'];
			$data = $this->getCarSerie($serieID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if(isset($_POST['carTrimSelect'])){
			$trimID = $_POST['carTrimSelect'];
			$data = $this->getCarTrim($trimID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}
		if(isset($_POST['carEquipmentSelect'])){
			$equipmentID = $_POST['carEquipmentSelect'];
			$data = $this->getCarEquipment($equipmentID);
			echo $data;
			die;
			// return json_encode($employee_new);
		}


		if(isset($_SESSION['user']))parent::__construct('calculation_view.php');
		else parent::__construct('login_view.php');

    }

    protected function getCarTypes(){
		$data = $this->base->getCarTypes();
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_type'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarMark($carTypeID){
		$data = $this->base->getCarMark($carTypeID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_make'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarModel($markID){
		$data = $this->base->getCarModel($markID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_model'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarGeneration($generationID){
		$data = $this->base->getCarGeneration($generationID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_generation'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarSerie($serieID){
		$data = $this->base->getCarSerie($serieID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_serie'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarTrim($trimID){
		$data = $this->base->getCarTrim($trimID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_trim'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function getCarEquipment($equipmentID){
		$data = $this->base->getCarEquipment($equipmentID);
		$html_options = '';

			foreach($data as $key => $value) {
				$html_options = $html_options.'<option value="'. $value['id_car_equipment'].'" >'.$value['name'].'</option>';
			}
		return $html_options;
    }
    protected function inserBerekening($obj)
	{
		$this->base->inserBerekening($obj);
	}
	protected function inserDossier($obj)
	{
		$this->base->inserDossier($obj);
	}

}