<?php

include "../../config/config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $ph_no = $_POST['ph_no'];
    $address = $_POST['address'];

    $config = new Config();

    $res = $config->addUser($name, $email, $ph_no, $address);


    if ($res) {
        $arr['data'] = "User inserted Successfully...!";
    } else {
        $arr['data'] = "User insertion failed...!";
    }

} else {
    $arr['error'] = "ONLY POST HTTP REQUEST METHOD IS ALLOWED...!";
}
echo json_encode($arr);
?>