<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class show_po extends view
{

	public function __construct()
	{

		$this->base = $_SESSION['base'];

		if (!isset($_SESSION['user'])) {
			header("Location: / ");
			exit;
		}

		if(isset($_POST['show_po_get_lines'])) {
			echo json_encode($this->base->getPOLines($_POST['show_po_get_lines']));
			exit;
		}

		if (isset($_GET['delete_order'])) {

			$this->base->deletePO($_GET['delete_order']);
		}

		if (isset($_SESSION['user'])) parent::__construct('show_po_view.php');
		else parent::__construct('login_view.php');
	}
}
