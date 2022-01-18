<?php

use element as GlobalElement;

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';

class element{
    
    
	private $EmailAddress;
	private $userPassword;

    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = addslashes($value);
    }
}


class login extends view{ 
    
    public function __construct() {
		// displayed page index
		// if(!isset($_SESSION['user'])) header("Location: index");
		$this->base = $_SESSION['base'];
		$obj = new element;

		if(isset($_POST['login']) && isset($_POST['EmailAddress']) && isset($_POST['userPassword'])){
				 	$obj->EmailAddress = $_POST['EmailAddress'];
           		 $obj->userPassword =  $_POST['userPassword']; 
          		 $obj->userPassword=hash('sha512', $obj->userPassword);
           		 $user = $this->getAccounttInfo($obj);

           $_SESSION['UserMail']=$user[0]['emailAddress'];
           $_SESSION['UserLoginID']=$user[0]['userID'];

           		 if($user){

           		 	header("Location: index");
           		 }
           		 else{
           		 	header("Location: index");
           		 }
           		 

						
					
				}

		if(isset($_REQUEST['logout'])){
			session_start();
			unset($_SESSION['user']);



			header("Location: index");
		}

		if($_SESSION['user']){
				 $obj->EmailAddress = $_POST['EmailAddress'];
				 $obj->EmailAddress = hash('sha512', $obj->EmailAddress);
           		 $obj->userPassword =  $_POST['userPassword']; 
          		 $obj->userPassword=hash('sha512', $obj->userPassword);
           		 $user = $this->getAccountttInfo($obj);	
           		 if($user){
           		 	$_SESSION['user'] = $_POST['EmailAddress'];
           		 	header("Location: index");
           		 }
           		 else{
           		 	header("Location: index");
           		 }
				}



				

		parent::__construct('login_view.php');
    }
    protected function getAccounttInfo($obj){
       return $this->base->getAccounttInfo($obj); 
    }
    protected function getAccountttInfo($obj){
       return $this->base->getAccountttInfo($obj); 
    }
    protected function getAccountt1Info($obj){
       return $this->base->getAccountt1Info($obj); 
    }
}