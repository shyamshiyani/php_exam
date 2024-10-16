<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCh') {

    $input = file_get_contents('php://Input');

    parse_str($input, $_UPDATE);

    $platform_count = $_UPDATE['plateform_count'];
    $station_name = $_UPDATE['station_name'];
    $id= $_UPDATE['id'];


    $config = new Config();

    $res = $config->updatestation($platform_count,$station_name,$id);

    if ($res) {
        $arr['data'] = "Station Updated Successfully...!";
    } else {
        $arr['data'] = "Station Updation Failed...!";
    }

} else {
    $arr['error'] = "ONLY PUT AND PATCH HTTP REQUEST METHODS ARE ALLOWED...!";
}
echo json_encode($arr);
?>