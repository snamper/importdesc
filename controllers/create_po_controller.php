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

class create_po extends view
{

	public function __construct()
	{
		$obj = new element();
		$this->base = $_SESSION['base'];

		if (isset($_POST['add_purchase_line'])) {			

			$lines_array = [];
			$lines_array = array_merge($lines_array, $_POST['add_purchase_line']);
			

			if (isset($_POST['purchase_lines'])) {
				$lines_array = array_merge($lines_array, $_POST['purchase_lines']);
			}		

			$lines_array = array_unique($lines_array);
			
			$this->setData("purchase_lines", $lines_array);
		}

		if (isset($_SESSION['user'])) parent::__construct('create_po_view.php');
		else parent::__construct('login_view.php');
	}
}
