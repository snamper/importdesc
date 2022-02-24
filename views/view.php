<?php
class view {
    public $base;
    protected $data;
    public function __construct($page) {
		include 'include/header.php';
        include 'include/sidebar.php';
        $data = $this->getData();
        include $page;
        include 'include/footer.php';
        $_SESSION['last_page'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public function getData($key = null) {
        if($key) {
            return $this->data[$key];
        }

        return $this->data;
        
    }

    public function setData($key, $value) {

        $this->data[$key][] = $value;
       
    }


  
}
?>
