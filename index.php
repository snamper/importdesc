<?PHP
session_start();
include_once 'vendor/autoload.php';
include_once 'models/base.php';
include 'route.php'; 
$_SESSION['base']=new base(); 
new Route(include 'routes.php');