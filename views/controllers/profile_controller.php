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
class profile extends view1{ 
    
    public function __construct() {
		// displayed page index
		// if(!isset($_SESSION['user'])) header("Location: index");
		$this->base = $_SESSION['base'];

		

		if(isset($_POST['save_profile'])){


			$obj->userID = $_SESSION['userID'][0]['userID'];
			$obj->firstName = $_POST['firstName'];
			$obj->lastName = $_POST['lastName'];
			$obj->emailAddress = $_POST['emailAddress'];
			// $obj->usernames = $_POST['usernames'];
			// $obj->password = $_POST['password'];
			$this->updateAccountInfoSettings($obj);
			// $_SESSION['user'][0]['fname'] = $obj->firstName;
			// $_SESSION['user'][0]['lname'] = $obj->lastName;
			// $_SESSION['user'][0]['UserMail'] = $obj->emailAddress;
			// $_SESSION['user'][0]['Username'] = $obj->usernames;
			// $_SESSION['user'][0]['password'] = $obj->password;
			header("Location: profile");
		}

		parent::__construct('profile_view.php');
    }
    
    protected function updateAccountInfoSettings($obj){
        return $this->base->updateAccountInfoSettings($obj); 
    }
}