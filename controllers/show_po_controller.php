<?php

class show_po extends view
{

	public function __construct()
	{


        if (isset($_SESSION['user'])) parent::__construct('show_po_view.php');
		else parent::__construct('login_view.php');
    }
}
?>