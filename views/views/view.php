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
    }

    public function getData($key = null) {
        if($key) {
            return $this->data[$key];
        }

        return $this->data;
        
    }

    public function setData($key, $value) {

        $this->data[$key] = $value;
    }
}
?>
