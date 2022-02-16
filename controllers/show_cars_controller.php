<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class element
{
    

    public function __get($property)
    {
        return $this->$property;
    }
    public function __set($property, $value)
    {
        $this->$property = addslashes($value);
    }
}


class show_cars extends view
{

    public function __construct()
    {
        $obj = (object)[];
        $this->base = $_SESSION['base'];   
        $fuel_types = $this->getFuelAllFuelTypes();   
        
        if(isset($_GET['delete'])) {
            
            exit;
        }
              
        $this->setData("fuel_types", $fuel_types);
        
        if (isset($_SESSION['user'])) parent::__construct('show_cars_view.php');
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