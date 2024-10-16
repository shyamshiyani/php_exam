<?php

include "../../config/config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $platform_count = $_POST['plateform_count'];
    $station_name = $_POST['station_name'];


    $config = new Config();

    $res = $config->addstation( $platform_count, $station_name );


    if ($res) {
        $arr['data'] = "Station inserted Successfully...!";
    } else {
        $arr['data'] = "Staion insertion failed...!";
    }

} else {
    $arr['error'] = "ONLY POST HTTP REQUEST METHOD IS ALLOWED...!";
}
echo json_encode($arr);
?>