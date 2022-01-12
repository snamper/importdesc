<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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


class edit_car_calculation extends view
{

    public function __construct()
    {

        $obj = new element;
        $this->base = $_SESSION['base'];
        
       $car_info = $this->base->getCarInfo($_GET['car_id']);    

       $cars = $this->getAllCars();       
       $creditors = $this->getCreditors();
       $fuel_types = $this->getFuelAllFuelTypes();
       $transmitions = $this->getAllTransmitions();
       $car_doors = $this->getAllCarDoors();       
             
       $this->setData("cars", $cars);  
       $this->setData("creditors", $creditors);
       $this->setData("fuel_types", $fuel_types);
       $this->setData("transmitions", $transmitions);
       $this->setData("car_doors", $car_doors);

        
        if (isset($_SESSION['user'])) parent::__construct('edit_car_calculation_view.php');
        else parent::__construct('login_view.php');

    }


    private function getAllCars() {

        return $this->base->getAllCars();
          

    }


    private function getCreditors()
    {
        $creditors = $this->base->getAllCreditors();

        return $creditors;
    }

    private function getFuelAllFuelTypes()
    {
        $fuel_types = $this->base->getFuelAllFuelTypes();

        return $fuel_types;
    }
    
    private function getAllTransmitions()
    {
        $transmition = $this->base->getAllTransmitions();

        return $transmition;
    }

    private function getAllCarDoors()
    {
        $car_doors = $this->base->getAllCarDoors();

        return $car_doors;
    }
}
