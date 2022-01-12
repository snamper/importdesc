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


class edit_car extends view
{

    public function __construct()
    {

        $obj = (object)[];
        $this->base = $_SESSION['base'];


        if(isset($_POST['car_id'])) {         
        
            $this->base->updateCarInfo($_POST, $_POST['car_id']);
            header("Location: /show_cars");  
            exit;
        }

        if (isset($_SESSION['user'])) {
            if(isset($_GET['car_id'])) {
                $carJson = $this->base->getCarInfo($_GET['car_id']);
                echo json_encode($carJson);
            }
        } 
        else parent::__construct('login_view.php');

    }



    
}
