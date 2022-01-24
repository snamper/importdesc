<?php

include_once 'views/view.php';

class create_make_new extends view
{
    public function __construct()
    {

        $this->base = $_SESSION['base'];

        if(isset($_GET['make_id_get_motors'])) {
            $motors = $this->base->getMotorsByMake($_GET['make_id_get_motors']);
        
            echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
            exit;
        }

        if(isset($_GET['make_id_get_uitvoering'])) {
            $uitvoerings = $this->base->getUitvoeringsByMake($_GET['make_id_get_uitvoering']);
        
            echo json_encode($uitvoerings, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
            exit;
        }

        if(isset($_GET['motor_id_get_fuel'])) {
            $fuels = $this->base->getFuelByMotor($_GET['motor_id_get_fuel']);
            echo json_encode($fuels, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
            exit;
        }

        if(isset($_GET['fuel_id_get_motors'])) {
            $motors = $this->base->getMotorsByFuel($_GET['fuel_id_get_motors'], $_GET['car_make_id']);
            echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
            exit;
        }

        if (isset($_SESSION['user'])) parent::__construct('create_make_new_view.php');
        else parent::__construct('login_view.php');
        
    }

}