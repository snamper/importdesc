<?php
class view1 {
    public $base;
    public function __construct($page) {
		include 'include/header.php';
        include 'include/sidebar.php';
        include $page;
        include'include/footer.php';
    }
}
?>
