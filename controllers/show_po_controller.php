<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class show_po extends view
{

	public function __construct()
	{


        if (isset($_SESSION['user'])) parent::__construct('show_po_view.php');
		else parent::__construct('login_view.php');
    }
}
?>