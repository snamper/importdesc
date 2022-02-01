<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';

class creditor extends view{ 
    
    public function __construct() {
		// displayed page index
		$this->base = $_SESSION['base'];
		if(isset($_SESSION['user']))parent::__construct('creditor_view.php');
		else parent::__construct('login_view.php');
		
    }
    
}