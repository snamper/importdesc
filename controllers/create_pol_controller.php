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

class create_pol extends view
{

	public function __construct()
	{

		if (!isset($_SESSION['user'])) {
			header("Location: /login ");
			exit;
		}

		$this->base = $_SESSION['base'];

		if (isset($_SESSION['user'])) parent::__construct('create_pol_view.php');
		else parent::__construct('login_view.php');
	}
}
