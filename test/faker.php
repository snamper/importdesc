<?php
include_once 'engine/db_driver.php';
require_once 'vendor/autoload.php';
session_start();

$faker = Faker\Factory::create();
$faker->addProvider(new \Faker\Provider\Fakecar($faker));

$query = 'INSERT INTO `car_make` (`name`, `date_create`, `date_update`, `id_car_type`, `active`) VALUES ';

for ($i=0; $i < 10; $i++) {
    $name = $faker->vehicleBrand;
    $date = $faker->unixTime('now');
    $query .= "\n('$name', $date, $date, 1, 1),";
}

echo $query = substr_replace($query, ';', -1);

$dbDriver = new db_driver();
$dbDriver->query($query);
