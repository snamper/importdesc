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


class create_car extends view
{

    public function __construct()
    {

        $obj = (object)[];
        $this->base = $_SESSION['base'];
        $creditors = $this->getCreditors();
        $fuel_types = $this->getFuelAllFuelTypes();
        $transmitions = $this->getAllTransmitions();
        $car_doors = $this->getAllCarDoors();
    
       
        $this->setData("creditors", $creditors);
        $this->setData("fuel_types", $fuel_types);
        $this->setData("transmitions", $transmitions);
        $this->setData("car_doors", $car_doors);

        $_SESSION['carType'] = $this->getCarTypes();

        if (isset($_POST['carTypeSelect'])) {
            $carTypeID = $_POST['carTypeSelect'];
            $data = $this->getCarMark($carTypeID);
            echo $data;
            die;
            // return json_encode($employee_new);
        }

        if (isset($_POST['carSerieSelect'])) {
            $serieID = $_POST['carSerieSelect'];
            $data = $this->getCarSerie($serieID);
            echo $data;
            die;
            // return json_encode($employee_new);
        }

        if(isset($_POST['create_cars'])) { 
            $this->createCar($_POST);
        }

        if(isset($_GET['cars'])) {
            echo '<pre>';
            var_dump('here');
            echo '</pre>';
            exit;
            parent::__construct('show_cars_view.php');
			die;
        }

        if (isset($_SESSION['user'])) parent::__construct('create_car_view.php');
        else parent::__construct('login_view.php');
    }


    protected function getCarTypes()
    {
        $data = $this->base->getCarTypes();
        $html_options = '';

        foreach ($data as $key => $value) {
            $html_options = $html_options . '<option value="' . $value['id_car_type'] . '" >' . $value['name'] . '</option>';
        }
        return $html_options;
    }

    protected function getCarMark($carTypeID)
    {
        $data = $this->base->getCarMark($carTypeID);
        $html_options = '';

        foreach ($data as $key => $value) {
            $html_options = $html_options . '<option value="' . $value['id_car_make'] . '" >' . $value['name'] . '</option>';
        }
        return $html_options;
    }

    protected function getCarSerie($serieID)
    {
        $data = $this->base->getCarSerie($serieID);
        $html_options = '';

        foreach ($data as $key => $value) {
            $html_options = $html_options . '<option value="' . $value['id_car_serie'] . '" >' . $value['name'] . '</option>';
        }
        return $html_options;
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
    
    private function createCar($post) {
        $this->base->createCar($post);
    }
    
}
