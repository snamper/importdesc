<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';
class element
{
    // private int $car_model;
    // private int $carID;
    // private int $autotelex;
    // private int $dossierID;
    // private int $car_merk;
    // private int $brandStof;
    // private $uitvoering;
    // private $transmissie;
    // private $transmissieSoort;
    // private $kleur;
    // private $productiedatum;
    // private $tenaamstellingNL;
    // private $co2;
    // private $km_stand;
    // private $levering_soort;
    // private $levering;
    // private $vinnummer;
    // private $kenteken;
    // private $km_verwacht;
    // private $type_nummer;
    // private $plaat_afgifte_code;
    // private $interieur_kleur;
    // private $bevestigd;
    // private $tijdelijk_nummer;
    // private $laatste_tenaamstelling;
    // private $aantal_deuren;
    // private $km_miles;
    // private $tenaam_stellings_code;
    // private $documentnr;
    // private $contactsID;
    // private $autoID;
    // private $tag;
    // private $stoelen;    

    public function gettype($property) {
        return gettype($this->$property);
    }

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

        $obj = new element;
        $this->base = $_SESSION['base'];


        if(isset($_POST['car_id'])) {         
        
            $this->base->updateCarInfo($_POST, $_POST['car_id']);
            header("Location: /show_cars");  
            exit;
        }


        if($_GET['duplicate']) {     
            $dbDriver = new db_driver(); 
            $query = "SELECT * from car WHERE carID = 58";
            $stmt = $dbDriver->dbCon->prepare($query);
            $stmt->execute([]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($result['carID']);
           
            foreach($result as $key => $res) {
                $obj->$key = $res;
            }


           $this->base->duplicateCar($obj);
        }
        

        if (isset($_SESSION['user'])) {

            if(isset($_GET['car_id'])) {
                $carJson = $this->base->getCarInfo($_GET['car_id']);
                echo json_encode($carJson);
                exit;
            }

            if(isset($_GET['duplicate'])) {
                
                $this->duplicateCar($_GET['duplicate']);
                // header("Location: /show_cars");  
                // exit;
            }
        } 
        else parent::__construct('login_view.php');

    }

   private function duplicateCar($car_id){
        $this->base->duplicateCar($car_id);
   }



    
}
