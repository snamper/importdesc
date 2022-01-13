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