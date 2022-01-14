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

    public function __construct() {
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
        $this->base = $_SESSION['base'];

        if (isset($_POST['carMark'])) {
            if ($_POST['carMarkInput']) {
                $mark->id_car_make = $_POST['carMark'];
                $mark->name = $_POST['carMarkInput'];

                if ($_POST['carMark'] == 0) {
                    $insertId = $this->createCarMark($mark);
                } else {
                    $mark->date_update = time();
                    $mark->active = $_POST['active'];
                    $this->updateCarMark($mark);
                }
            }

            if (($_POST['carMark'] || $insertId) && $_POST['carModelInput']) {
                $model->id_car_make = $insertId ?? $_POST['carMark'];
                $model->id_car_model = $_POST['carModel'];
                $model->name = $_POST['carModelInput'];

                if ($_POST['carModel'] == 0) {
                    $this->createCarModel($model);
                } else {
                    $model->date_update = time();
                    $model->active = 0;//$_POST['active'];
                    $this->updateCarModel($model);
                }
            }

            header('Location: /create_make');
        }

        if (isset($_POST['create_brand'])) {
            $mark->name = $_POST['create_brand_name'];
            $this->createCarMark($mark);
             header('Location: /create_make');
        }
        
        if (isset($_POST['create_model']))   {
            $model->name = $_POST['create_model_name'];
            $model->id_car_make = $_POST['carMark'];
            $this->createCarModel($model);
             header('Location: /create_make');
        }
        if (isset($_POST['edit_mark']))   {
            $mark->id_car_make = $_POST['edit_mark'];
            $mark->date_update = time();
            $mark->name = $_POST['mark_new_name'];
            $this->updateCarMark($mark);
             header('Location: /create_make');
        }
        if (isset($_POST['edit_model']))   {
            $model->id_car_model = $_POST['edit_model'];
            $model->date_update = time();
            $model->name = $_POST['model_name_new'];
            $this->updateCarModel($model);
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

        if (isset($_SESSION['user'])) parent::__construct('create_mark_view.php');
        else parent::__construct('login_view.php');
    }

    protected function createCarMark($mark) {
        return $this->base->createCarMark($mark);
    }

    protected function updateCarMark($mark) {
        $this->base->updateCarMark($mark);
    }

    protected function createCarModel($model) {
        $this->base->createCarModel($model);
    }

    protected function updateCarModel($model) {
        $this->base->updateCarModel($model);
    }
    protected function disableMark($disID) {
        $this->base->disableMark($disID);
    }
    protected function disableModel($disID) {
        $this->base->disableModel($disID);
    }
}
