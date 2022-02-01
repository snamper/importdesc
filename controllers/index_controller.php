<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'views/view.php';

class home extends view{ 
    
    public function __construct() {
		// displayed page index
		$this->base = $_SESSION['base'];
		if(isset($_POST['changes'])){
			$this->setLang($_SESSION['user'][0]['expo_users_ID'],$_POST['changes']);
			$_SESSION['user'][0]['langID']=$_POST['changes'];
		}
		$_SESSION['langs'] = $this->getLangs();
		$_SESSION['lang'] = isset($_SESSION['user'])?$_SESSION['user'][0]['langID']:26;
		$_SESSION['translate'] = $this->getTranslate($_SESSION['lang']);
		if(isset($_SESSION['user']))parent::__construct('home_view.php');
		else parent::__construct('login_view.php');
    }

    protected function setLang($userID,$langID){
        return $this->base->setLang($userID,$langID); 
    }
	//return account info from database
    protected function getLangs(){
        return $this->base->getLangs(); 
    }
	//return account info from database
    
	//return translate info from database
    protected function getTranslate($langID){
		$translate = array();
		$data = $this->base->getTranslate($langID);
	
		foreach($data as $value) {
			$translate[$value['label']] = $value['description'];
		}
        return $translate; 
    }
    
}