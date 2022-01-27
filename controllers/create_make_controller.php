<?php
include_once 'vendor/autoload.php';
include_once 'views/view.php';

class BaseModel
{
    protected $name;
    protected $id_car_make;
    protected $id_car_type = 1;
    protected $date_create;
    protected $date_update;
    protected $active = 1;
    protected $get_models;

    public function __construct()
    {
        $this->date_create = $this->date_update = time();
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = addslashes($value);
    }
}

class Mark extends BaseModel
{
    //
}

class Model extends BaseModel
{
    protected $id_car_model;
}

class create_make extends view
{
    public function __construct()
    {

        $mark = new Mark;
        $model = new Model;
        $obj = new BaseModel;
        $this->base = $_SESSION['base'];

        if (isset($_POST['create_make'])) {   
     
            if ($_POST['create_make_name']) {
                $mark->cmake_name = $_POST['create_make_name'];
                $mark->name = $_POST['carMarkInput'];
                if ($_POST['car_make'] == 0) {
                    $insertId = $this->createCarMark($mark);
                } else {
                    $mark->date_update = time();
                    $mark->active = $_POST['active'];
                    $this->updateCarMark($mark);
                }
            }
            setcookie("active_tab", "tab1", 0, "/");
            header('Location: /create_make');
        }

        if (($_POST['car_make'] || $insertId) && isset($_POST['carModelInput']) ) {
            $model->id_car_make = $insertId ?? $_POST['car_make'];
            $model->id_car_model = $_POST['carModel'];
            $model->name = $_POST['carModelInput'];

            if ($_POST['carModel'] == 0) {
                $this->createCarModel($model);
            } else {
                $model->date_update = time();
                $model->active = $_POST['active'];
                $this->updateCarModel($model);
            }

            header('Location: /create_make');
        }

            
    

        if (isset($_POST['create_brand'])) {            
            $mark->name = $_POST['create_brand_name'];
            $this->createCarMark($mark);
            setcookie("active_tab", "tab1", 0, "/");
            header('Location: /create_make');
        }

        if (isset($_POST['create_model'])) {

            $model->name = $_POST['create_model_name'];
            $model->id_car_make = $_POST['car_make'];
            $this->createCarModel($model);
            setcookie("active_tab", "tab2", 0, "/");
            header('Location: /create_make');
        }
        if (isset($_POST['edit_make'])) {  
            $mark->id_car_make = $_POST['edit_make'];
            $mark->date_update = time();
            $mark->name = $_POST['make_new_name'];
            $this->updateCarMark($mark);
            header('Location: /create_make');
        }
        if (isset($_POST['edit_model'])) {
            $model->id_car_model = $_POST['edit_model'];
            $model->name = $_POST['model_name_new'];
            $this->updateCarModel($model);
            header('Location: /create_make');
        }
        if(isset($_POST['create_motor'])) {           
            $this->createMotor($_POST);  
            setcookie("active_tab", "tab3", 0, "/");
            header('Location: /create_make');
        }
        if(isset($_POST['add_uitvoering'])) {           
            $this->createUitvoering($_POST);
            setcookie("active_tab", "tab4", 0, "/");
            header('Location: /create_make');
        }
        if (isset($_REQUEST['disable_mark'])) {
            $disID = addslashes($_REQUEST['disable_mark']);
            $this->disableMark($disID);
            header("Location: /create_make");
        }
        if (isset($_REQUEST['disable_model'])) {
            $disID = addslashes($_REQUEST['disable_model']);
            $this->disableModel($disID);
            header("Location: /create_make");
        }

        if (isset($_GET['get_models'])) {
            $this->getCarModelByBrandName($_GET['get_models']);

            echo json_encode($this->getCarModelByBrandName($_GET['get_models']));
            exit;
        }

        if (isset($_GET['model_name'])) {
            echo json_encode($this->getCarMotorByModelName($_GET['model_name']));
            exit;
        }

        if (isset($_GET['model_name_versie'])) {
            
            echo json_encode($this->getCarVersiesByModelName($_GET['model_name_versie']));
            exit;
        }        
        

        if (isset($_SESSION['user'])) parent::__construct('create_mark_view.php');
        else parent::__construct('login_view.php');
    }

    protected function createCarMark($mark)
    {
        return $this->base->createCarMark($mark);
    }

    protected function updateCarMark($mark)
    {
        $this->base->updateCarMark($mark);
    }

    protected function createCarModel($model)
    {
        $this->base->createCarModel($model);
    }

    protected function updateCarModel($model)
    {
        $this->base->updateCarModel($model);
    }
    protected function disableMark($disID)
    {
        $this->base->disableMark($disID);
    }
    protected function disableModel($disID)
    {
        $this->base->disableModel($disID);
    }

    protected function getCarModelByBrandName($brand)
    {
        return $this->base->getCarModelByBrandName($brand);
    }

    protected function getCarMotorByModelName($model_name)
    {
        return $this->base->getCarMotorByModelName($model_name);
    }

    protected function addCarMerk($_post) {
        return $this->base->addCarMerk($_post);
    }

    protected function getCarVersiesByModelName($model_name) {

        return $this->base->getCarVersiesByModelName($model_name);
    }

    protected function createMotor($_post) {
        
        return $this->base->createMotor($_post);
    }


    protected function createUitvoering($_post) {

        $this->base->createUitvoering($_post);
    }


    // protected function getFuelByMotorName($motor_name) {

    //     return $this->base->getFuelByMotorName($motor_name);
        
    // }
}
