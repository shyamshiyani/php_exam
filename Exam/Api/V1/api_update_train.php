<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCh') {

    $input = file_get_contents('php://Input');

    parse_str($input, $_UPDATE);

    $name = $_UPDATE['train_name'];
    $seat = $_UPDATE['seat_count'];
    $days = $_UPDATE['runs_on_days'];
    $id= $_UPDATE['id'];
   

    $config = new Config();

    $res = $config->updateTrain( $name, $seat, $days ,$id);

    if ($res) {
        $arr['data'] = "Train Updated Successfully...!";
    } else {
        $arr['data'] = "Train Updation Failed...!";
    }

} else {
    $arr['error'] = "ONLY PUT AND PATCH HTTP REQUEST METHODS ARE ALLOWED...!";
}
echo json_encode($arr);
?>