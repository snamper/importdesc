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

class show_calculations extends view{

    public function __construct() {
		// displayed page index
		$obj =  new element;
		$this->base = $_SESSION['base'];
		$cars = $this->base->getAllCars();
        $calculations = $this->getAllCalculations();

    	$this->setData("cars", $cars); 
        $this->setData("calculations", $calculations); 


		if(isset($_SESSION['user']))parent::__construct('show_calculations_view.php');
		else parent::__construct('login_view.php');

    }

    private function getAllCalculations() {       

        return $this->base->getAllCalculations();
    }


}