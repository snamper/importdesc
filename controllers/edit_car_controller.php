<?php
include_once 'views/view.php';
class BaseModel
{
    protected $table;

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value = null)
    {
        if (property_exists($this, $property)) {
            $value = is_array($value) ? $value[0] : $value;

            if ($value) {
                $this->$property = addslashes($value);
            } else {
                $this->$property = $value;
            }
        }
    }

    public function duplicateQuery()
    {
        $query = "INSERT INTO $this->table (";
        $query2 = '';

        foreach($this as $prop => $val) {
            $rp = new ReflectionProperty($this, $prop);

            if ($rp->getName() != 'table') {
                $query .= "`$prop`, ";

                if ($rp->getType() && $rp->getType()->getName() == 'int') {
                    $val = $val ?? 'NULL';
                    $query2 .= "$val, ";
                } else {
                    $query2 .= "'$val', ";
                }
            }
        }

        $query = substr($query, 0, -2);
        $query .= ') VALUES (';
        $query2 = substr($query2, 0, -2);
        $query .= $query2;

        return $query .= ')';
    }

    public function executeQuery($query)
    {
        $dbDriver = new db_driver();
        $stmt = $dbDriver->dbCon->prepare($query);
        $stmt->execute();
    }
}

class CarModel extends BaseModel
{
    protected $table = 'car';
    protected int $car_model;
    protected int $carID;
    protected ?int $autotelex;
    protected ?int $dossierID;
    protected ?int $car_merk;
    protected $uitvoering;
    protected $motor;
    protected ?int $brandstof;
    protected $transmissie;
    protected ?int $transmissieSoort;
    protected $kleur;
    protected $productiedatum;
    protected $tenaamstellingNL;
    protected ?int $co2;
    protected $km_stand;
    protected ?int $levering_soort;
    protected $levering;
    protected $vinnummer;
    protected $kenteken;
    protected ?int $km_verwacht;
    protected $type_nummer;
    protected $plaat_afgifte_code;
    protected $interieur_kleur;
    protected ?int $bevestigd;
    protected $tijdelijk_nummer;
    protected $laatste_tenaamstelling;
    protected ?int $aantal_deuren;
    protected ?int $km_miles;
    protected $tenaam_stellings_code;
    protected $documentnr;
    protected ?int $contactsID;
    protected ?int $autoID;
    protected $tag;
    protected ?int $stoelen;
    protected $huidigland;
    protected $optie;
    protected $opmerkingen;
    //protected $UpdatedAt;
    //protected $DateIn;
}

class DossierModel extends BaseModel
{
    protected $table = 'dossier';
    protected int $dossierID;
    protected ?int $autoID;
    protected ?int $carID;
    protected $kenteken;
    protected $dossier_referentie;
    protected $vin_number;
    protected $doc_directory;
    protected ?int $created_by;
    //protected $UpdatedAt;
    //protected $DateIn;
}

class BerekeningModel extends BaseModel
{
    //
}

class edit_car extends view
{
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $car = new CarModel;
            $dossier = new DossierModel;
            $this->base = $_SESSION['base'];

            if (isset($_GET['car_id'])) {
                $carJson = $this->base->getCarInfo($_GET['car_id']);
                echo json_encode($carJson);
                exit;
            }

            if (isset($_POST['car_id'])) {
                $this->base->updateCarInfo($_POST, $_POST['car_id']);
                header("Location: /show_cars");
                exit;
            }

            if (! empty($_GET['duplicate'])) {
                $result = $this->base->getAllCars($_GET['duplicate'])[0];
                $carID = $result['carID'];
                unset($result['carID']);

                foreach($result as $key => $val) {
                    $car->$key = $val;
                }

                $result['carID'] = $carID;
                unset($result['dossierID']);

                foreach($result as $key => $val) {
                    $dossier->$key = $val;
                }
                //dump($result, $car, $car->duplicateQuery(), $dossier, $dossier->duplicateQuery());
                $car->executeQuery($car->duplicateQuery());
                $dossier->executeQuery($dossier->duplicateQuery());
                header("Location: /show_cars");
                exit;
            }
        }
        else parent::__construct('login_view.php');
    }

   protected function duplicateCar($car) {
        $this->base->duplicateCar($car);
   }
}
