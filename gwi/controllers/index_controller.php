<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';

class home extends view{ 
    
    public function __construct() {
		// displayed page index
		$this->base = $_SESSION['base'];
		parent::__construct('home_view.php');
    }
    
}