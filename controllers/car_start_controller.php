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
	
		/**
		 * At least one of the params MUST BE SET 
		 * IF isset $conversion_type - it WILL GET the conversions for Type
		 * IF isset $conversion_page and NOT SET $conversion_page will return conversions for page 
		 * @param mixed $conversion_type - DEFAULT NULL
		 * @param mixed $conversion_page - DEFAULT NULL
		 */
		$selects_conversions = $this->base->getConversions(NULL, "create_edit_car");
		foreach($selects_conversions as $conv) {
			$this->setData($conv['conversion_type'], $conv);			
		}


		if(isset($_POST['create_car'])) {			
			$this->base->createCar($_POST);
			exit;
			
		}
	


		if(isset($_SESSION['user']))parent::__construct('click_model_view.php');
		else parent::__construct('login_view.php');

    }

	private function connectCalculationCar($calculation_id, $car_id) {

		$this->base->connectCalculationCar($calculation_id, $car_id);

	}


}