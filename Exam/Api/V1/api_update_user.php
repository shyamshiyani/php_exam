<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCh') {

    $input = file_get_contents('php://Input');

    parse_str($input,$_UPDATE);

    $name=$_UPDATE['user_name'];
    $email=$_UPDATE['user_email'];
    $ph_no=$_UPDATE['ph_no'];
    $address=$_UPDATE['address'];
    $id = $_UPDATE['id'];

    $config = new Config();

    $res=$config->updateUser($name,$email,$ph_no,$address,$id);
   
    if ($res) {
        $arr['data']="User Updated Successfully...!";
    } else {
        $arr['data'] = "User Updation Failed...!";
    }

} else {
    $arr['error'] = "ONLY PUT AND PATCH HTTP REQUEST METHODS ARE ALLOWED...!";
}
echo json_encode($arr);
?>