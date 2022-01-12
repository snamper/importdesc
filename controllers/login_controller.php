<?php
error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';

class element{    
    
	private $username;
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
		if(isset($_SESSION['user'])) header("Location: home");
		$this->base = $_SESSION['base'];
		$obj = (object)[];

		if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['userPassword'])){	
				
				 $obj->username = $_POST['username'];
				 $obj->username=hash('sha512', $obj->username);
				 // $obj->EmailAddress=hash('sha512', $obj->EmailAddress);
           		 $obj->userPassword =  $_POST['userPassword']; 
          		 $obj->userPassword=hash('sha512', $obj->userPassword);
           		 $user = $this->getAccounttInfo($obj);					
					
           		 if($user){
           		 	$_SESSION['user']=$user;	
           		 	// $verify = password_verify($obj->userPassword, $_SESSION['user']);
           		 	header("Location: home");
           		 }
           		 else{
           		 	header("Location: login");
           		 } 	
					
				}

		if(isset($_REQUEST['logout'])){
			session_start();
			unset($_SESSION['user']);



			header("Location: login");
		}

		if($_SESSION['user']){
				 $obj->EmailAddress = $_POST['EmailAddress'];
           		 $user = $this->getAccountttInfo($obj);	
           		 if($user){
           		 	$_SESSION['user'] = $_POST['EmailAddress'];
           		 	header("Location: index");
           		 }
           		 else{
           		 	header("Location: dashboard");
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
}