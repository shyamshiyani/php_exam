<?php

include "../../config/config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['train_name'];
    $seat = $_POST['seat_count'];
    $days = $_POST['runs_on_days'];

    $config = new Config();

    $res = $config->addTrain( $name, $seat, $days);


    if ($res) {
        $arr['data'] = "Train inserted Successfully...!";
    } else {
        $arr['data'] = "Train insertion failed...!";
    }

} else {
    $arr['error'] = "ONLY POST HTTP REQUEST METHOD IS ALLOWED...!";
}
echo json_encode($arr);
?>