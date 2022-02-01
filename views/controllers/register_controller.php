<?php
include_once 'views/view1.php';
class element{
    private $firstName;
    private $lastName;
    private $emailAddress;
	private $usernames;
	private $password;
	private $passwordAgain;

	
    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = addslashes($value);
    }
}
class register extends view1{ 
    
    public function __construct() {
		// displayed page index
		// if(!isset($_SESSION['user'])) header("Location: index");
		$this->base = $_SESSION['base'];

		if(isset($_POST['add']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['emailAddress']) && isset($_POST['usernames']) && isset($_POST['password']) && isset($_POST['passwordAgain'])){
				$obj->firstName = $_POST['firstName'];
				$obj->lastName = $_POST['lastName'];
				$obj->emailAddress = $_POST['emailAddress'];
				// $obj->emailAddress = hash('sha512', $obj->emailAddress);
				$obj->usernames = hash('sha512', $_POST['usernames']);
				$obj->password = $_POST['password'];
				$confirm = $_POST['passwordAgain'];
				if($obj->password == $confirm){
					$obj->password = hash('sha512', $obj->password);
					$data = $this->getAccountInfo($obj);
					if (!$data) {
						$this->setAccountInfo($obj);
					}
					header("Location: login");
				}
		}

		// if(isset($_POST['save_profile'])){


		// 	$obj->userID = $_SESSION['userID'][0]['userID'];
		// 	$obj->firstName = $_POST['firstName'];
		// 	$obj->lastName = $_POST['lastName'];
		// 	$obj->emailAddress = $_POST['emailAddress'];
		// 	// $obj->usernames = $_POST['usernames'];
		// 	// $obj->password = $_POST['password'];
		// 	$user = $this->getAccountInfo($obj);
		// 	if($user){
		// 	$_POST['firstName'] = $obj->firstName;
		// 	$_POST['lastName'] = $obj->lastName;
		// 	$_POST['emailAddress'] = $obj->emailAddress;
		// 	$this->updateAccountInfoSettings($obj);
		// 	// $_SESSION['user'][0]['Username'] = $obj->usernames;
		// 	// $_SESSION['user'][0]['password'] = $obj->password;
		// 	header("Location: profile");
		// }

		parent::__construct('register_view.php');
    }
    //return account info from database
    protected function setAccountInfo($obj){
       $this->base->setAccountInfo($obj); 
    }
    //return account info from database
    protected function getAccountInfo($obj){
       return $this->base->getAccountInfo($obj); 
    }
    protected function updateAccountInfoSettings($obj){
        return $this->base->updateAccountInfoSettings($obj); 
    }
}