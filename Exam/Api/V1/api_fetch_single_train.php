<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['train_id'];
    $config = new Config();

    $res = $config->fetchSingleTrain($id);

    $user_record = [];
    if ($res) {
        $record = mysqli_fetch_assoc($res);
        array_push($user_record, $record);

        echo json_encode($user_record);
    } else {
        $arr['data'] = "No Train found...!";

        echo json_encode($arr);
    }


} else {
    $arr['error'] = "ONLY POST HTTP REQUEST METHOD IS ALLOWED...!";
    echo json_encode($arr);
}
?>