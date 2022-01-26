<?php


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

class btw extends view
{

	public function __construct()
	{
		$this->base = $_SESSION['base'];
		$obj = new Element();
		if (isset($_POST['btw_insert'])) {
			$obj->priceType = 1;
			$obj->vehicleType = $_POST['carType'];
			$obj->make = $_POST['car_make'];
			$obj->model = $_POST['carModel'];
			$obj->generation = $_POST['carGeneration'];
			$obj->serie = $_POST['carSerie'];
			$obj->trim = $_POST['car_motor'];
			$obj->equipment = $_POST['carEquipment'];
			$obj->uitvoering = $_POST['car_uitvoering'];
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
		// displayed page index

		if (isset($_SESSION['user'])) parent::__construct('btw_view.php');
		else parent::__construct('login_view.php');
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
