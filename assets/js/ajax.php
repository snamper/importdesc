<?php
$db = new mysqli('localhost', 'deb64406n9_gwicarmodule', 'OkFR0yno', "deb64406n9_gwicarmodule");
mysqli_set_charset($db, "UTF8");
$_POST['CarBaseDB'] = new mysqli('localhost', 'deb64406n9_gwicarmodule', 'OkFR0yno', "deb64406n9_gwicarmodule");
mysqli_set_charset($_POST['CarBaseDB'], "UTF8");


    if($_POST['get_params']){
    $equipment = (int)$_POST['equipment'] ? (int)$_POST['equipment'] : 0;
    $modification = (int)$_POST['modification'] ? (int)$_POST['modification'] : 0;
    $out = array();
    
    $sql = "SELECT * FROM `car_specification_value` 
    LEFT JOIN `car_specification` ON `car_specification_value`.`id_car_specification` = `car_specification`.`id_car_specification` 
    WHERE `id_car_trim` = '$modification'";
    $res = $db->query($sql) or die(mysqli_error($db));
    while($row = mysqli_fetch_object($res)){
        $out['characteristic'][] = array(
            'name' => $row->name,
            'value' => $row->value,
            'unit' => $row->unit
        );
    }
    
    $sql = "SELECT * FROM `car_option_value` 
    LEFT JOIN `car_option` ON `car_option_value`.`id_car_option` = `car_option`.`id_car_option` 
    WHERE `id_car_equipment` = '$equipment'";
    $res = $db->query($sql) or die(mysqli_error($db));
    while($row = mysqli_fetch_object($res)){
        $out['option'][] = array(
            'name' => $row->name,
            'value' => $row->is_base ? 'base' : 'additional',
        );
    }
    
    echo json_encode($out);
}

