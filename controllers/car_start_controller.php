<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class element
{
	private $id;
	

	public function __get($property)
	{
		return $this->$property;
	}
	public function __set($property, $value)
	{
		$this->$property = addslashes($value);
	}
}

class car_start extends view{

    public function __construct() {
		// displayed page index
		$obj = new element();
		$this->base = $_SESSION['base'];
		// $cars = $this->base->getAllCars();


		if(isset($_SESSION['user']))parent::__construct('click_model_view.php');
		else parent::__construct('login_view.php');

    }

	private function connectCalculationCar($calculation_id, $car_id) {

		$this->base->connectCalculationCar($calculation_id, $car_id);

	}


}