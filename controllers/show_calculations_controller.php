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
        if (isset($_POST['connect_car'])) {
            $calculation_id = addslashes($_POST['connect_car']);
            $car_id = addslashes($_POST['car_id_to_connect']);
            $this->connectCalculationCar($calculation_id, $car_id);
            header("Location: /show_calculations");
        }
         if (isset($_REQUEST['disable_calc'])) {
            $disID = addslashes($_REQUEST['disable_calc']);
            $this->disableCalc($disID);
            header("Location: /show_calculations");
        }

		if(isset($_SESSION['user']))parent::__construct('show_calculations_view.php');
		else parent::__construct('login_view.php');

    }

    private function getAllCalculations() {       

        return $this->base->getAllCalculations();
    }

    protected function connectCalculationCar($calculation_id, $car_id) {
        $this->base->connectCalculationCar($calculation_id, $car_id);
    }
    protected function disableCalc($disID) {
        $this->base->disableCalc($disID);
    }

}