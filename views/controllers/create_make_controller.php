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
                $this->setData('mark', $mark);

                if ($_POST['carMark'] == 0) {
                    $this->createCarMark($mark);
                } else {
                    $this->updateCarMark($mark);
                }
            }

            if (($_POST['carMark'] /*|| $_POST['carMarkInput']*/) && $_POST['carModelInput']) {
                $model->id_car_model = $_POST['carModel'];
                $model->id_car_make = $_POST['carMark'];
                $model->name = $_POST['carModelInput'];

                if ($_POST['carModel'] == 0) {
                    $this->createCarModel($model);
                } else {
                    $this->updateCarModel($model);
                }
            }
            
            header('Location: /create_make');
        }

        if (isset($_SESSION['user'])) parent::__construct('create_mark_view.php');
        else parent::__construct('login_view.php');
    }

    protected function createCarMark($mark) {
        $this->base->createCarMark($mark);
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
}
