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
        $this->setData("cars", $cars);  
        
        if (isset($_SESSION['user'])) parent::__construct('show_cars_view.php');
        else parent::__construct('login_view.php');

    }

    private function getAllCars() {

        return $this->base->getAllCars();
          

    }
}